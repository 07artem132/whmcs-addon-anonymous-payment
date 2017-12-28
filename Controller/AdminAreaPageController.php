<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:15
 */

namespace AnonymousPayment\Controller;

use AnonymousPayment\Interfaces\AdminAreaPageInterface;
use AnonymousPayment\Exceptions\PageControllerNotImplementInterface;

class AdminAreaPageController {
	private $var = [];
	private $PageController;
	private $PageToController = [
		'welcome'                  => 'WelcomeController',
		'getstarted'               => 'GetStartedController',
		'dashboard'                => 'DashboardController',
		'firstconfig'              => 'FirstСonfigController',
		'cleardata'                => 'ClearDataController',
		'checkminimumrequirements' => 'CheckMinimumRequirementsController',
	];

	function SetVar( $key, $value ) {
		$this->var[ $key ] = $value;
	}

	function GetVars() {
		return $this->var;
	}

	function Render( $Page ) {
		$Class = $this->PageToController[ $Page ];

		$className = 'AnonymousPayment\AdminAreaPage\\' . $Class;

		$this->PageController = new $className;

		if ( ! ( $this->PageController instanceof AdminAreaPageInterface ) ) {
			throw new PageControllerNotImplementInterface( 'AdminAreaPageInterface' );
		}

		$this->PageController->SetVars( $this->GetVars() );

		call_user_func( [ $this->PageController, 'render' ] );
	}
}