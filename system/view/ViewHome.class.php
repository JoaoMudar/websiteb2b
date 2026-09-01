<?php

/**
 * Classe responsável por administrar as views da home.
 *
 * @author Tiago Piske
 */
abstract class ViewHome implements IView {

	/**
	 * Espécies plotadas na régua do hero: nativas reconhecíveis, em ordem
	 * crescente de porte, do ipê-amarelo à araucária.
	 */
	private static $especiesDoHero = array (83, 87, 8, 31, 82, 121 );

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
		$html->setTitle ( 'Viveiro Florestal de Árvores Nativas em SC | Viveiro Mudar', true );
		$html->setDescription ( 'Viveiro florestal em Agrolândia (SC) desde 1996. ' . Muda::total () . ' espécies de mudas nativas e exóticas para reflorestamento, compensação florestal e arborização. Orçamento pelo WhatsApp.' );
		$html->setCanonical ( '' );
		$html->setWhatsappMessage ( 'Olá! Vim pelo site do Viveiro Mudar e queria falar sobre mudas nativas.', 'Falar no WhatsApp' );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'home/index.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'TOTAL_MUDAS', Muda::total () );

		$mudasDoHero = array ();
		foreach ( self::$especiesDoHero as $id ) {
			$muda = new Muda ( $id );
			if ($muda->existe ()) {
				$mudasDoHero [] = $muda;
			}
		}
		$tpl->setVar ( 'PORTE_CHART', Porte::chart ( $mudasDoHero ) );

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
