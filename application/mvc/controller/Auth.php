<?php


 namespace Controller;
 
 Class Auth extends \Lib\Controller
 {
     public function login()
     {
         $this->render('login.html');
     }
 }