<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 13.12.2017
 * Time: 18:07
 */

namespace AnonymousPayment\Config;

use WHMCS\Config\Setting;
use AnonymousPayment\Controller\ConfigController;

class ClientAreaPrimaryNavBarConfig {


	public static function GetAllNavItem() {
		return [
			[
				'Root'              => self::GetGroupPayDonateRoot(),
				'SubItem'           => self::GetGroupPayDonateSubItem(),
				'url'               => Setting::getValue( 'SystemURL' ) . '/public/grouppay/',
				'name'              => self::GetGroupPayDonateDisplayName(),
				'AuthorizedRequest' => false,
			],
			[
				'Root'              => self::GetGroupPayDonateWidgetRoot(),
				'SubItem'           => self::GetGroupPayDonateWidgetSubItem(),
				'url'               => Setting::getValue( 'SystemURL' ) . '/public/balance/config',
				'name'              => self::GetGroupPayDonateWidgetDisplayName(),
				'AuthorizedRequest' => true,
			]
		];
	}

	public static function SetGroupPayDonateWidgetRoot( $name ) {
		ConfigController::SetValue( 'GroupPayDonateWidgetRoot', $name );
	}

	public static function SetGroupPayDonateWidgetSubItem( $name ) {
		ConfigController::SetValue( 'GroupPayDonateWidgetSubItem', $name );
	}

	public static function SetGroupPayDonateWidgetDisplayName( $name ) {
		ConfigController::SetValue( 'GroupPayDonateWidgetDisplayName', $name );
	}

	public static function GetGroupPayDonateWidgetRoot() {
		return ConfigController::GetValue( 'GroupPayDonateWidgetRoot' );
	}

	public static function GetGroupPayDonateWidgetSubItem() {
		return ConfigController::GetValue( 'GroupPayDonateWidgetSubItem' );

	}

	public static function GetGroupPayDonateWidgetDisplayName() {
		return ConfigController::GetValue( 'GroupPayDonateWidgetDisplayName' );
	}

	public static function SetGroupPayDonateRoot( $name ) {
		ConfigController::SetValue( 'GroupPayDonateRoot', $name );
	}

	public static function SetGroupPayDonateSubItem( $name ) {
		ConfigController::SetValue( 'GroupPayDonateSubItem', $name );
	}

	public static function SetGroupPayDonateDisplayName( $name ) {
		ConfigController::SetValue( 'GroupPayDonateDisplayName', $name );
	}

	public static function GetGroupPayDonateRoot() {
		return ConfigController::GetValue( 'GroupPayDonateRoot' );

	}

	public static function GetGroupPayDonateSubItem() {
		return ConfigController::GetValue( 'GroupPayDonateSubItem' );

	}

	public static function GetGroupPayDonateDisplayName() {
		return ConfigController::GetValue( 'GroupPayDonateDisplayName' );

	}

}