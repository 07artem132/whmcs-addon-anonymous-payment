<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:18
 */

namespace PublicInvoiceUrlView\Page;

use PublicInvoiceUrlView\Lib\PageInterface;

class GetStartedController implements PageInterface{
	function info() {

	}

	function GetFileName() {
		return 'GetStarted.tpl';
	}

	function GetVars() {
		return [];
	}
}