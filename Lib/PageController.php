<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:15
 */

namespace PublicInvoiceUrlView\Lib;

use Smarty;

class PageController {
	private $TemplateDir = 'Template';
	private $PageToController = [
		'welcome'    => 'WelcomeController',
		'getstarted' => 'GetStartedController@info',
		'dashboard'  => 'DashboardController@Config',
		'firstconfig' => 'FirstconfigController@Config',
		'cleardata' => 'ClearDataController@Delete',
		'checkminimumrequirements'=>'CheckMinimumRequirementsController@Check',
	];

	private $smarty;
	private $Caching = false;
	private $PageController;

	function __construct() {
		$this->smarty = new Smarty();
		$this->smarty->force_compile = 1;
		$this->smarty->caching = $this->Caching;
	}

	function BildPage( $name ) {
		list( $Class, $Function ) = explode( '@', $this->PageToController[ $name ] );

		$className = 'PublicInvoiceUrlView\Page\\' . $Class;

		$this->PageController = new $className;

		if ( $this->PageController instanceof PageInterface ) {

			if ( ! empty( $Function ) ) {
				call_user_func( [ $this->PageController, $Function ] );
			}

			foreach ( $this->PageController->GetVars() as $Key => $Value ) {
				$this->SetVar( $Key, $Value );
			}

			$this->DisplayTPL( $this->PageController->GetFileName() );
		}
	}

	public function SetVar( $name, $value ) {
		$this->smarty->assign( $name, $value );
	}

	public function GetVar() {
		return $this->smarty->getTemplateVars();
	}

	public function DisplayTPL( $FileName ) {
		$this->smarty->display( __DIR__ . ' /../' . $this->TemplateDir . '/' . $FileName );
	}
}