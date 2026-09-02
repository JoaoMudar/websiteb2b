<?php

/**
 * Classe responsável por administrar as views da Fotos.
 *
 * @author Tiago Piske
 */
abstract class ViewFotos implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'fotos' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // fotos index
				self::indexFotos ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	public static function initItapema() {

		$area = _Formatting::returnAccessedArea ( 'fotosItapema' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // fotos index
				self::indexFotosItapema ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página da galeria de fotos.
	 *
	 * @return void
	 */
	private static function indexFotos() {

		$mensagem = 'Olá! Vi a galeria de fotos do site e queria falar sobre mudas.';

		$html = new HtmlMain ( );
		$html->setTitle ( 'Galeria de Fotos do Viveiro - Agrolândia e Itapema/SC' );
		$html->setDescription ( 'Fotos das instalações do Viveiro Florestal Mudar, das espécies produzidas e dos projetos florestais executados no Sul do Brasil desde 1996.' );
		$html->setCanonical ( 'fotos' );
		$html->setWhatsappMessage ( $mensagem, 'Falar no WhatsApp' );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'Galeria de fotos', 'url' => _Path::getURL () . 'fotos' )
		) ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'fotos/index.tpl.html' );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'CTA', Seo::whatsappButtonHtml ( $mensagem, 'Falar no WhatsApp', 'fotos' ) );
		$tpl->setVar ( 'TOTAL_MUDAS', Muda::total () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH() );
		$tpl->setVar ( 'CSS_PATH', _Path::getCSS_PATH() );
		
		$html->docOpen ();
		
		$tpl->show ( 'indexFotos' );
		
		$html->docClose ();
	}
	
	
		/**
	 * Apresenta a página da galeria de fotos.
	 * 
	 * @return void
	 */
	private static function indexFotosItapema() {

		$mensagem = 'Olá! Vi a galeria do viveiro de Itapema e queria falar sobre mudas.';

		$html = new HtmlMain ( );
		$html->setTitle ( 'Galeria do Viveiro de Itapema/SC' );
		$html->setDescription ( 'Fotos da área de produção e estoque do Viveiro Florestal Mudar em Itapema, Santa Catarina.' );
		$html->setCanonical ( 'fotosItapema' );
		// Página órfã, de endereço legado: fica fora do índice para não competir
		// com /fotos, mas os links dela continuam sendo seguidos.
		$html->setRobots ( 'noindex, follow' );
		$html->setWhatsappMessage ( $mensagem, 'Falar no WhatsApp' );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'fotos/indexItapema.tpl.html' );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'CTA', Seo::whatsappButtonHtml ( $mensagem, 'Falar no WhatsApp', 'fotos-itapema' ) );
		$tpl->setVar ( 'TOTAL_MUDAS', Muda::total () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH() );
		$tpl->setVar ( 'CSS_PATH', _Path::getCSS_PATH() );
		
		$html->docOpen ();
		
		$tpl->show ( 'indexFotosItapema' );
		
		$html->docClose ();
	}
	
}

?>