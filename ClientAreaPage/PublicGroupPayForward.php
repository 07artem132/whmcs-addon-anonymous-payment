<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 16:06
 */

namespace AnonymousPayment\ClientAreaPage;

use AnonymousPayment\Abstracts\ClientAreaPageAbstract;
use AnonymousPayment\Controller\WHMCSInvoiceController;
use AnonymousPayment\Interfaces\ClientAreaPageInterface;
use AnonymousPayment\Controller\WHMCSClientAreaController;
use AnonymousPayment\Controller\WHMCSModuleGatewaysController;

class PublicGroupPayForward extends ClientAreaPageAbstract implements ClientAreaPageInterface {

	private $_LANG,
		$ClientArea,
		$Invoice,
		$ModuleGateway;

	function __construct() {
		global $_LANG;
		$this->_LANG         = $_LANG;
		$this->ClientArea    = new WHMCSClientAreaController();
		$this->Invoice       = new WHMCSInvoiceController();
		$this->ModuleGateway = new WHMCSModuleGatewaysController();
	}

	function render() {
		$MessageRecipient = $_POST['MessageRecipient'];
		$GatewayModuleName = $_POST['GatewayModuleName'];
		$amount            = $_POST['Amount'];
		$UserID            = $_POST['UserID'];

		$InvoiceID     = $this->Invoice->CreateInvoiceAddFunds( $UserID, $amount, $GatewayModuleName, $MessageRecipient );
		$PaymentButton = $this->ModuleGateway->GeneratePaymentButton( $GatewayModuleName, $InvoiceID, $amount );

		$this->ClientArea->initPage();
		$this->ClientArea->setTemplate( "forwardpage" );
		$this->ClientArea->assign( "message", $this->_LANG['forwardingtogateway'] );
		$this->ClientArea->assign( "code", $PaymentButton );
		$this->ClientArea->assign( "invoiceid", $InvoiceID );
		$this->ClientArea->output();
	}
}