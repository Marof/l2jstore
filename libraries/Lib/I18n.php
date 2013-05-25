<?php

 namespace Lib;
 
 Class I18n
 {
 	/**
 	 * Arquivo de armazenamento do conteúdo da tradução.
 	 * 
 	 * @var array
 	 */
     private $translation = array();
     
     /**
      * Carrega o arquivo de tradução.
      *
      * @return void
      */
     public function load($l)
     {
         # Armazena o conteúdo da tradução.
         $this->translation = $l;
     }
     
     /**
      * Faz a tradução o conteúdo passado.
      * 
      * @param  string $content Conteúdo a ser traduzido.
      * @return string          Retorna a tradução.
      */
     public function l($content)
     {   
         # Inicializa o arquivo de tradução.
         $this->load();
         
         # Exibe a tradução se encontrada.
         if (isset($this->translation[$content]))
         {
             return $this->translation[$content];
         }
     }
 }

?>