<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 22.12.2017
 * Time: 22:53
 */

namespace AnonymousPayment\Controller;

use \WHMCS\CustomField\CustomFieldValue;

class WHMCSCustomFieldValueController {
	public static function ServiceSearchByValueAndFieldIdAndRelIdList( $value, $fieldid, $relid ) {
		return CustomFieldValue::where( 'value', '=', $value )
		                       ->where( 'fieldid', '=', $fieldid )
		                       ->whereIn( 'relid', $relid )->first();

	}

}