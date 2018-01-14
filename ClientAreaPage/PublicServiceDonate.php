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
use AnonymousPayment\Config\PublicServiceDonateConfig;
use \AnonymousPayment\Abstracts\ClientAreaPageAbstract;
use \AnonymousPayment\Controller\WHMCSInvoiceController;
use \AnonymousPayment\Controller\WHMCSServiceController;
use \AnonymousPayment\Interfaces\ClientAreaPageInterface;
use \AnonymousPayment\Controller\WHMCSClientAreaController;
use \AnonymousPayment\Controller\ModuleStatisticsController;
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
			if ( $result[ $i ]->invoice === null ) {
				continue;
			}

			$results[ $i ]            = $result[ $i ]->invoice->toarray();
			$results[ $i ]['key']     = CryptController::Encrypt( $result[ $i ]['invoiceid'] );
			$results[ $i ]['duedate'] = date( "d/m/Y", strtotime( $result[ $i ]['duedate'] ) );
		}

		return $results;
	}

	private function GetDomain() {
		return $_GET['domain'];
	}

	public function render() {
		ModuleStatisticsController::AddEventPageView( 'ServiceDonate' );

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
		$this->ClientArea->assign( 'ClientID', $Client->id );
		$this->ClientArea->assign( 'ProductURL', WHMCSConfig::GetSystemURL() . '/servers/' . $Service->id );
		$this->ClientArea->assign( 'SystemURL', WHMCSConfig::GetSystemURL() );
		$this->ClientArea->assign( 'BalanceSum', $Client->credit );
		$this->ClientArea->assign( 'MaxAddBalanceSum', WHMCSUserConfig::GetMaxAddBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', WHMCSUserConfig::GetMinAddBalanse() );
		$this->ClientArea->assign( 'DefaultAddBalanceSum', 100 );
		$this->ClientArea->assign( 'UserBalanseStatus', WHMCSUserConfig::GetBalanseStatus() );
		$this->ClientArea->assign( 'ShowServiceInfo', PublicServiceDonateConfig::GetShowServiceInfo() );
		$this->ClientArea->assign( 'ShowAddBalanceWidget', PublicServiceDonateConfig::GetShowAddBalanceWidget() );
		$this->ClientArea->assign( 'ShowBalanceUser', PublicServiceDonateConfig::GetShowBalanceUser() );
		$this->ClientArea->assign( 'ShowUserInvoiceList', PublicServiceDonateConfig::GetShowUserInvoiceList() );

		foreach ( $this->GetVars() as $key => $value ) {
			$this->ClientArea->assign( $key, $value );
		}

		$this->ClientArea->setTemplate( 'PublicServiceDonate' );
		$this->ClientArea->output();
	}
}