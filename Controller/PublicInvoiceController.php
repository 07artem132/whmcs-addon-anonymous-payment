<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 14.12.2017
 * Time: 16:11
 */

namespace AnonymousPayment\Controller;


use AnonymousPayment\Helper\HtmlHelper;
use AnonymousPayment\Controller\CryptController;
use  AnonymousPayment\Config\PublicInvoiceConfig;
use AnonymousPayment\Config\WHMCSConfig;

class PublicInvoiceController {

	public static function GenerateButton( $InvoiceID ) {
		$ButtonProperty                        = PublicInvoiceConfig::GetButtonInvoiceUrlClipboardProperty();
		$ButtonProperty["data-clipboard-text"] = self::GenerateUrl( $InvoiceID );
		$ButtonProperty                        = HtmlHelper::ArrayToStringHtmlProperty( $ButtonProperty );
		$ButtonMessage                         = PublicInvoiceConfig::GetButtonInvoiceUrlMessage();

		$script    = sprintf( html_entity_decode( htmlspecialchars_decode( PublicInvoiceConfig::GeScriptButtonInvoiceUrlInsert() ), ENT_QUOTES || ENT_HTML5 ), $ButtonProperty, $ButtonMessage );
		$ReturnStr = '<script>' . PHP_EOL;
		$ReturnStr .= $script;
		$ReturnStr .= html_entity_decode( htmlspecialchars_decode( PublicInvoiceConfig::GetScriptInvoiceUrlCopySuccessInsertAlert() ), ENT_QUOTES || ENT_HTML5 );
		$ReturnStr .= '</script>' . PHP_EOL;

		return $ReturnStr;
	}

	public static function GenerateUrl( $InvoiceID ) {
		return WHMCSConfig::GetSystemURL() . '/public/invoice/' . CryptController::Encrypt( $InvoiceID );
	}
}