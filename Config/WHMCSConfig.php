<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 14.12.2017
 * Time: 19:21
 */

namespace AnonymousPayment\Config;

use \WHMCS\Config\Setting;

class WHMCSConfig {

	public static function GetSystemURL() {
		return Setting::getValue( 'SystemURL' );
	}

	public static function GetDateFormat() {
		return Setting::getValue( 'DateFormat' );
	}

	public static function GetVersion() {
		return Setting::getValue( 'Version' );
	}

	public static function GetInvoicePayTo() {
		return Setting::getValue( 'InvoicePayTo' );
	}

	public static function GetTaxStatus(){
		return Setting::getValue( 'TaxEnabled' );
	}
}