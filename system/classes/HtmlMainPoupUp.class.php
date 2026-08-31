<?php

/**
 * Apresenta o html do layout principal do site poup up.
 *
 * @author Tiago Piske
 */
class HtmlMainPoupUp extends Html implements IHtml {
	
	/**
	 * Construtor
	 *
	 * @param String $file
	 * @return void
	 */
	function __construct($file = false) {

		if (! $file) {
			$file = _Path::getTEMPLATE_BAS () . "layout/poupup.tpl.html";
		}
		
		$this->template = new Template ( $file );
	}	
	
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
	
}

?>