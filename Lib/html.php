<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 16:45
 */

namespace PublicInvoiceUrlView\Lib;

class html {
	public static function GetJqueryInclude() {
		return '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="  crossorigin="anonymous"></script>' . PHP_EOL;
	}

	public static function GetClipboardInclude() {
		return '<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>' . PHP_EOL;
	}

	public static function GenerateButton( $SystemURL, $key ) {

		$str = '<script>' . PHP_EOL;
		$str .= '"use strict"' . PHP_EOL;
		$str .= '$(function () {' . PHP_EOL;
		$str .= 'var clipboard = new Clipboard(".btn");' . PHP_EOL;
		$str .= '$(\'<div style="margin-bottom: 20px;"><button id="publicInvoiceURL" ';
		$str .= 'style="' . Config::GetButtonStyle() . '" ';
		$str .= 'class=\"btn\" data-clipboard-text=\"';
		$str .= $SystemURL . 'public/invoice/' . $key;
		$str .= '\">';
		$str .= Config::GetButtonMessage();
		$str .= '</button></div>\').insertBefore($(".container-fluid.invoice-container").children(".panel.panel-default"));' . PHP_EOL;
		$str .= 'clipboard.on(\'success\', function(e) {
	$(\'<div class="alert alert-success fade in" style="word-break: break-all;"><strong>' . Config::GetMessageAlertSuccess() . '</strong>\'+e.text+\'</div>\').insertBefore($(".container-fluid.invoice-container").children(".panel.panel-default"));
	$("#publicInvoiceURL").remove();
});
';
		$str .= '});' . PHP_EOL;
		$str .= '</script>' . PHP_EOL;

		return $str;
	}

	public static function PrintScriptChangeFormUrlInvoicePage() {
		echo '<script>$(function() {$( "form.form-inline" ).attr(\'action\',\'' . $_SERVER['REQUEST_URI'] . '\')});</script>';
	}

}