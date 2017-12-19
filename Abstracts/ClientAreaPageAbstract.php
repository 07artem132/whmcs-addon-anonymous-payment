<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 17:10
 */

namespace AnonymousPayment\Abstracts;

abstract class ClientAreaPageAbstract {
	private $vars;

	function SetVars( $vars ) {
		$this->vars = $vars;
	}
}