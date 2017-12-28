<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 22.12.2017
 * Time: 23:56
 */

namespace AnonymousPayment\Exceptions;

use \Exception;

class WHMCSCustomFieldUndefinedTypeCustomFieldExceptions extends Exception {
	function __construct( $type ) {
	}
}