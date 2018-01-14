<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 12.12.2017
 * Time: 20:20
 */

namespace AnonymousPayment\Controller;

use \WHMCS\Billing\Invoice;
use \WHMCS\Billing\Invoice\Item as InvoiceItem;
use \AnonymousPayment\Controller\WHMCSGatewaysController;

class WHMCSInvoiceController {
	private $Invoice, $Gateways;

	function __construct() {
		require ROOTDIR . "/includes/processinvoices.php";
		require ROOTDIR . "/includes/invoicefunctions.php";

		$this->Invoice  = new Invoice();
		$this->Gateways = new WHMCSGatewaysController();
	}

	public function CreateInvoiceAddFunds( $UserID, $Sum, $paymentmethod, $Description ) {
		$this->AddInvoiceItem( $UserID, 'AddFunds', $Sum, $paymentmethod, date( "Y-m-d H:i:s" ),$Description );
		$InvoiceID = createInvoices( $UserID, "", true );

		return $InvoiceID;
	}

	public function CreateInvoice(
		$UserID, $invoicenum, $date, $duedate, $datepaid, $last_capture_attempt, $subtotal,
		$credit, $tax, $tax2, $total, $taxrate = 0, $taxrate2, $Status = 'Unpaid', $GatewayModuleName, $Notes
	) {
		$Invoice                       = new Invoice;
		$Invoice->userid               = $UserID;
		$Invoice->invoicenum           = $invoicenum;
		$Invoice->date                 = $date;
		$Invoice->duedate              = $duedate;
		$Invoice->datepaid             = $datepaid;
		$Invoice->last_capture_attempt = $last_capture_attempt;//'0000-00-00 00:00:00';
		$Invoice->subtotal             = $subtotal;
		$Invoice->credit               = $credit;
		$Invoice->tax                  = $tax;
		$Invoice->tax2                 = $tax2;
		$Invoice->total                = $total;
		$Invoice->taxrate              = $taxrate;
		$Invoice->taxrate2             = $taxrate2;
		$Invoice->status               = $Status;
		$Invoice->paymentmethod        = $GatewayModuleName;
		$Invoice->notes                = $Notes;
		$Invoice->save();

		return $this->Invoice->id;
	}

	public function AddInvoiceItem(
		$UserID, $Type, $Amount, $GatewayModuleName, $DueDate,
		$Description = '', $InvoiceID = '', $Taxed = '', $Notes = ' '
	) {
		$InvoiceItem                = new InvoiceItem;
		$InvoiceItem->invoiceid     = $InvoiceID;
		$InvoiceItem->userid        = $UserID;
		$InvoiceItem->type          = $Type;//'AddFunds';
		$InvoiceItem->amount        = $Amount;
		$InvoiceItem->taxed         = $Taxed;
		$InvoiceItem->paymentmethod = $GatewayModuleName;
		$InvoiceItem->duedate       = $DueDate;
		$InvoiceItem->description   = $Description;
		$InvoiceItem->notes         = $Notes;
		$InvoiceItem->save();
	}

	public function GetInvoice( $id ) {
		return Invoice::find( $id );
	}

	public function GetInvoiceOrFail( $id ) {
		return Invoice::findOrFail( $id );
	}

	public function ChangeGateway( $InvoiceID, $gateway ) {
		$Invoice = $this->GetInvoiceOrFail( $InvoiceID );

		if ( $this->Gateways->ValidateAllowGateways( $gateway, $InvoiceID ) ) {

			$Invoice->where( 'id', '=', $InvoiceID )->update( [ 'paymentmethod' => $gateway ] );

			run_hook( "InvoiceChangeGateway", array(
				"invoiceid"     => $InvoiceID,
				"paymentmethod" => $gateway
			) );
		}
	}

	public function GetInvoiceProduct( $ServiceID, $InvoiceStatus = "" ) {
		$result = InvoiceItem::with( [
			'invoice' => function ( $query ) use ( $InvoiceStatus ) {
				if ( ! empty( $InvoiceStatus ) ) {
					$query->where( 'status', '=', $InvoiceStatus );
				}
			}
		] )->where( 'relid', '=', $ServiceID )->get();

		return $result;
	}
}