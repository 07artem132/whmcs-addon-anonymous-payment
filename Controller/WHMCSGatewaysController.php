<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 18:46
 */

namespace AnonymousPayment\Controller;

use \WHMCS\Gateways;

class WHMCSGatewaysController {
	private $Gateways;

	function __construct() {
		$this->Gateways = new Gateways();
	}

	public function GetDisplayName( $ModuleName ) {
		return $this->Gateways->getDisplayName( $ModuleName );
	}

	public function GetAvailableGateways( $InvoiceID ) {
		return $this->Gateways->getAvailableGateways( $InvoiceID );
	}

	public function ValidateAllowGateways( $gateway, $InvoiceID ) {
		$validgateways = $this->Gateways->getAvailableGateways( $InvoiceID );

		if ( array_key_exists( $gateway, $validgateways ) ) {
			return true;
		}

		return false;
	}

}