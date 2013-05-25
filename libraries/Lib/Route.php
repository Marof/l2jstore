<?php
/**
 * Classe de gerenciamento de rotas.
 *
 * @author Vagner V. B. Cantuares <vagner.cantuares@gmail.com>
 * @copyright DiFerePHP - 2013
 */
 
 namespace Lib;
 
 Class Route
 {
     protected $routes = array();
     
     protected $response;
     
     public function run($server)
     {
         # Se a aplicação está em um subdiretório em seu servidor web, então grava o nome da pasta, se não retorna nulo.
         $main_path = substr(dirname($server['PHP_SELF']), 1) ? substr(dirname($server['PHP_SELF']), 1) : null;
         
         # Logo em seguida, uma série de tratamentos na requisição é feita, separa os dados entre "barras", limpa as posições vazias
         # e reordena as valores iniciando da posição zero novamente.
         $this->response = array_values(array_filter(explode('/', str_replace($main_path, null, $server['REQUEST_URI']))));
     }
     
     public function load($routes)
     {
         $this->routes = $routes;
     }
     
     public function routes()
     {
         return $this->routes;
     }
     
     public function response()
     {
         return $this->response;
     }
 }

?>