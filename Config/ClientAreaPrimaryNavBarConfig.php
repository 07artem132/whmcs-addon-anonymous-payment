<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 13.12.2017
 * Time: 18:07
 */

namespace AnonymousPayment\Config;

use WHMCS\Config\Setting;

class ClientAreaPrimaryNavBarConfig {


	public static function GetNavItem() {
		return [
			[
				'SubItem'           => null,
				'url'               => Setting::getValue( 'SystemURL' ) . '/public/grouppay/',
				'order'             => 70,
				'name'              => 'Групповая оплата',
				'AuthorizedRequest' => false,
			],
			[
				'SubItem'           => 'Billing',
				'url'               => Setting::getValue( 'SystemURL' ) . '/public/balance/config',
				'order'             => 70,
				'name'              => 'Публичное пополнение',
				'AuthorizedRequest' => true,
			]
		];
	}

}