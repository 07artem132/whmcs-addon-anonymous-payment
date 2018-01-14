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
	 * @param string $ModuleName
	 * @param string $Key Поддерживается точечная запись (laravel)
	 * @param mixed $Value
	 */
	public static function SetValueModule( $ModuleName, $Key, $Value ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		array_set( self::$Config, $ModuleName . '.' . $Key, $Value );

		self::SaveData();
	}

	/**
	 * @param string $ModuleName
	 * @param string $Key Поддерживается точечная запись (laravel)
	 * @param mixed $default
	 *
	 * @return mixed
	 */
	public static function GetValueModule( $ModuleName, $Key, $default = null ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		return array_get( self::$Config, $ModuleName . '.' . $Key, $default );
	}

	/**
	 * @param int $ClientID
	 * @param string $Key Поддерживается точечная запись (laravel)
	 * @param mixed $Value
	 */
	public static function SetValueClient( $ClientID, $Key, $Value ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		array_set( self::$Config, 'ClientConfig.' . $ClientID . '.' . $Key, $Value );

		self::SaveData();
	}

	/**
	 * @param int $ClientID
	 * @param string $Key Поддерживается точечная запись (laravel)
	 * @param mixed $default
	 *
	 * @return mixed
	 */
	public static function GetValueClient( $ClientID, $Key, $default = null ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		return array_get( self::$Config, 'ClientConfig.' . $ClientID . '.' . $Key, $default );
	}

	/**
	 * @param string $Key Поддерживается точечная запись (laravel)
	 * @param mixed $Value
	 */
	public static function SetValue( $Key, $Value ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		array_set( self::$Config, $Key, $Value );

		self::SaveData();
	}

	/**
	 * @param string $Key Поддерживается точечная запись
	 * @param mixed $default
	 *
	 * @return mixed
	 */
	public static function GetValue( $Key, $default = null ) {
		if ( empty( self::$Config ) ) {
			self::$Config = self::LoadData();
		}

		return array_get( self::$Config, $Key, $default );
	}

	public static function ClearData() {
		self::$Config = [];
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