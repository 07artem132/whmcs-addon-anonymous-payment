<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 24.12.2017
 * Time: 15:02
 */

namespace AnonymousPayment\Config;


class AdminAreaSmartyConfig {

	public static function GetIsCaching() {
		return false;
	}

	public static function GetTemplateDir() {
		return ROOTDIR . '/modules/addons/AnonymousPayment/AdminAreaTemplate/';
	}

	public static function GetCompileDir() {
		return ROOTDIR . '/templates_c';
	}
}