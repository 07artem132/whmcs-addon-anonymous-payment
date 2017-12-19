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

	function GetServiceAssignByDomain( $domain ) {
		return Service::where( 'domain', '=', $domain )->get();
	}
	function GetFirstServiceAssignByDomain( $domain ) {
		return Service::where( 'domain', '=', $domain )->first();
	}


}