<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 13.12.2017
 * Time: 0:07
 */

namespace AnonymousPayment\Install;

use AnonymousPayment\Interfaces\InstallInterface;

class HtaccessInstall implements InstallInterface {

	private  $AppendToString = 'RewriteBase /';

	function MinimumRequirementsCheck() {
		return [
			'name'             => 'Htaccess write',
			'NameLinkDoc'      => 'Htaccess',
			'ErrorDescription' => 'Файл  '.$this->GetHtaccessPath().'  недоступен для записи или не существует',
			'Status'           => $this->isWritableHtaccess(),
		];
	}

	function Install() {
		self::WriteHtaccess();
	}

	function Remove() {
		self::DeleteWriteHtaccess();
	}

	function GetConfig() {
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

	function isWritableHtaccess() {
		$HtaccessFile = $this->GetHtaccessPath();

		if ( ! is_writable( $HtaccessFile ) && file_exists( $HtaccessFile ) ) {
			return false;
		}

		return true;
	}

	function GetHtaccessPath() {
		return ROOTDIR . '/.htaccess';
	}

	function WriteHtaccess() {
		$htaccess = file_get_contents( self::GetHtaccessPath() );

		$FilePat1 = substr( $htaccess, 0, strpos( $htaccess, $this->AppendToString ) + strlen( $this->AppendToString ) );
		$FilePat2 = substr( $htaccess, strpos( $htaccess, $this->AppendToString ) + strlen( $this->AppendToString ) );

		$FilePat1 .= PHP_EOL;
		for ( $i = 0; $i < count( $htaccessContent = $this->GetConfig()['htaccessContent'] ); $i ++ ) {
			$FilePat1 .= $htaccessContent[ $i ] . PHP_EOL;
		}

		$htaccess = $FilePat1 . $FilePat2;

		file_put_contents( self::GetHtaccessPath(), $htaccess );
	}

	function DeleteWriteHtaccess() {
		$htaccess = file_get_contents( self::GetHtaccessPath() );

		for ( $i = 0; $i < count( $htaccessContent =$this->GetConfig()['htaccessContent'] ); $i ++ ) {
			$htaccess = str_replace( $htaccessContent[ $i ], "", $htaccess );

		}

		file_put_contents( self::GetHtaccessPath(), $htaccess );

	}
}