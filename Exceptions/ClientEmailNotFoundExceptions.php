<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 22.12.2017
 * Time: 14:12
 */

namespace AnonymousPayment\Exceptions;

use Exception;

class ClientEmailNotFoundExceptions extends  Exception{

	function __construct($Email) {
	}
}