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
		return ConfigController::SetValue( 'IsEnablePublicInvoiceURL' );
	}

	public static function SetIsEnablePublicInvoiceURL( $status ) {
		ConfigController::SetValue( 'IsEnablePublicInvoiceURL', $status );
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
		//return "document.addEventListener(\"DOMContentLoaded\",function(){ window.clipboard = new Clipboard(\".btn\");var b=document.createElement(\"div\");b.innerHTML='<div style=\"margin-bottom: 20px;\"><button %s>%s</button></div>';for(var a=0;a<document.getElementsByClassName(\"invoice-container\")[0].children.length;a++)\"panel panel-default\"===document.getElementsByClassName(\"invoice-container\")[0].children[a].className&&(parentDiv=document.getElementsByClassName(\"invoice-container\")[0].children[a].parentNode,parentDiv.insertBefore(b,document.getElementsByClassName(\"invoice-container\")[0].children[a]))});";
		return ConfigController::GetValue( 'ScriptButtonInvoiceUrlInsert' );
	}

	public static function SeScriptButtonInvoiceUrlInsert( $Script ) {
		ConfigController::SetValue( 'ScriptButtonInvoiceUrlInsert', $Script );
	}

	public static function GetScriptInvoiceUrlCopySuccessInsertAlert() {
		//	return "document.addEventListener(\"DOMContentLoaded\",function(){window.clipboard.on(\"success\",function(b){var c=document.createElement(\"div\");c.innerHTML='<div class=\"alert alert-success fade in\" style=\"word-break: break-all;\"><strong>\u0421\u043b\u0435\u0434\u0443\u044e\u0449\u0438\u0439 \u0442\u0435\u043a\u0441\u0442 \u0443\u0441\u043f\u0435\u0448\u043d\u043e \u0441\u043a\u043e\u043f\u0438\u0440\u043e\u0432\u0430\u043d \u0432 \u0431\u0443\u0444\u0435\u0440 \u043e\u0431\u043c\u0435\u043d\u0430:  </strong>'+b.text+\"</div>\";for(b=0;b<document.getElementsByClassName(\"invoice-container\")[0].children.length;b++)\"panel panel-default\"===document.getElementsByClassName(\"invoice-container\")[0].children[b].className&&(parentDiv=document.getElementsByClassName(\"invoice-container\")[0].children[b].parentNode,parentDiv.replaceChild(c,document.getElementsByClassName(\"invoice-container\")[0].children[b-1]))})});";
		return ConfigController::GetValue( 'ScriptInvoiceUrlCopySuccessInsertAlert' );
	}

	public static function SetScriptInvoiceUrlCopySuccessInsertAlert( $Script ) {
		return ConfigController::SetValue( 'ScriptInvoiceUrlCopySuccessInsertAlert', $Script );
	}

	public static function GetButtonInvoiceUrlMessage() {
		//return "Скопировать ссылку для публичной оплаты этого счёта в буфер обмена";
		return ConfigController::GetValue( 'ButtonInvoiceUrlMessage' );
	}

	public static function SetButtonInvoiceUrlMessage( $Message ) {
		return ConfigController::SetValue( 'ButtonInvoiceUrlMessage', $Message );

	}

	public static function GetTextCopySuccessAlert() {
//		return 'Следующий текст успешно скопирован в буфер обмена: ';
		return ConfigController::GetValue( 'TextCopySuccessAlert' );

	}

	public static function SetTextCopySuccessAlert( $Message ) {
		ConfigController::SetValue( 'TextCopySuccessAlert', $Message );
	}

}