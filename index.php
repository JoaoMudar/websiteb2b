<?php
/**
 * Este arquivo carrega o arquivo de configuração de acordo com o nome do cliente encontrado na URL.
 * 
 * @author Tiago Wanke Marques
 */

header ( 'Content-Type: text/html; charset=utf-8' );

error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_DEPRECATED);

/**
 * Erro fatal não pode sair com status 200: o Google lê a página quebrada como
 * saudável e a mantém no índice. Converte o fatal em 500 enquanto a resposta
 * ainda não começou a ser enviada.
 */
function erroFatalVira500() {

	$erro = error_get_last ();

	if (! $erro || headers_sent ()) {
		return;
	}

	$fatais = array (E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR );

	if (in_array ( $erro ['type'], $fatais, true )) {
		http_response_code ( 500 );
	}
}

register_shutdown_function ( 'erroFatalVira500' );

require_once ('system/classes/_Path.class.php');


View::init ();
?>
