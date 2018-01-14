<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 13.12.2017
 * Time: 18:07
 */

namespace AnonymousPayment\Config;

use AnonymousPayment\Config\WHMCSConfig;
use AnonymousPayment\Config\PublicDonateWidgetConfig;
use AnonymousPayment\Config\PublicGroupPayDonateConfig;

/**
 * Class ClientAreaPrimaryNavBarConfig
 * @package AnonymousPayment\Config
 */
class ClientAreaPrimaryNavBarConfig {
	/**
	 * @return array
	 */
	public static function GetAllNavItem() {
		return [
			[
				'Root'              => PublicGroupPayDonateConfig::GetNavRootItem(),
				'SubItem'           => PublicGroupPayDonateConfig::GetNavSubItem(),
				'url'               => WHMCSConfig::GetSystemURL() . '/public/grouppay/',
				'name'              => PublicGroupPayDonateConfig::GetNavDisplayName(),
				'isEnable'          => PublicGroupPayDonateConfig::GetStatus(),
				'AuthorizedRequest' => false,
			],
			[
				'Root'              => PublicDonateWidgetConfig::GetNavRootItem(),
				'SubItem'           => PublicDonateWidgetConfig::GetNavSubItem(),
				'url'               => WHMCSConfig::GetSystemURL() . '/public/balance/config',
				'name'              => PublicDonateWidgetConfig::GetNavDisplayName(),
				'isEnable'          => PublicDonateWidgetConfig::GetStatus(),
				'AuthorizedRequest' => true,
			]
		];
	}

}