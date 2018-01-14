<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.01.2018
 * Time: 19:06
 */

namespace AnonymousPayment\Controller;

use DebugBar\StandardDebugBar;
use DebugBar\DataCollector\ConfigCollector;
use AnonymousPayment\Config\WHMCSConfig;

class DebugBarController {
	const RESOURCES = '/modules/addons/AnonymousPayment/vendor/maximebf/debugbar/src/DebugBar/Resources/';
	private static $DebugBar;

	public static function GetDebugStatus() {
		return ConfigController::GetValue( 'debug', false );
	}

	public static function init() {
		self::$DebugBar = new StandardDebugBar();
	}

	public static function RenderHead() {
		if ( self::GetDebugStatus() ) {
			if ( empty( self::$DebugBar ) ) {
				self::init();
			}

			return self::$DebugBar->getJavascriptRenderer( WHMCSConfig::GetSystemURL() . self::RESOURCES )->renderHead();
		}

		return '';
	}

	public static function RenderBar() {
		if ( self::GetDebugStatus() ) {
			if ( empty( self::$DebugBar ) ) {
				self::init();
			}

			return self::$DebugBar->getJavascriptRenderer( WHMCSConfig::GetSystemURL() . self::RESOURCES )->render();
		}

		return '';
	}

	public static function StartMeasure( $Name, $Descriptions = '' ) {
		if ( self::GetDebugStatus() ) {
			if ( empty( self::$DebugBar ) ) {
				self::init();
			}

			self::$DebugBar->getCollector( 'time' )->startMeasure( $Name, $Descriptions );
		}
	}

	public static function SetConfig( $Config ) {
		if ( self::GetDebugStatus() ) {
			if ( empty( self::$DebugBar ) ) {
				self::init();
			}

			self::$DebugBar->addCollector( new ConfigCollector( $Config ) );
		}
	}

	public static function SetLang( $Lang ) {
		if ( self::GetDebugStatus() ) {
			if ( empty( self::$DebugBar ) ) {
				self::init();
			}

			self::$DebugBar->addCollector( new ConfigCollector( $Lang, 'Lang' ) );
		}
	}

	public static function StopMeasure( $Name ) {
		if ( self::GetDebugStatus() ) {
			if ( empty( self::$DebugBar ) ) {
				self::init();
			}

			self::$DebugBar->getCollector( 'time' )->stopMeasure( $Name );
		}

	}

	public static function AddMessage( $message ) {
		if ( self::GetDebugStatus() ) {
			if ( empty( self::$DebugBar ) ) {
				self::init();
			}

			self::$DebugBar->getCollector( 'messages' )->addMessage( $message );
		}
	}
}