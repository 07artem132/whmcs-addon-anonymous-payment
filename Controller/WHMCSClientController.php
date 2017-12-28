<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 13.12.2017
 * Time: 19:29
 */

namespace AnonymousPayment\Controller;

use \WHMCS\User\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \AnonymousPayment\Exceptions\ClientIDNotFoundExceptions;
use \AnonymousPayment\Exceptions\ClientEmailNotFoundExceptions;

class WHMCSClientController {

	public static function isLogin() {
		return ( empty( $_SESSION['uid'] ) ) ? false : true;

	}

	public static function GetFirstUserID() {
		return Client::first()->id;
	}

	public static function GetID() {
		return ( empty( $_SESSION['uid'] ) ) ? null : $_SESSION['uid'];
	}

	public static function ID( $id ) {
		try {
			return Client::findorfail( $id );
		} catch ( ModelNotFoundException $e ) {
			throw  new ClientIDNotFoundExceptions( $id );
		}
	}

	public static function Email( $Email ) {
		try {
			return Client::where( 'email', '=', $Email )->firstorfail();
		} catch ( ModelNotFoundException $e ) {
			throw  new ClientEmailNotFoundExceptions( $Email );
		}


	}
}