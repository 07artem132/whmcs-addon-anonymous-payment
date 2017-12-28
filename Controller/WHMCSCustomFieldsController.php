<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 22.12.2017
 * Time: 20:57
 */

namespace AnonymousPayment\Controller;

use \WHMCS\CustomField;
use AnonymousPayment\Exceptions\WHMCSCustomFieldUndefinedTypeFieldExceptions;
use AnonymousPayment\Exceptions\WHMCSCustomFieldUndefinedTypeCustomFieldExceptions;

class WHMCSCustomFieldsController {

	public static function GetByName( $FieldName ) {
		return CustomField::where( 'fieldname', '=', $FieldName )->first();
	}

	public static function GetByNameFilteredTypeCustomField( $FieldName, $type ) {
		if ( $type != 'client' && $type != 'product' && $type != 'support' ) {
			throw  new WHMCSCustomFieldUndefinedTypeCustomFieldExceptions( $type );
		}

		return CustomField::where( [ [ 'type', '=', $type ], [ 'fieldname', '=', $FieldName ] ] )->get();
	}

	public static function GetByNameFilteredTypeField( $FieldName, $type ) {
		if ( $type != 'dropdown' && $type != 'link' && $type != 'text' && $type != 'textarea' && $type != 'tickbox' && $type != 'password' ) {
			throw  new WHMCSCustomFieldUndefinedTypeFieldExceptions( $type );
		}

		return CustomField::where( [ [ 'fieldtype', '=', $type ], [ 'fieldname', '=', $FieldName ] ] )->get();
	}

	public static function GetAllFilteredTypeField( $type ) {
		if ( $type != 'dropdown' && $type != 'link' && $type != 'text' && $type != 'textarea' && $type != 'tickbox' && $type != 'password' ) {
			throw  new WHMCSCustomFieldUndefinedTypeFieldExceptions( $type );
		}

		return CustomField::where( [ 'fieldtype', '=', $type ] )->get();
	}

	public static function GetAllFilteredTypeFieldAndTypeCustomField( $TypeField, $TypeCustomField ) {
		if ( $TypeField != 'dropdown' && $TypeField != 'link' && $TypeField != 'text' && $TypeField != 'textarea' && $TypeField != 'tickbox' && $TypeField != 'password' ) {
			throw  new WHMCSCustomFieldUndefinedTypeFieldExceptions( $TypeField );
		}

		if ( $TypeCustomField != 'client' && $TypeCustomField != 'product' && $TypeCustomField != 'support' ) {
			throw  new WHMCSCustomFieldUndefinedTypeCustomFieldExceptions( $TypeCustomField );
		}

		return CustomField::where( [ [ 'fieldtype', '=', $TypeField ], [ 'type', '=', $TypeCustomField ] ] )->get();
	}

}