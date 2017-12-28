<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 22.12.2017
 * Time: 13:50
 */

namespace AnonymousPayment\Exceptions;

use \Exception;
use Throwable;

class TemplateFileNotExistsExceptions extends Exception {
	function __construct( $TemplateFile = "" ) {

	}
}