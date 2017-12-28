<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 22.12.2017
 * Time: 22:27
 */

namespace AnonymousPayment\Controller;

use WHMCS\Database\Capsule;

class WHMCSServerController {

	public static function SearchByIP( $IP ) {
		return Capsule::table( 'tblservers' )->where( 'ipaddress', '=', $IP )->first();
	}

	public static function SearchByHostname( $Hostname ) {
		return Capsule::table( 'tblservers' )->where( 'hostname', '=', $Hostname )->first();
	}

	public static function SearchByHostnameOrIP( $HostnameOrIP ) {
		return Capsule::table( 'tblservers' )->where( 'hostname', '=', $HostnameOrIP )->orWhere( 'ipaddress', '=', $HostnameOrIP )->first();
	}

}