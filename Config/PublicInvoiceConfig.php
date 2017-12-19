<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 14.12.2017
 * Time: 16:19
 */

namespace AnonymousPayment\Config;


class PublicInvoiceConfig {
	public static function isEnablePublicInvoiceURL() {
		return true;
	}

	public static function GetButtonInvoiceUrlClipboardProperty() {
		return [
			"style"               => '',
			"class"               => "btn",
			"id"                  => "PublicInvoiceUrl",
			"data-clipboard-text" => "",

		];
	}

	public static function GeScriptButtonInvoiceUrlInsert() {
		return "document.addEventListener(\"DOMContentLoaded\",function(){new Clipboard(\".btn\");var b=document.createElement(\"div\");b.innerHTML='<div style=\"margin-bottom: 20px;\"><button %s>%s</button></div>';for(var a=0;a<document.getElementsByClassName(\"invoice-container\")[0].children.length;a++)\"panel panel-default\"===document.getElementsByClassName(\"invoice-container\")[0].children[a].className&&(parentDiv=document.getElementsByClassName(\"invoice-container\")[0].children[a].parentNode,parentDiv.insertBefore(b,document.getElementsByClassName(\"invoice-container\")[0].children[a]))});";
	}

	public static function GetButtonInvoiceUrlMessage() {
		return "Скопировать ссылку для публичной оплаты этого счёта в буфер обмена";
	}

	public static function GetTextCopySuccessAlert() {
		return 'Следующий текст успешно скопирован в буфер обмена: ';
	}
}