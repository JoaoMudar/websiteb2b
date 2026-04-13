<?php

/**
 * Classe responsável por administrar as views da empresa.
 *
 * @author Tiago Piske
 */
abstract class ViewEmpresa implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'empresa' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // empresa
				self::indexEmpresa ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página da empresa.
	 *
	 * @return void
	 */
	private static function indexEmpresa() {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'empresa/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		
		$html->docOpen ();
		
		$tpl->show ( 'indexEmpresa' );
		
		$html->docClose ();
	}

}

?>