<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 12.12.2017
 * Time: 21:56
 */

namespace AnonymousPayment\Helper;

use Smarty;

/**
 * Class SmartyHelper
 * @package AnonymousPayment\Helper
 */
class SmartyHelper {

	public static function ClearCache() {
		global $templates_compiledir;

		$smarty              = new Smarty();
		$smarty->compile_dir = $templates_compiledir;
		$smarty->clearAllCache();
		$smarty->clearCompiledTemplate();
		$src = "<?php\r\nheader(\"Location: ../index.php\");";
		file_put_contents( $templates_compiledir . "/index.php", $src );
		unset( $src );
	}
}