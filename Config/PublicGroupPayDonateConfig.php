<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 19.12.2017
 * Time: 21:32
 */

namespace AnonymousPayment\Config;


use AnonymousPayment\Controller\ConfigController;

class PublicGroupPayDonateConfig {

	public static function GetIsEnablePublicGroupPayDonate() {
		return ConfigController::SetValue( 'IsEnablePublicGroupPayDonate' );
	}

	public static function SetIsEnablePublicGroupPayDonate( $status ) {
		ConfigController::SetValue( 'IsEnablePublicGroupPayDonate',(bool) $status );
	}

	public static function GetIsEnableDonateHost() {
		return ConfigController::GetValue( 'IsEnableDonateHost' );
	}

	public static function SetIsEnableDonateHost( $status ) {
		ConfigController::SetValue( 'IsEnableDonateHost',(bool) $status );

	}

	public static function GetIsEnableDonateClientEmail() {
		return ConfigController::GetValue( 'IsEnableDonateClientEmail' );
	}

	public static function SetIsEnableDonateClientEmail( $status ) {
		ConfigController::SetValue( 'IsEnableDonateClientEmail',(bool) $status );

	}

	public static function GetIsEnableDonateClientID() {
		return ConfigController::GetValue( 'IsEnableDonateClientID' );
	}

	public static function SetIsEnableDonateClientID( $status ) {
		ConfigController::SetValue( 'IsEnableDonateClientID',(bool) $status );

	}

	public static function GetCustomFieldsServerPort() {
		return ConfigController::GetValue( 'CustomFieldsServerPort' );
	}

	public static function SetCustomFieldsServerPort( $CustomFieldContainsPort ) {
		ConfigController::SetValue( 'CustomFieldsServerPort', $CustomFieldContainsPort );
	}

}