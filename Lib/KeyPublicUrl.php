<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 16:47
 */

namespace PublicInvoiceUrlView\Lib;

use \WHMCS\Config\Setting;

class KeyPublicUrl {

	public static function Generate() {
		return base64_encode( md5( $_GET['id'] . Setting::getValue( 'SystemURL' ) ) );
	}

	public static function Verify() {
	}
}