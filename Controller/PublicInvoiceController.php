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
		$ButtonProperty = [
			"class"               => "btn",
			"id"                  => "PublicInvoiceUrl",
			"data-clipboard-text" => "",
		];

		$ButtonProperty["style"]               = PublicInvoiceConfig::GetButtonStyle();
		$ButtonProperty["data-clipboard-text"] = self::GenerateUrl( $InvoiceID );
		$ButtonProperty                        = HtmlHelper::ArrayToStringHtmlProperty( $ButtonProperty );
		$ButtonMessage                         = PublicInvoiceConfig::GetButtonMessage();

		$ButtonInsertScript = PublicInvoiceConfig::GetButtonInsertScript();
		$ButtonInsertScript = htmlspecialchars_decode( $ButtonInsertScript );
		$ButtonInsertScript = html_entity_decode( $ButtonInsertScript, ENT_QUOTES || ENT_HTML5 );
		$ButtonInsertScript = sprintf( $ButtonInsertScript, $ButtonProperty, $ButtonMessage );

		$CopySuccessNoticeInsertScript = PublicInvoiceConfig::GetCopySuccessNoticeInsertScript();
		$CopySuccessNoticeInsertScript = htmlspecialchars_decode( $CopySuccessNoticeInsertScript );
		$CopySuccessNoticeInsertScript = html_entity_decode( $CopySuccessNoticeInsertScript, ENT_QUOTES || ENT_HTML5 );

		$ReturnStr = '<script>' . PHP_EOL;
		$ReturnStr .= $ButtonInsertScript;
		$ReturnStr .= $CopySuccessNoticeInsertScript;
		$ReturnStr .= '</script>' . PHP_EOL;

		return $ReturnStr;
	}

	public static function GenerateUrl( $InvoiceID ) {
		return WHMCSConfig::GetSystemURL() . '/public/invoice/' . CryptController::Encrypt( $InvoiceID );
	}
}