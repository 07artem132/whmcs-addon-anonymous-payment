<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 18:26
 */

namespace AnonymousPayment\Controller;

use \WHMCS\ClientArea;
use AnonymousPayment\Exceptions\TemplateFileNotExistsExceptions;

class WHMCSClientAreaController {
	private $ClientArea,
		$TemplatePath = 'ClientAreaTemplate';

	function __construct() {
		$this->ClientArea = new ClientArea();
	}

	function initPage() {
		$this->ClientArea->initPage();
	}

	function requireLogin() {
		$this->ClientArea->requireLogin();
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

	function setTemplate( $Template ) {
		if ( ! file_exists( ROOTDIR . '/modules/addons/' . $_GET['m'] . '/' . $this->TemplatePath . '/' . $Template . '.tpl' ) ) {
			throw new TemplateFileNotExistsExceptions( '/modules/addons/' . $_GET['m'] . '/' . $this->TemplatePath . '/' . $Template . '.tpl' );
		}

		$this->ClientArea->setTemplate( '/modules/addons/' . $_GET['m'] . '/' . $this->TemplatePath . '/' . $Template . '.tpl' );
	}

	function GetTemplatePath() {
		return $this->TemplatePath;
	}

	function SetTemplatePath( $TemplatePath ) {
		$this->TemplatePath = $TemplatePath;
	}

	function output() {
		$this->ClientArea->output();
	}
}