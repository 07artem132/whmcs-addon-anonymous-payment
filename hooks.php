<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.11.2017
 * Time: 13:02
 */

use PublicInvoiceUrlView\Lib\html;
use PublicInvoiceUrlView\Lib\KeyPublicUrl;

include ROOTDIR . '/modules/addons/PublicInvoiceUrlView/vendor/autoload.php';

add_hook( 'ClientAreaPageViewInvoice', 1, function ( $vars ) {
	$key       = KeyPublicUrl::Generate();
	$SystemURL = $vars['systemurl'];
	$InvoiceID = $_GET['id'];

	$str = html::GetJqueryInclude();
	$str .= html::GetClipboardInclude();
	$str .= html::GenerateButton( $SystemURL, $InvoiceID, $key );

	echo $str;
} );
