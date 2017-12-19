<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.11.2017
 * Time: 12:52
 */


require __DIR__ . '/vendor/autoload.php';

use AnonymousPayment\Controller\ClientAreaPageController;
use AnonymousPayment\Controller\MultilanguageController;
use AnonymousPayment\Controller\AdminAreaPageController;

function AnonymousPayment_config() {
	return [
		"name"        => "Public invoice url view",
		"description" => "",
		"version"     => "1.5",
		"author"      => "service-voice",
		"fields"      => [

		]
	];
}

function AnonymousPayment_clientarea( $vars ) {
	$Page = $_GET['page'];

	MultilanguageController::init( $vars['_lang'] );

	$ClientAreaPageController = new ClientAreaPageController();
	$ClientAreaPageController->SetVar( 'modulelink', $vars['modulelink'] );
	$ClientAreaPageController->Render( $Page );
	die();
}

function AnonymousPayment_output( $vars ) {
	$Page = $_GET['page'];

	MultilanguageController::init( $vars['_lang'] );

	try {
		$PageController = new AdminAreaPageController();
		$PageController->SetVar( 'basheURL', $vars['modulelink'] );

		if ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ) {
			return $PageController->BildPage( $_GET['page'] );
		}

		//	if ( ! Config::GetInstallStatus() ) {
		return $PageController->BildPage( 'welcome' );
		//	} else {
		//		return $PageController->BildPage( 'dashboard' );
		//	}

	} catch ( \Exception $e ) {
		echo $e->getMessage();
	}
}

