<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 14.12.2017
 * Time: 16:19
 */

namespace AnonymousPayment\Config;


use AnonymousPayment\Controller\ConfigController;

class PublicInvoiceConfig {
	public static function GetStatus() {
		return ConfigController::GetValueModule( 'PublicInvoice', 'Enable' );
	}

	public static function SetStatus( $status ) {
		ConfigController::SetValueModule( 'PublicInvoice', 'Enable', (bool) $status );
	}

	public static function SetButtonStyle( $Style ) {
		ConfigController::SetValueModule( 'PublicInvoice', 'Button.Style', $Style );
	}

	public static function GetButtonStyle() {
		return ConfigController::GetValueModule( 'PublicInvoice', 'Button.Style' );
	}

	public static function SetButtonInsertScript( $Script ) {
		ConfigController::SetValueModule( 'PublicInvoice', 'Button.InsertScript', $Script );
	}

	public static function GetButtonInsertScript() {
		return ConfigController::GetValueModule( 'PublicInvoice', 'Button.InsertScript' );
	}


	public static function GetButtonMessage() {
		return ConfigController::GetValueModule( 'PublicInvoice', 'Button.message' );
	}

	public static function SetButtonMessage( $Message ) {
		ConfigController::SetValueModule( 'PublicInvoice', 'Button.message', $Message );
	}


	public static function GetCopySuccessNoticeInsertScript() {
		return ConfigController::GetValueModule( 'PublicInvoice', 'CopySuccessNotice.InsertScript' );
	}

	public static function SetCopySuccessNoticeInsertScript( $Script ) {
		ConfigController::SetValueModule( 'PublicInvoice', 'CopySuccessNotice.InsertScript', $Script );
	}

	public static function GetCopySuccessNoticeMessage() {
		return ConfigController::GetValueModule( 'PublicInvoice', 'CopySuccessNotice.message' );
	}

	public static function SetCopySuccessNoticeMessage( $Message ) {
		ConfigController::SetValueModule( 'PublicInvoice', 'CopySuccessNotice.message', $Message );
	}
}