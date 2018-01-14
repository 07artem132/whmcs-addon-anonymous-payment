<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:32
 */

namespace AnonymousPayment\AdminAreaPage;
ini_set( 'error_reporting', E_ALL );

use AnonymousPayment\Controller\ConfigController;
use Smarty;
use AnonymousPayment\Config\InstallConfig;
use AnonymousPayment\Traits\isRequestMethod;
use AnonymousPayment\Install\HtaccessInstall;
use AnonymousPayment\Config\PublicInvoiceConfig;
use AnonymousPayment\Config\AdminAreaSmartyConfig;
use AnonymousPayment\Config\PublicDonateWidgetConfig;
use AnonymousPayment\Abstracts\AdminAreaPageAbstract;
use AnonymousPayment\Config\PublicServiceDonateConfig;
use AnonymousPayment\Config\PublicGroupPayDonateConfig;
use AnonymousPayment\Interfaces\AdminAreaPageInterface;
use AnonymousPayment\Controller\WHMCSMenuItemController;
use AnonymousPayment\Config\ClientAreaPrimaryNavBarConfig;
use AnonymousPayment\Controller\WHMCSCustomFieldsController;

class FirstConfigController extends AdminAreaPageAbstract implements AdminAreaPageInterface {
	use isRequestMethod;

	function render() {
		$smarty = new Smarty;
		$smarty->setCompileDir( AdminAreaSmartyConfig::GetCompileDir() );

		if ( $this->isRequestMethod( 'POST' ) ) {
			$this->SetConfig( $_POST );
			$this->Install();
			$this->RedirectToGetStarted();
		}

		$this->vars['CustomFieldsAllProduct']            = WHMCSCustomFieldsController::GetAllFilteredTypeFieldAndTypeCustomField( 'text', 'product' )->pluck( 'fieldname' )->unique()->toarray();
		$this->vars['PrimaryNavBarStructureUserNoLogin'] = json_encode( WHMCSMenuItemController::GetPrimaryNavBarStructure( false ) );
		$this->vars['PrimaryNavBarStructureUserLogin']   = json_encode( WHMCSMenuItemController::GetPrimaryNavBarStructure( true ) );
		$this->vars['AllowIP']                           = '127.0.0.1' . PHP_EOL . '127.0.0.2';
		foreach ( $this->GetVars() as $key => $value ) {
			$smarty->assign( $key, $value );
		}

		$smarty->display( AdminAreaSmartyConfig::GetTemplateDir() . "FirstСonfig.tpl" );

	}

	function Install() {
		$HtaccessInstall = new HtaccessInstall();
		$HtaccessInstall->Install();
	}

	function SetConfig( $Config ) {
		ConfigController::ClearData();

		PublicInvoiceConfig::SetStatus( $Config['PublicInvoiceURL']['Enable'] );
		PublicInvoiceConfig::SetButtonStyle( $Config['PublicInvoiceURL']['Button']['Style'] );
		PublicInvoiceConfig::SetButtonMessage( $Config['PublicInvoiceURL']['Button']['Message'] );
		PublicInvoiceConfig::SetButtonInsertScript( $Config['PublicInvoiceURL']['Button']['InsertScript'] );
		PublicInvoiceConfig::SetCopySuccessNoticeInsertScript( $Config['PublicInvoiceURL']['Alert'] ['InsertScript'] );
		PublicInvoiceConfig::SetCopySuccessNoticeMessage( $Config['PublicInvoiceURL']['Alert'] ['Message'] );

		PublicGroupPayDonateConfig::SetStatus( $Config['GroupPayDonate']['Enable'] );
		PublicGroupPayDonateConfig::SetDonateClientIDStatus( $Config['GroupPayDonate']['DonateByClientID']['Enable'] );
		PublicGroupPayDonateConfig::SetDonateHostStatus( $Config['GroupPayDonate']['DonateByTeamSpeak3Server']['Enable'] );
		PublicGroupPayDonateConfig::SetDonateHostCustomFieldsPort( $Config['GroupPayDonate']['DonateByTeamSpeak3Server']['CustomFieldContainsPort'] );
		PublicGroupPayDonateConfig::SetDonateHostAllowServerIP( explode( PHP_EOL, $Config['GroupPayDonate']['DonateByTeamSpeak3Server']['ServerAllowList'] ) );
		PublicGroupPayDonateConfig::SetDonateClientEmailStatus( $Config['GroupPayDonate']['DonateByClientEmail']['Enable'] );
		PublicGroupPayDonateConfig::SetNavDisplayName( $Config ['GroupPayDonate']['PrimaryNavBarDisplayName'] );
		PublicGroupPayDonateConfig::SetNavRootItem( $Config['GroupPayDonate']['PrimaryNavBarRoot'] );
		PublicGroupPayDonateConfig::SetNavSubItem( $Config ['GroupPayDonate']['PrimaryNavBarSubItem'] );
		PublicGroupPayDonateConfig::SetAddMessageRecipient( $Config ['GroupPayDonate']['AddMessageRecipient'] );

		PublicDonateWidgetConfig::SetStatus( $Config['GroupPayDonateWidget']['Enable'] );
		PublicDonateWidgetConfig::SetNavDisplayName( $Config ['GroupPayDonateWidget']['PrimaryNavBarDisplayName'] );
		PublicDonateWidgetConfig::SetNavRootItem( $Config['GroupPayDonateWidget']['PrimaryNavBarRoot'] );
		PublicDonateWidgetConfig::SetNavSubItem( $Config ['GroupPayDonateWidget']['PrimaryNavBarSubItem'] );

		PublicServiceDonateConfig::SetStatus( $Config['GroupPayDonateService']['Enable'] );
		PublicServiceDonateConfig::SetShowUserInvoiceList( $Config['GroupPayDonateService']['ShowUserInvoiceList'] );
		PublicServiceDonateConfig::SetShowBalanceUser( $Config['GroupPayDonateService']['ShowBalanceUser'] );
		PublicServiceDonateConfig::SetShowAddBalanceWidget( $Config['GroupPayDonateService']['ShowAddBalanceWidget'] );
		PublicServiceDonateConfig::SetShowServiceInfo( $Config['GroupPayDonateService']['ShowServiceInfo'] );
		PublicServiceDonateConfig::SetDonateHostAllowServerIP( explode( PHP_EOL, $Config['GroupPayDonateService']['ServerAllow'] ) );


		InstallConfig::SetStatus( true );
	}

	function RedirectToGetStarted() {
		header( 'Location: ?module=AnonymousPayment&page=getstarted' );
		die();
	}
}