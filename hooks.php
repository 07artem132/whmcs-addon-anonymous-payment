<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.11.2017
 * Time: 13:02
 */

add_hook( 'ClientAreaPageViewInvoice', 1, function ( $vars ) {
	$key = base64_encode( md5( $_GET['id'] . \WHMCS\Config\Setting::getValue( 'SystemURL' ) ) );
	echo '<script   src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="  crossorigin="anonymous"></script>';
	echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>';
	echo '<script>$(function() {new Clipboard(\'.btn\');$("<div><button class=\"btn\" data-clipboard-text=\"' . $vars['systemurl'] . 'index.php?m=PublicInvoiceUrlView&invoice=' . $_GET['id'] . '&key=' . $key . '\">Скопировать ссылку для публичной оплаты этого счёта в буфер обмена</button></div>").insertAfter($( ".row:last" ));});</script>';

} );


//<button class='btn' data-clipboard-text='..'">Ссылка для публичной оплаты</button>