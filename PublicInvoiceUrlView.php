<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.11.2017
 * Time: 12:52
 */


require __DIR__ . '/vendor/autoload.php';

use PublicInvoiceUrlView\Lib\html;
use PublicInvoiceUrlView\Lib\InvoicePageWHMCS;
use PublicInvoiceUrlView\Lib\PublicServiceDonate;
use PublicInvoiceUrlView\Lib\PublicBalanseDonate;
use PublicInvoiceUrlView\Lib\CryptUrlData;

function PublicInvoiceUrlView_config() {
	return [
		"name"        => "Public invoice url view",
		"description" => "",
		"version"     => "1.0",
		"author"      => "service-voice",
		"fields"      => [

		]
	];
}

function PublicInvoiceUrlView_clientarea( $vars ) {
	$modulelink = $vars['modulelink'];

	echo html::GetJqueryInclude();

	if ( isset( $_GET['domain'] ) && ! empty( $_GET['domain'] ) ) {
		$PublicDonateService = new PublicServiceDonate();
		$PublicDonateService->GeneratePage( $_GET['domain'] );
		die();
	}

	if ( isset( $_GET['widget_id'] ) && ! empty( $_GET['widget_id'] ) ) {
		$PublicBalanseDonate = new PublicBalanseDonate();
		$PublicBalanseDonate->GenerateWidget( $_GET['widget_id'] );
		die();
	}

	if ( isset( $_GET['widget_config'] ) && ! empty( $_GET['widget_config'] ) ) {
		$PublicBalanseDonate = new PublicBalanseDonate();
		$PublicBalanseDonate->GenerateWidgetConfig();
		die();
	}

	/*if ( isset( $_GET['email'] ) && ! empty( $_GET['email'] ) ) {
		$PublicInvoicePaid = new PublicInvoicePaid();
		$PublicInvoicePaid->GeneratePage( $_GET['email'] );
		die();
	}*/

	if ( isset( $_GET['invoice'] ) && ! empty( $_GET['invoice'] ) ) {
		$InvoicePageWHMCS = new InvoicePageWHMCS();

		$EncodeStr = $_GET['invoice'];

		$InvoiceID = CryptUrlData::Decrypt( $EncodeStr );

		if ( isset( $_POST['gateway'] ) && ! empty( $_POST['gateway'] ) ) {
			$InvoicePageWHMCS->ChangeGateway( $InvoiceID, $_POST['gateway'] );
		}

		$InvoicePageWHMCS->GeneratePage( $InvoiceID );
		die();
	}
}

function PublicInvoiceUrlView_output( $vars ) {
	try {
		$PageController = new PageController();
		$PageController->SetVar( 'basheURL', $vars['modulelink'] );

		if ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ) {
			return $PageController->BildPage( $_GET['page'] );
		}

		if ( ! Config::GetInstallStatus() ) {
			return $PageController->BildPage( 'welcome' );
		} else {
			return $PageController->BildPage( 'dashboard' );
		}

	} catch ( \Exception $e ) {
		echo $e->getMessage();
	}
}

function PublicInvoiceUrlView_activate() {
	$RewriteStr[] = '#Правила модуля PublicInvoiceUrlView';
	$RewriteStr[] = 'RewriteRule ^templates/ - [L]';
	$RewriteStr[] = 'RewriteCond %{HTTP_HOST} !(^' . $_SERVER['SERVER_NAME'] . '$)';
	$RewriteStr[] = 'RewriteRule (.*) index.php?m=PublicInvoiceUrlView&domain=%{HTTP_HOST} [L]';
	$RewriteStr[] = 'RewriteCond %{REQUEST_URI} ^/invoice/public/(.*)';
	$RewriteStr[] = 'RewriteRule (.*) index.php?m=PublicInvoiceUrlView&invoice=%1? [L]';
	$RewriteStr[] = 'RewriteCond %{REQUEST_URI} ^/servers/(.*)';
	$RewriteStr[] = 'RewriteRule (.*) clientarea.php?action=productdetails&id=%1? [L]';
	$RewriteStr[] = '#Конец правил модуля PublicInvoiceUrlView';

	$SearchValue  = 'RewriteBase /';
	$HtaccessFile = ROOTDIR . '/.htaccess';

	if ( ! is_writable( $HtaccessFile ) && file_exists( $HtaccessFile ) ) {
		return array( 'status' => 'error', 'description' => 'Файл' . $HtaccessFile . ' недоступен для записи' );
	}

	$htaccess = file_get_contents( ROOTDIR . '/.htaccess' );

	$FilePat1 = substr( $htaccess, 0, strpos( $htaccess, $SearchValue ) + strlen( $SearchValue ) );
	$FilePat2 = substr( $htaccess, strpos( $htaccess, $SearchValue ) + strlen( $SearchValue ) );

	$FilePat1 .= PHP_EOL;
	for ( $i = 0; $i < count( $RewriteStr ); $i ++ ) {
		$FilePat1 .= $RewriteStr[ $i ] . PHP_EOL;
	}

	$htaccess = $FilePat1 . $FilePat2;

	file_put_contents( ROOTDIR . '/.htaccess', $htaccess );

	if ( ! in_array( 'mod_rewrite', apache_get_modules() ) ) {
		return array(
			'status'      => 'info',
			'description' => 'Дополнения для apache mod_rewrite не установлено, установка модуля будет невозможна.'
		);
	}

	return array(
		'status'      => 'success',
		'description' => 'Модуль успешно активирован, для установки модуля перейдите в "дополнения"->PublicInvoiceUrlView'
	);
}

function PublicInvoiceUrlView_deactivate() {
	$RewriteStr[] = '#Правила модуля PublicInvoiceUrlView';
	$RewriteStr[] = 'RewriteRule ^templates/ - [L]';
	$RewriteStr[] = 'RewriteCond %{HTTP_HOST} !(^' . $_SERVER['SERVER_NAME'] . '$)';
	$RewriteStr[] = 'RewriteRule (.*) index.php?m=PublicInvoiceUrlView&domain=%{HTTP_HOST} [L]';
	$RewriteStr[] = 'RewriteCond %{REQUEST_URI} ^/invoice/public/(.*)';
	$RewriteStr[] = 'RewriteRule (.*) index.php?m=PublicInvoiceUrlView&invoice=%1? [L]';
	$RewriteStr[] = 'RewriteCond %{REQUEST_URI} ^/servers/(.*)';
	$RewriteStr[] = 'RewriteRule (.*) clientarea.php?action=productdetails&id=%1? [L]';
	$RewriteStr[] = '#Конец правил модуля PublicInvoiceUrlView';

	$HtaccessFile = ROOTDIR . '/.htaccess';

	if ( ! is_writable( $HtaccessFile ) && file_exists( $HtaccessFile ) ) {
		return array( 'status' => 'error', 'description' => 'Файл' . $HtaccessFile . ' недоступен для записи' );
	}

	$htaccess = file_get_contents( ROOTDIR . '/.htaccess' );

	for ( $i = 0; $i < count( $RewriteStr ); $i ++ ) {
		$htaccess = str_replace( $RewriteStr[ $i ], "", $htaccess );

	}

	file_put_contents( $HtaccessFile, $htaccess );

	return array( 'status' => 'success', 'description' => 'Модуль успешно деактивирован' );
}