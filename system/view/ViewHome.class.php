<?php

/**
 * Classe responsável por administrar as views da home.
 *
 * @author Tiago Piske
 */
abstract class ViewHome implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( '' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // home
				self::indexHome ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página da home.
	 *
	 * @return void
	 */
	private static function indexHome() {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'home/index.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		
		$html->docOpen ();
		
		$tpl->show ( 'indexHome' );
		
		$html->docClose ();
	}

}

?>