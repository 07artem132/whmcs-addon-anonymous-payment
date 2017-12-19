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


class GroupPayWidgetConfig extends ClientAreaPageAbstract implements ClientAreaPageInterface {
	use isRequestMethod;

	private $ClientArea,
		$Client;

	function __construct() {
		$this->ClientArea = new WHMCSClientAreaController();
		$this->Client     = WHMCSClientController::ID( WHMCSClientController::GetID() );
	}

	function GenerateWidgetID() {
		return CryptController::Encrypt( $this->Client->id );
	}

	function render() {
		if ( $this->isRequestMethod( 'POST' ) ) {
			$Settings['WidgetShowBalance']          = (int) array_key_exists( 'WidgetShowBalance', $_POST );
			$Settings['WidgetTitle']                = $_POST['WidgetTitle'];
			$Settings['WidgetDefaultAddBalanceSum'] = $_POST['WidgetDefaultAddBalanceSum'];
			$Settings['WidgetButtonText']           = $_POST['WidgetButtonText'];
			$this->EditSettings( $Settings );
		}

		$this->ClientArea->initPage();
		$this->ClientArea->requireLogin();
		$this->ClientArea->assign( 'widget_id', $this->GenerateWidgetID() );
		$this->ClientArea->assign( 'WHMCSSystemURL', WHMCSConfig::GetSystemURL() );
		$this->ClientArea->assign( 'MaxAddBalanceSum', WHMCSUserConfig::GetMaxAddBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', WHMCSUserConfig::GetMinAddBalanse() );
		$this->ClientArea->assign( 'WidgetShowBalance', PublicDonateWidgetConfig::GetShowBalance( $this->Client->id ) );
		$this->ClientArea->assign( 'WidgetTitle', PublicDonateWidgetConfig::GetTitle( $this->Client->id ) );
		$this->ClientArea->assign( 'WidgetDefaultAddBalanceSum', PublicDonateWidgetConfig::GetDefaultAddBalanceSum( $this->Client->id ) );
		$this->ClientArea->assign( 'WidgetButtonText', PublicDonateWidgetConfig::GetButtonText( $this->Client->id ) );
		$this->ClientArea->assign( 'BalanceSum', $this->Client->credit );
		$this->ClientArea->setTemplate( '/modules/addons/AnonymousPayment/ClientAreaTemplate/PublicBalanseDonateWidgetConfig.tpl' );
		$this->ClientArea->output();
	}

	function EditSettings( $Settings ) {
		if ( array_key_exists( 'WidgetButtonText', $Settings ) ) {
			PublicDonateWidgetConfig::SetButtonText( $this->Client->id, $Settings['WidgetButtonText'] );
		}

		if ( array_key_exists( 'WidgetDefaultAddBalanceSum', $Settings ) ) {
			PublicDonateWidgetConfig::SetDefaultAddBalanceSum( $this->Client->id, $Settings['WidgetDefaultAddBalanceSum'] );
		}

		if ( array_key_exists( 'WidgetShowBalance', $Settings ) ) {
			PublicDonateWidgetConfig::SetShowBalance( $this->Client->id, $Settings['WidgetShowBalance'] );
		}

		if ( array_key_exists( 'WidgetTitle', $Settings ) ) {
			PublicDonateWidgetConfig::SetTitle( $this->Client->id, $Settings['WidgetTitle'] );
		}
	}

}