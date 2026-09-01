<?php

/**
 * Fonte única dos dados públicos da empresa (NAP), dos links de conversão e dos
 * blocos de dados estruturados.
 *
 * Nome, endereço e telefone precisam ser byte a byte iguais em todas as páginas
 * e no Perfil do Google — buscador e LLM usam essa repetição para confirmar que
 * as páginas falam da mesma empresa. Por isso tudo mora aqui, e nenhum template
 * escreve endereço ou telefone na mão.
 */
abstract class Seo {

	/* ---------------- Identidade ---------------- */

	const NOME = 'Viveiro Florestal Mudar';
	const NOME_CURTO = 'Viveiro Mudar';
	const FUNDACAO = '1996';

	/* ---------------- Contato ---------------- */

	const TELEFONE = '+55 47 98433-7854';
	const TELEFONE_E164 = '+5547984337854';
	const WHATSAPP = '5547984337854';
	const EMAIL = 'gferretti@viveiromudar.com.br';

	/* ---------------- Endereço ---------------- */

	const LOGRADOURO = 'Rua Wilhelm Doering, 300';
	const BAIRRO = 'Centro';
	const CIDADE = 'Agrolândia';
	const UF = 'SC';
	const CEP = '88420-000';
	const PAIS = 'BR';

	/**
	 * Coordenadas aproximadas do viveiro sede (centro de Agrolândia).
	 * Conferir no Google Maps e ajustar para o ponto exato do portão.
	 */
	const LATITUDE = '-27.4108';
	const LONGITUDE = '-49.8225';

	/* ---------------- Prova técnica ---------------- */

	const RESPONSAVEL_TECNICO = 'Gilberto Ferretti';
	const CREA = 'CREA/SC 35178-8';

	/**
	 * Registro no RENASEM. Enquanto estiver vazio a placa de especificação
	 * simplesmente não exibe o item — melhor omitir do que publicar um número
	 * que não confere.
	 */
	const RENASEM = '';

	const MUDAS_POR_ANO = '500.000';
	const AREA_HECTARES = '9';

	/* ---------------- Perfis externos ---------------- */

	/** Perfil do Google, Instagram etc. Alimentam o sameAs do JSON-LD. */
	public static function perfis() {

		return array_values ( array_filter ( array (
			'', // https://www.google.com/maps/place/...
			'', // https://www.instagram.com/...
		) ) );
	}

	/* ---------------- Analytics ---------------- */

	/** Measurement ID do GA4 (G-XXXXXXXXXX). Vazio desliga o rastreamento. */
	const GA4_ID = '';

	/* ------------------------------------------------------------------ *
	 * Conversão
	 * ------------------------------------------------------------------ */

	/**
	 * Mensagem padrão do WhatsApp, para páginas que não definem a sua.
	 */
	const WHATSAPP_MENSAGEM_PADRAO = 'Olá! Vim pelo site do Viveiro Mudar e queria saber mais sobre as mudas nativas.';

	/**
	 * Monta o link do WhatsApp já com a mensagem preenchida.
	 *
	 * @param String $mensagem
	 * @return String
	 */
	public static function whatsappUrl($mensagem = '') {

		if (! $mensagem) {
			$mensagem = self::WHATSAPP_MENSAGEM_PADRAO;
		}

		return 'https://wa.me/' . self::WHATSAPP . '?text=' . rawurlencode ( $mensagem );
	}

	/**
	 * Endereço em uma linha, do jeito que aparece na placa e no rodapé.
	 *
	 * @return String
	 */
	public static function enderecoLinha() {

		return self::LOGRADOURO . ' — ' . self::BAIRRO . ', ' . self::CIDADE . '/' . self::UF . ' — CEP ' . self::CEP;
	}

	/* ------------------------------------------------------------------ *
	 * Dados estruturados
	 * ------------------------------------------------------------------ */

	/**
	 * Serializa um schema como bloco <script type="application/ld+json">.
	 *
	 * As barras seguem escapadas (sem JSON_UNESCAPED_SLASHES) de propósito:
	 * é o que impede que um "</script>" dentro de um texto encerre o bloco.
	 *
	 * @param Array $schema
	 * @return String
	 */
	public static function jsonLdTag($schema) {

		$json = json_encode ( $schema, JSON_UNESCAPED_UNICODE );

		return '<script type="application/ld+json">' . $json . '</script>';
	}

