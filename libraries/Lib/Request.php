<?php

 namespace Lib;
 
 class Request {
 
 	public static function is($method) {
 		switch ($method) {
			 case 'get':
				 if ($_SERVER['REQUEST_METHOD'] == strtoupper($method))
				 	return TRUE;
				 break;
			 case 'post':
				 if ($_SERVER['REQUEST_METHOD'] == strtoupper($method))
				 	return TRUE;
				 break;
			 case 'ajax':
				 if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
				 	return TRUE;
				 break;
		 }
		
		return FALSE;
 	}
	
 }
