<?php

/**
 * Classe responsável por apresentar a página inexistente.
 *
 * Responde com HTTP 404 de verdade: até aqui o site devolvia 200 em endereço
 * inexistente, o que faz o buscador indexar página de erro como se fosse
 * conteúdo.
 *
 * @author Tiago Piske
 */
abstract class ViewPageNotFound implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		self::index ();
	}

	/**
	 * Exibe a tela de página não encontrada.
	 *
	 * @return void
	 */
	private static function index() {

		if (! headers_sent ()) {
			header ( 'HTTP/1.1 404 Not Found', true, 404 );
		}

		$html = new HtmlMain ( );
		$html->setTitle ( 'Página não encontrada' );
		$html->setDescription ( 'A página que você procura não existe ou foi movida. Veja o catálogo de mudas ou fale com o viveiro pelo WhatsApp.' );
		$html->setRobots ( 'noindex, follow' );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'pageNotFound/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'TOTAL_MUDAS', Muda::total () );

		$html->docOpen ();

		$tpl->show ( 'index' );

		$html->docClose ();
	}
}

?>
