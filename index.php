<?php
# ------------------------------------------------------------
# Faz a inicialização da aplicação.
# ------------------------------------------------------------
require 'application/bootstrap.php';

# ------------------------------------------------------------
# Excuta as rotas da aplicação.
# ------------------------------------------------------------
Lib\Registry::getInstance()->get('Route')->run($_SERVER);

# ------------------------------------------------------------
# Despacha o conteúdo da aplicação e inicializa o controlador.
# ------------------------------------------------------------
Lib\Registry::getInstance()->set('Dispatcher', new Lib\Dispatcher);

Lib\Registry::getInstance()->set('Controller', new Lib\Controller());

try {
    Lib\Registry::getInstance()->get('Controller')->initialize(Lib\Registry::getInstance()->get('Dispatcher')->mvc());
} catch(Exception $e)
{
    echo $e->getMessage();
}

?>