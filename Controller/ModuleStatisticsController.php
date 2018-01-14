<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.01.2018
 * Time: 13:13
 */

namespace AnonymousPayment\Controller;

class ModuleStatisticsController {

	public static function AddEventPageView( $PageName ) {
		$Views = ConfigController::GetValueModule( 'Statistics', 'page.view.' . $PageName, 0 );
		$Views ++;
		ConfigController::SetValueModule( 'Statistics', 'page.view.' . $PageName, $Views );
	}

	public static function GetEventPageViewCount( $PageName ) {
		return ConfigController::GetValueModule( 'Statistics', 'page.view.' . $PageName, 0 );
	}

	public static function AddEventChangeSettings( $OptionName ) {
		$Count = ConfigController::GetValueModule( 'Statistics', 'ChangeSettings.' . $OptionName, 0 );
		$Count ++;
		ConfigController::SetValueModule( 'Statistics', 'ChangeSettings.' . $OptionName, $Count );
	}

}