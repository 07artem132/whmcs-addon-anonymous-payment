<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 24.12.2017
 * Time: 14:50
 */

namespace AnonymousPayment\Exceptions;

use \Exception;

class PageControllerNotImplementInterface extends Exception {
	function __construct( $Interface ) {
	}
}