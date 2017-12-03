<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 16:50
 */

namespace PublicInvoiceUrlView\Lib;

use \WHMCS\Config\Setting;

class Config {
	static $Config = null;

	public static function GetInstallStatus() {
		self::LoadConfig();

		return ( empty( self::$Config->install ) ) ? false : self::$Config->install;
	}

	public static function ClearData() {
		self::$Config = [];
		self::SaveConfig();
	}

	public static function SetInstallStatus( $status ) {
		self::LoadConfig();
		self::SetValue( 'install', $status );
		self::SaveConfig();
	}

	public static function all() {
		self::LoadConfig();

		return ( empty( self::$Config ) ) ? null : self::$Config;
	}

	public static function GetButtonMessage() {
		self::LoadConfig();

		return ( empty( self::$Config->ButtonMessage ) ) ? 'Скопировать ссылку для публичной оплаты этого счёта в буфер обмена' : self::$Config->ButtonMessage;
	}

	public static function GetMessageAlertSuccess() {
		self::LoadConfig();

		return ( empty( self::$Config->AlertSuccessMessage ) ) ? 'Следующий текст успешно скопирован в буфер обмена:' : self::$Config->AlertSuccessMessage;
	}

	public static function GetButtonStyle() {
		self::LoadConfig();

		return ( empty( self::$Config->ButtonStyle ) ) ? '' : self::$Config->ButtonStyle;
	}

	public static function SetValue( $key, $value ) {
		self::LoadConfig();

		self::$Config         = ( empty( $Config = json_decode( Setting::getValue( 'PublicInvoiceUrlView' ) ) ) ) ? $Config = new \stdClass() : $Config;
		self::$Config->{$key} = $value;

		self::SaveConfig();
	}

	private static function SaveConfig() {
		Setting::setValue( 'PublicInvoiceUrlView', json_encode( self::$Config ) );
	}

	private static function LoadConfig() {
		if ( self::$Config === null ) {
			self::$Config = json_decode( Setting::getValue( 'PublicInvoiceUrlView' ) );
		}
	}
}