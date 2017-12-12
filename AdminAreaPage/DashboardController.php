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

class DashboardController implements PageInterface {
	private $vars;

	function Config() {
		if ( ! empty( $_POST['AlertSuccess'] ) && ! empty( $_POST['ButtonMessage'] ) ) {
			ConfigController::SetInstallStatus( true );

			ConfigController::SetValue( 'AlertSuccess', $_POST['AlertSuccess'] );
			ConfigController::SetValue( 'ButtonMessage', $_POST['ButtonMessage'] );
			if ( ! empty( $_POST['ButtonStyle'] ) ) {
				ConfigController::SetValue( 'ButtonStyle', $_POST['ButtonStyle'] );
			}
		}

		$this->vars['config'] = ConfigController::all();

	}

	function GetFileName() {
		return 'Dashboard.tpl';
	}

	function GetVars() {
		return $this->vars;
	}

}