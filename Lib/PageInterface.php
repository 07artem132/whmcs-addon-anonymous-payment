<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.12.2017
 * Time: 18:17
 */

namespace PublicInvoiceUrlView\Lib;


interface PageInterface {
	function GetFileName();

	function GetVars();
}