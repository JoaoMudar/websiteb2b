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
		
		$this->setVarsCabecalho ();
		
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