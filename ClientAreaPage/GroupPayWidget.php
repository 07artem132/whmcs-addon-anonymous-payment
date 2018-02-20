<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 09.12.2017
 * Time: 23:35
 */

namespace AnonymousPayment\ClientAreaPage;

use \AnonymousPayment\Config\WHMCSConfig;
use \AnonymousPayment\Config\WHMCSUserConfig;
use \AnonymousPayment\Controller\CryptController;
use \AnonymousPayment\Config\PublicDonateWidgetConfig;
use \AnonymousPayment\Abstracts\ClientAreaPageAbstract;
use \AnonymousPayment\Controller\WHMCSClientController;
use \AnonymousPayment\Interfaces\ClientAreaPageInterface;
use AnonymousPayment\Controller\WHMCSClientAreaController;
use \AnonymousPayment\Controller\ModuleStatisticsController;

class GroupPayWidget extends ClientAreaPageAbstract implements ClientAreaPageInterface {

	private $ClientArea,
		$Client;

	function __construct() {
		$this->ClientArea = new WHMCSClientAreaController();
		$this->Client     = WHMCSClientController::ID( CryptController::Decrypt( $this->GetWidgetID() ) );
		//todo добавить обработку исключений
	}

	function GetWidgetID() {
		return $_GET['widget_id'];
	}

	function render() {
		ModuleStatisticsController::AddEventPageView( 'Widget' );

		$this->ClientArea->initPage();
		$this->ClientArea->disableHeaderFooterOutput();
		$this->ClientArea->assign( 'widget_id', CryptController::Encrypt( $this->Client->id ) );
		$this->ClientArea->assign( 'ClientID', $this->Client->id );
		$this->ClientArea->assign( 'WHMCSSystemURL', WHMCSConfig::GetSystemURL() );
		$this->ClientArea->assign( 'MaxAddBalanceSum', WHMCSUserConfig::GetMaxAddBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', WHMCSUserConfig::GetMinAddBalanse() );
		$this->ClientArea->assign( 'WidgetShowBalance', PublicDonateWidgetConfig::GetShowBalance( $this->Client->id ) );
		$this->ClientArea->assign( 'WidgetTitle', PublicDonateWidgetConfig::GetTitle( $this->Client->id ) );
		$this->ClientArea->assign( 'WidgetDefaultAddBalanceSum', PublicDonateWidgetConfig::GetDefaultAddBalanceSum( $this->Client->id ) );
		$this->ClientArea->assign( 'WidgetButtonText', PublicDonateWidgetConfig::GetButtonText( $this->Client->id ) );
		$this->ClientArea->assign( 'BalanceSum', $this->Client->credit );

		foreach ( $this->GetVars() as $key => $value ) {
			$this->ClientArea->assign( $key, $value );
		}

		$this->ClientArea->setTemplate( 'PublicBalanseDonateWidget' );
		$this->ClientArea->output();
	}
}