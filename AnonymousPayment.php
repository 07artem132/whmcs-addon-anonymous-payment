<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.11.2017
 * Time: 12:52
 */


require __DIR__ . '/vendor/autoload.php';

use AnonymousPayment\Config\InstallConfig;
use AnonymousPayment\Controller\AdminAreaPageController;
use AnonymousPayment\Controller\MultiLanguageController;
use AnonymousPayment\Controller\ClientAreaPageController;

function AnonymousPayment_config() {
	return [
		"name"        => "Anonymous payment",
		"description" => "",
		"version"     => "2",
		"author"      => "service-voice",
		"fields"      => [

		]
	];
}

function AnonymousPayment_clientarea( $vars ) {
	$Page = $_GET['page'];

	MultiLanguageController::init( $vars['_lang'] );

	$ClientAreaPageController = new ClientAreaPageController();
	$ClientAreaPageController->SetVar( 'ModuleLink', $vars['modulelink'] );
	$ClientAreaPageController->SetVar( 'ModuleName', str_replace( "index.php?m=", "", $vars['modulelink'] ) );
	$ClientAreaPageController->SetVar( 'LangModule', MultiLanguageController::class );
	$ClientAreaPageController->Render( $Page );
	die();
}

function AnonymousPayment_sidebar() {
	//Выводит в левый блок
}

function AnonymousPayment_output( $vars ) {
	$Page = $_GET['page'];

	MultiLanguageController::init( $vars['_lang'] );

	$AdminAreaPageController = new AdminAreaPageController();
	$AdminAreaPageController->SetVar( 'ModuleLink', $vars['modulelink'] );
	$AdminAreaPageController->SetVar( 'ModuleName', str_replace( "index.php?m=", "", $vars['modulelink'] ) );
	$AdminAreaPageController->SetVar( 'LangModule', MultiLanguageController::class );

	if ( ! InstallConfig::GetStatus() && empty( $Page ) ) {
		return $AdminAreaPageController->Render( 'welcome' );
	}

	return $AdminAreaPageController->Render( $Page );
}

