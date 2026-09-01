<?php

/**
 * Apresenta o html do layout principal do site.
 *
 * @author Tiago Wanke Marques
 */
class HtmlMain extends Html implements IHtml {

	/**
	 * Monta o cabecalho do layout
	 *
	 * @param $xajax - Se utilizado xajax, o objeto xajax deve ser passado como parametro
	 * @return void
	 */
	public function docOpen($xajax = false) {

		$this->setVarsCabecalho ();

		$this->menu ();

		$this->template->show ( "docOpen" );
	}

	/**
	 * Mostra o rodapé da pagina
	 *
	 * @return void
	 */
	public function docClose() {

		$this->template->setVar ( 'ANO', date ( 'Y' ) );
		$this->template->setVar ( 'TOTAL_MUDAS', Muda::total () );
		$this->template->show ( "docClose" );
	}

	/**
	 * Apresenta o menu para o usuário
	 *
	 * @return void
	 */
	public function menu() {

		// Marca como atual o item correspondente à área acessada.
		// A primeira atribuição vence: depois dela o marcador já não existe mais
		// no template, e as limpezas abaixo só apagam os itens não escolhidos.
		$area = _Formatting::returnAccessedArea ( '' );

		switch (true) {
			case (bool)preg_match ( '/^\\/?$/', $area ) : // página incial
				$this->template->setVar('CURRENT_HOME', 'aria-current="page"');
				break;

			case (bool)preg_match ( '/^empresa\\/?$/', $area ) : // empresa
				$this->template->setVar('CURRENT_EMPRESA', 'aria-current="page"');
				break;

			case (bool)preg_match ( '/^(servicos|recuperacao-de-mata-ciliar|arborizacao-urbana)\\/?$/', $area ) : // serviços
				$this->template->setVar('CURRENT_SERVICOS', 'aria-current="page"');
				break;

			case (bool)preg_match ( '/^compensacao-florestal-e-prad\\/?$/', $area ) : // compensação
				$this->template->setVar('CURRENT_PRAD', 'aria-current="page"');
				break;

			case (bool)preg_match ( '/^fotos\\/?$/', $area ) : // fotos
				$this->template->setVar('CURRENT_FOTOS', 'aria-current="page"');
				break;

			case (bool)preg_match ( '/^links\\/?$/', $area ) : // links
				$this->template->setVar('CURRENT_LINKS', 'aria-current="page"');
				break;

			case (bool)preg_match ( '/^(contato|entrega)(\\/.*)?$/', $area ) : // contato e entrega
				$this->template->setVar('CURRENT_CONTATO', 'aria-current="page"');
				break;

			case (bool)preg_match ( '/^mudas(\\/.*)?$/', $area ) : // catálogo e espécies
				$this->template->setVar('CURRENT_MUDAS', 'aria-current="page"');
				break;
		}

		$this->template->setVar('CURRENT_HOME', '');
		$this->template->setVar('CURRENT_EMPRESA', '');
		$this->template->setVar('CURRENT_SERVICOS', '');
		$this->template->setVar('CURRENT_PRAD', '');
		$this->template->setVar('CURRENT_FOTOS', '');
		$this->template->setVar('CURRENT_LINKS', '');
		$this->template->setVar('CURRENT_CONTATO', '');
		$this->template->setVar('CURRENT_MUDAS', '');

		$this->template->setVar('MENU', $this->template->get('menu'));
	}

}

?>
