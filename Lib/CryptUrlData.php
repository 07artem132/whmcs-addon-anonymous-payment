<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 10.12.2017
 * Time: 15:33
 */

namespace PublicInvoiceUrlView\Lib;


class CryptUrlData {

	public static function Encrypt( $data ) {
		return base64_encode( encrypt( (string) $data ) );
	}

	public static function Decrypt( $EncodeStr ) {
		return decrypt( base64_decode( $EncodeStr ) );

	}
}