	/**
	 * A empresa. Vai em todas as páginas.
	 *
	 * @return Array
	 */
	public static function organizationJsonLd() {

		$schema = array (
			'@context' => 'https://schema.org',
			'@type' => array ('LocalBusiness', 'Store' ),
			'@id' => _Path::getURL () . '#empresa',
			'name' => self::NOME,
			'alternateName' => self::NOME_CURTO,
			'url' => _Path::getURL (),
			'telephone' => self::TELEFONE_E164,
			'email' => self::EMAIL,
			'foundingDate' => self::FUNDACAO,
			'description' => 'Viveiro florestal em Agrolândia (SC) especializado na produção de mudas de árvores nativas para compensação florestal, PRAD, recuperação de área degradada e recomposição de mata ciliar.',
			'image' => _Path::getIMAGE_PATH () . 'pictures/DSC07748.jpg',
			'address' => array (
				'@type' => 'PostalAddress',
				'streetAddress' => self::LOGRADOURO,
				'addressLocality' => self::CIDADE,
				'addressRegion' => self::UF,
				'postalCode' => self::CEP,
				'addressCountry' => self::PAIS
			),
			'geo' => array (
				'@type' => 'GeoCoordinates',
				'latitude' => self::LATITUDE,
				'longitude' => self::LONGITUDE
			),
			'areaServed' => array (
				array ('@type' => 'State', 'name' => 'Santa Catarina' ),
				array ('@type' => 'State', 'name' => 'Paraná' ),
				array ('@type' => 'State', 'name' => 'Rio Grande do Sul' )
			),
			'founder' => array (
				'@type' => 'Person',
				'name' => self::RESPONSAVEL_TECNICO,
				'jobTitle' => 'Engenheiro Florestal',
				'identifier' => self::CREA
			)
		);

		$perfis = self::perfis ();
		if ($perfis) {
			$schema ['sameAs'] = $perfis;
		}

		return $schema;
	}

	/**
	 * Trilha de navegação.
	 *
	 * @param Array $itens array(array('nome' => String, 'url' => String), ...)
	 * @return Array
	 */
	public static function breadcrumbJsonLd($itens) {

		$lista = array ();
		$posicao = 1;

		foreach ( $itens as $item ) {

			$entrada = array (
				'@type' => 'ListItem',
				'position' => $posicao ++,
				'name' => $item ['nome']
			);

			if (! empty ( $item ['url'] )) {
				$entrada ['item'] = $item ['url'];
			}

			$lista [] = $entrada;
		}

		return array (
			'@context' => 'https://schema.org',
			'@type' => 'BreadcrumbList',
			'itemListElement' => $lista
		);
	}

	/**
	 * Perguntas frequentes.
	 *
	 * @param Array $perguntas array(array('pergunta' => String, 'resposta' => String), ...)
	 * @return Array
	 */
	public static function faqJsonLd($perguntas) {

		$lista = array ();

		foreach ( $perguntas as $item ) {

			$lista [] = array (
				'@type' => 'Question',
				'name' => $item ['pergunta'],
				'acceptedAnswer' => array (
					'@type' => 'Answer',
					'text' => strip_tags ( $item ['resposta'] )
				)
			);
		}

		return array (
			'@context' => 'https://schema.org',
			'@type' => 'FAQPage',
			'mainEntity' => $lista
		);
	}

	/**
	 * Um serviço prestado.
	 *
	 * @param String $nome
	 * @param String $descricao
	 * @param String $url
	 * @param String $cidade Quando informado, restringe a área atendida
	 * @return Array
	 */
	public static function serviceJsonLd($nome, $descricao, $url, $cidade = '') {

		$area = $cidade ? array ('@type' => 'City', 'name' => $cidade ) : array (
			array ('@type' => 'State', 'name' => 'Santa Catarina' ),
			array ('@type' => 'State', 'name' => 'Paraná' ),
			array ('@type' => 'State', 'name' => 'Rio Grande do Sul' )
		);

		return array (
			'@context' => 'https://schema.org',
			'@type' => 'Service',
			'name' => $nome,
			'description' => $descricao,
			'url' => $url,
			'serviceType' => $nome,
			'areaServed' => $area,
			'provider' => array (
				'@type' => 'LocalBusiness',
				'@id' => _Path::getURL () . '#empresa',
				'name' => self::NOME
			)
		);
	}

