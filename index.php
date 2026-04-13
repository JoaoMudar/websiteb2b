<?php
/**
 * Este arquivo carrega o arquivo de configuração de acordo com o nome do cliente encontrado na URL.
 * 
 * @author Tiago Wanke Marques
 */

header ( 'Content-Type: text/html; charset=utf-8' );

error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_DEPRECATED);

require_once ('system/classes/_Path.class.php');


View::init ();
?>
