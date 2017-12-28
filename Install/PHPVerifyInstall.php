<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 24.12.2017
 * Time: 15:17
 */

namespace AnonymousPayment\Install;

use AnonymousPayment\Interfaces\InstallInterface;

class PHPVerifyInstall implements InstallInterface {
	function MinimumRequirementsCheck() {
		return [
			'name'             => 'PHP 5.6+',
			'NameLinkDoc'      => 'php56',
			'ErrorDescription' => 'шмот',
			'Status'           => $this->isPHP56OrOlder(),
		];
	}

	function Install() {
		return;
	}

	function Remove() {
		return;
	}

	function isPHP56OrOlder() {
		if ( version_compare( PHP_VERSION, '5.6.0' ) >= 0 ) {
			return true;
		}

		return false;
	}
}