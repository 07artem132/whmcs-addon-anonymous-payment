<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 12.12.2017
 * Time: 22:16
 */

namespace AnonymousPayment\Controller;

use AnonymousPayment\Controller\CryptController;
use \WHMCS\Config\Setting;

class ConfigController {

	private static $Config = null;

	/**
	 * @param $Key string
	 * @param $Value mixed
	 */
	public static function SetValue( $Key, $Value ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		self::$Config[ $Key ] = $Value;

		self::SaveData();
	}

	public static function SetValueClient( $ClientID, $Key, $Value ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		self::$Config[ $ClientID ][ $Key ] = $Value;

		self::SaveData();
	}

	/**
	 * @param $Key string
	 *
	 * @return mixed
	 */
	public static function GetValue( $Key ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		if ( ! array_key_exists( $Key, self::$Config ) ) {
			return null;
		}

		return self::$Config[ $Key ];
	}

	public static function GetValueClient( $ClientID, $Key ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		if ( ! array_key_exists( $Key, self::$Config[ $ClientID ] ) ) {
			return null;
		}

		return self::$Config[ $ClientID ][ $Key ];
	}


	public static function ClearData() {
		self::$Config = [ null ];
		self::SaveData();
	}

	public static function GetAll() {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		return self::$Config;
	}

	private static function LoadData() {
		return CryptController::DecryptConfig( Setting::getValue( 'AnonymousPayment' ) );
	}

	private static function SaveData() {
		Setting::setValue( 'AnonymousPayment', CryptController::EncryptConfig( self::$Config ) );
	}
}