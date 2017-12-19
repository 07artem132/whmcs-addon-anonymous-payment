<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 18:26
 */

namespace AnonymousPayment\Controller;

use \WHMCS\ClientArea;

class WHMCSClientAreaController {
	private $ClientArea;

	function __construct() {
		$this->ClientArea = new ClientArea();
	}

	function initPage() {
		$this->ClientArea->initPage();
	}

	function disableHeaderFooterOutput() {
		$this->ClientArea->disableHeaderFooterOutput();
	}

	function setPageTitle( $Title ) {
		$this->ClientArea->setPageTitle( $Title );
	}

	function assign( $key, $value ) {
		$this->ClientArea->assign( $key, $value );
	}

	function setTemplate( $path ) {
		$this->ClientArea->setTemplate( $path );
	}

	function output() {
		$this->ClientArea->output();
	}
}