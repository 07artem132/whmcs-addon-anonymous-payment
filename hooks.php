<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.11.2017
 * Time: 13:02
 */

use WHMCS\View\Menu\Item as MenuItem;
use AnonymousPayment\Helper\HtmlHelper;
use AnonymousPayment\Helper\SmartyHelper;
use AnonymousPayment\Config\InstallConfig;
use AnonymousPayment\Config\PublicInvoiceConfig;
use AnonymousPayment\Controller\DebugBarController;
use AnonymousPayment\Controller\ClientAreaPrimaryNavBarController;
use AnonymousPayment\Controller\PublicInvoiceController;

include ROOTDIR . '/modules/addons/AnonymousPayment/vendor/autoload.php';

//region Взаимодействие с страницей на которой отображается счет
add_hook( 'ClientAreaPageViewInvoice', 1, function ( $vars ) {
	if ( ! InstallConfig::GetStatus() ) {
		return;
	}

	if ( PublicInvoiceConfig::GetStatus() ) {
		echo htmlHelper::GetClipboardJsInclude();
		echo PublicInvoiceController::GenerateButton( $_GET['id'] );
	}
} );
//endregion

//region Взаимодействие с меню
add_hook( 'ClientAreaPrimaryNavbar', 1, function ( MenuItem $primaryNavbar ) {
	if ( ! InstallConfig::GetStatus() ) {
		return;
	}

	ClientAreaPrimaryNavBarController::AddAllItem( $primaryNavbar );
} );
//endregion

//region Дебаг клиентской части
add_hook( "ClientAreaPage", 1, function () {
	if ( DebugBarController::GetDebugStatus() ) {
		SmartyHelper::ClearCache();
	}
} );

add_hook( 'ClientAreaHeadOutput', 2, function () {
	return DebugBarController::RenderHead();
} );

add_hook( 'ClientAreaFooterOutput', 1, function () {
	return DebugBarController::RenderBar();
} );
//endregion

//region Дебаг административной части
add_hook( "AdminAreaPage", 1, function () {
	if ( DebugBarController::GetDebugStatus() ) {
		SmartyHelper::ClearCache();
	}
} );

add_hook( "AdminAreaHeadOutput", 1, function () {
	return DebugBarController::RenderHead();
} );

add_hook( "AdminAreaFooterOutput", 1, function () {
	return DebugBarController::RenderBar();
} );
//endregion
