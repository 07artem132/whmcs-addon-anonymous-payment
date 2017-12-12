<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 05.12.2017
 * Time: 21:04
 */

namespace PublicInvoiceUrlView\Lib;

use \WHMCS\ClientArea;
use \WHMCS\Billing\Invoice;
use \WHMCS\Config\Setting;
use \WHMCS\Utility\Country;
use \WHMCS\Form;
use \WHMCS\Gateways;
use \WHMCS\Module\Gateway as ModuleGateway;
use PublicInvoiceUrlView\Lib\htmlHelper;

class InvoicePageWHMCS {
	private $ClientArea;
	private $Form;
	private $Invoice;
	private $Gateways;
	private $ModuleGateway;
	private $_LANG;
	private $Country;

	function __construct() {
		global $_LANG;
		$this->_LANG         = $_LANG;
		$this->ClientArea    = new ClientArea();
		$this->Form          = new Form();
		$this->Invoice       = new Invoice();
		$this->Gateways      = new Gateways();
		$this->ModuleGateway = new ModuleGateway();
		$this->Country       = new Country();

	}

	private function FindInvoiceFromDB( $InvoiceID ) {
		if ( empty( $Invoice = $this->Invoice->where( 'id', '=', $InvoiceID )->first() ) ) {
			$this->GeneratePageInvalidInvoiceIdRequested();
		};

		return $Invoice;
	}

	private function GeneratePageInvalidInvoiceIdRequested() {
		$this->ClientArea->initPage();
		$this->ClientArea->disableHeaderFooterOutput();
		$this->ClientArea->assign( 'invalidInvoiceIdRequested', true );
		$this->ClientArea->setTemplate( 'viewinvoice' );
		$this->ClientArea->output();
	}

	private function GetClient() {
		$client            = $this->Invoice->client()->first()->toArray();
		$client['country'] = $this->GetClientContryFullName( $client['country'] );

		return $client;
	}

	private function GeneratePaymentButton() {
		return call_user_func(
			$this->Invoice->paymentGateway . "_link",
			getGatewayVariables( $this->Invoice->paymentGateway, $this->Invoice->id, $this->Invoice->total ) );
	}

	private function GetFormatTplTransactionsItems() {
		$items = $this->Invoice->transactions()->get()->toArray();
		foreach ( $items as &$item ) {
			$item['amount'] = (string) formatCurrency( $item['amountin'] );
		}

		return $items;
	}

	private function GetFormatTplInvoiceItems() {
		$items = $this->Invoice->items()->get()->toArray();

		foreach ( $items as &$item ) {
			$item['amount'] = (string) formatCurrency( $item['amount'] );
		}

		return $items;
	}

	private function CreateGatewayDropdownForm() {
		$gatewaydropdown = $this->Form->dropdown( "gateway", $this->Gateways->getAvailableGateways( $this->Invoice ), $this->Invoice->paymentGateway, "submit()" );
		$gatewaydropdown .= $this->Form->hidden( 'invoice', $this->Invoice->id );

		return $gatewaydropdown;
	}

	private function GetClientContryFullName( $country ) {
		return (string) $this->Country->getName( $country );
	}

	private function ValidateAllowGateways( $gateway ) {
		$validgateways = $this->Gateways->getAvailableGateways( $this->Invoice->id );

		if ( array_key_exists( $gateway, $validgateways ) ) {
			return true;
		}

		return false;
	}

	public function GeneratePage( $InvoiceID ) {
		$this->Invoice = $this->FindInvoiceFromDB( $InvoiceID );

		echo '<script>$(function() {$( "form.form-inline" ).attr(\'action\',\'' . $_SERVER['REQUEST_URI'] . '\')});</script>';

		$this->ClientArea->initPage();
		$this->ClientArea->disableHeaderFooterOutput();
		$this->ClientArea->setPageTitle( $this->_LANG['invoicenumber'] . $this->Invoice->id );
		$this->ClientArea->assign( 'status', $this->Invoice->status );
		$this->ClientArea->assign( 'invoiceid', $this->Invoice->id );
		$this->ClientArea->assign( 'transactions', $this->GetFormatTplTransactionsItems() );
		$this->ClientArea->assign( 'invoiceitems', $this->GetFormatTplInvoiceItems() );
		$this->ClientArea->assign( 'total', (string) formatCurrency( $this->Invoice->total ) );
		$this->ClientArea->assign( 'credit', (string) formatCurrency( $this->Invoice->credit ) );
		$this->ClientArea->assign( 'tax', $this->Invoice->tax1 );
		$this->ClientArea->assign( 'tax2', $this->Invoice->tax2 );
		$this->ClientArea->assign( 'paymentbutton', $this->GeneratePaymentButton() );
		$this->ClientArea->assign( 'subtotal', (string) formatCurrency( $this->Invoice->subtotal ) );
		$this->ClientArea->assign( 'datedue', (string) $this->Invoice->dateDue->format( 'd/m/Y' ) );
		$this->ClientArea->assign( 'clientsdetails', $this->GetClient() );
		$this->ClientArea->assign( 'date', $this->Invoice->dateCreated->format( 'd/m/Y' ) );
		$this->ClientArea->assign( 'paymentmethod', (string) $this->Gateways->getDisplayName( $this->Invoice->paymentGateway ) );
		$this->ClientArea->assign( 'allowchangegateway', (string) Setting::getValue( 'AllowCustomerChangeInvoiceGateway' ) );
		$this->ClientArea->assign( 'gatewaydropdown', (string) $this->CreateGatewayDropdownForm( $this->Gateways, $this->Invoice ) );
		$this->ClientArea->assign( 'payto', (string) Setting::getValue( 'InvoicePayTo' ) );
		$this->ClientArea->assign( 'totalcredit', (string) $this->GetClient()['credit'] );
		$this->ClientArea->assign( 'creditamount', (string) $this->GetClient()['credit'] );
		$this->ClientArea->assign( 'balance', (string) formatCurrency( $this->Invoice->balance ) );
		$this->ClientArea->setTemplate( 'viewinvoice' );
		$this->ClientArea->output();

	}

	public function ChangeGateway( $InvoiceID, $gateway ) {
		$this->Invoice = $this->FindInvoiceFromDB( $InvoiceID );

		if ( $this->ValidateAllowGateways( $gateway ) ) {

			$this->Invoice->where( 'id', '=', $this->Invoice->id )->update( [ 'paymentmethod' => $gateway ] );

			run_hook( "InvoiceChangeGateway", array(
				"invoiceid"     => $this->Invoice->id,
				"paymentmethod" => $gateway
			) );
		}
	}
}