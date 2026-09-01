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

			case (bool)preg_match ( '/^\\/?$/', $area ) : // página inicial
				ViewHome::init ();
				break;

			case (bool)preg_match ( '/^empresa\\/?$/', $area ) : // empresa
				ViewEmpresa::init ();
				break;

			case (bool)preg_match ( '/^compensacao-florestal-e-prad\\/?$/', $area ) : // compensação e PRAD
				ViewSolucao::init ( 'compensacao-florestal-e-prad' );
				break;

			case (bool)preg_match ( '/^recuperacao-de-mata-ciliar\\/?$/', $area ) : // mata ciliar
				ViewSolucao::init ( 'recuperacao-de-mata-ciliar' );
				break;

			case (bool)preg_match ( '/^entrega(\\/.*)?$/', $area ) : // entrega por cidade
				ViewEntrega::init ();
				break;

			case (bool)preg_match ( '/^perguntas-frequentes\\/?$/', $area ) : // FAQ
				ViewFaq::init ();
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

			case (bool)preg_match ( '/^mudas(\\/.*)?$/', $area ) : // catálogo e espécies
				ViewMudas::init ();
				break;

			case (bool)preg_match ( '/^sitemap\\.xml$/', $area ) : // sitemap
				ViewSitemap::init ();
				break;

			// URLs de serviços que o viveiro deixou de prestar. Hoje só fornecemos
			// mudas, então as duas caem no catálogo, que é a página que atende a
			// intenção que sobrou.
			case (bool)preg_match ( '/^(servicos|arborizacao-urbana)\\/?$/', $area ) :
				header ( 'Location: ' . _Path::getURL () . 'mudas', true, 301 );
				exit ();

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

}

?>
