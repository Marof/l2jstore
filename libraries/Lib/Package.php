<?php
/**
 * Classe: Package
 * 
 * Classe de gerenciamento de pacotes.
 * 
 * @package libraries
 * @author  Vagner V. B. Cantuares <vagner.cantuares@gmail.com>
 * @copyright copyright (c) copyright 2013
 * @license http://opensource.org/licenses/gpl-license.php GNU Public Licence (GPL)
 * @link https://www.facebook.com/vagner.cantuares
 */
 namespace Lib;

 Class Package
 {
/**
 * Method: load
 * 
 * @param $package
 * @return mixed
 */
	public static function load($packages = array())
	{
		foreach ($packages as $package)
        {
            require APPDIR . DS . 'packages' . DS . $package . DS . 'vendor' . DS . 'autoload.php';
        }
	}
 }