<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 10.12.2017
 * Time: 22:03
 */

namespace PublicInvoiceUrlView\Lib;

use \WHMCS\ClientArea;
use  \WHMCS\Module\Gateway as ModuleGateway;
use \WHMCS\Billing\Invoice;
use WHMCS\Billing\Invoice\Item as InvoiceItem;

class PublicGrouppayDonate {

	private $_LANG;
	private $ClientArea;
	private $InvoiceItem;

	function __construct() {
		global $_LANG;
		$this->_LANG         = $_LANG;
		$this->ClientArea    = new ClientArea();
		$this->ModuleGateway = new ModuleGateway();
		$this->Invoice       = new Invoice();
		$this->InvoiceItem   = new InvoiceItem();
	}

	private function GeneratePaymentButton() {
		return call_user_func(
			$this->Invoice->paymentGateway . "_link",
			getGatewayVariables( $this->Invoice->paymentGateway, $this->Invoice->id, $this->Invoice->total ) );
	}

	private function CreateInvoice( $UserID, $amount, $GatewayModuleName ) {
		$this->Invoice->userid               = $UserID;
		$this->Invoice->invoicenum           = '';
		$this->Invoice->date                 = '2017-12-09';
		$this->Invoice->duedate              = '2017-12-09';
		$this->Invoice->datepaid             = '0000-00-00 00:00:00';
		$this->Invoice->last_capture_attempt = '0000-00-00 00:00:00';
		$this->Invoice->subtotal             = $amount;
		$this->Invoice->credit               = 0;
		$this->Invoice->tax                  = 0;
		$this->Invoice->tax2                 = 0;
		$this->Invoice->total                = $amount;
		$this->Invoice->taxrate              = 0;
		$this->Invoice->taxrate2             = 0;
		$this->Invoice->status               = 'Unpaid';
		$this->Invoice->paymentmethod        = $GatewayModuleName;
		$this->Invoice->notes                = '';
		$this->Invoice->save();

		return $this->Invoice->id;;
	}

	private function AddInvoiceItem( $UserID, $InvoiceID, $amount, $GatewayModuleName,$duedate, $description = 'Пополнить' ,$notes=' ') {
		$this->InvoiceItem->invoiceid     = $InvoiceID;
		$this->InvoiceItem->userid        = $UserID;
		$this->InvoiceItem->type          = 'AddFunds';
		$this->InvoiceItem->description   = $description;
		$this->InvoiceItem->amount        = $amount;
		$this->InvoiceItem->taxed         = 0;
		$this->InvoiceItem->duedate       = $duedate;//'2017-12-12';
		$this->InvoiceItem->paymentmethod = $GatewayModuleName;
		$this->InvoiceItem->notes         = $notes;
		$this->InvoiceItem->save();

	}

	function GeneratePage() {
		if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
			$GatewayModuleName = $_POST['GatewayModuleName'];
			if ( array_key_exists( 'MessageRecipientStatus', $_POST ) ) {
				$MessageRecipient = $_POST['MessageRecipient'];
			}

			$amount       = $_POST['amount'];
			$port         = $_POST['port'];
			$ip           = $_POST['ip'];
			$customer     = $_POST['customer'];
			$payment_type = $_POST['payment_type'];


			die();
			$this->ClientArea->initPage();
			$this->ClientArea->setTemplate( "forwardpage" );
			$this->ClientArea->assign( "message", $this->_LANG['forwardingtogateway'] );
			$this->assign( "code", $paymentbutton );
			$this->assign( "invoiceid", 2 );
			$this->ClientArea->assign( "GatewaysList", $this->ModuleGateway->getAvailableGateways() );
			$this->ClientArea->setPageTitle( 'Пополнение счета без авторизации' );
			$this->ClientArea->output();

		}

		$this->ClientArea->initPage();
		$this->ClientArea->setTemplate( '/modules/addons/PublicInvoiceUrlView/Template/PublicGrouppayDonate.tpl' );
//		$this->ClientArea->setTemplate("forwardpage");
//		$this->ClientArea->assign("message", $this->_LANG['forwardingtogateway']);
//		$this->assign("code", $paymentbutton);
//		$this->assign("invoiceid", $id);
		$this->ClientArea->assign( "GatewaysList", $this->ModuleGateway->getAvailableGateways() );
		$this->ClientArea->setPageTitle( 'Пополнение счета без авторизации' );
		$this->ClientArea->output();
	}

}