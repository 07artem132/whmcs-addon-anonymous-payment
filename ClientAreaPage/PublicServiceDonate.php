<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 06.12.2017
 * Time: 20:33
 */

namespace AnonymousPayment\ClientAreaPage;


use \AnonymousPayment\Config\WHMCSConfig;
use \AnonymousPayment\Config\WHMCSUserConfig;
use \AnonymousPayment\Controller\CryptController;
use \AnonymousPayment\Abstracts\ClientAreaPageAbstract;
use \AnonymousPayment\Controller\WHMCSInvoiceController;
use \AnonymousPayment\Controller\WHMCSServiceController;
use \AnonymousPayment\Interfaces\ClientAreaPageInterface;
use \AnonymousPayment\Controller\WHMCSClientAreaController;
use \AnonymousPayment\Controller\MultilanguageController as Lang;

class PublicServiceDonate extends ClientAreaPageAbstract implements ClientAreaPageInterface {

	private $ClientArea,
		$Invoice,
		$Service;

	function __construct() {
		$this->ClientArea = new WHMCSClientAreaController();
		$this->Invoice    = new WHMCSInvoiceController();
		$this->Service    = new WHMCSServiceController();
	}

	function GetProductInvoice( $sid ) {
		$result = $this->Invoice->GetInvoiceProduct( $sid, 'Unpaid' );

		for ( $i = 0; $i < $result->count(); $i ++ ) {
			$results[ $i ]            = $result[ $i ]->invoice->toarray();
			$results[ $i ]['key']     = CryptController::Encrypt( $result[ $i ]['id'] );
			$results[ $i ]['duedate'] = date( "d/m/Y", strtotime( $result[ $i ]['duedate'] ) );
		}

		return $results;
	}

	private function GetDomain() {
		return $_GET['domain'];
	}

	public function render() {
		$Service  = $this->Service->GetFirstServiceAssignByDomain( $this->GetDomain() );
		$Invoices = $this->GetProductInvoice( $Service->id );
		$Product  = $Service->product()->first();
		$Client   = $Service->client()->first();

		$this->ClientArea->initPage();
		$this->ClientArea->assign( 'Domain', $this->GetDomain() );
		$this->ClientArea->assign( 'ProductName', $Product->name );
		$this->ClientArea->assign( 'BillingCycle', $Service->billingCycle );
		$this->ClientArea->assign( 'ProductExtendedAt', $Service->nextDueDate );
		$this->ClientArea->assign( 'ProductStatusColor', $Service->domainStatus );
		$this->ClientArea->assign( 'ProductStatusText', $Service->domainStatus );
		$this->ClientArea->assign( 'Invoices', $Invoices );
		$this->ClientArea->assign( 'ClientEmail', $Client->email );
		$this->ClientArea->assign( 'ProductURL', WHMCSConfig::GetSystemURL() . '/servers/' . $Service->id );
		$this->ClientArea->assign( 'SystemURL', WHMCSConfig::GetSystemURL() );
		$this->ClientArea->assign( 'ModuleLink', $_GET['m'] );
		$this->ClientArea->assign( 'ServerControlPanelText', Lang::Translate( 'ServerControlPanel' ) );
		$this->ClientArea->assign( 'ProductExtendedAtText', Lang::Translate( 'ProductExtendedAt' ) );
		$this->ClientArea->assign( 'BillingCycleText', Lang::Translate( 'BillingCycle' ) );
		$this->ClientArea->assign( 'BalanceSum', $Client->credit );
		$this->ClientArea->assign( 'BalanceDescription', Lang::Translate( 'BalanceDescription' ) );
		$this->ClientArea->assign( 'AddBalanceDescription', Lang::Translate( 'AddBalanceDescription' ) );
		$this->ClientArea->assign( 'AddBalanceButton', Lang::Translate( 'AddBalanceButton' ) );
		$this->ClientArea->assign( 'MaxAddBalanceSum', WHMCSUserConfig::GetMaxAddBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', WHMCSUserConfig::GetMinAddBalanse() );
		$this->ClientArea->assign( 'DefaultAddBalanceSum', 100 );
		$this->ClientArea->assign( 'UserBalanseStatus', WHMCSUserConfig::GetBalanseStatus() );
		$this->ClientArea->assign( 'InvoiceNumberTableHead', Lang::Translate( 'InvoiceNumberTableHead' ) );
		$this->ClientArea->assign( 'DueDateTableHead', Lang::Translate( 'DueDateTableHead' ) );
		$this->ClientArea->assign( 'ToPayTableHead', Lang::Translate( 'ToPayTableHead' ) );
		$this->ClientArea->assign( 'StatusTableHead', Lang::Translate( 'StatusTableHead' ) );

		$this->ClientArea->setTemplate( '/modules/addons/AnonymousPayment/ClientAreaTemplate/PublicServiceDonate.tpl' );
		$this->ClientArea->output();
	}
}