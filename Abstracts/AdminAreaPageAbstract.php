<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 24.12.2017
 * Time: 14:57
 */

namespace AnonymousPayment\Abstracts;


abstract class AdminAreaPageAbstract {
	protected $vars;

	function SetVars( $vars ) {
		$this->vars = $vars;
	}

	function GetVars() {
		return $this->vars;
	}

}