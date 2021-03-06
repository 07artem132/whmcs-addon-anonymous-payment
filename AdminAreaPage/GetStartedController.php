<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:18
 */

namespace AnonymousPayment\AdminAreaPage;

use \Smarty;
use \AnonymousPayment\Config\AdminAreaSmartyConfig;
use \AnonymousPayment\Abstracts\AdminAreaPageAbstract;
use \AnonymousPayment\Interfaces\AdminAreaPageInterface;

class GetStartedController extends AdminAreaPageAbstract implements AdminAreaPageInterface {

	function render() {
		$smarty = new Smarty;
		$smarty->setCompileDir( AdminAreaSmartyConfig::GetCompileDir() );

		foreach ( $this->GetVars() as $key => $value ) {
			$smarty->assign( $key, $value );
		}

		$smarty->display( AdminAreaSmartyConfig::GetTemplateDir() . "GetStarted.tpl" );
	}

}