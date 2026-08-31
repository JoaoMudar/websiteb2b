<?php

/**
 * Classe responsável por administrar as views da Fotos.
 *
 * @author Tiago Piske
 */
abstract class ViewFotos implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'fotos' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // fotos index
				self::indexFotos ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	public static function initItapema() {

		$area = _Formatting::returnAccessedArea ( 'fotosItapema' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // fotos index
				self::indexFotosItapema ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página da galeria de fotos.
	 *
	 * @return void
	 */
	private static function indexFotos() {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'fotos/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH() );
		$tpl->setVar ( 'CSS_PATH', _Path::getCSS_PATH() );
		
		$html->docOpen ();
		
		$tpl->show ( 'indexFotos' );
		
		$html->docClose ();
	}
	
	
		/**
	 * Apresenta a página da galeria de fotos.
	 * 
	 * @return void
	 */
	private static function indexFotosItapema() {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'fotos/indexItapema.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH() );
		$tpl->setVar ( 'CSS_PATH', _Path::getCSS_PATH() );
		
		$html->docOpen ();
		
		$tpl->show ( 'indexFotosItapema' );
		
		$html->docClose ();
	}
	
}

?>