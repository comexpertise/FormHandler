<?php

/**
 * class EmailField
 *
 * Create a textfield
 *
 * @author Teye Heimans
 * @package FormHandler
 * @subpackage Fields
 */
class EmailField extends TextField
{
	/**
     * TextField::getField()
     *
     * Return the HTML of the field
     *
     * @return string: the html
     * @access public
     * @author Teye Heimans
     */
	function getField()
	{
		// view mode enabled ?
		if( $this -> getViewMode() )
		{
			// get the view value..
			return $this -> _getViewValue();
		}

		$field = parent::getField();

		return str_replace('type="text"','type="email"', $field);
	}
}

?>
