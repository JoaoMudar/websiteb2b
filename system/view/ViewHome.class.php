<?php

/**
 * Classe responsável por administrar as views da home.
 *
 * @author Tiago Piske
 */
abstract class ViewHome implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( '' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // home
				self::indexHome ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página da home.
	 *
	 * @return void
	 */
	private static function indexHome() {

		$html = new HtmlMain ( );
		$html->setTitle ( 'Viveiro Florestal de Árvores Nativas em SC' );
		$html->setDescription ( 'Viveiro florestal em Agrolândia (SC) desde 1996. ' . count ( Muda::pesquisaAvancada ( FimPlantio::NA ) ) . ' espécies de mudas de árvores nativas para compensação florestal, PRAD e recuperação de áreas. Orçamento pelo WhatsApp.' );
		$html->setCanonical ( '' );
		$html->setWhatsappMessage ( 'Olá! Vim pelo site do Viveiro Mudar e queria falar sobre mudas nativas.', 'Falar no WhatsApp' );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'home/index.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'TOTAL_NATIVAS', count ( Muda::pesquisaAvancada ( FimPlantio::NA ) ) );

		$tpl->setVar ( 'PLACA', Seo::specPlateHtml () );

		$tpl->setVar ( 'WHATSAPP_HERO', Seo::whatsappButtonHtml (
			'Olá! Vim pelo site do Viveiro Mudar e queria falar sobre mudas nativas.',
			'Falar com o Viveiro Mudar no WhatsApp',
			'home-hero' ) );

		$tpl->setVar ( 'WHATSAPP_RODAPE', Seo::whatsappButtonHtml (
			'Olá! Vim pelo site do Viveiro Mudar e queria um orçamento de mudas nativas.',
			'Pedir orçamento no WhatsApp',
			'home-rodape',
			'wa-inline wa-inline-alt' ) );

		$tpl->setVar ( 'CIDADES', self::cidades ( $tpl ) );

		$html->docOpen ();

		$tpl->show ( 'indexHome' );

		$html->docClose ();
	}

	/**
	 * Monta a grade de cidades atendidas.
	 *
	 * @param Template $tpl
	 * @return String
	 */
	private static function cidades($tpl) {

		$linha = $tpl->get ( 'cidade' );

		$html = '<div class="city-grid">';
		foreach ( Cidade::todas () as $slug => $cidade ) {

			$nome = Cidade::nomeCompleto ( $cidade );
			$html .= sprintf ( $linha, $nome, $cidade ['resumo'], $slug, $cidade ['nome'] );
		}

		return $html . '</div>';
	}

}

?>
