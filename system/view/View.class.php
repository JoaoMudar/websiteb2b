<?php

/**
 * Classe responsável por administrar as views do sistema.
 *
 * @author Tiago Piske
 */
abstract class View implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( '' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // página incial
				ViewHome::init ();
				break;

			case (bool)preg_match ( '/^empresa\\/?$/', $area ) : // empresa
				ViewEmpresa::init ();
				break;

			case (bool)preg_match ( '/^servicos\\/?$/', $area ) : // servicos
				ViewServicos::init ();
				break;

			case (bool)preg_match ( '/^fotos\\/?$/', $area ) : // fotos
				ViewFotos::init ();
				break;

			case (bool)preg_match ( '/^fotosItapema\\/?$/', $area ) : // fotosItapema
				ViewFotos::initItapema ();
				break;

			case (bool)preg_match ( '/^links\\/?$/', $area ) : // links
				ViewLinks::init ();
				break;

			case (bool)preg_match ( '/^contato\\/?$/', $area ) : // contato
				ViewContato::init ();
				break;

			case (bool)preg_match ( '/^mudas(.)*$/', $area ) : // mudas
				ViewMudas::init ();
				break;

			default : // páginas criados pelo usuário
				ViewPageNotFound::init ();
				break;
		}
	}

}

?>