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
		
		if (strlen ( $this->title ) == 0) {
			
			$this->template->setVar ( "TITLE", parent::TITLE_PADRAO );
		} else {
			
			$this->template->setVar ( "TITLE", $this->title );
		}
		
		if (! $this->keywords) {
			
			$this->template->setVar ( 'KEYWORDS', parent::KEYWORDS );
		} else {
			
			$this->template->setVar ( 'KEYWORDS', $this->keywords );
		}
		
		if (! $this->description) {
			
			$this->template->setVar ( 'DESCRIPTION', parent::DESCRIPTION );
		} else {
			
			$this->template->setVar ( 'DESCRIPTION', $this->description );
		}
		
		$this->template->setVar ( "CSS_PATH", _Path::getCSS_PATH () );
		$this->template->setVar ( "JS_PATH", _Path::getJS_PATH () );
		$this->template->setVar ( "URL_PATH", _Path::getURL_PATH () );
		$this->template->setVar ( "UPLOAD_BAS", _Path::getUPLOAD_BAS () );
		$this->template->setVar ( "URL_BAS", _Path::getURL_BAS () );
		$this->template->setVar ( "IMAGE_PATH", _Path::getIMAGE_PATH () );
		
		$this->template->setVar ( 'css', '' );
		$this->template->setVar ( 'javascript', '' );
		
		$this->menu();
		
		$this->template->show ( "docOpen" );
	}
	
	/**
	 * Mostra o rodapé da pagina
	 *
	 * @return void
	 */
	public function docClose() {
		
		$this->template->show ( "docClose" );
	}
	
	/**
	 * Apresenta o menu para o usuário
	 * 
	 * @return void
	 */
	public function menu() {
		//Verifica o menu selecionado e seta ele como currente
		$area = _Formatting::returnAccessedArea ( '' );
		
		switch (true) {
			case (bool)preg_match ( '/^\\/?$/', $area ) : // página incial
				$this->template->setVar('CURRENT_HOME', 'id="current"');
				break;

			case (bool)preg_match ( '/^empresa\\/?$/', $area ) : // empresa
				$this->template->setVar('CURRENT_EMPRESA', 'id="current"');
				break;

			case (bool)preg_match ( '/^servicos\\/?$/', $area ) : // servicos
				$this->template->setVar('CURRENT_SERVICOS', 'id="current"');
				break;

			case (bool)preg_match ( '/^fotos\\/?$/', $area ) : // fotos
				$this->template->setVar('CURRENT_FOTOS', 'id="current"');
				break;

			case (bool)preg_match ( '/^links\\/?$/', $area ) : // links
				$this->template->setVar('CURRENT_LINKS', 'id="current"');
				break;

			case (bool)preg_match ( '/^contato\\/?$/', $area ) : // contato
				$this->template->setVar('CURRENT_CONTATO', 'id="current"');
				break;

			case (bool)preg_match ( '/^mudas\\/?$/', $area ) : // mudas e embalagens
				$this->template->setVar('CURRENT_MUDAS', 'id="current"');
				break;
		}
		$this->template->setVar('CURRENT_HOME', '');
		$this->template->setVar('CURRENT_EMPRESA', '');
		$this->template->setVar('CURRENT_SERVICOS', '');
		$this->template->setVar('CURRENT_FOTOS', '');
		$this->template->setVar('CURRENT_LINKS', '');
		$this->template->setVar('CURRENT_CONTATO', '');
		$this->template->setVar('CURRENT_MUDAS', '');

		$this->template->setVar('MENU', $this->template->get('menu'));
	}
	
}

?>