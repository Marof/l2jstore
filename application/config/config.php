<?php
/**
 * L2JStore - configurações.
 * 
 * @since 06/03/2013
 * @author Vagner V. B. Cantuares <vagner.cantuares@gmail.com>
 */
 
 # -----------------------------------------
 # Timezone
 # -----------------------------------------
 date_default_timezone_set('America/Sao_Paulo');

 # -----------------------------------------
 # Definindo o título da página
 # -----------------------------------------
 $config['title']            =   'L2JStore';

 # -----------------------------------------
 # Definindo a descrição da página.
 # -----------------------------------------
 $config['description']      =   'L2JStore é um sistema de loja virtual para L2J ( Lineage 2 Java ) feito em PHP.';

 # -----------------------------------------
 # Definindo a lingua padrão da aplicação.
 # -----------------------------------------
 $config['language']         =   'pt_BR';

 # -----------------------------------------
 # Habilitando e definindo o nome da pasta cache.
 # -----------------------------------------
 $config['cache']            =   false;

 # -----------------------------------------
 # Hash para codificação
 # -----------------------------------------
 $config['security_hash']    =   'a1yaYhaPFlah59151HgxyU27';

 # -----------------------------------------
 # Tempo que o jogador pode ficar ocioso.
 # -----------------------------------------
 $config['expire_session']	=   '1 hours';

 # -----------------------------------------
 # Carrega as configurações.
 # -----------------------------------------
 Lib\Config::add( $config);

 # -----------------------------------------s
 # Define os pacotes da aplicação.
 # -----------------------------------------
 $packages = array('twig');

 # -----------------------------------------
 # Carrega os pacotes da aplicação.
 # -----------------------------------------
 Lib\Package::load( $packages);

 # -----------------------------------------
 # Carrega os modulos da aplicação.
 # -----------------------------------------

?>