<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 12.12.2017
 * Time: 22:14
 */

namespace PublicInvoiceUrlView\Lib;

use PublicInvoiceUrlView\Controller\ConfigController as Config;

class InstallConfig {

	public static function GetStatus() {
		$Value = Config::GetValue( 'install' );

		return ( empty( $Value ) ) ? false : $Value;
	}

	public static function SetStatus( $status ) {
		Config::SetValue( 'install', $status );
	}

}