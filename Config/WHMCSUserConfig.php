<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 14.12.2017
 * Time: 19:35
 */

namespace AnonymousPayment\Config;

use \WHMCS\Config\Setting;

class WHMCSUserConfig {

	public static function GetMaxAddBalanse() {
		return Setting::getValue( 'AddFundsMaximum' );
	}

	public static function GetMinAddBalanse() {
		return Setting::getValue( 'AddFundsMinimum' );
	}

	public static function GetBalanseStatus() {
		return Setting::getValue( 'AddFundsEnabled' );
	}
	public static function AllowChangeInvoiceGateway(){
		return Setting::getValue( 'AllowCustomerChangeInvoiceGateway' );
	}

}