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

	public static function ClearData() {
		self::$Config = [];
		self::SaveConfig();
	}

	public static function all() {
		self::LoadConfig();

		return ( empty( self::$Config ) ) ? null : self::$Config;
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

	//region Установка модуля
	public static function GetInstallStatus() {
		self::LoadConfig();

		return ( empty( self::$Config->install ) ) ? false : self::$Config->install;
	}

	public static function SetInstallStatus( $status ) {
		self::SetValue( 'install', $status );
	}

	public static function SetDefaultDataConfig() {
		self::$Config                                             = new stdClass;
		self::$Config->WidgetShowBalance['default']               = '1';
		self::$Config->WidgetTitle['default']                     = 'Донат на TS';
		self::$Config->WidgetDefaultAddBalanceSum['default']      = '100';
		self::$Config->WidgetButtonText['default']                = 'Пополнить';
		self::$Config->DefaultNamePrimaryNavbarItemPublicAddFunds = 'Публичное пополнение';
		self::$Config->DefaultUserDefaultAddBalanceSum            = '100';
		self::$Config->DefaultPublicInvoiceButtonStyle            = '';
		self::$Config->DefaultPublicInvoiceMessageAlertSuccess    = 'Следующий текст успешно скопирован в буфер обмена: ';
		self::$Config->DefaultPublicInvoiceButtonMessage          = 'Скопировать ссылку для публичной оплаты этого счёта в буфер обмена';
	}
	//endregion

	//region Настройка виджета
	public static function GetWidgetShowBalance( $ClientID ) {
		self::LoadConfig();

		return ( empty( self::$Config->WidgetShowBalance[ $ClientID ] ) ) ? self::GetDefaultWidgetShowBalance() : self::$Config->WidgetShowBalance[ $ClientID ];
	}

	public static function GetDefaultWidgetShowBalance() {
		self::LoadConfig();

		return self::$Config->WidgetShowBalance['default'];
	}

	public static function SetWidgetShowBalance( $ClientID, $Value ) {
		self::LoadConfig();
		self::$Config->WidgetShowBalance[ $ClientID ] = $Value;
		self::SetValue( 'WidgetShowBalance', self::$Config->WidgetShowBalance );
	}


	public static function GetWidgetTitle( $ClientID ) {
		self::LoadConfig();

		return ( empty( self::$Config->WidgetTitle[ $ClientID ] ) ) ? self::GetDefaultWidgetTitle() : self::$Config->WidgetTitle[ $ClientID ];
	}

	public static function GetDefaultWidgetTitle() {
		self::LoadConfig();

		return self::$Config->WidgetTitle['default'];
	}

	public static function SetWidgetTitle( $ClientID, $Value ) {
		self::LoadConfig();
		self::$Config->WidgetTitle[ $ClientID ] = $Value;
		self::SetValue( 'WidgetTitle', self::$Config->WidgetTitle );
	}


	public static function GetWidgetDefaultAddBalanceSum( $ClientID ) {
		self::LoadConfig();

		return ( empty( self::$Config->WidgetDefaultAddBalanceSum[ $ClientID ] ) ) ? self::GetDefaultWidgetDefaultAddBalanceSum() : self::$Config->WidgetDefaultAddBalanceSum[ $ClientID ];
	}

	public static function GetDefaultWidgetDefaultAddBalanceSum() {
		self::LoadConfig();

		return self::$Config->WidgetDefaultAddBalanceSum['default'];
	}

	public static function SetWidgetDefaultAddBalanceSum( $ClientID, $Value ) {
		self::LoadConfig();
		self::$Config->WidgetDefaultAddBalanceSum[ $ClientID ] = $Value;
		self::SetValue( 'WidgetDefaultAddBalanceSum', self::$Config->WidgetDefaultAddBalanceSum );
	}


	public static function GetWidgetButtonText( $ClientID ) {
		self::LoadConfig();

		return ( empty( self::$Config->WidgetButtonText[ $ClientID ] ) ) ? self::GetDefaultWidgetButtonText() : self::$Config->WidgetButtonText[ $ClientID ];
	}

	public static function GetDefaultWidgetButtonText() {
		self::LoadConfig();

		return self::$Config->WidgetButtonText['default'];
	}

	public static function SetWidgetButtonText( $ClientID, $Value ) {
		self::LoadConfig();
		self::$Config->WidgetButtonText[ $ClientID ] = $Value;
		self::SetValue( 'WidgetButtonText', self::$Config->WidgetButtonText );
	}

	//endregion

	//region Настройки меню
	public static function SetNamePrimaryNavbarItemPublicAddFunds( $Name ) {
		self::SetValue( 'NamePrimaryNavbarItemPublicAddFunds', $Name );
	}

	public static function GetNamePrimaryNavbarItemPublicAddFunds() {
		self::LoadConfig();

		return ( empty( self::$Config->NamePrimaryNavbarItemPublicAddFunds ) ) ? self::GetDefaultNamePrimaryNavbarItemPublicAddFunds() : self::$Config->NamePrimaryNavbarItemPublicAddFunds;
	}

	public static function GetDefaultNamePrimaryNavbarItemPublicAddFunds() {
		self::LoadConfig();

		return self::$Config->DefaultNamePrimaryNavbarItemPublicAddFunds;

	}
	//endregion

	//region Надстройка над конфигуратором whmcs
	public static function GetWHMCSSystemURL() {
		return Setting::getValue( 'SystemURL' );
	}

	public static function GetUserMaxBalanse() {
		return Setting::getValue( 'AddFundsMaximum' );
	}

	public static function GetUserMinBalanse() {
		return Setting::getValue( 'AddFundsMinimum' );
	}

	public static function GetUserBalanseStatus() {
		return Setting::getValue( 'AddFundsEnabled' );
	}

	public static function GetDateFormat() {
		return Setting::getValue( 'DateFormat' );
	}

	public static function GetWHMCSVersion() {
		return Setting::getValue( 'Version' );
	}
	//endregion


	//region Публичная оплата счетов пользователя по домену, пополнение баланса и сведения о услуге
	public static function GetServiceDonateUserDefaultAddBalanceSum() {
		self::LoadConfig();

		return ( empty( self::$Config->UserDefaultAddBalanceSum ) ) ? self::GetDefaultServiceDonateUserDefaultAddBalanceSum() : self::$Config->UserDefaultAddBalanceSum;
	}

	public static function SetServiceDonateUserDefaultAddBalanceSum( $Sum ) {
		self::LoadConfig();
		self::SetValue( 'UserDefaultAddBalanceSum', $Sum );
		self::SaveConfig();
	}

	public static function GetDefaultServiceDonateUserDefaultAddBalanceSum() {
		self::LoadConfig();

		return self::$Config->DefaultUserDefaultAddBalanceSum;
	}

	//endregion


	//region Публичная оплата счета
	public static function GetPublicInvoiceButtonMessage() {
		self::LoadConfig();

		return ( empty( self::$Config->PublicInvoiceButtonMessage ) ) ? self::GetDefaultPublicInvoiceButtonMessage() : self::$Config->PublicInvoiceButtonMessage;
	}

	public static function GetDefaultPublicInvoiceButtonMessage() {
		self::LoadConfig();

		return self::$Config->DefaultPublicInvoiceButtonMessage;
	}

	public static function SetPublicInvoiceButtonMessage( $message ) {
		self::SetValue( 'PublicInvoiceButtonMessage', $message );
	}


	public static function GetPublicInvoiceMessageAlertSuccess() {
		self::LoadConfig();

		return ( empty( self::$Config->PublicInvoiceMessageAlertSuccess ) ) ? self::GetDefaultPublicInvoiceMessageAlertSuccess() : self::$Config->PublicInvoiceMessageAlertSuccess;
	}

	public static function GetDefaultPublicInvoiceMessageAlertSuccess() {
		self::LoadConfig();

		return self::$Config->DefaultPublicInvoiceMessageAlertSuccess;
	}

	public static function SetPublicInvoiceMessageAlertSuccess( $Message ) {
		self::SetValue( 'PublicInvoiceMessageAlertSuccess', $Message );
	}


	public static function GetPublicInvoiceButtonStyle() {
		self::LoadConfig();

		return ( empty( self::$Config->PublicInvoiceButtonStyle ) ) ? self::GetDefaultPublicInvoiceButtonStyle() : self::$Config->PublicInvoiceButtonStyle;
	}

	public static function GetDefaultPublicInvoiceButtonStyle() {
		self::LoadConfig();

		return self::$Config->DefaultPublicInvoiceButtonStyle;
	}

	public static function SetDefaultPublicInvoiceButtonStyle( $style ) {
		self::SetValue( 'PublicInvoiceButtonStyle', $style );
	}

	//endregion

}