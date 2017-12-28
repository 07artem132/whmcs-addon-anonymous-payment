<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 22.12.2017
 * Time: 14:13
 */

namespace AnonymousPayment\Exceptions;

use Exception;

class ClientIDNotFoundExceptions extends Exception {
	function __construct( $ID ) {
	}
}