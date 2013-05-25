<?php

 namespace Lib;
 
 Class Dispatcher
 {
     public function mvc()
     {
         $routes    = Registry::getInstance()->get('Route')->routes();
         $response  = Registry::getInstance()->get('Route')->response();
         
         if(!isset($response[0]))
         {
             return $routes['_home_'];
         }
         
         if (in_array($response[0], array_keys($routes)))
         {
             $params['params'] = array_slice($response, 1);
             
             return array_merge($routes[$response[0]], $params);
         }
         else {
             return array('controller' => 'error', 'action' => 'e_404');
         }
     }
 }
 
?>