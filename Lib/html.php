<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 16:45
 */

namespace PublicInvoiceUrlView\Lib;

use PublicInvoiceUrlView\Lib\Config;

class html {
	public static function GetJqueryInclude() {
		return '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="  crossorigin="anonymous"></script>' . PHP_EOL;
	}

	public static function GetClipboardInclude() {
		return '<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>' . PHP_EOL;
	}

	public static function GenerateButton( $SystemURL, $InvoiceID, $key ) {

		$str = '<script>' . PHP_EOL;
		$str .= '"use strict"' . PHP_EOL;
		$str .= '$(function () {' . PHP_EOL;
		$str .= 'var clipboard = new Clipboard(".btn");' . PHP_EOL;
		$str .= '$(\'<div><button id="publicInvoiceURL" ';
		$str .= 'style="' . Config::GetButtonStyle() . '" ';
		$str .= 'class=\"btn\" data-clipboard-text=\"';
		$str .= $SystemURL . 'index.php?m=PublicInvoiceUrlView&invoice=' . $InvoiceID . '&key=' . $key;
		$str .= '\">';
		$str .= Config::GetButtonMessage();
		$str .= '</button></div>\').insertAfter($(".row:last"));' . PHP_EOL;
		$str .= 'clipboard.on(\'success\', function(e) {
	$(\'<div class="alert alert-success fade in" style="word-break: break-all;"><strong>'.Config::GetMessageAlertSuccess().'</strong>\'+e.text+\'</div>\').insertAfter($(".row:last").eq(0));
	$("#publicInvoiceURL").remove();
});
';
		$str .= '});' . PHP_EOL;
		$str .= '</script>' . PHP_EOL;

		return $str;
	}
}