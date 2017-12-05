<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.11.2017
 * Time: 12:52
 */


use \WHMCS\ClientArea;
use \WHMCS\Billing\Invoice;
use \WHMCS\Config\Setting;
use \WHMCS\Utility\Country;
use \WHMCS\Form;
use \WHMCS\Gateways;
use \WHMCS\Module\Gateway as ModuleGateway;

require __DIR__ . '/vendor/autoload.php';

use PublicInvoiceUrlView\Lib\PageController;
use PublicInvoiceUrlView\Lib\Config;
use PublicInvoiceUrlView\Lib\html;


function PublicInvoiceUrlView_config() {
	return [
		"name"        => "Public invoice url view",
		"description" => "",
		"version"     => "1.0",
		"author"      => "service-voice",
		"fields"      => [

		]
	];
}

function PublicInvoiceUrlView_clientarea( $vars ) {
	global $_LANG;
	$modulelink = $vars['modulelink'];

	if ( md5( $_GET['invoice'] . Setting::getValue( 'SystemURL' ) ) != base64_decode( $_GET['key'] ) ) {
		die();
	}

	echo html::GetJqueryInclude();

	$Invoice       = new Invoice;
	$Country       = new Country();
	$Gateways      = new Gateways();
	$Form          = new Form();
	$ModuleGateway = new ModuleGateway();

	if ( isset( $_POST['gateway'] ) && ! empty( $_POST['gateway'] ) ) {
		$validgateways = $Gateways->getAvailableGateways( $Invoice->id );
		if ( array_key_exists( $_POST['gateway'], $validgateways ) ) {
			$Invoice->where( 'id', '=', $_GET['invoice'] )->update( [ 'paymentmethod' => $_POST['gateway'] ] );
			run_hook( "InvoiceChangeGateway", array(
				"invoiceid"     => $_GET['invoice'],
				"paymentmethod" => $_POST['gateway']
			) );
		}
	}

	$Invoice = $Invoice->where( 'id', '=', $_GET['invoice'] )->first();

	if ( $Invoice === null ) {
		$ca = new ClientArea();
		$ca->initPage();
		$ca->disableHeaderFooterOutput();
		$ca->assign( 'invalidInvoiceIdRequested', true );
		$ca->setTemplate( 'viewinvoice' );
		$ca->output();
		return;
	}

	echo '<script>$(function() {$( "form.form-inline" ).attr(\'action\',\'' . $modulelink . '&invoice=' . $Invoice->id . '\')});</script>';

	$transactions = $Invoice->transactions()->get()->toArray();
	$client       = $Invoice->client()->first()->toArray();
	$invoiceitems = $Invoice->items()->get()->toArray();

	$companyname        = Setting::getValue( 'companyname' );
	$InvoicePayTo       = Setting::getValue( 'InvoicePayTo' );
	$allowchangegateway = Setting::getValue( 'AllowCustomerChangeInvoiceGateway' );

	$gatewaydropdown = $Form->dropdown( "gateway", $Gateways->getAvailableGateways( $Invoice->id ), $Invoice->paymentGateway, "submit()" );
	$gatewaydropdown .= $Form->hidden( 'invoice', $_GET['invoice'] );

	foreach ( $transactions as &$item ) {
		$item['amount'] = formatCurrency( $item['amountin'] );
	}

	foreach ( $invoiceitems as &$item ) {
		$item['amount'] = formatCurrency( $item['amount'] );
	}


	$client['country'] = $Country->getName( $client['country'] );
	$ModuleGateway->load( $Invoice->paymentGateway );

	$ca = new ClientArea();
	$ca->initPage();
	$ca->disableHeaderFooterOutput();
	$ca->setPageTitle( $_LANG['invoicenumber'] . $Invoice->id );
	$ca->assign( 'status', $Invoice->status );
	$ca->assign( 'invoiceid', $Invoice->id );
	$ca->assign( 'transactions', $transactions );
	$ca->assign( 'invoiceitems', $invoiceitems );
	$ca->assign( 'total', formatCurrency( $Invoice->total ) );
	$ca->assign( 'credit', formatCurrency( $Invoice->credit ) );
	$ca->assign( 'tax', $Invoice->tax1 );
	$ca->assign( 'tax2', $Invoice->tax2 );
	$ca->assign( 'paymentbutton', $ModuleGateway->call( 'link', [
		'amount'        => $Invoice->balance,
		'invoiceid'     => $Invoice->id,
		'clientdetails' => $client,
		'description'   => $companyname . '-' . $_LANG['invoicenumber'] . $Invoice->id,
		'currency'      => getCurrency( $client->id ),
		'language'      => $_LANG['locale'],
	] ) );
	$ca->assign( 'subtotal', formatCurrency( $Invoice->subtotal ) );
	$ca->assign( 'datedue', $Invoice->dateDue->format( 'd/m/Y' ) );
	$ca->assign( 'clientsdetails', $client );
	$ca->assign( 'date', $Invoice->dateCreated->format( 'd/m/Y' ) );
	$ca->assign( 'paymentmethod', $Gateways->getDisplayName( $Invoice->paymentGateway ) );
	$ca->assign( 'allowchangegateway', $allowchangegateway );
	$ca->assign( 'gatewaydropdown', $gatewaydropdown );
	$ca->assign( 'payto', $InvoicePayTo );
	$ca->assign( 'totalcredit', $client['credit'] );
	$ca->assign( 'creditamount', $client['credit'] );
	$ca->assign( 'balance', formatCurrency( $Invoice->balance ) );
	$ca->setTemplate( 'viewinvoice' );
	$ca->output();
}

function PublicInvoiceUrlView_output( $vars ) {
	try {
		$PageController = new PageController();
		$PageController->SetVar( 'basheURL', $vars['modulelink'] );

		if ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ) {
			return $PageController->BildPage( $_GET['page'] );
		}

		if ( ! Config::GetInstallStatus() ) {
			return $PageController->BildPage( 'welcome' );
		} else {
			return $PageController->BildPage( 'dashboard' );
		}

	} catch ( \Exception $e ) {
		echo $e->getMessage();
	}
}