<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 17:54
 */

namespace AnonymousPayment\Controller;

use \WHMCS\Utility\Country;

class WHMCSCountryController {
	private $Country;

	function __construct() {
		$this->Country = new Country();
	}

	function GetName( $country ) {
		return $this->Country->getName( $country );
	}
}