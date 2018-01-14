<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 16:46
 */

namespace AnonymousPayment\Config;

use AnonymousPayment\Controller\ConfigController;

class PublicServiceDonateConfig {

	public static function GetStatus() {
		return ConfigController::GetValueModule( 'PublicServiceDonate', 'Enable' );
	}

	public static function SetStatus( $status ) {
		ConfigController::SetValueModule( 'PublicServiceDonate', 'Enable', (bool) $status );
	}

	public static function SetShowServiceInfo( $status ) {
		ConfigController::SetValueModule( 'PublicServiceDonate', 'ServiceInfo.Display', (bool) $status );
	}

	public static function GetShowServiceInfo() {
		return ConfigController::GetValueModule( 'PublicServiceDonate', 'ServiceInfo.Display' );
	}

	public static function SetShowBalanceUser( $status ) {
		ConfigController::SetValueModule( 'PublicServiceDonate', 'BalanceUser.Display', (bool) $status );
	}

	public static function GetShowBalanceUser() {
		return ConfigController::GetValueModule( 'PublicServiceDonate', 'BalanceUser.Display' );
	}

	public static function SetShowUserInvoiceList( $status ) {
		ConfigController::SetValueModule( 'PublicServiceDonate', 'UserInvoiceList.Display', (bool) $status );
	}

	public static function GetShowUserInvoiceList() {
		return ConfigController::GetValueModule( 'PublicServiceDonate', 'UserInvoiceList.Display' );
	}

	public static function SetShowAddBalanceWidget( $status ) {
		ConfigController::SetValueModule( 'PublicServiceDonate', 'AddBalanceWidget.Display', (bool) $status );
	}

	public static function GetShowAddBalanceWidget() {
		return ConfigController::GetValueModule( 'PublicServiceDonate', 'AddBalanceWidget.Display' );
	}

	public static function SetDonateHostAllowServerIP( $AllowServerIP ) {
		ConfigController::SetValueModule( 'PublicServiceDonate', 'AllowServerIP', $AllowServerIP );
	}

	public static function GetDonateHostAllowServerIP() {
		return ConfigController::GetValueModule( 'PublicServiceDonate', 'AllowServerIP' );
	}

}