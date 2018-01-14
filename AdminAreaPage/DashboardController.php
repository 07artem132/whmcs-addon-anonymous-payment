<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:18
 */

namespace AnonymousPayment\AdminAreaPage;

use Smarty;
use AnonymousPayment\Config\AdminAreaSmartyConfig;
use AnonymousPayment\Abstracts\AdminAreaPageAbstract;
use AnonymousPayment\Interfaces\AdminAreaPageInterface;
use AnonymousPayment\Config\PublicInvoiceConfig;
use AnonymousPayment\Config\PublicGroupPayDonateConfig;
use AnonymousPayment\Config\PublicDonateWidgetConfig;
use AnonymousPayment\Config\PublicServiceDonateConfig;
use AnonymousPayment\Controller\ModuleStatisticsController;
use AnonymousPayment\Controller\WHMCSCustomFieldsController;
use AnonymousPayment\Controller\WHMCSMenuItemController;
use AnonymousPayment\Traits\isRequestMethod;

class DashboardController extends AdminAreaPageAbstract implements AdminAreaPageInterface {
	use isRequestMethod;

	function render() {
		$smarty = new Smarty;
		$smarty->setCompileDir( AdminAreaSmartyConfig::GetCompileDir() );

		if ( $this->isRequestMethod( 'POST' ) ) {
			$this->SetConfig( $_POST );
		}

		$smarty->assign( 'StatisticsPageViewWidgetConfig', ModuleStatisticsController::GetEventPageViewCount( 'WidgetConfig' ) );
		$smarty->assign( 'StatisticsPageViewServiceDonate', ModuleStatisticsController::GetEventPageViewCount( 'ServiceDonate' ) );
		$smarty->assign( 'StatisticsPageViewGroupPay', ModuleStatisticsController::GetEventPageViewCount( 'GroupPay' ) );
		$smarty->assign( 'StatisticsPageViewPublicInvoice', ModuleStatisticsController::GetEventPageViewCount( 'PublicInvoice' ) );
		$smarty->assign( 'StatisticsPageViewWidget', ModuleStatisticsController::GetEventPageViewCount( 'Widget' ) );

		$smarty->assign( 'PrimaryNavBarStructureUserNoLogin', json_encode( WHMCSMenuItemController::GetPrimaryNavBarStructure( false ) ) );
		$smarty->assign( 'PrimaryNavBarStructureUserLogin', json_encode( WHMCSMenuItemController::GetPrimaryNavBarStructure( true ) ) );

		$smarty->assign( 'PublicInvoiceStatus', PublicInvoiceConfig::GetStatus() );
		$smarty->assign( 'PublicInvoiceButtonStyle', PublicInvoiceConfig::GetButtonStyle() );
		$smarty->assign( 'PublicInvoiceButtonMessage', PublicInvoiceConfig::GetButtonMessage() );
		$smarty->assign( 'PublicInvoiceButtonInsertScript', PublicInvoiceConfig::GetButtonInsertScript() );
		$smarty->assign( 'PublicInvoiceCopySuccessNoticeInsertScript', PublicInvoiceConfig::GetCopySuccessNoticeInsertScript() );
		$smarty->assign( 'PublicInvoiceCopySuccessNoticeMessage', PublicInvoiceConfig::GetCopySuccessNoticeMessage() );

		$smarty->assign( 'PublicGroupPayDonateStatus', PublicGroupPayDonateConfig::GetStatus() );
		$smarty->assign( 'PublicGroupPayDonateDonateClientIDStatus', PublicGroupPayDonateConfig::GetDonateClientIDStatus() );
		$smarty->assign( 'PublicGroupPayDonateDonateHostStatus', PublicGroupPayDonateConfig::GetDonateHostStatus() );
		$smarty->assign( 'PublicGroupPayDonateDonateHostCustomFieldsPort', PublicGroupPayDonateConfig::GetDonateHostCustomFieldsPort() );
		$smarty->assign( 'CustomFieldsAllProduct', WHMCSCustomFieldsController::GetAllFilteredTypeFieldAndTypeCustomField( 'text', 'product' )->pluck( 'fieldname' )->unique()->toarray() );
		$smarty->assign( 'PublicGroupPayDonateDonateHostAllowServerIP', implode( PHP_EOL, PublicGroupPayDonateConfig::GetDonateHostAllowServerIP() ) );
		$smarty->assign( 'PublicGroupPayDonateDonateClientEmailStatus', PublicGroupPayDonateConfig::GetDonateClientEmailStatus() );
		$smarty->assign( 'PublicGroupPayDonateAddMessageRecipient', PublicGroupPayDonateConfig::GetAddMessageRecipient() );
		$smarty->assign( 'PublicGroupPayDonateNavDisplayName', PublicGroupPayDonateConfig::GetNavDisplayName() );
		$smarty->assign( 'PublicGroupPayDonateNavRootItem', PublicGroupPayDonateConfig::GetNavRootItem() );
		$smarty->assign( 'PublicGroupPayDonateNavSubItem', PublicGroupPayDonateConfig::GetNavSubItem() );

		$smarty->assign( 'PublicDonateWidgetStatus', PublicDonateWidgetConfig::GetStatus() );
		$smarty->assign( 'PublicDonateWidgetNavDisplayName', PublicDonateWidgetConfig::GetNavDisplayName() );
		$smarty->assign( 'PublicDonateWidgetNavRootItem', PublicDonateWidgetConfig::GetNavRootItem() );
		$smarty->assign( 'PublicDonateWidgetNavSubItem', PublicDonateWidgetConfig::GetNavSubItem() );

		$smarty->assign( 'PublicServiceDonateStatus', PublicServiceDonateConfig::GetStatus() );
		$smarty->assign( 'PublicServiceDonateShowUserInvoiceList', PublicServiceDonateConfig::GetShowUserInvoiceList() );
		$smarty->assign( 'PublicServiceDonateShowBalanceUser', PublicServiceDonateConfig::GetShowBalanceUser() );
		$smarty->assign( 'PublicServiceDonateShowAddBalanceWidget', PublicServiceDonateConfig::GetShowAddBalanceWidget() );
		$smarty->assign( 'PublicServiceDonateShowServiceInfo', PublicServiceDonateConfig::GetShowServiceInfo() );
		$smarty->assign( 'PublicServiceDonateDonateHostAllowServerIP', implode( PHP_EOL, PublicServiceDonateConfig::GetDonateHostAllowServerIP() ) );

		foreach ( $this->GetVars() as $key => $value ) {
			$smarty->assign( $key, $value );
		}

		$smarty->display( AdminAreaSmartyConfig::GetTemplateDir() . "Dashboard.tpl" );
	}

	function SetConfig( $Config ) {
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
	}
}