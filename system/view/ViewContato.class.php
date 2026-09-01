<?php

/**
 * Classe responsável por administrar as views do contato.
 *
 * O formulário continua existindo, mas em segundo plano: o canal de conversão
 * do site é o WhatsApp, que responde mais rápido e já chega qualificado.
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

		$mensagem = 'Olá! Vim pela página de contato do site e queria um orçamento de mudas.';

		$html = new HtmlMain ( );
		$html->setTitle ( 'Contato e Orçamento — Viveiro Florestal em Agrolândia/SC' );
		$html->setDescription ( 'Fale com o Viveiro Florestal Mudar: WhatsApp +55 47 98433-7854, Rua Wilhelm Doering, 300, Agrolândia/SC. Orçamento de mudas nativas para todo o Sul do Brasil.' );
		$html->setCanonical ( 'contato' );
		$html->setWhatsappMessage ( $mensagem, 'Falar no WhatsApp' );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'Contato', 'url' => _Path::getURL () . 'contato' )
		) ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'contato/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'CTA', Seo::whatsappButtonHtml ( $mensagem, 'Falar no WhatsApp agora', 'contato' ) );

		$html->docOpen ();

		$aviso = '';
		if ($_POST) { // se o formulário foi enviado

			$data = $_POST;
			$retorno = self::sendEmail (
				isset ( $data ['nome'] ) ? $data ['nome'] : '',
				isset ( $data ['telefone'] ) ? $data ['telefone'] : '',
				isset ( $data ['email'] ) ? $data ['email'] : '',
				isset ( $data ['cidade'] ) ? $data ['cidade'] : '',
				isset ( $data ['mensagem'] ) ? $data ['mensagem'] : '' );

			if ($retorno === true) {
				$aviso = '<p class="form-success">Mensagem enviada. Respondemos em breve.</p>';
			} else {
				$aviso = '<p class="form-error">Não foi possível enviar a mensagem. Chame no WhatsApp ou ligue para ' . Seo::TELEFONE . '.</p>';
			}
		}
		$tpl->setVar ( 'MENSAGEM', $aviso );

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

		$objEmail->setTo ( Seo::EMAIL );
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

		$retorno = "Uma nova mensagem foi enviada através do contato do site. <br/>";

		$retorno .= 'Nome: ' . htmlspecialchars ( $nome, ENT_QUOTES, 'UTF-8' ) . '<br/>';
		$retorno .= 'Telefone: ' . htmlspecialchars ( $telefone, ENT_QUOTES, 'UTF-8' ) . '<br/>';
		$retorno .= 'Email: ' . htmlspecialchars ( $email, ENT_QUOTES, 'UTF-8' ) . '<br/>';
		$retorno .= 'Cidade: ' . htmlspecialchars ( $cidade, ENT_QUOTES, 'UTF-8' ) . '<br/>';
		$retorno .= 'Mensagem: ' . nl2br ( htmlspecialchars ( $mensagem, ENT_QUOTES, 'UTF-8' ) );

		return $retorno;
	}

}

?>
