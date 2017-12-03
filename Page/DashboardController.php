<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:18
 */

namespace PublicInvoiceUrlView\Page;

use PublicInvoiceUrlView\Lib\PageInterface;
use PublicInvoiceUrlView\Lib\Config;
class DashboardController implements PageInterface {
	private $vars;

	function Config() {
		if ( ! empty( $_POST['AlertSuccess'] ) && ! empty( $_POST['ButtonMessage'] ) ) {
			Config::SetInstallStatus( true );

			Config::SetValue( 'AlertSuccess', $_POST['AlertSuccess'] );
			Config::SetValue( 'ButtonMessage', $_POST['ButtonMessage'] );
			if ( ! empty( $_POST['ButtonStyle'] ) ) {
				Config::SetValue( 'ButtonStyle', $_POST['ButtonStyle'] );
			}
		}

		$this->vars['config'] = Config::all();

	}

	function GetFileName() {
		return 'Dashboard.tpl';
	}

	function GetVars() {
		return $this->vars;
	}

}