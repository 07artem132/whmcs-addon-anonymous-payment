<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 09.12.2017
 * Time: 23:35
 */

namespace PublicInvoiceUrlView\Lib;

use \WHMCS\ClientArea;
use \WHMCS\Form;
use PublicInvoiceUrlView\Lib\Config;
use PublicInvoiceUrlView\Lib\CryptUrlData;
use \WHMCS\User\Client;

class PublicBalanseDonate {
	private $ClientArea;
	private $Form;

	function __construct() {
		$this->ClientArea = new ClientArea();
		$this->Form       = new Form();
	}

	function GenerateWidget( $widget_id ) {
		//	$Client   = $Service->client()->first();
		$this->ClientArea->initPage();
		$this->ClientArea->disableHeaderFooterOutput();
		$this->ClientArea->assign( 'widget_id', $widget_id );
		$this->ClientArea->assign( 'MaxAddBalanceSum', Config::GetUserMaxBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', Config::GetUserMinBalanse() );
		$this->ClientArea->assign( 'DefaultAddBalanceSum', Config::GetUserDefaultAddBalanceSum() );
		//$this->ClientArea->assign( 'BalanceSum', $Client->credit );
		$this->ClientArea->setTemplate( '/modules/addons/PublicInvoiceUrlView/Template/PublicBalanseDonateWidget.tpl' );
		$this->ClientArea->output();

		return;
	}

	function GenerateWidgetConfig() {
		$Client   = Client::find( $_SESSION['uid'] );

		$this->ClientArea->initPage();
		$this->ClientArea->assign( 'widget_id', CryptUrlData::Encrypt( $Client->id ) );
		$this->ClientArea->assign( 'MaxAddBalanceSum', Config::GetUserMaxBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', Config::GetUserMinBalanse() );
		$this->ClientArea->assign( 'WidgetShowBalance', Config::GetWidgetShowBalance( $Client->id ) );
		$this->ClientArea->assign( 'WidgetTitle', Config::GetWidgetTitle( $Client->id ) );
		$this->ClientArea->assign( 'WidgetDefaultAddBalanceSum', Config::GetWidgetDefaultAddBalanceSum( $Client->id ) );
		$this->ClientArea->assign( 'WidgetButtonText', Config::GetWidgetButtonText( $Client->id ) );
		$this->ClientArea->assign( 'BalanceSum', $Client->credit );
		$this->ClientArea->setTemplate( '/modules/addons/PublicInvoiceUrlView/Template/PublicBalanseDonateWidgetConfig.tpl' );
		$this->ClientArea->output();

		return;
	}

}