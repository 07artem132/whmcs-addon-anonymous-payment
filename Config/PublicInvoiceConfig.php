<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 14.12.2017
 * Time: 16:19
 */

namespace AnonymousPayment\Config;


use AnonymousPayment\Controller\ConfigController;

class PublicInvoiceConfig {
	public static function GetIsEnablePublicInvoiceURL() {
		return ConfigController::GetValue( 'IsEnablePublicInvoiceURL' );
	}

	public static function SetIsEnablePublicInvoiceURL( $status ) {
		ConfigController::SetValue( 'IsEnablePublicInvoiceURL', (bool) $status );
	}

	public static function GetButtonInvoiceUrlClipboardProperty() {
		return [
			"style"               => self::GetButtonInvoiceUrlStyle(),
			"class"               => "btn",
			"id"                  => "PublicInvoiceUrl",
			"data-clipboard-text" => "",
		];
	}

	public static function SetButtonInvoiceUrlStyle( $Style ) {
		ConfigController::SetValue( 'ButtonInvoiceUrlStyle', $Style );
	}

	public static function GetButtonInvoiceUrlStyle() {
		ConfigController::GetValue( 'ButtonInvoiceUrlStyle' );
	}


	public static function GeScriptButtonInvoiceUrlInsert() {
		return ConfigController::GetValue( 'ScriptButtonInvoiceUrlInsert' );
	}

	public static function SeScriptButtonInvoiceUrlInsert( $Script ) {
		ConfigController::SetValue( 'ScriptButtonInvoiceUrlInsert', $Script );
	}

	public static function GetScriptInvoiceUrlCopySuccessInsertAlert() {
		return ConfigController::GetValue( 'ScriptInvoiceUrlCopySuccessInsertAlert' );
	}

	public static function SetScriptInvoiceUrlCopySuccessInsertAlert( $Script ) {
		ConfigController::SetValue( 'ScriptInvoiceUrlCopySuccessInsertAlert', $Script );
	}

	public static function GetButtonInvoiceUrlMessage() {
		return ConfigController::GetValue( 'ButtonInvoiceUrlMessage' );
	}

	public static function SetButtonInvoiceUrlMessage( $Message ) {
		ConfigController::SetValue( 'ButtonInvoiceUrlMessage', $Message );

	}

	public static function GetTextCopySuccessAlert() {
		return ConfigController::GetValue( 'TextCopySuccessAlert' );

	}

	public static function SetTextCopySuccessAlert( $Message ) {
		ConfigController::SetValue( 'TextCopySuccessAlert', $Message );
	}

}