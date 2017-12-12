<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:32
 */

namespace PublicInvoiceUrlView\Page;

use PublicInvoiceUrlView\Lib\PageInterface;
use PublicInvoiceUrlView\Lib\ConfigController;

class FirstconfigController implements PageInterface {
	function GetFileName() {
		return 'Firstconfig.tpl';
	}

	function Config() {
		if ( ! empty( $_POST['AlertSuccess'] ) && ! empty( $_POST['ButtonMessage'] ) ) {


			ConfigController::SetInstallStatus( true );

			ConfigController::SetValue( 'AlertSuccess', $_POST['AlertSuccess'] );
			ConfigController::SetValue( 'ButtonMessage', $_POST['ButtonMessage'] );

			if ( ! empty( $_POST['ButtonStyle'] ) ) {
				ConfigController::SetValue( 'ButtonStyle', $_POST['ButtonStyle'] );
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