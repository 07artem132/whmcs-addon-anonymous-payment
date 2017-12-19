<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 19.12.2017
 * Time: 23:01
 */

namespace AnonymousPayment\Traits;


trait GoToBackPageRedirect {
	protected function GoToBackPageRedirect() {
		header( "Location: " . $_SERVER["HTTP_REFERER"] );
	}
}