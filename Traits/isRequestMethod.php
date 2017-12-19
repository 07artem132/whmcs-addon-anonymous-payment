<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 17:29
 */

namespace AnonymousPayment\Traits;

trait isRequestMethod {

	protected function isRequestMethod( $Method ) {
		if ( $_SERVER['REQUEST_METHOD'] === $Method ) {
			return true;
		}

		return false;
	}
}