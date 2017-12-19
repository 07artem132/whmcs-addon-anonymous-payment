<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 15:54
 */

namespace AnonymousPayment\Interfaces;


interface ClientAreaPageInterface {
	function SetVars( $vars );

	function render();

}