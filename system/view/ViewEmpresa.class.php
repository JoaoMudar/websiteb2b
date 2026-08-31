<?php

/**
 * Classe responsável por administrar as views da empresa.
 *
 * @author Tiago Piske
 */
abstract class ViewEmpresa implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'empresa' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // empresa
				self::indexEmpresa ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página da empresa.
	 *
	 * @return void
	 */
	private static function indexEmpresa() {

		$mensagem = 'Olá! Vim pela página da empresa no site e queria falar sobre mudas.';

		$html = new HtmlMain ( );
		$html->setTitle ( 'A Empresa — Viveiro Florestal desde 1996 em Agrolândia/SC' );
		$html->setDescription ( 'Viveiro Florestal Mudar: 9 hectares em Agrolândia e Itapema (SC), 500 mil mudas por ano, ' . Muda::total () . ' espécies e engenheiro florestal responsável desde 1996.' );
		$html->setCanonical ( 'empresa' );
		$html->setWhatsappMessage ( $mensagem, 'Falar no WhatsApp' );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'A empresa', 'url' => _Path::getURL () . 'empresa' )
		) ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'empresa/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'TOTAL_MUDAS', Muda::total () );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'CTA', Seo::whatsappButtonHtml ( $mensagem, 'Falar com o Viveiro Mudar', 'empresa' ) );
		$tpl->setVar ( 'CTA_LATERAL', Seo::whatsappButtonHtml ( $mensagem, 'Falar no WhatsApp', 'empresa-lateral' ) );

		$html->docOpen ();

		$tpl->show ( 'indexEmpresa' );

		$html->docClose ();
	}

}

?>
