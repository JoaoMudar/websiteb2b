<?php

/**
 * Classe responsável por administrar as views dos links.
 *
 * @author Tiago Piske
 */
abstract class ViewLinks implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'links' );
		switch (true) {

			case (bool)preg_match ( '/^\/?$/', $area ) :
				self::indexLinks ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página de links úteis do setor florestal.
	 *
	 * @return void
	 */
	private static function indexLinks() {

		$mensagem = 'Olá! Vim pelo site do Viveiro Mudar e queria falar sobre mudas nativas.';

		$html = new HtmlMain ( );
		$html->setTitle ( 'Links Úteis do Setor Florestal e Ambiental' );
		$html->setDescription ( 'Órgãos, institutos e associações do setor florestal e ambiental brasileiro — IBAMA, Embrapa Florestas, IPEF, FSC Brasil e outras referências técnicas.' );
		$html->setCanonical ( 'links' );
		$html->setWhatsappMessage ( $mensagem, 'Falar no WhatsApp' );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'Links úteis', 'url' => _Path::getURL () . 'links' )
		) ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'links/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH () );
		$tpl->setVar ( 'TOTAL_MUDAS', Muda::total () );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'CTA', Seo::whatsappButtonHtml ( $mensagem, 'Falar no WhatsApp', 'links' ) );
		$tpl->setVar ( 'CTA_LATERAL', Seo::whatsappButtonHtml ( $mensagem, 'Falar no WhatsApp', 'links-lateral' ) );

		$html->docOpen ();

		$tpl->show ( 'indexLinks' );

		$html->docClose ();
	}

}

?>
