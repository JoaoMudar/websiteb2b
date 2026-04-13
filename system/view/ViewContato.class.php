<?php

/**
 * Classe responsável por administrar as views do contato.
 *
 * @author Tiago Piske
 */
abstract class ViewContato implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'contato' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // contato
				self::indexContato ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página do contato.
	 *
	 * @return void
	 */
	private static function indexContato() {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'contato/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		
		$html->docOpen ();
		
		$mensagem = '';
		if ($_POST) { // se o formulário foi enviado
			$data = $_POST;
			$return = self::sendEmail ( $data ['nome'], $data ['telefone'], $data ['email'], $data ['cidade'], $data['mensagem'] );
			if ($return === true) {
				$mensagem = '<p class="form-success">Mensagem enviada com sucesso!</p>';
			} else {
				$mensagem = '<p class="form-error">Não foi possível enviar o e-mail. Tente novamente ou ligue: (47) 3534-4709.</p>';
			}
		}
		$tpl->setVar ( 'MENSAGEM', $mensagem );
		
		$tpl->show ( 'indexContato' );
		
		$html->docClose ();
	}
	
	/**
	 * Envia o email de contato.
	 *
	 * @param String $nome
	 * @param String $telefone
	 * @param String $email
	 * @param String $cidade
	 * @param String $mensagem
	 * @return boolean
	 */
	public static function sendEmail($nome, $telefone, $email, $cidade, $mensagem) {

		$objEmail = new Email ( );
		
		$objEmail->setFromMail ( $email );
		$objEmail->setFromName ( 'Viveiro Mudar' );
		$objEmail->setSubject ( "Contato Site" );
		
		$objEmail->setTo ( 'gferretti@viveiromudar.com.br' );
		$objEmail->setMessage ( self::prepareMensage ( $nome, $telefone, $email, $cidade, $mensagem ) );

		return $objEmail->sendEmail ();
	}

	/**
	 * Prepara a mensagem a ser enviada para a Empresa.
	 *
	 * @param String $nome
	 * @param String $telefone
	 * @param String $email
	 * @param String $cidade
	 * @param String $mensagem
	 * @return String
	 */
	private static function prepareMensage($nome, $telefone, $email, $cidade, $mensagem) {

		$retorno = "Uma nova mensagem de foi enviada através do contato do site. <br/>";
		
		$retorno .= 'Nome: ' . $nome . '<br/>';
		$retorno .= 'Telefone: ' . $telefone . '<br/>';
		$retorno .= 'Email: ' . $email . '<br/>';
		$retorno .= 'Cidade: ' . $cidade . '<br/>';		
		$retorno .= 'Mensagem: ' . $mensagem;
		
		return $retorno;
	}	
	
}

?>