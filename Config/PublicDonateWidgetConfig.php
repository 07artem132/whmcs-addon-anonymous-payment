<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 16:38
 */

namespace AnonymousPayment\Config;

use AnonymousPayment\Controller\ConfigController;

class PublicDonateWidgetConfig {

	public static function GetIsEnablePublicDonateWidget() {
		return ConfigController::SetValue( 'IsEnablePublicDonateWidget' );
	}

	public static function SetIsEnablePublicDonateWidget( $status ) {
		ConfigController::SetValue( 'IsEnablePublicDonateWidget',(bool) $status );
	}


	public static function GetShowBalance( $ClientID ) {
		return '1';
	}


	public static function GetTitle( $ClientID ) {
		return 'Донат на TS';
	}


	public static function GetDefaultAddBalanceSum( $ClientID ) {
		return '100';
	}


	public static function GetButtonText( $ClientID ) {
		return 'Пополнить';
	}

	public static function SetTitle( $ClientID, $Title ) {
	}

	public static function SetShowBalance( $ClientID, $Status ) {
	}

	public static function SetDefaultAddBalanceSum( $ClientID, $Sum ) {
	}

	public static function SetButtonText( $ClientID, $ButtonText ) {
	}
}