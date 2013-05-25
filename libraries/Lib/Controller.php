<?php


 namespace Lib;
 
 Class Controller
 {
     public function initialize($dispatcher)
     {
         $c = 'Controller\\' . ucfirst($dispatcher['controller']);
         $a = $dispatcher['action'];
         
         Registry::getInstance()->set($c, new $c);
         Registry::getInstance()->get($c)->$a();
     }
     
     protected function params()
     {
         return array_slice(Registry::getInstance()->get('Route')->response(), 1);
     }
     
     protected function render($template, $variables = array())
     {
         Registry::getInstance()->set('View', new View);
         Registry::getInstance()->get('View')->render($template, $variables);
     }
 }