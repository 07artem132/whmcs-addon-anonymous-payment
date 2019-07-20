<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 24.12.2017
 * Time: 21:46
 */

namespace AnonymousPayment\Controller;

use \Menu;
use WHMCS\View\Menu\Item as MenuItem;
use AnonymousPayment\Controller\WHMCSClientController;

class WHMCSMenuItemController {
	public static function GetPrimaryNavBarStructure( $UserLogin ) {

		if ( $UserLogin ) {
			$_SESSION['uid'] = WHMCSClientController::GetFirstUserID();
		} else {
			unset( $_SESSION['uid'] );
		}

		$PrimaryNavBar = Menu::primaryNavbar();

		run_hook( 'ClientAreaPrimaryNavbar', $PrimaryNavBar );

		$PrimaryNavBar = $PrimaryNavBar->sort( $PrimaryNavBar );

		foreach ( $PrimaryNavBar->getChildren() as $key => $val ) {
			$Structure[ $key ]['translate'] = $val->getLabel() . '  ';
			if ( $val->hasChildren() ) {
				foreach ( $val->getChildren() as $key2 => $val2 ) {
					$Structure[ $key ]['SumItem'][ $key2 ]['translate'] = $val2->getLabel();
				}
			}
		}

		//Menu::swap();

		return $Structure;
	}
}