<?php

 namespace Controller;

 Class Topservers extends \Lib\Controller
 {
    /**
     * Informações do top.
     * 
     * @var array
     */
     private $top = array();
     
     /**
      * Horas de espera do voto.
      * 
      * @var integer
      */
     private $hours = 24;
     
     /**
      * Geolocalização do jogador.
      * 
      * @var array
      */
     private $locaotion = array();

     /**
      * Nome da conta do jogador.
      * 
      * @var string
      */
     private $account = 'Fulano';
     
     public function index()
     {
         $this->render('index.html');
     }
     
     public function L2JBrasil()
     {
         
     }
     
     /**
      * Pega as informações de geolocalização do jogador.
      * 
      * @return array Retorna uma lista de informações do jogador.
      */
     private function get_location()
     {
         $this->locaotion = json_decode(file_get_contents('http://ip-api.com/json'), true);
     }
 }

?>