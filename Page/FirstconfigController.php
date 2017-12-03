<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:32
 */

namespace PublicInvoiceUrlView\Page;

use PublicInvoiceUrlView\Lib\PageInterface;
use PublicInvoiceUrlView\Lib\Config;

class FirstconfigController implements PageInterface {
	function GetFileName() {
		return 'Firstconfig.tpl';
	}

	function Config() {
		if ( ! empty( $_POST['AlertSuccess'] ) && ! empty( $_POST['ButtonMessage'] ) ) {


			Config::SetInstallStatus( true );

			Config::SetValue( 'AlertSuccess', $_POST['AlertSuccess'] );
			Config::SetValue( 'ButtonMessage', $_POST['ButtonMessage'] );

			if ( ! empty( $_POST['ButtonStyle'] ) ) {
				Config::SetValue( 'ButtonStyle', $_POST['ButtonStyle'] );
			}

			$this->RedirectToGetStarted();
		}

	}

	function RedirectToGetStarted() {
		header( 'Location: ?module=PublicInvoiceUrlView&page=getstarted' );

	}

	function GetVars() {
		return [];
	}
}