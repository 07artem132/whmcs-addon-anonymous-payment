<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:18
 */

namespace PublicInvoiceUrlView\Page;

use PublicInvoiceUrlView\Lib\PageInterface;
use PublicInvoiceUrlView\Lib\ConfigController;

class ClearDataController implements PageInterface {
	private $vars;

	function Delete(){
		ConfigController::ClearData();
	}

	function GetFileName() {
		return 'ClearData.tpl';
	}

	function GetVars() {
		return $this->vars;
	}

}