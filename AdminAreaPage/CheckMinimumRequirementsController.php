<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 03.12.2017
 * Time: 17:53
 */

namespace AnonymousPayment\AdminAreaPage;

use Smarty;
use AnonymousPayment\Interfaces\AdminAreaPageInterface;
use AnonymousPayment\Abstracts\AdminAreaPageAbstract;
use AnonymousPayment\Config\AdminAreaSmartyConfig;
use AnonymousPayment\Install\PHPVerifyInstall;
use AnonymousPayment\Install\WHMCSVerifyInstall;
use AnonymousPayment\Install\HtaccessInstall;

class CheckMinimumRequirementsController extends AdminAreaPageAbstract implements AdminAreaPageInterface {

	function Check() {
		$PHPVerifyInstall      = new PHPVerifyInstall();
		$this->vars['Check'][] = $PHPVerifyInstall->MinimumRequirementsCheck();

		$WHMCSVerifyInstall    = new WHMCSVerifyInstall();
		$this->vars['Check'][] = $WHMCSVerifyInstall->MinimumRequirementsCheck();

		$HtaccessInstall    = new HtaccessInstall();
		$this->vars['Check'][] = $HtaccessInstall->MinimumRequirementsCheck();

	}

	function render() {
		$smarty = new Smarty;
		$smarty->setCompileDir( AdminAreaSmartyConfig::GetCompileDir() );

		$this->Check();

		foreach ( $this->GetVars() as $key => $value ) {
			$smarty->assign( $key, $value );
		}

		$smarty->display( AdminAreaSmartyConfig::GetTemplateDir() . "CheckMinimumRequirements.tpl" );
	}


}