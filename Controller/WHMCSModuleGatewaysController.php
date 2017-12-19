<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 16:10
 */

namespace AnonymousPayment\Controller;

use  \WHMCS\Module\Gateway as ModuleGateway;
class WHMCSModuleGatewaysController {
	private $ModuleGateway;

	function __construct() {
		$this->ModuleGateway = new ModuleGateway();
	}

	public function GetAvailableGateways() {
		return $this->ModuleGateway->getAvailableGateways();
	}

	public function GeneratePaymentButton( $PaymentGateway, $InvoiceID, $Sum ) {
		return call_user_func(
			$PaymentGateway . "_link",
			getGatewayVariables( $PaymentGateway, $InvoiceID, $Sum )
		);
	}

}