<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 03.12.2017
 * Time: 17:53
 */

namespace PublicInvoiceUrlView\Page;

use PublicInvoiceUrlView\Lib\PageInterface;
use PublicInvoiceUrlView\Lib\Config;

class CheckMinimumRequirementsController implements PageInterface {
	private $vars = [];

	function Check() {
		$this->vars['isWHMCS712rOlder'] = $this->isWHMCS712rOlder();
		$this->vars['isPHP56OrOlder']   = $this->isPHP56OrOlder();
	}

	function GetFileName() {
		return 'CheckMinimumRequirements.tpl';
	}

	function GetVars() {
		return $this->vars;
	}

	function isWHMCS712rOlder() {
		if ( floatval( Config::GetWHMCSVersion() ) >= 7.1 ) {
			return true;
		}

		return false;
	}

	function isPHP56OrOlder() {
		if ( version_compare( PHP_VERSION, '5.6.0' ) >= 0 ) {
			return true;
		}

		return false;
	}
}