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
use  AnonymousPayment\Config\PublicInvoiceConfig;
use AnonymousPayment\Controller\PublicInvoiceController;
use AnonymousPayment\Controller\ClientAreaPrimaryNavBarController;
use \AnonymousPayment\Config\InstallConfig;

include ROOTDIR . '/modules/addons/AnonymousPayment/vendor/autoload.php';

add_hook( 'ClientAreaPageViewInvoice', 1, function ( $vars ) {
	if ( ! InstallConfig::GetStatus() ) {
		return;
	}

	if ( PublicInvoiceConfig::GetIsEnablePublicInvoiceURL() ) {
		echo htmlHelper::GetClipboardJsInclude();
		echo PublicInvoiceController::GenerateButton( $_GET['id'] );
	}
} );


add_hook( 'ClientAreaPrimaryNavbar', 1, function ( MenuItem $primaryNavbar ) {
	if ( ! InstallConfig::GetStatus() ) {
		return;
	}

	ClientAreaPrimaryNavBarController::AddAllItem( $primaryNavbar );
} );

add_hook( "ClientAreaPage", 1, function () {
	SmartyHelper::ClearCache();
} );

add_hook( "AdminAreaPage", 1, function () {
	SmartyHelper::ClearCache();
} );
