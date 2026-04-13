<?php

/**
 * Utilizada para o manipulamento de templates
 * 
 * @author Tiago Piske
 */
class Template {
	
	/**
	 * Código html do template
	 *
	 * @var String
	 */
	private $template;
	
	/** 
	 * Construtor 
	 * 
	 * @param String $file
	 * @return void
	 */
	public function __construct($file = "") {
		
		$this->loadTemplate ( $file );
	}
	
	/**
	 * Para setar a string que contem o template
	 * 
	 * @param String $file
	 * @return void
	 */
	public function loadTemplate($file = "") {
		
		if (empty ( $file )) {
			die ( "Not define file to template." );
		} else {
			if (! file_exists ( $file )) {
				die ( "File $file do not exist!" );
			} else {
				$handle = fopen ( $file, "r" );
				$this->template = fread ( $handle, filesize ( $file ) );
				fclose ( $handle );
			} // else
		} // else    	
	}
	
	/**
	 * Para setar qualquer variavel do template 
	 *
	 * @param String $var
	 * @param String $value
	 * @return void
	 */
	public function setVar($var, $value) {
		
		settype ( $value, 'string' ); // precisa transformar em string
		

		$this->template = str_replace ( '[[' . $var . ']]', $value, $this->template );
	}
	
	/** 
	 * Mostra o codigo html 
	 *
	 * @param String $ident
	 * @return vodid
	 */
	public function show($ident = false) {
		if ($ident) {
			$begin = "*=>" . $ident;
			$end = "<=*";
			$temp = substr ( $this->template, strpos ( $this->template, $begin ) + strlen ( $begin ) );
			$temp = substr ( $temp, 0, strpos ( $temp, $end ) );
			echo $temp;
		} else {
			echo $this->template;
		} // else
	}
	
	/**
	 * Retorna o código html
	 *
	 * @param String $ident
	 * @return String
	 */
	public function get($ident = false) {
		
		if ($ident) {
			$begin = "*=>" . $ident;
			$end = "<=*";
			$temp = substr ( $this->template, strpos ( $this->template, $begin ) + strlen ( $begin ) );
			$temp = substr ( $temp, 0, strpos ( $temp, $end ) );
			return $temp;
		} else {
			return $this->template;
		} // else
	}

}

?>