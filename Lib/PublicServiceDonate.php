<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 06.12.2017
 * Time: 20:33
 */

namespace PublicInvoiceUrlView\Lib;


use \WHMCS\ClientArea;
use \WHMCS\Billing\Invoice;
use \WHMCS\Config\Setting;
use \WHMCS\Form;
use Smarty;
use \WHMCS\Billing\Invoice\Item;
use \WHMCS\Service\Service;
use PublicInvoiceUrlView\Lib\Config;
use PublicInvoiceUrlView\Lib\CryptUrlData;

class PublicServiceDonate {

	private $ClientArea;
	private $Form;
	private $Invoice;
	private $_LANG;

	function __construct() {
		global $_LANG;
		$this->_LANG                 = $_LANG;
		$this->ClientArea            = new ClientArea();
		$this->Form                  = new Form();
		$this->Invoice               = new Invoice();
	}

	function GetProductInvoice( $sid ) {
		$result = Item::with( [
			'invoice' => function ( $query ) {
				$query->where( 'status', '=', 'Unpaid' );

			}
		] )->where( 'relid', '=', $sid )->get();

		for ( $i = 0; $i < $result->count(); $i ++ ) {
			$results[ $i ]            = $result[ $i ]->invoice->toarray();
			$results[ $i ]['key']     = CryptUrlData::Encrypt( $result[ $i ]['id'] );
			$results[ $i ]['duedate'] = date( "d/m/Y", strtotime( $result[ $i ]['duedate'] ) );
		}

		return $results;
	}

	function GetService( $domain ) {
		$result = Service::where( 'domain', '=', $domain )->first();

		return $result;
	}

	public function GeneratePage( $domain ) {
		$Service  = $this->GetService( $domain );
		$Invoices = $this->GetProductInvoice( $Service->id );
		$Product  = $Service->product()->first();
		$Client   = $Service->client()->first();

		$this->ClientArea->initPage();
		$this->ClientArea->assign( 'Domain', $domain );
		$this->ClientArea->assign( 'ProductName', $Product->name );
		$this->ClientArea->assign( 'BillingCycle', $Service->billingCycle );
		$this->ClientArea->assign( 'ProductExtendedAt', $Service->nextDueDate );
		$this->ClientArea->assign( 'ProductStatusColor', $Service->domainStatus );
		$this->ClientArea->assign( 'ProductStatusText', $Service->domainStatus );
		$this->ClientArea->assign( 'Invoices', $Invoices );
		$this->ClientArea->assign( 'ProductURL', Config::GetWHMCSSystemURL() . '/servers/' . $Service->id );
		$this->ClientArea->assign( 'SystemURL', Config::GetWHMCSSystemURL() );
		$this->ClientArea->assign( 'ModuleLink', $_GET['m'] );
		$this->ClientArea->assign( 'ServerControlPanelText', 'Управление сервером' );
		$this->ClientArea->assign( 'ProductExtendedAtText', 'Продлен до' );
		$this->ClientArea->assign( 'BillingCycleText', 'Платежный цикл' );
		$this->ClientArea->assign( 'BalanceSum', $Client->credit );
		$this->ClientArea->assign( 'BalanceDescription', 'Остаток средств:' );
		$this->ClientArea->assign( 'AddBalanceDescription', 'Пополнить на сумму:' );
		$this->ClientArea->assign( 'AddBalanceButton', 'Пополнить баланс' );
		$this->ClientArea->assign( 'MaxAddBalanceSum', Config::GetUserMaxBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', Config::GetUserMinBalanse() );
		$this->ClientArea->assign( 'DefaultAddBalanceSum', 100 );
		$this->ClientArea->assign( 'UserBalanseStatus', Config::GetUserBalanseStatus() );
		$this->ClientArea->assign( 'InvoiceNumberTableHead', 'Счет #' );
		$this->ClientArea->assign( 'DueDateTableHead', 'Срок оплаты' );
		$this->ClientArea->assign( 'ToPayTableHead', 'К оплате' );
		$this->ClientArea->assign( 'StatusTableHead', 'Состояние' );

		$this->ClientArea->setTemplate( '/modules/addons/PublicInvoiceUrlView/Template/PublicServiceDonate.tpl' );
		$this->ClientArea->output();
	}
}