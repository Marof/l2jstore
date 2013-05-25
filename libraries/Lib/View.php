<?php

 namespace Lib;
 
 Class View
 {
     public function render($view, $variables = array())
     {
         # despacho.
         $dispatcher = Registry::getInstance()->get('Dispatcher')->mvc();
         
         # Diretório do template.
         $templatr_dir = APPDIR . DS . 'mvc' . DS . 'view';
         
         # Diretório do cache.
         $cache_dir = APPDIR . DS . 'mvc' . DS . 'view' . DS . Config::get('cache');      
         
         # Registra e instância os objetos do template.
         Registry::getInstance()->set('TwigLoaderFilesystem', new \Twig_Loader_Filesystem($templatr_dir));
         Registry::getInstance()->set('TwigEnvironment', new \Twig_Environment(Registry::getInstance()->get('TwigLoaderFilesystem'), array('cache' => (Config::get('cache') ? $cache_dir : Config::get('cache')))));
         
         $_variables = array(
            'content' 		=> $dispatcher['controller'] . DS . $view,
            'title' 		=> Config::get('title'),
            'description'	=> Config::get('description')
         );
         
         # Renderiza a view.
         echo Registry::getInstance()->get('TwigEnvironment')->render('layout/index.html', array_merge($_variables, $variables));
     }
 }


?>