<?php

/**
 * Classe responsável por apresentar a página inexistente.
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
	 * Exibe a tela de página não encontrada
	 */
	private static function index() {

		$html = new HtmlMain ( );
		
		$html->docOpen ();
		
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . "pageNotFound/index.tpl.html" );
		$tpl->setVar ( "IMAGE_PATH", _Path::getIMAGE_PATH () );
		$tpl->show ( "index" );
		
		$html->docClose ();
	}
}

?>