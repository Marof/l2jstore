<?php
# -----------------------------------------
# Define as rotas da aplicação.
# -----------------------------------------

# Definição da página inicial.
$routes['_home_'] = array('controller' => 'topservers', 'action' => 'index');

$routes['login'] = array('controller' => 'auth', 'action' => 'login');

# -----------------------------------------
# Faz o carregamento as rotas.
# -----------------------------------------
Lib\Registry::getInstance()->set('Route', new Lib\Route);
Lib\Registry::getInstance()->get('Route')->load($routes);

?>