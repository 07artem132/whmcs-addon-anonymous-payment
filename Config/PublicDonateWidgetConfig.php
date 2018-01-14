<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 16:38
 */

namespace AnonymousPayment\Config;

use AnonymousPayment\Controller\ConfigController;

use \AnonymousPayment\Config\WHMCSUserConfig;

class PublicDonateWidgetConfig {

	public static function GetStatus() {
		return ConfigController::GetValueModule( 'PublicDonateWidget', 'Enable' );
	}

	public static function SetStatus( $status ) {
		ConfigController::SetValueModule( 'PublicDonateWidget', 'Enable', (bool) $status );
	}

	public static function SetNavDisplayName( $Name ) {
		ConfigController::SetValueModule( 'PublicDonateWidget', 'Nav.DisplayName', $Name );
	}

	public static function GetNavDisplayName() {
		return ConfigController::GetValueModule( 'PublicDonateWidget', 'Nav.DisplayName' );
	}

	public static function SetNavRootItem( $Item ) {
		ConfigController::SetValueModule( 'PublicDonateWidget', 'Nav.RootItem', $Item );
	}

	public static function GetNavRootItem() {
		return ConfigController::GetValueModule( 'PublicDonateWidget', 'Nav.RootItem' );
	}

	public static function SetNavSubItem( $Item ) {
		ConfigController::SetValueModule( 'PublicDonateWidget', 'Nav.SubItem', $Item );
	}

	public static function GetNavSubItem() {
		return ConfigController::GetValueModule( 'PublicDonateWidget', 'Nav.SubItem' );
	}

	public static function SetTitle( $ClientID, $Title ) {
		ConfigController::SetValueClient( $ClientID, 'PublicDonateWidget.Title', $Title );
	}

	public static function GetTitle( $ClientID ) {
		return ConfigController::GetValueClient( $ClientID, 'PublicDonateWidget.Title', 'Донат на TS' );
	}

	public static function SetShowBalance( $ClientID, $Status ) {
		ConfigController::SetValueClient( $ClientID, 'PublicDonateWidget.ShowBalance', $Status );
	}

	public static function GetShowBalance( $ClientID ) {
		return ConfigController::GetValueClient( $ClientID, 'PublicDonateWidget.ShowBalance', '' );
	}

	public static function SetDefaultAddBalanceSum( $ClientID, $Sum ) {
		ConfigController::SetValueClient( $ClientID, 'PublicDonateWidget.DefaultAddBalanceSum', $Sum );
	}

	public static function GetDefaultAddBalanceSum( $ClientID ) {
		return ConfigController::GetValueClient( $ClientID, 'PublicDonateWidget.DefaultAddBalanceSum', intval( WHMCSUserConfig::GetMinAddBalanse() ) );
	}

	public static function GetButtonText( $ClientID ) {
		return ConfigController::GetValueClient( $ClientID, 'PublicDonateWidget.ButtonText', 'Пополнить' );
	}

	public static function SetButtonText( $ClientID, $ButtonText ) {
		ConfigController::SetValueClient( $ClientID, 'PublicDonateWidget.ButtonText', $ButtonText );
	}
}