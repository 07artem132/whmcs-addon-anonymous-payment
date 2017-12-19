<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 10.12.2017
 * Time: 15:33
 */

namespace AnonymousPayment\Controller;


class CryptController {

	public static function Encrypt( $data ) {
		return base64_encode( encrypt( (string) $data ) );
	}

	public static function Decrypt( $EncodeStr ) {
		return decrypt( base64_decode( $EncodeStr ) );

	}

	/**
	 * @param $String
	 */
	public static function DecryptConfig( $String ) {
		self::Decrypt( $String );
		$Config = json_decode( $String );

		return $Config;
	}

	/**
	 * @param $Config
	 */
	public static function EncryptConfig( $Config ) {
		$String = json_encode( $Config );
		self::Encrypt( $String );

		return $String;
	}
}