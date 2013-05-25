<?php

 namespace Lib;

 Class Config
 {
     private static $config = array();
     
     public static function add($configuration = array())
     {
         self::$config = $configuration;
     }
     
     public static function get($key)
     {
         if (isset(self::$config[$key]))
         {
             return self::$config[$key];
         }
     }
 }

?>