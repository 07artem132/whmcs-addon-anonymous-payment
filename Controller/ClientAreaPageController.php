<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 15:35
 */

namespace AnonymousPayment\Controller;

use AnonymousPayment\Interfaces\ClientAreaPageInterface;
use AnonymousPayment\Exceptions\PageControllerNotImplementInterface;

class ClientAreaPageController {
	private $var = [];
	private $PageController;
	private $PageToController = [
		'grouppay'        => 'PublicGroupPayDonate',
		'configgrouppay'  => 'GroupPayWidgetConfig',
		'widget'          => 'GroupPayWidget',
		'invoice'         => 'PublicInvoiceDonate',
		'grouppayservice' => 'PublicServiceDonate',
		'grouppayforward' => 'PublicGroupPayForward',
	];

	function SetVar( $key, $value ) {
		$this->var[ $key ] = $value;
	}

	function GetVars() {
		return $this->var;
	}

	function Render( $Page ) {
		$Class = $this->PageToController[ $Page ];

		$className = 'AnonymousPayment\ClientAreaPage\\' . $Class;

		$this->PageController = new $className;

		if ( ! ( $this->PageController instanceof ClientAreaPageInterface ) ) {
			throw new PageControllerNotImplementInterface( 'ClientAreaPageInterface' );
		}

		$this->PageController->SetVars( $this->GetVars() );

		call_user_func( [ $this->PageController, 'render' ] );
	}
}