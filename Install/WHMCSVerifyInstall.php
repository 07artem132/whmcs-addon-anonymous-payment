<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 24.12.2017
 * Time: 15:50
 */

namespace AnonymousPayment\Install;

use AnonymousPayment\Interfaces\InstallInterface;
use AnonymousPayment\Config\WHMCSConfig;

class WHMCSVerifyInstall implements InstallInterface {
	function MinimumRequirementsCheck() {
		return [
			'name'             => 'WHMCS 7.1+',
			'NameLinkDoc'      => 'WHMCS71',
			'ErrorDescription' => 'шмот2',
			'Status'           => $this->isWHMCS712rOlder(),
		];
	}

	function Install() {
		return;
	}

	function Remove() {
		return;
	}

	function isWHMCS712rOlder() {
		if ( floatval( WHMCSConfig::GetVersion() ) >= 7.1 ) {
			return true;
		}

		return false;
	}

}