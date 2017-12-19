<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 12.12.2017
 * Time: 23:54
 */

namespace AnonymousPayment\Interfaces;


interface InstallInterface {
	/**
	 * @return array ['Requirements' => bool]
	 */
	function MinimumRequirementsCheck();

	/**
	 * Выполняет необходимые функции установки
	 * @return void
	 */
	function Install();

	/**
	 * Выполняет необходимые функции во время удаления
	 * @return void
	 */
	function Remove();
}