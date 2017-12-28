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
		foreach ( ClientAreaPrimaryNavBarConfig::GetAllNavItem() as $item ) {
			$IterationPrimaryNavBar = $PrimaryNavBar;

			if ( $item['Root'] != 'first' ) {
				if ( ! empty( $SubItemNavBar = $IterationPrimaryNavBar->getChild( $item['Root'] ) ) ) {
					$IterationPrimaryNavBar = $SubItemNavBar;
				}
			}

			if ( (bool) $item['AuthorizedRequest'] && ! WHMCSClientController::isLogin() ) {
				continue;
			}

			if ( (bool) ! $item['AuthorizedRequest'] && WHMCSClientController::isLogin() ) {
				continue;
			}

			if ( $item['SubItem'] === 'first' ) {
				$Order = 0;
			} elseif ( $item['SubItem'] === 'last' ) {
				$Order = 9999;
			} else {
				$Order = $IterationPrimaryNavBar->getChild( $item['SubItem'] )->getOrder() + 1;
			}

			$IterationPrimaryNavBar = $IterationPrimaryNavBar->addChild( $item['name'] );
			$IterationPrimaryNavBar->setUri( $item['url'] );
			$IterationPrimaryNavBar->setOrder( $Order );

		};
	}
}