	/**
	 * Uma espécie do catálogo.
	 *
	 * Product sem "offers" gera aviso não-crítico no Search Console; é o preço
	 * de ser elegível a resultado rico e de ser citado por buscas com IA.
	 *
	 * @param Muda $muda
	 * @return Array
	 */
	public static function mudaJsonLd($muda) {

		$propriedades = array ();

		// A altura da árvore adulta não entra aqui de propósito: este é um schema
		// Product chamado "Muda de X", e publicar "Altura: 20-35m" nele diz ao
		// buscador que o produto vendido tem 35 metros.
		$campos = array (
			'Comportamento foliar' => $muda->getComportamentoFolharExtenso (),
			'Origem' => $muda->getOrigem (),
			'Floração' => $muda->getFloracao (),
			'Cor da floração' => $muda->getCorFloracao (),
			'Frutificação' => $muda->getFrutificacao (),
			'Ocorrência' => $muda->getRegioesCultivo ()
		);

		foreach ( $campos as $nome => $valor ) {
			if ($valor) {
				$propriedades [] = array (
					'@type' => 'PropertyValue',
					'name' => $nome,
					'value' => $valor
				);
			}
		}

		$schema = array (
			'@context' => 'https://schema.org',
			'@type' => 'Product',
			'name' => 'Muda de ' . $muda->getNomePopular (),
			'alternateName' => $muda->getNomeCientifico (),
			'description' => strip_tags ( $muda->getResumo () ),
			'url' => _Path::getURL () . 'mudas/' . $muda->getSlug (),
			'category' => $muda->isNativa () ? 'Mudas de árvores nativas' : 'Mudas de árvores exóticas',
			'brand' => array (
				'@type' => 'Brand',
				'name' => self::NOME
			),
			'additionalProperty' => $propriedades
		);

		if ($muda->getMapaRegiao ()) {
			$schema ['image'] = $muda->getMapaRegiao ();
		}

		return $schema;
	}

	/* ------------------------------------------------------------------ *
	 * Blocos reaproveitados pelas páginas
	 * ------------------------------------------------------------------ */

	/**
	 * Marca do WhatsApp. Fica só dentro do ícone: assim o verde da marca lê
	 * como logotipo de terceiro, e não como parte da paleta do site.
	 */
	const WHATSAPP_SVG = '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>';

	/**
	 * Placa de especificação — a prova técnica, em linguagem de plaqueta.
	 *
	 * Itens sem valor configurado simplesmente não aparecem: é melhor a placa
	 * ficar mais curta do que exibir um registro que não confere.
	 *
	 * @param String $classeExtra 'spec-plate-light' para a versão sobre fundo claro
	 * @return String
	 */
	public static function specPlateHtml($classeExtra = '') {

		$itens = array ();
		$itens [] = '<strong>' . self::CREA . '</strong>';
		$itens [] = 'Eng. Florestal ' . self::RESPONSAVEL_TECNICO;

		if (self::RENASEM) {
			$itens [] = '<strong>RENASEM ' . self::RENASEM . '</strong>';
		}

		$itens [] = 'Desde ' . self::FUNDACAO;
		$itens [] = self::MUDAS_POR_ANO . ' mudas/ano';
		$itens [] = self::AREA_HECTARES . ' ha de produção';
		$itens [] = 'Frota própria';

		$classe = 'spec-plate' . ($classeExtra ? ' ' . $classeExtra : '');

		$html = '<ul class="' . $classe . '">';
		foreach ( $itens as $item ) {
			$html .= '<li>' . $item . '</li>';
		}

		return $html . '</ul>';
	}

	/**
	 * Botão de WhatsApp com a mensagem já preenchida.
	 *
	 * @param String $mensagem Mensagem pré-preenchida — identifica a origem do lead
	 * @param String $rotulo Texto do botão
	 * @param String $origem Valor enviado ao analytics no clique
	 * @param String $classe
	 * @return String
	 */
	public static function whatsappButtonHtml($mensagem, $rotulo, $origem, $classe = 'wa-inline') {

		return '<a class="' . $classe . '" href="' . htmlspecialchars ( self::whatsappUrl ( $mensagem ), ENT_QUOTES, 'UTF-8' ) . '"'
			. ' target="_blank" rel="noopener"'
			. ' data-wa="' . htmlspecialchars ( $origem, ENT_QUOTES, 'UTF-8' ) . '">'
			. self::WHATSAPP_SVG
			. '<span>' . htmlspecialchars ( $rotulo, ENT_QUOTES, 'UTF-8' ) . '</span>'
			. '</a>';
	}

}

?>
