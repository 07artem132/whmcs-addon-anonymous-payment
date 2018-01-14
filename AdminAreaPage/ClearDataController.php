<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:18
 */

namespace AnonymousPayment\AdminAreaPage;

use Smarty;
use AnonymousPayment\Install\HtaccessInstall;
use AnonymousPayment\Controller\ConfigController;
use AnonymousPayment\Config\AdminAreaSmartyConfig;
use AnonymousPayment\Abstracts\AdminAreaPageAbstract;
use AnonymousPayment\Interfaces\AdminAreaPageInterface;

class ClearDataController extends AdminAreaPageAbstract implements AdminAreaPageInterface {

	function render() {
		$smarty = new Smarty;
		$smarty->setCompileDir( AdminAreaSmartyConfig::GetCompileDir() );

		foreach ( $this->GetVars() as $key => $value ) {
			$smarty->assign( $key, $value );
		}

		ConfigController::ClearData();

		$smarty->display( AdminAreaSmartyConfig::GetTemplateDir() . "ClearData.tpl" );
	}

	function Remove() {
		$HtaccessInstall = new HtaccessInstall();
		$HtaccessInstall->Remove();
	}

}