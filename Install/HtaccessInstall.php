<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 13.12.2017
 * Time: 0:07
 */

use AnonymousPayment\Interfaces\InstallInterface;

class HtaccessInstall implements InstallInterface {

	private static $AppendToString = 'RewriteBase /';

	function MinimumRequirementsCheck() {
		return [
			'WritableHtaccess' => [
				'name'             => 'Файл ' . self::GetHtaccessPath() . ' доступен для записи',
				'Description'      => '',
				'ErrorDescription' => '',
				'function'         => 'isWritableHtaccess',
			]
		]; //TODO должно возврашать результат проверки
	}

	function Install() {
		self::isWritableHtaccess();
		self::WriteHtaccess();
	}

	function Remove() {
		self::isWritableHtaccess();
		self::DeleteWriteHtaccess();
	}

	public static function GetConfig() {
		return [
			'htaccessContent' => [
				'#Правила модуля PublicInvoiceUrlView',
				'RewriteRule ^templates/ - [L]',
				'RewriteCond %{HTTP_HOST} !(^' . $_SERVER['SERVER_NAME'] . '$)',
				'RewriteRule (.*) index.php?m=AnonymousPayment&page=grouppayservice&domain=%{HTTP_HOST} [L]',
				'RewriteCond %{REQUEST_URI} ^/public/grouppay/forward',
				'RewriteRule (.*) index.php?m=AnonymousPayment&page=grouppayforward  [L]',
				'RewriteCond %{REQUEST_URI} ^/public/grouppay',
				'RewriteRule (.*) index.php?m=AnonymousPayment&page=grouppay  [L]',
				'RewriteCond %{REQUEST_URI} ^/public/balance/config',
				'RewriteRule (.*) index.php?m=AnonymousPayment&page=configgrouppay [L]',
				'RewriteCond %{REQUEST_URI} ^/public/balance/(.*)',
				'RewriteRule (.*) index.php?m=AnonymousPayment&page=widget&widget_id=%1 [L]',
				'RewriteCond %{REQUEST_URI} ^/public/invoice/(.*)',
				'RewriteRule (.*) index.php?m=AnonymousPayment&page=invoice&invoice_id=%1? [L]',
				'RewriteCond %{REQUEST_URI} ^/servers/(.*)',
				'RewriteRule (.*) clientarea.php?action=productdetails&id=%1? [L]',
				'#Конец правил модуля PublicInvoiceUrlView',
			]
		];
	}

	public static function isWritableHtaccess() {
		$HtaccessFile = self::GetHtaccessPath();

		if ( ! is_writable( $HtaccessFile ) && file_exists( $HtaccessFile ) ) {
			throw new HtaccessIsNotWritableExceptions();
		}

		return true;
	}

	public static function GetHtaccessPath() {
		return ROOTDIR . '/.htaccess';
	}

	public static function WriteHtaccess() {
		$htaccess = file_get_contents( self::GetHtaccessPath() );

		$FilePat1 = substr( $htaccess, 0, strpos( $htaccess, self::$SearchValue ) + strlen( self::$SearchValue ) );
		$FilePat2 = substr( $htaccess, strpos( $htaccess, self::$SearchValue ) + strlen( self::$SearchValue ) );

		$FilePat1 .= PHP_EOL;
		for ( $i = 0; $i < count( $htaccessContent = GetConfig()['htaccessContent'] ); $i ++ ) {
			$FilePat1 .= $htaccessContent[ $i ] . PHP_EOL;
		}

		$htaccess = $FilePat1 . $FilePat2;

		file_put_contents( self::GetHtaccessPath(), $htaccess );
	}

	public static function DeleteWriteHtaccess() {
		$htaccess = file_get_contents( self::GetHtaccessPath() );

		for ( $i = 0; $i < count( $htaccessContent = GetConfig()['htaccessContent'] ); $i ++ ) {
			$htaccess = str_replace( $htaccessContent[ $i ], "", $htaccess );

		}

		file_put_contents( self::GetHtaccessPath(), $htaccess );

	}
}