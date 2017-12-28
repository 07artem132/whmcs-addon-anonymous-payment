<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 16:28
 */

namespace AnonymousPayment\Controller;


class MultiLanguageController {
	private static $Lang;

	public static function init( $Lang ) {
		self::$Lang = $Lang;
	}

	public static function Translate( $Key ) {
		return self::$Lang[ $Key ];
	}
}