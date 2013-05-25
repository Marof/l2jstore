<?php
/**
 * Classe: Debug
 * 
 * @package libraries
 * @subpackage libraries\Lib
 * @author  Vagner V. B. Cantuares <vagner.cantuares@gmail.com>
 * @copyright copyright (c) copyright 2013
 * @license http://opensource.org/licenses/gpl-license.php GNU Public Licence (GPL)
 * @link https://www.facebook.com/vagner.cantuares
 */
 namespace Lib;

 Class Debug {
 
 	public static function display($value)
	{
		echo '<pre>';
			print_r($value);
		echo '</pre>';
		
	}
 
 }
