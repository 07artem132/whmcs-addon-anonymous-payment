<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:32
 */

namespace AnonymousPayment\AdminAreaPage;
ini_set( 'error_reporting', E_ALL );

use Smarty;
use AnonymousPayment\Config\InstallConfig;
use AnonymousPayment\Traits\isRequestMethod;
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

class FirstСonfigController extends AdminAreaPageAbstract implements AdminAreaPageInterface {
	use isRequestMethod;

	function render() {
		$smarty = new Smarty;
		$smarty->setCompileDir( AdminAreaSmartyConfig::GetCompileDir() );

		if ( $this->isRequestMethod( 'POST' ) ) {
			$this->SetConfig( $_POST );
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

	function SetConfig( $Config ) {

		PublicInvoiceConfig::SetIsEnablePublicInvoiceURL( $Config['PublicInvoiceURL']['Enable'] );
		PublicInvoiceConfig::SetButtonInvoiceUrlMessage( $Config['PublicInvoiceURL']['Button']['Message'] );
		PublicInvoiceConfig::SetButtonInvoiceUrlStyle( $Config['PublicInvoiceURL']['Button']['Style'] );
		PublicInvoiceConfig::SeScriptButtonInvoiceUrlInsert( $Config['PublicInvoiceURL']['Button']['InsertScript'] );
		PublicInvoiceConfig::SetScriptInvoiceUrlCopySuccessInsertAlert( $Config['PublicInvoiceURL']['Alert'] ['InsertScript'] );
		PublicInvoiceConfig::SetTextCopySuccessAlert( $Config['PublicInvoiceURL']['Alert'] ['Message'] );
		PublicGroupPayDonateConfig::SetIsEnablePublicGroupPayDonate( $Config['GroupPayDonate']['Enable'] );
		PublicGroupPayDonateConfig::SetIsEnableDonateClientID( $Config['GroupPayDonate']['DonateByClientID']['Enable'] );
		PublicGroupPayDonateConfig::SetIsEnableDonateHost( $Config['GroupPayDonate']['DonateByTeamSpeak3Server']['Enable'] );
		PublicGroupPayDonateConfig::SetIsEnableDonateClientEmail( $Config['GroupPayDonate']['DonateByClientEmail']['Enable'] );
		PublicGroupPayDonateConfig::SetCustomFieldsServerPort( $Config['GroupPayDonate']['DonateByTeamSpeak3Server']['CustomFieldContainsPort'] );
		PublicDonateWidgetConfig::SetIsEnablePublicDonateWidget( $Config['GroupPayDonateWidget']['Enable'] );
		PublicServiceDonateConfig::SetIsEnablePublicServiceDonate( $Config['GroupPayDonateService']['Enable'] );
		PublicServiceDonateConfig::SetShowUserInvoiceList( $Config['GroupPayDonateService']['ShowUserInvoiceList'] );
		PublicServiceDonateConfig::SetShowBalanceUser( $Config['GroupPayDonateService']['ShowBalanceUser'] );
		PublicServiceDonateConfig::SetShowAddBalanceWidget( $Config['GroupPayDonateService']['ShowAddBalanceWidget'] );
		PublicServiceDonateConfig::SetShowServiceInfo( $Config['GroupPayDonateService']['ShowServiceInfo'] );
		ClientAreaPrimaryNavBarConfig::SetGroupPayDonateDisplayName( $Config ['GroupPayDonate']['PrimaryNavBarDisplayName'] );
		ClientAreaPrimaryNavBarConfig::SetGroupPayDonateRoot( $Config['GroupPayDonate']['PrimaryNavBarRoot'] );
		ClientAreaPrimaryNavBarConfig::SetGroupPayDonateSubItem( $Config ['GroupPayDonate']['PrimaryNavBarSubItem'] );
		ClientAreaPrimaryNavBarConfig::SetGroupPayDonateWidgetDisplayName( $Config ['GroupPayDonateWidget']['PrimaryNavBarDisplayName'] );
		ClientAreaPrimaryNavBarConfig::SetGroupPayDonateWidgetRoot( $Config['GroupPayDonateWidget']['PrimaryNavBarRoot'] );
		ClientAreaPrimaryNavBarConfig::SetGroupPayDonateWidgetSubItem( $Config ['GroupPayDonateWidget']['PrimaryNavBarSubItem'] );

		InstallConfig::SetStatus( true );
	}

	function RedirectToGetStarted() {
		header( 'Location: ?module=AnonymousPayment&page=getstarted' );
		dd();
	}
}