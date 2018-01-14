<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 05.12.2017
 * Time: 21:04
 */

namespace AnonymousPayment\ClientAreaPage;

use AnonymousPayment\Config\WHMCSConfig;
use \AnonymousPayment\Config\WHMCSUserConfig;
use \AnonymousPayment\Traits\isRequestMethod;
use \AnonymousPayment\Controller\CryptController;
use \AnonymousPayment\Controller\WHMCSFormController;
use \AnonymousPayment\Abstracts\ClientAreaPageAbstract;
use \AnonymousPayment\Controller\WHMCSInvoiceController;
use \AnonymousPayment\Controller\WHMCSCountryController;
use \AnonymousPayment\Interfaces\ClientAreaPageInterface;
use \AnonymousPayment\Controller\WHMCSGatewaysController;
use AnonymousPayment\Controller\ModuleStatisticsController;
use \AnonymousPayment\Controller\WHMCSClientAreaController;
use \AnonymousPayment\Controller\WHMCSModuleGatewaysController;

class PublicInvoiceDonate extends ClientAreaPageAbstract implements ClientAreaPageInterface {
	use isRequestMethod;

	private
		$ClientArea,
		$Form,
		$Invoice,
		$InvoiceController,
		$Gateways,
		$ModuleGateway,
		$_LANG,
		$Country,
		$Client;

	function __construct() {
		global $_LANG;
		$this->_LANG             = $_LANG;
		$this->ClientArea        = new WHMCSClientAreaController();
		$this->Form              = new WHMCSFormController();
		$this->InvoiceController = new WHMCSInvoiceController();
		$this->Invoice           = $this->InvoiceController->GetInvoiceOrFail( $this->GetInvoiceID() );
		$this->ModuleGateway     = new WHMCSModuleGatewaysController();
		$this->Gateways          = new WHMCSGatewaysController();
		$this->Country           = new WHMCSCountryController();
		$this->Client            = $this->Invoice->client()->first()->toArray();
		$this->Client['country'] = $this->Country->getName( $this->Client['country'] );


	}

	function GetInvoiceID() {
		return CryptController::Decrypt( $_GET['invoice_id'] );
	}

	function render() {
		ModuleStatisticsController::AddEventPageView( 'PublicInvoice' );

		if ( $this->isRequestMethod( 'POST' ) && isset( $_POST['gateway'] ) && ! empty( $_POST['gateway'] ) ) {
			$this->InvoiceController->ChangeGateway( $this->GetInvoiceID(), $_POST['gateway'] );
			$this->Invoice = $this->InvoiceController->GetInvoiceOrFail( $this->GetInvoiceID() );
		}

		$this->ClientArea->initPage();
		$this->ClientArea->disableHeaderFooterOutput();
		$this->ClientArea->setPageTitle( $this->_LANG['invoicenumber'] . $this->Invoice->id );
		$this->ClientArea->assign( 'status', $this->Invoice->status );
		$this->ClientArea->assign( 'invoiceid', $this->Invoice->id );
		$this->ClientArea->assign( 'transactions', $this->GetTransactionsItems() );
		$this->ClientArea->assign( 'invoiceitems', $this->GetInvoiceItems() );
		$this->ClientArea->assign( 'total', (string) formatCurrency( $this->Invoice->total ) );
		$this->ClientArea->assign( 'credit', (string) formatCurrency( $this->Invoice->credit ) );
		$this->ClientArea->assign( 'tax', $this->Invoice->tax1 );
		$this->ClientArea->assign( 'tax2', $this->Invoice->tax2 );
		$this->ClientArea->assign( 'paymentbutton', $this->ModuleGateway->GeneratePaymentButton( $this->Invoice->paymentGateway, $this->Invoice->id, $this->Invoice->total ) );
		$this->ClientArea->assign( 'subtotal', (string) formatCurrency( $this->Invoice->subtotal ) );
		$this->ClientArea->assign( 'datedue', (string) $this->Invoice->dateDue->format( 'd/m/Y' ) );
		$this->ClientArea->assign( 'clientsdetails', $this->Client );
		$this->ClientArea->assign( 'date', $this->Invoice->dateCreated->format( 'd/m/Y' ) );
		$this->ClientArea->assign( 'paymentmethod', (string) $this->Gateways->getDisplayName( $this->Invoice->paymentGateway ) );
		$this->ClientArea->assign( 'allowchangegateway', WHMCSUserConfig::AllowChangeInvoiceGateway() );
		$this->ClientArea->assign( 'gatewaydropdown', (string) $this->CreateFormChangeGateways( $this->Gateways, $this->Invoice ) );
		$this->ClientArea->assign( 'payto', WHMCSConfig::GetInvoicePayTo() );
		$this->ClientArea->assign( 'totalcredit', $this->Client['credit'] );
		$this->ClientArea->assign( 'creditamount', $this->Client['credit'] );
		$this->ClientArea->assign( 'balance', (string) formatCurrency( $this->Invoice->balance ) );
		$this->ClientArea->setTemplate( 'PublicInvoiceDonate' );
		$this->ClientArea->output();
	}

	private function GetTransactionsItems() {
		$items = $this->Invoice->transactions()->get()->toarray();

		foreach ( $items as &$item ) {
			$item['amount'] = formatCurrency( $item['amountin'] );
		}

		return $items;
	}

	private function GetInvoiceItems() {
		$items = $this->Invoice->items()->get()->toArray();

		foreach ( $items as &$item ) {
			$item['amount'] = formatCurrency( $item['amount'] );
		}

		return $items;
	}

	function CreateFormChangeGateways( $Invoice ) {
		$gatewaydropdown = $this->Form->dropdown(
			"gateway",
			$this->Gateways->GetAvailableGateways( $this->Invoice->id ),
			$this->Invoice->paymentGateway,
			"submit()"
		);
		$gatewaydropdown .= $this->Form->hidden( 'invoice', $Invoice->id );

		return $gatewaydropdown;
	}


}