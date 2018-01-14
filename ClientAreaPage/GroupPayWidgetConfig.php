<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 16:59
 */

namespace AnonymousPayment\ClientAreaPage;

use \AnonymousPayment\Config\WHMCSConfig;
use \AnonymousPayment\Config\WHMCSUserConfig;
use \AnonymousPayment\Traits\isRequestMethod;
use \AnonymousPayment\Controller\CryptController;
use \AnonymousPayment\Config\PublicDonateWidgetConfig;
use \AnonymousPayment\Controller\WHMCSClientController;
use \AnonymousPayment\Abstracts\ClientAreaPageAbstract;
use \AnonymousPayment\Interfaces\ClientAreaPageInterface;
use AnonymousPayment\Controller\WHMCSClientAreaController;
use \AnonymousPayment\Controller\ModuleStatisticsController;
use \AnonymousPayment\Exceptions\ClientIDNotFoundExceptions;


class GroupPayWidgetConfig extends ClientAreaPageAbstract implements ClientAreaPageInterface {
	use isRequestMethod;

	private $ClientArea,
		$Client;

	function __construct() {
		$this->ClientArea = new WHMCSClientAreaController();
		$this->ClientArea->initPage();
		$this->ClientArea->requireLogin();

		$this->Client = WHMCSClientController::ID( WHMCSClientController::GetID() );
	}

	function GenerateWidgetID() {
		return CryptController::Encrypt( $this->Client->id );
	}

	function render() {
		ModuleStatisticsController::AddEventPageView( 'WidgetConfig' );

		if ( $this->isRequestMethod( 'POST' ) ) {
			ModuleStatisticsController::AddEventChangeSettings( 'WidgetConfig' );
			PublicDonateWidgetConfig::SetTitle( $this->Client->id, $_POST['WidgetTitle'] );
			PublicDonateWidgetConfig::SetButtonText( $this->Client->id, $_POST['WidgetButtonText'] );
			PublicDonateWidgetConfig::SetDefaultAddBalanceSum( $this->Client->id, $_POST['WidgetDefaultAddBalanceSum'] );
			PublicDonateWidgetConfig::SetShowBalance( $this->Client->id, (int) array_key_exists( 'WidgetShowBalance', $_POST ) );
		}

		$this->ClientArea->assign( 'widget_id', $this->GenerateWidgetID() );
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

		$this->ClientArea->setTemplate( 'PublicBalanseDonateWidgetConfig' );
		$this->ClientArea->output();
	}

}