<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 09.12.2017
 * Time: 23:35
 */

namespace AnonymousPayment\ClientAreaPage;

use \AnonymousPayment\Config\WHMCSUserConfig;
use \AnonymousPayment\Controller\CryptController;
use \AnonymousPayment\Config\PublicDonateWidgetConfig;
use \AnonymousPayment\Abstracts\ClientAreaPageAbstract;
use \AnonymousPayment\Controller\WHMCSClientController;
use \AnonymousPayment\Interfaces\ClientAreaPageInterface;
use AnonymousPayment\Controller\WHMCSClientAreaController;

class GroupPayWidget extends ClientAreaPageAbstract implements ClientAreaPageInterface {

	private $ClientArea,
		$Client;

	function __construct() {
		$this->ClientArea = new WHMCSClientAreaController();
		$this->Client     = WHMCSClientController::ID( CryptController::Decrypt( $this->GetWidgetID() ) );
	}

	function GetWidgetID() {
		return $_GET['widget_id'];
	}

	function render() {
		$this->ClientArea->initPage();
		$this->ClientArea->disableHeaderFooterOutput();
		$this->ClientArea->assign( 'widget_id', CryptController::Encrypt( $this->Client->id ) );
		$this->ClientArea->assign( 'MaxAddBalanceSum', WHMCSUserConfig::GetMaxAddBalanse() );
		$this->ClientArea->assign( 'MinAddBalanceSum', WHMCSUserConfig::GetMinAddBalanse() );
		$this->ClientArea->assign( 'WidgetShowBalance', PublicDonateWidgetConfig::GetShowBalance( $this->Client->id ) );
		$this->ClientArea->assign( 'WidgetTitle', PublicDonateWidgetConfig::GetTitle( $this->Client->id ) );
		$this->ClientArea->assign( 'WidgetDefaultAddBalanceSum', PublicDonateWidgetConfig::GetDefaultAddBalanceSum( $this->Client->id ) );
		$this->ClientArea->assign( 'WidgetButtonText', PublicDonateWidgetConfig::GetButtonText( $this->Client->id ) );
		$this->ClientArea->assign( 'BalanceSum', $this->Client->credit );
		$this->ClientArea->setTemplate( '/modules/addons/AnonymousPayment/ClientAreaTemplate/PublicBalanseDonateWidget.tpl' );
		$this->ClientArea->output();
	}
}