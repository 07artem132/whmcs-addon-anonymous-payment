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

	public static function GetIsEnablePublicServiceDonate() {
		return ConfigController::SetValue( 'IsEnablePublicServiceDonate' );
	}

	public static function SetIsEnablePublicServiceDonate( $status ) {
		ConfigController::SetValue( 'IsEnablePublicServiceDonate',(bool) $status );
	}


	public static function SetShowServiceInfo( $status ) {
		ConfigController::SetValue( 'PublicServiceDonateShowServiceInfo',(bool) $status );
	}

	public static function GetShowServiceInfo() {
		ConfigController::GetValue( 'PublicServiceDonateShowServiceInfo' );

	}

	public static function SetShowBalanceUser( $status ) {
		ConfigController::SetValue( 'PublicServiceDonateShowBalanceUser',(bool) $status );
	}

	public static function GetShowBalanceUser() {
		ConfigController::GetValue( 'PublicServiceDonateShowBalanceUser' );

	}

	public static function SetShowUserInvoiceList( $status ) {
		ConfigController::SetValue( 'PublicServiceDonateShowUserInvoiceList',(bool) $status );
	}

	public static function GetShowUserInvoiceList() {
		ConfigController::GetValue( 'PublicServiceDonateShowUserInvoiceList' );

	}

	public static function SetShowAddBalanceWidget( $status ) {
		ConfigController::SetValue( 'PublicServiceDonateShowAddBalanceWidget',(bool) $status );
	}

	public static function GetShowAddBalanceWidget() {
		ConfigController::GetValue( 'PublicServiceDonateShowAddBalanceWidget' );

	}

	public static function GetDefaultAddBalanceSum( $ClientID, $default ) {

	}

}