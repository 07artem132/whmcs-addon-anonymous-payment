<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 13.12.2017
 * Time: 18:06
 */

namespace AnonymousPayment\Controller;

use AnonymousPayment\Config\ClientAreaPrimaryNavBarConfig;
use AnonymousPayment\Controller\WHMCSClientController;
use WHMCS\View\Menu\Item as MenuItem;

class ClientAreaPrimaryNavBarController {

	public static function AddAllItem( MenuItem $PrimaryNavBar ) {
		foreach ( ClientAreaPrimaryNavBarConfig::GetNavItem() as $item ) {
			$IterationPrimaryNavBar = $PrimaryNavBar;

			if ( array_key_exists( 'SubItem', $item ) && ! empty( $item['SubItem'] ) ) {
				if ( ! empty( $SubItemNavBar = $IterationPrimaryNavBar->getChild( $item['SubItem'] ) ) ) {
					$IterationPrimaryNavBar = $SubItemNavBar;
				}
			}

			if ( (bool) $item['AuthorizedRequest'] && ! WHMCSClientController::isLogin() ) {
				continue;
			}

			$IterationPrimaryNavBar = $IterationPrimaryNavBar->addChild( $item['name'] );
			$IterationPrimaryNavBar->setUri( $item['url'] );
			$IterationPrimaryNavBar->setOrder( $item['order'] );

		};
	}
}