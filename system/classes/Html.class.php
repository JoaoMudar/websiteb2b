<?php

/**
 * Responsável pelo gerenciamento do layout do site
 *
 * @author Tiago Wanke Marques
 */
abstract class Html {

	/**
	 * Título padrão do projeto
	 */
	const TITLE_PADRAO = 'Seecs Sample';

	/**
	 * Keywords padrões do projeto
	 */
	const KEYWORDS = 'keywords';

	/**
	 * Descrição padrão do projeto
	 */
	const DESCRIPTION = 'Description';

	/**
	 * Instância da classe template
	 */
	protected $template;

	/**
	 * Ação do formulário padrão
	 */
	protected $action;

	/**
	 * Título da página
	 */
	protected $title;

	/**
	 * Keywords da página.
	 *
	 * @var String
	 */
	protected $keywords;

	/**
	 * Descrição da página.
	 *
	 * @var String
	 */
	protected $description;

	/**
	 * Para setar a ação do formulario
	 *
	 * @param String $action Arquivo que o action do formulario deve enviar
	 * @return void;
	 */
	function setAction($action) {

		$this->action = $action;
	}

	/**
	 * Seta o title da pagina
	 *
	 * @param String $title
	 * @return void
	 */
	public function setTitle($title) {

		$this->title = self::TITLE_PADRAO .' - '. $title;
	}

	/**
	 * Seta as keywords da página.
	 *
	 * @param String $keywords
	 * @return Boolean
	 */
	public function setKeywords($keywords) {

		if (strlen ( $this->keywords ) > 255) {
			
			throw new MyException ( 'As keywords podem possuir no maximo 255 caracteres.' );
			return false;
		}
		
		$this->keywords = $keywords;
		return true;
	}

	/**
	 * Seta a descrição da página.
	 *
	 * @param String $description
	 * @return Boolean
	 */
	public function setDescription($description) {

		$this->description = $description;
		return true;
	}

	/**
	 * Construtor
	 *
	 * @param String $file
	 * @return void
	 */
	function __construct($file = false) {

		if (! $file) {
			$file = _Path::getTEMPLATE_BAS () . "layout/html.tpl.html";
		}
		
		$this->template = new Template ( $file );
	}

	/**
	 * Adiciona um arquivo javaScript no header
	 * 
	 * @param File $jsFile
	 * @return void
	 */
	function addJsFile($jsFile) {

		$jsFile = "<script type=\"text/javascript\" src='" . $jsFile . "'></script>";
		$this->template->setVar ( "javascript", $jsFile . '[[javascript]]' );
	}

	/**
	 * Adiciona um arquivo css no header
	 * 
	 * @param String $css
	 * @return void
	 */
	function addCssFile($cssFile) {

		$cssFile = "<link rel=\"stylesheet\" href=\"" . $cssFile . "\" type=\"text/css\" media=\"screen, projection\" />";
		
		$this->template->setVar ( "css", $cssFile . '[[css]]' );
	}

	/**
	 * Adiciona um js ao onload do body
	 *
	 * @param String $command
	 * @return void
	 */
	public function addOnload($command) {

		$this->template->setVar ( "onload", $command . '; [[onload]]' );
	}

	/**
	 * Adiciona um arquivo xajax
	 *
	 * @param String $ajax
	 */
	function addAjax($ajax) {

		$this->template->setVar ( 'ajax', $ajax );
	}

}

?>