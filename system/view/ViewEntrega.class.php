<?php

/**
 * Páginas de entrega por cidade.
 *
 * A pesquisa de palavras-chave mostrou termos locais do Vale do Itajaí e do
 * Meio-Oeste com pouquíssima concorrência. Cada cidade tem H1, texto e mensagem
 * de WhatsApp próprios — é isso que faz a página aparecer na busca local.
 */
abstract class ViewEntrega implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'entrega' );

		if (preg_match ( '/^\\/?$/', $area )) {
			self::hub ();
			return;
		}

		if (preg_match ( '/^\\/([a-z0-9-]+)\\/?$/', $area, $partes )) {

			$cidade = Cidade::porSlug ( $partes [1] );

			if ($cidade) {
				self::cidade ( $partes [1], $cidade );
				return;
			}
		}

		ViewPageNotFound::init ();
	}

	/**
	 * Lista das cidades atendidas.
	 *
	 * @return void
	 */
	private static function hub() {

		$html = new HtmlMain ( );
		$html->setTitle ( 'Onde Entregamos — Mudas Nativas em SC, PR e RS' );
		$html->setDescription ( 'Entrega de mudas florestais nativas e exóticas com frota própria em Santa Catarina, Paraná e Rio Grande do Sul. Viveiro em Agrolândia, no Alto Vale do Itajaí.' );
		$html->setCanonical ( 'entrega' );
		$html->setWhatsappMessage ( 'Olá! Queria saber sobre entrega de mudas do Viveiro Mudar na minha cidade.', 'Falar no WhatsApp' );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'Onde entregamos', 'url' => _Path::getURL () . 'entrega' )
		) ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'entrega/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );

		$modelo = $tpl->get ( 'cidadeCard' );
		$cards = '';
		foreach ( Cidade::todas () as $slug => $cidade ) {
			$cards .= sprintf ( $modelo,
				htmlspecialchars ( Cidade::nomeCompleto ( $cidade ), ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $cidade ['resumo'], ENT_QUOTES, 'UTF-8' ),
				$slug,
				htmlspecialchars ( $cidade ['nome'], ENT_QUOTES, 'UTF-8' ) );
		}

		$tpl->setVar ( 'CIDADES', $cards );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'CTA', Seo::whatsappButtonHtml (
			'Olá! Queria saber sobre entrega de mudas do Viveiro Mudar na minha cidade.',
			'Perguntar sobre a minha cidade',
			'entrega-hub' ) );

		$html->docOpen ();
		$tpl->show ( 'hub' );
		$html->docClose ();
	}

	/**
	 * Página de uma cidade.
	 *
	 * @param String $slug
	 * @param Array $cidade
	 * @return void
	 */
	private static function cidade($slug, $cidade) {

		$nome = $cidade ['nome'];
		$nomeCompleto = Cidade::nomeCompleto ( $cidade );
		$mensagem = 'Olá! Sou de ' . $nome . ' e queria saber sobre entrega de mudas nativas do Viveiro Mudar.';
		$url = _Path::getURL () . 'entrega/' . $slug;

		$h1 = 'Mudas nativas em ' . $nomeCompleto;
		$descricao = 'Entrega de mudas de árvores nativas e exóticas em ' . $nomeCompleto . ', no ' . $cidade ['regiao'] . '. Viveiro próprio em Agrolândia/SC, frota própria e engenheiro florestal responsável.';

		$html = new HtmlMain ( );
		$html->setTitle ( 'Mudas Nativas em ' . $nomeCompleto . ' — Entrega do Viveiro Mudar', true );
		$html->setDescription ( $descricao );
		$html->setCanonical ( 'entrega/' . $slug );
		$html->setWhatsappMessage ( $mensagem, 'Falar no WhatsApp' );

		$html->addJsonLd ( Seo::serviceJsonLd (
			'Fornecimento e entrega de mudas florestais em ' . $nomeCompleto,
			$descricao, $url, $nome ) );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'Onde entregamos', 'url' => _Path::getURL () . 'entrega' ),
			array ('nome' => $nomeCompleto, 'url' => $url )
		) ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'entrega/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );

		$tpl->setVar ( 'CIDADE', htmlspecialchars ( $nomeCompleto, ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'CIDADE_NOME', htmlspecialchars ( $nome, ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'REGIAO', htmlspecialchars ( $cidade ['regiao'], ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'H1', htmlspecialchars ( $h1, ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'SUBTITULO', htmlspecialchars ( $descricao, ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'TEXTO', htmlspecialchars ( $cidade ['texto'], ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'RESUMO', htmlspecialchars ( $cidade ['resumo'], ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'TOTAL_MUDAS', Muda::total () );
		$tpl->setVar ( 'TOTAL_NATIVAS', count ( Muda::pesquisaAvancada ( FimPlantio::NA ) ) );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );

		$tpl->setVar ( 'CTA_TOPO', Seo::whatsappButtonHtml ( $mensagem, 'Pedir orçamento de entrega em ' . $nome, 'entrega-' . $slug ) );
		$tpl->setVar ( 'CTA_LATERAL', Seo::whatsappButtonHtml ( $mensagem, 'Falar no WhatsApp', 'entrega-' . $slug . '-lateral' ) );

		$modelo = $tpl->get ( 'cidadeLink' );
		$outras = '';
		foreach ( Cidade::todas () as $outroSlug => $outra ) {

			if ($outroSlug == $slug) {
				continue;
			}

			$outras .= sprintf ( $modelo,
				$outroSlug,
				htmlspecialchars ( $outra ['nome'], ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $outra ['regiao'], ENT_QUOTES, 'UTF-8' ) );
		}
		$tpl->setVar ( 'OUTRAS_CIDADES', $outras );

		$html->docOpen ();
		$tpl->show ( 'cidade' );
		$html->docClose ();
	}

}

?>
