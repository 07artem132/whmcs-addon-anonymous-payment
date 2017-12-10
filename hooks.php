<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.11.2017
 * Time: 13:02
 */

use PublicInvoiceUrlView\Lib\html;
use WHMCS\User\Client;
use WHMCS\View\Menu\Item as MenuItem;
use PublicInvoiceUrlView\Lib\InvoicePageWHMCS;
use PublicInvoiceUrlView\Lib\Config;

include ROOTDIR . '/modules/addons/PublicInvoiceUrlView/vendor/autoload.php';

add_hook( 'ClientAreaPageViewInvoice', 1, function ( $vars ) {
	$SystemURL = $vars['systemurl'];
	$InvoiceID = $_GET['id'];
	$key       = InvoicePageWHMCS::GenerateKey( $InvoiceID );

	$str = html::GetJqueryInclude();
	$str .= html::GetClipboardInclude();
	$str .= html::GenerateButton( $SystemURL, $key );

	echo $str;
} );


add_hook( 'ClientAreaPrimaryNavbar', 1, function ( MenuItem $primaryNavbar ) {

	if ( ! empty( $_SESSION['uid'] ) ) {
		$navItem = $primaryNavbar->getChild( 'Billing' );
		$navItem->addChild( Config::GetNamePrimaryNavbarItemPublicAddFunds() )
		        ->setUri( Config::GetWHMCSSystemURL() . '/public/balance/config' )
		        ->setOrder( 70 );
	}

} );
