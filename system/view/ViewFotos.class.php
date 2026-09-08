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
		$html->setTitle ( 'Fotos do Viveiro em Agrolândia/SC' );
		$html->setDescription ( 'Fotos das instalações do Viveiro Florestal Mudar, em Agrolândia/SC, e das espécies de árvores nativas que produzimos desde 1996.' );
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
		$tpl->setVar ( 'GALERIA', self::galeria ( 'agrolandia' ) );

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
		$html->setTitle ( 'Unidade de Itapema/SC' );
		$html->setDescription ( 'Unidade do Viveiro Florestal Mudar em Itapema, Santa Catarina: mudas maiores para praças, parques, ruas e jardins.' );
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
		$tpl->setVar ( 'GALERIA', self::galeria ( 'itapema' ) );

		$html->docOpen ();

		$tpl->show ( 'indexFotosItapema' );
		
		$html->docClose ();
	}

	/**
	 * Grade de fotos de uma unidade, mais o lightbox quando ele tem serventia.
	 *
	 * Os blocos moram num parcial próprio (fotos/galeria.tpl.html) porque as duas
	 * páginas usam os mesmos; duplicá-los nos dois arquivos garantiria que um dia
	 * só um dos dois fosse corrigido.
	 *
	 * Devolve vazio quando a unidade não tem foto: melhor a página sem grade do
	 * que uma moldura vazia.
	 *
	 * @param String $unidade
	 * @return String
	 */
	private static function galeria($unidade) {

		$fotos = Galeria::porUnidade ( $unidade );

		if (! $fotos) {
			return '';
		}

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'fotos/galeria.tpl.html' );

		$itens = '';

		foreach ( $fotos as $foto ) {

			$url = htmlspecialchars ( $foto ['url'], ENT_QUOTES, 'UTF-8' );
			$thumb = htmlspecialchars ( $foto ['thumb'], ENT_QUOTES, 'UTF-8' );
			$alt = htmlspecialchars ( $foto ['alt'], ENT_QUOTES, 'UTF-8' );
			$legenda = htmlspecialchars ( $foto ['legenda'], ENT_QUOTES, 'UTF-8' );

			// Só vira link de ampliação a foto que tem o que ampliar.
			if ($foto ['ampliavel']) {

				$itens .= sprintf ( $tpl->get ( 'itemAmpliavel' ),
					$url, $legenda, $foto ['largura'], $legenda,
					$thumb, $alt, $foto ['largura'], $foto ['altura'],
					$legenda );

			} else {

				$itens .= sprintf ( $tpl->get ( 'item' ),
					$thumb, $alt, $foto ['largura'], $foto ['altura'],
					$legenda );
			}
		}

		$html = sprintf ( $tpl->get ( 'grade' ), $itens );

		// Sem foto ampliável, o lightbox e o script dele não vão ao navegador.
		if (Galeria::temAmpliavel ( $unidade )) {
			$html .= $tpl->get ( 'lightbox' );
		}

		return $html;
	}

}

?>