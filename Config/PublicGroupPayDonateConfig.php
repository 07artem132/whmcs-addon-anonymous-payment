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

	public static function GetStatus() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'Enable' );
	}

	public static function SetStatus( $status ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'Enable', (bool) $status );
	}


	public static function GetDonateHostStatus() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'Donate.Host.Enable' );
	}

	public static function SetDonateHostStatus( $status ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'Donate.Host.Enable', (bool) $status );
	}


	public static function GetDonateClientEmailStatus() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'Donate.ClientEmail.Enable' );

	}

	public static function SetDonateClientEmailStatus( $status ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'Donate.ClientEmail.Enable', (bool) $status );

	}

	public static function GetDonateClientIDStatus() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'Donate.ClientID.Enable' );
	}

	public static function SetDonateClientIDStatus( $status ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'Donate.ClientID.Enable', (bool) $status );
	}

	public static function GetDonateHostCustomFieldsPort() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'Donate.Host.CustomFieldsPort' );
	}

	public static function SetDonateHostCustomFieldsPort( $CustomFieldContainsPort ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'Donate.Host.CustomFieldsPort', $CustomFieldContainsPort );
	}

	public static function GetDonateHostAllowServerIP() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'Donate.Host.AllowServerIP' );
	}

	public static function SetDonateHostAllowServerIP( $AllowServerIP ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'Donate.Host.AllowServerIP', $AllowServerIP );
	}

	public static function GetAddMessageRecipient() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'AddMessageRecipient' );
	}

	public static function SetAddMessageRecipient( $Status ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'AddMessageRecipient', (bool) $Status );
	}


	public static function SetNavDisplayName( $Name ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'Nav.DisplayName', $Name );
	}

	public static function GetNavDisplayName() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'Nav.DisplayName' );
	}

	public static function SetNavRootItem( $Item ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'Nav.RootItem', $Item );
	}

	public static function GetNavRootItem() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'Nav.RootItem' );
	}

	public static function SetNavSubItem( $Item ) {
		ConfigController::SetValueModule( 'PublicGroupPay', 'Nav.SubItem', $Item );
	}

	public static function GetNavSubItem() {
		return ConfigController::GetValueModule( 'PublicGroupPay', 'Nav.SubItem' );
	}

}