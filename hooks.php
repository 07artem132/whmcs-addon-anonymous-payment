<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.11.2017
 * Time: 13:02
 */

use PublicInvoiceUrlView\Lib\htmlHelper;
use WHMCS\User\Client;
use WHMCS\View\Menu\Item as MenuItem;
use PublicInvoiceUrlView\Lib\CryptController;
use PublicInvoiceUrlView\Lib\ConfigController;

include ROOTDIR . '/modules/addons/PublicInvoiceUrlView/vendor/autoload.php';

add_hook( 'ClientAreaPageViewInvoice', 1, function ( $vars ) {
	$SystemURL = $vars['systemurl'];
	$InvoiceID = $_GET['id'];
	$key       = CryptController::Encrypt( $InvoiceID );
	ConfigController::SetDefaultDataConfig();
	$str = htmlHelper::GetJqueryInclude();
	$str .= htmlHelper::GetClipboardInclude();
	$str .= htmlHelper::GenerateButton( $SystemURL, $key );

	echo $str;
} );

add_hook( 'ClientAreaPrimaryNavbar', 1, function ( MenuItem $primaryNavbar ) {

	if ( ! empty( $_SESSION['uid'] ) ) {
		$navItem = $primaryNavbar->getChild( 'Billing' );
		$navItem->addChild( ConfigController::GetNamePrimaryNavbarItemPublicAddFunds() )
		        ->setUri( ConfigController::GetWHMCSSystemURL() . '/public/balance/config' )
		        ->setOrder( 70 );
	}

} );

add_hook( 'ClientAreaPrimaryNavbar', 1, function ( MenuItem $primaryNavbar ) {

	if ( empty( $_SESSION['uid'] ) ) {//Show Authorized
		//$primaryNavbar = $primaryNavbar->getChild('Contact Us');
		$primaryNavbar->addChild( ConfigController::GetNamePrimaryNavbarItemPublicAddFundsNoWidget() )
		              ->setUri( ConfigController::GetWHMCSSystemURL() . '/public/grouppay' )
		              ->setOrder( 70 );
	}

} );




add_hook( "ClientAreaPage", 1, function () {
	PublicInvoiceUrlView\Helper\SmartyHelper::ClearCache();
} );
