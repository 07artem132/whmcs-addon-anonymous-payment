<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 15:35
 */

namespace AnonymousPayment\Controller;

use AnonymousPayment\Interfaces\ClientAreaPageInterface;

class ClientAreaPageController {
	private $var = [];
	private $PageController;
	private $PageToController = [
		'grouppay'        => 'PublicGroupPayDonate@render',
		'configgrouppay'  => 'GroupPayWidgetConfig@render',
		'widget'          => 'GroupPayWidget@render',
		'invoice'         => 'PublicInvoiceDonate@render',
		'grouppayservice' => 'PublicServiceDonate@render',
		'grouppayforward' => 'PublicGroupPayForward@render',
	];

	function SetVar( $key, $value ) {
		$this->var[ $key ] = $value;
	}

	function GetVars() {
		return $this->var;
	}

	function Render( $Page ) {
		list( $Class, $Function ) = explode( '@', $this->PageToController[ $Page ] );

		$className = 'AnonymousPayment\ClientAreaPage\\' . $Class;

		$this->PageController = new $className;

		if ( ! ( $this->PageController instanceof ClientAreaPageInterface ) ) {
			echo 'error';
			//todo throw exceptions
		}
		$this->PageController->SetVars( $this->GetVars() );

		if ( ! empty( $Function ) ) {
			call_user_func( [ $this->PageController, $Function ] );
		}
	}
}