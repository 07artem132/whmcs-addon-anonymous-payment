<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 13.12.2017
 * Time: 19:29
 */

namespace AnonymousPayment\Controller;

use \WHMCS\User\Client;

class WHMCSClientController {

	public static function isLogin() {
		return ( empty( $_SESSION['uid'] ) ) ? false : true;

	}

	public static function GetID() {
		return ( empty( $_SESSION['uid'] ) ) ? null : $_SESSION['uid'];
	}

	public static function ID( $id ) {
		return Client::findorfail( $id );
	}

	public static function Email( $Email ) {
		return Client::where( 'email', '=', $Email )->firstorfail();

	}
}