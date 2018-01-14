<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 18:24
 */

namespace AnonymousPayment\Controller;

use \WHMCS\Form;

class WHMCSFormController {
	private $Form;

	public function __construct() {
		$this->Form = new Form();
	}

	/**
	 * Opens new form for adding elements to, requires closing later
	 *
	 * @param string $url URL to submit to (defaults to PHP_SELF)
	 * @param boolean $files Set true if this form requires file submissions
	 * @param string $target Target for the submission (excluding _ prefix)
	 * @param string $method Form post method eg. post, get (defaults to post)
	 * @param boolean $nosubmitvar Set true to not include hidden input used in form submission check
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function form( $url = "", $files = false, $target = "", $method = "post", $nosubmitvar = false ) {
		return $this->Form->form( $url, $files, $target, $method, $nosubmitvar );
	}


	/**
	 * Generates a text input field
	 *
	 * @param string $name Field name
	 * @param string $value Optional default field value
	 * @param int $size Width of the field (defaults to 30)
	 * @param boolean $disabled Set true to disable
	 * @param string $class Optional class name to apply
	 * @param string $type Optional field type attribute
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function text( $name, $value = "", $size = "30", $disabled = false, $class = "", $type = "text" ) {
		return $this->Form->text( $name, $value, $size, $disabled, $class, $type );
	}

	/**
	 * Generates a password input field
	 *
	 * @param string $name Field name
	 * @param string $value Optional default field value
	 * @param int $size Width of the field (defaults to 30)
	 * @param boolean $disabled Set true to disable
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function password( $name, $value = "", $size = "30", $disabled = false ) {
		return $this->Form->password( $name, $value, $size, $disabled );
	}

	/**
	 * Generates a date text input field
	 *
	 * @param string $name Field name
	 * @param string $value Optional default field value
	 * @param int $size Width of the field (defaults to 12)
	 * @param boolean $disabled Set true to disable
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function date( $name, $value = "", $size = "12", $disabled = false ) {
		return $this->Form->date( $name, $value, $size, $disabled );
	}

	/**
	 * Generates a textarea input field
	 *
	 * @param string $name Field name
	 * @param string $value Optional default field value
	 * @param int $rows Number of rows (defaults to 3)
	 * @param int $cols Number of columns (defaults to 50) supports fixed or percentage
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function textarea( $name, $value, $rows = "3", $cols = "50" ) {
		return $this->Form->textarea( $name, $value, $rows, $cols );
	}

	/**
	 * Generates a checkbox input field with optional label
	 *
	 * @param string $name Field name
	 * @param string $label Optional label to follow checkbox
	 * @param boolean $checked Set true to check by default
	 * @param string $value Field value when checked (defaults to 1)
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function checkbox( $name, $label = "", $checked = false, $value = "1", $class = "" ) {
		return $this->Form->checkbox( $name, $label, $checked, $value, $class );
	}

	/**
	 * Generates a select dropdown input field
	 *
	 * @param string $name Field name
	 * @param array $values An array of dropdown options
	 * @param string $selected Optionally the default selected value
	 * @param string $onchange Optional onchange js action
	 * @param boolean $anyopt Set true to display any as first option
	 * @param boolean $noneopt Set true to display none as first option
	 * @param int $size Optional size of select field (defaults to 1)
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function dropdown( $name, $values = array(), $selected = "", $onchange = "", $anyopt = "", $noneopt = "", $size = "1" ) {
		return $this->Form->dropdown( $name, $values, $selected, $onchange, $anyopt, $noneopt, $size );
	}

	/**
	 * Generates a group of radio input fields
	 *
	 * @param string $name Field name
	 * @param array $values An array of radio button options
	 * @param string $selected The option to select by default
	 * @param string $spacer Option spacer (defaults to line break)
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function radio( $name, $values = array(), $selected = "", $spacer = "<br />" ) {
		return $this->Form->radio( $name, $values, $selected, $spacer );
	}


	/**
	 * Generates a hidden input field
	 *
	 * @param string $name Field name
	 * @param string $value Field value
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function hidden( $name, $value ) {
		return $this->Form->hidden( $name, $value );
	}

	/**
	 * Generates a submit button
	 *
	 * @param string $text Button display text
	 * @param string $class Button class (defaults to btn)
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function submit( $text = '', $class = "btn" ) {
		return $this->Form->submit( $text, $class );
	}

	/**
	 * Generates a regular button
	 *
	 * @param string $text Button display text
	 * @param string $onclick Optional javascript onclick action
	 * @param string $class Button class (defaults to btn)
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function button( $text, $onclick = "", $class = "btn" ) {
		return $this->Form->button( $text, $onclick, $class );
	}

	/**
	 * Generates a reset button
	 *
	 * @param string $text Button display text
	 * @param string $class Button class (defaults to btn)
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function reset( $text, $class = "btn" ) {
		return $this->Form->reset( $text, $class );
	}

	/**
	 * Closes form
	 *
	 * @return string Valid HTML Form Element
	 **/
	public function close() {
		return $this->Form->close();
	}

}