<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:18
 */

namespace PublicInvoiceUrlView\Page;

use PublicInvoiceUrlView\Lib\PageInterface;

class WelcomeController implements PageInterface {
	function GetFileName() {
		return 'Welcome.tpl';
	}

	function GetVars() {
		return [ 'test' => 'testic' ];
	}
}