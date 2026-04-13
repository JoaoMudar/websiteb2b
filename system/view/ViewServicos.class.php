<?php

/**
 * Classe responsável por administrar as views de serviços.
 *
 * @author Tiago Piske
 */
abstract class ViewServicos implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'servicos' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // servicos
				self::indexServicos ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página de servicos.
	 *
	 * @return void
	 */
	private static function indexServicos() {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'servicos/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		
		$html->docOpen ();
		
		$tpl->show ( 'indexServicos' );
		
		$html->docClose ();
	}

}

?>