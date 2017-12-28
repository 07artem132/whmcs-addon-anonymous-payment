<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 21:54
 */

namespace AnonymousPayment\Controller;

use \WHMCS\Service\Service;

class WHMCSServiceController {

	public static function GetServiceAssignByDomain( $domain ) {
		return Service::where( 'domain', '=', $domain )->get();
	}

	public static function GetFirstServiceAssignByDomain( $domain ) {
		return Service::where( 'domain', '=', $domain )->first();
	}

	public static function GetServiceAssignByServerID( $ServerID ) {
		return Service::where( 'server', '=', $ServerID )->get();
	}
}