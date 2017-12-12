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
use PublicInvoiceUrlView\Lib\ConfigController;
use PublicInvoiceUrlView\Lib\CryptController;
use \WHMCS\User\Client;

class PublicBalanseDonate {
	private $ClientArea;
	private $Form;

	function __construct() {
		$this->ClientArea = new ClientArea();
		$this->Form       = new Form();
	}

	function EditSettings( $Settings ) {
		$ClientID = $_SESSION['uid'];

		if ( array_key_exists( 'WidgetButtonText', $Settings ) ) {
			ConfigController::SetWidgetButtonText( $ClientID, $Settings['WidgetButtonText'] );
		}

		if ( array_key_exists( 'WidgetDefaultAddBalanceSum', $Settings ) ) {
			ConfigController::SetWidgetDefaultAddBalanceSum( $ClientID, $Settings['WidgetDefaultAddBalanceSum'] );
		}

		if ( array_key_exists( 'WidgetShowBalance', $Settings ) ) {
			ConfigController::SetWidgetShowBalance( $ClientID, $Settings['WidgetShowBalance'] );
		}

		if ( array_key_exists( 'WidgetTitle', $Settings ) ) {
			ConfigController::SetWidgetTitle( $ClientID, $Settings['WidgetTitle'] );
		}
	}

	function GenerateWidget( $widget_id ) {
		$Client = Client::find( CryptController::Decrypt( $widget_id ) );

		$this->ClientArea->initPage();
		$this->ClientArea->disableHeaderFooterOutput();
		$this->ClientArea->assign( 'widget_id', CryptController::Encrypt( $Client->id ) );
		$this->ClientArea->assign( 'MaxAddBalanceSum', ConfigController::GetUserMaxBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', ConfigController::GetUserMinBalanse() );
		$this->ClientArea->assign( 'WidgetShowBalance', ConfigController::GetWidgetShowBalance( $Client->id ) );
		$this->ClientArea->assign( 'WidgetTitle', ConfigController::GetWidgetTitle( $Client->id ) );
		$this->ClientArea->assign( 'WidgetDefaultAddBalanceSum', ConfigController::GetWidgetDefaultAddBalanceSum( $Client->id ) );
		$this->ClientArea->assign( 'WidgetButtonText', ConfigController::GetWidgetButtonText( $Client->id ) );
		$this->ClientArea->assign( 'BalanceSum', $Client->credit );
		$this->ClientArea->setTemplate( '/modules/addons/PublicInvoiceUrlView/Template/PublicBalanseDonateWidget.tpl' );
		$this->ClientArea->output();

		return;
	}

	function GenerateWidgetConfig() {
		$Client = Client::find( $_SESSION['uid'] );

		$this->ClientArea->initPage();
		$this->ClientArea->requireLogin();
		$this->ClientArea->assign( 'widget_id', CryptController::Encrypt( $Client->id ) );
		$this->ClientArea->assign( 'WHMCSSystemURL', ConfigController::GetWHMCSSystemURL() );
		$this->ClientArea->assign( 'MaxAddBalanceSum', ConfigController::GetUserMaxBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', ConfigController::GetUserMinBalanse() );
		$this->ClientArea->assign( 'WidgetShowBalance', ConfigController::GetWidgetShowBalance( $Client->id ) );
		$this->ClientArea->assign( 'WidgetTitle', ConfigController::GetWidgetTitle( $Client->id ) );
		$this->ClientArea->assign( 'WidgetDefaultAddBalanceSum', ConfigController::GetWidgetDefaultAddBalanceSum( $Client->id ) );
		$this->ClientArea->assign( 'WidgetButtonText', ConfigController::GetWidgetButtonText( $Client->id ) );
		$this->ClientArea->assign( 'BalanceSum', $Client->credit );
		$this->ClientArea->setTemplate( '/modules/addons/PublicInvoiceUrlView/Template/PublicBalanseDonateWidgetConfig.tpl' );
		$this->ClientArea->output();

		return;
	}

}