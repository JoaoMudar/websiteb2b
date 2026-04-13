<?php

/**
 * Classe responsável por administrar as views dos links.
 *
 * @author Tiago Piske
 */
abstract class ViewLinks implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'links' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // fotos index
				self::indexLinks ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página ds links.
	 *
	 * @return void
	 */
	private static function indexLinks() {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'links/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		
		$html->docOpen ();
		
		$tpl->show ( 'indexLinks' );
		
		$html->docClose ();
	}
	
}

?>