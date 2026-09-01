<?php

/**
 * Classe responsável por administrar as views das mudas.
 *
 * @author Tiago Piske
 */
abstract class ViewMudas implements IView {

	/**
	 * Fichas que saíram do ar com o fim da produção de Pinus e Eucalyptus.
	 *
	 * @var Array
	 */
	private static $especiesAposentadas = array (
		'pinus', 'eucalipto-limao', 'eucalipto-cidra', 'eucalipto-rosa'
	);

	/**
	 * Recortes do catálogo que têm URL própria.
	 *
	 * Cada recorte é uma página indexável com H1 e descrição próprios — por
	 * isso "nativas" vem primeiro: "árvores nativas" é o termo de maior volume
	 * com menor concorrência na pesquisa de palavras-chave.
	 *
	 * @return Array
	 */
	private static function recortes() {

		return array (

			'especies-nativas' => array (
				'fins' => FimPlantio::NA,
				'h1' => 'Mudas de árvores nativas',
				'title' => 'Mudas de Árvores Nativas — Catálogo de Espécies',
				'descricao' => 'Espécies nativas do Brasil produzidas em Agrolândia (SC) para compensação florestal, PRAD, mata ciliar e reserva legal. Ficha técnica de cada espécie.',
				'intro' => 'Espécies nativas do Brasil, com ocorrência natural na Mata Atlântica e nos biomas do Sul. São as espécies exigidas em projetos de compensação florestal, PRAD e recomposição de mata ciliar.'
			),

			'especies-para-recuperacao-de-area-degradada-e-mata-ciliar' => array (
				'fins' => array (FimPlantio::RMC, FimPlantio::RAD ),
				'h1' => 'Mudas para recuperação de área degradada e mata ciliar',
				'title' => 'Mudas para Recuperação de Área Degradada e Mata Ciliar',
				'descricao' => 'Espécies indicadas para PRAD, recomposição de mata ciliar e recuperação de áreas degradadas, produzidas em Agrolândia (SC) com responsabilidade técnica.',
				'intro' => 'Espécies indicadas para recomposição de faixa ciliar, nascentes e áreas degradadas — a base de qualquer PRAD e de projetos de compensação ambiental.'
			),

			'especies-com-floracao-exuberante' => array (
				'fins' => FimPlantio::FLOR,
				'h1' => 'Mudas de árvores com floração exuberante',
				'title' => 'Mudas de Árvores com Floração Exuberante',
				'descricao' => 'Espécies de floração ornamental para praças, ruas e loteamentos, com período e cor de floração informados. Viveiro florestal em Agrolândia (SC).',
				'intro' => 'Espécies de floração marcante, procuradas para praças, ruas e loteamentos. O período e a cor da floração estão na ficha de cada espécie, para escalonar a floração ao longo do ano.'
			),

			'especies-para-sombreamento' => array (
				'fins' => FimPlantio::S,
				'h1' => 'Mudas de árvores para sombreamento',
				'title' => 'Mudas de Árvores para Sombreamento',
				'descricao' => 'Espécies de copa densa para sombreamento de pastagens, pátios, estacionamentos e áreas de convivência. Viveiro florestal em Agrolândia (SC).',
				'intro' => 'Espécies de copa ampla, indicadas para sombreamento de pastagens, pátios, estacionamentos e áreas de convivência.'
			),

			'especies-frutas-para-consumo-humano' => array (
				'fins' => FimPlantio::FH,
				'h1' => 'Mudas de árvores frutíferas',
				'title' => 'Mudas de Árvores Frutíferas para Consumo Humano',
				'descricao' => 'Espécies frutíferas nativas e exóticas com fruto de consumo humano, com época de frutificação informada. Viveiro florestal em Agrolândia (SC).',
				'intro' => 'Espécies cujo fruto é próprio para consumo humano, nativas e exóticas, com a época de frutificação informada na ficha.'
			),

			'especies-exoticas' => array (
				'fins' => FimPlantio::EX,
				'h1' => 'Mudas de espécies exóticas',
				'title' => 'Mudas de Espécies Exóticas',
				'descricao' => 'Espécies exóticas ornamentais e frutíferas já consolidadas no cultivo brasileiro, com ficha técnica de cada uma. Viveiro florestal em Agrolândia (SC).',
				'intro' => 'Espécies introduzidas e já consolidadas no cultivo brasileiro — ornamentais e frutíferas. O foco da produção são as nativas, mas estas seguem em catálogo.'
			)
		);
	}

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'mudas' );
		$recortes = self::recortes ();

		// catálogo completo
		if (preg_match ( '/^\\/?$/', $area )) {
			self::index ();
			return;
		}

		// recortes com URL própria
		if (preg_match ( '/^\\/([a-z0-9-]+)\\/?$/', $area, $partes ) && isset ( $recortes [$partes [1]] )) {
			self::index ( $recortes [$partes [1]], $partes [1] );
			return;
		}

		// URL antiga por id: leva para o endereço com nome, preservando o que
		// já foi indexado e o que está linkado por aí
		if (preg_match ( '/^\\/(\\d+)\\/?$/', $area, $partes )) {

			$muda = new Muda ( $partes [1] );

			if ($muda->existe ()) {
				header ( 'Location: ' . _Path::getURL () . 'mudas/' . $muda->getSlug (), true, 301 );
				exit ();
			}

			ViewPageNotFound::init ();
			return;
		}

		// página da espécie
		if (preg_match ( '/^\\/([a-z0-9-]+)\\/?$/', $area, $partes )) {

			$idMuda = Muda::idPorSlug ( $partes [1] );

			if ($idMuda) {
				self::muda ( new Muda ( $idMuda ) );
				return;
			}

			// Espécies que saíram do catálogo quando o viveiro parou de produzir
			// Pinus e Eucalyptus. As fichas estavam indexadas, então mandamos
			// para o catálogo em vez de devolver 404.
			if (in_array ( $partes [1], self::$especiesAposentadas )) {
				header ( 'Location: ' . _Path::getURL () . 'mudas', true, 301 );
				exit ();
			}
		}

		ViewPageNotFound::init ();
	}

	/**
	 * Apresenta o catálogo, inteiro ou recortado por fim de plantio.
	 *
	 * @param Array $recorte
	 * @param String $slugRecorte
	 * @return void
	 */
	private static function index($recorte = null, $slugRecorte = '') {

		$total = Muda::total ();

		$html = new HtmlMain ( );

		if ($recorte) {

			$html->setTitle ( $recorte ['title'] );
			$html->setDescription ( $recorte ['descricao'] );
			$html->setCanonical ( 'mudas/' . $slugRecorte . '/' );
			$listaMudas = Muda::pesquisaAvancada ( $recorte ['fins'] );
			$h1 = $recorte ['h1'];
			$intro = $recorte ['intro'];

		} else {

			$html->setTitle ( 'Catálogo: ' . $total . ' Espécies de Mudas Nativas e Exóticas' );
			$html->setDescription ( 'Catálogo completo com ' . $total . ' espécies de mudas florestais nativas e exóticas produzidas pelo Viveiro Mudar, em Agrolândia (SC). Floração, mapa de ocorrência e ficha técnica de cada espécie. Orçamento pelo WhatsApp.' );
			$html->setCanonical ( 'mudas' );
			$listaMudas = Muda::retornaListaMudas ();
			$h1 = 'Catálogo de mudas';
			$intro = 'Todas as espécies que produzimos, com época de floração, mapa de ocorrência e ficha técnica. Clique no nome para ver a ficha completa da espécie.';
		}

		$html->setWhatsappMessage ( 'Olá! Estou vendo o catálogo de mudas no site e queria um orçamento.', 'Pedir orçamento' );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'Mudas', 'url' => _Path::getURL () . 'mudas' )
		) ) );
		$html->addJsonLd ( self::listaJsonLd ( $listaMudas, $h1 ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'mudas/index.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'H1', htmlspecialchars ( $h1, ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'INTRO', htmlspecialchars ( $intro, ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'WHATSAPP_CATALOGO', Seo::whatsappButtonHtml (
			'Olá! Estou vendo o catálogo de mudas no site e queria um orçamento.',
			'Pedir orçamento no WhatsApp',
			'catalogo' ) );

		$html->docOpen ();

		$linha = $tpl->get ( 'linhaMuda' );
		$linhas = '';

		foreach ( $listaMudas as $muda ) {

			$linhas .= sprintf ( $linha,
				$muda->getIdMuda (),
				$muda->getSlug (),
				htmlspecialchars ( $muda->getNomePopular (), ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $muda->getNomeCientifico (), ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $muda->getFloracao (), ENT_QUOTES, 'UTF-8' ) );
		}

		$tpl->setVar ( 'LINHAS_MUDAS', $linhas );

		$tpl->show ( 'index' );

		$html->docClose ();
	}

	/**
	 * Dados estruturados da listagem.
	 *
	 * @param Muda[] $listaMudas
	 * @param String $nome
	 * @return Array
	 */
	private static function listaJsonLd($listaMudas, $nome) {

		$itens = array ();
		$posicao = 1;

		foreach ( $listaMudas as $muda ) {
			$itens [] = array (
				'@type' => 'ListItem',
				'position' => $posicao ++,
				'name' => $muda->getNomePopular (),
				'url' => _Path::getURL () . 'mudas/' . $muda->getSlug ()
			);
		}

		return array (
			'@context' => 'https://schema.org',
			'@type' => 'ItemList',
			'name' => $nome,
			'numberOfItems' => count ( $itens ),
			'itemListElement' => $itens
		);
	}

	/**
	 * Apresenta a ficha de uma espécie.
	 *
	 * @param Muda $muda
	 * @return void
	 */
	private static function muda($muda) {

		$nome = $muda->getNomePopular ();
		$sciCurto = $muda->getNomeCientificoCurto ();
		$mensagem = 'Olá! Vi a página da muda ' . $nome . ' no site e queria fazer um orçamento.';

		$html = new HtmlMain ( );
		$html->setTitle ( 'Muda de ' . $nome . ' (' . $sciCurto . ') | Viveiro Mudar', true );
		$html->setDescription ( self::descricaoDaMuda ( $muda ) );
		$html->setCanonical ( 'mudas/' . $muda->getSlug () );
		$html->setOgType ( 'product' );
		$html->setWhatsappMessage ( $mensagem, 'Pedir orçamento' );

		if ($muda->getMapaRegiao ()) {
			$html->setOgImage ( $muda->getMapaRegiao () );
		}

		$html->addJsonLd ( Seo::mudaJsonLd ( $muda ) );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'Mudas', 'url' => _Path::getURL () . 'mudas' ),
			array ('nome' => $nome, 'url' => _Path::getURL () . 'mudas/' . $muda->getSlug () )
		) ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'mudas/mudas.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );

		$escNome = htmlspecialchars ( $nome, ENT_QUOTES, 'UTF-8' );
		$escSci = htmlspecialchars ( $muda->getNomeCientifico (), ENT_QUOTES, 'UTF-8' );

		$tpl->setVar ( 'NOME_POPULAR', $escNome );
		$tpl->setVar ( 'NOME_CIENTIFICO', $escSci );
		$tpl->setVar ( 'RESUMO', $muda->getResumo () );
		$tpl->setVar ( 'FENOLOGIA', Fenologia::fenologia ( $muda ) );
		$tpl->setVar ( 'CHIPS', self::chips ( $tpl, $muda ) );
		$tpl->setVar ( 'FICHA', self::ficha ( $tpl, $muda ) );
		$tpl->setVar ( 'LEGENDA', self::legenda ( $tpl, $muda ) );
		$tpl->setVar ( 'RELACIONADAS', self::relacionadas ( $tpl, $muda ) );
		$tpl->setVar ( 'MAPA', self::mapa ( $tpl, $muda ) );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'WHATSAPP_CORPO', Seo::whatsappButtonHtml ( $mensagem, 'Pedir orçamento no WhatsApp', 'especie' ) );
		$tpl->setVar ( 'WHATSAPP_LATERAL', Seo::whatsappButtonHtml ( $mensagem, 'Ver tamanho e preço', 'especie-lateral' ) );

		$html->docOpen ();

		$tpl->show ( 'muda' );

		$html->docClose ();
	}

	/**
	 * Meta description da ficha: fato primeiro, intenção comercial no fim.
	 *
	 * O tamanho que aparece aqui é o da muda na entrega, não o da árvore adulta:
	 * é o que o comprador precisa saber e o que evita a leitura de que vendemos
	 * a árvore pronta.
	 *
	 * @param Muda $muda
	 * @return String
	 */
	private static function descricaoDaMuda($muda) {

		$partes = array ();
		$partes [] = 'Muda de ' . $muda->getNomePopular () . ' (' . $muda->getNomeCientificoCurto () . ')';

		if ($muda->getComportamentoFolharExtenso ()) {
			$partes [] = mb_strtolower ( $muda->getComportamentoFolharExtenso (), 'UTF-8' );
		}

		return implode ( ', ', $partes ) . '. Viveiro Mudar, Agrolândia/SC — muda de 10 cm a 2,5 m. Orçamento pelo WhatsApp.';
	}

	/**
	 * Chips do vocabulário controlado da espécie.
	 *
	 * @param Template $tpl
	 * @param Muda $muda
	 * @return String
	 */
	private static function chips($tpl, $muda) {

		$modelo = $tpl->get ( 'chip' );
		$extenso = $muda->getFinsPlantioExtenso ();

		$html = '<div class="code-chips">';

		foreach ( $muda->getFinsPlantio () as $i => $codigo ) {

			$descricao = isset ( $extenso [$i] ) ? $extenso [$i] : '';

			$classe = '';
			if ($codigo == FimPlantio::NA) {
				$classe = 'code-chip-na';
			} elseif ($codigo == FimPlantio::RMC || $codigo == FimPlantio::RAD) {
				$classe = 'code-chip-rec';
			}

			$html .= sprintf ( $modelo,
				$classe,
				htmlspecialchars ( $descricao, ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $codigo, ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $descricao, ENT_QUOTES, 'UTF-8' ) );
		}

		return $html . '</div>';
	}

	/**
	 * Altura da árvore adulta, com a ressalva que impede a leitura errada.
	 *
	 * Este é o único lugar do site onde o dado aparece: é informação de escolha
	 * de espécie para projeto, não o tamanho da muda que vendemos — a muda sai
	 * do viveiro com 10 cm a 2,5 m, conforme a embalagem.
	 *
	 * @param Muda $muda
	 * @return String
	 */
	private static function alturaAdulta($muda) {

		$altura = $muda->getAltura ();

		if (! $altura) {
			return '';
		}

		return htmlspecialchars ( $altura, ENT_QUOTES, 'UTF-8' )
			. ' <span class="ficha-nota">na natureza, quando adulta</span>';
	}

	/**
	 * Linhas da ficha técnica. Campo sem valor não vira linha vazia.
	 *
	 * @param Template $tpl
	 * @param Muda $muda
	 * @return String
	 */
	private static function ficha($tpl, $muda) {

		$modelo = $tpl->get ( 'fichaLinha' );

		$campos = array (
			'Nome popular' => htmlspecialchars ( $muda->getNomePopular (), ENT_QUOTES, 'UTF-8' ),
			'Nome científico' => '<em>' . htmlspecialchars ( $muda->getNomeCientifico (), ENT_QUOTES, 'UTF-8' ) . '</em>',
			'Origem' => htmlspecialchars ( $muda->getOrigem (), ENT_QUOTES, 'UTF-8' ),
			'Altura da árvore adulta' => self::alturaAdulta ( $muda ),
			'Comportamento foliar' => htmlspecialchars ( $muda->getComportamentoFolharExtenso (), ENT_QUOTES, 'UTF-8' ),
			'Floração' => htmlspecialchars ( $muda->getFloracao (), ENT_QUOTES, 'UTF-8' ),
			'Cor da floração' => htmlspecialchars ( $muda->getCorFloracao (), ENT_QUOTES, 'UTF-8' ),
			'Frutificação' => htmlspecialchars ( $muda->getFrutificacao (), ENT_QUOTES, 'UTF-8' ),
			'Ocorrência e cultivo' => htmlspecialchars ( $muda->getRegioesCultivo (), ENT_QUOTES, 'UTF-8' )
		);

		$html = '';
		foreach ( $campos as $rotulo => $valor ) {
			if ($valor !== '' && $valor !== '<em></em>') {
				$html .= sprintf ( $modelo, $rotulo, $valor );
			}
		}

		return $html;
	}

	/**
	 * Legenda apenas dos códigos que esta espécie usa — despejar as treze
	 * definições em toda ficha só cansaria o leitor.
	 *
	 * @param Template $tpl
	 * @param Muda $muda
	 * @return String
	 */
	private static function legenda($tpl, $muda) {

		$modelo = $tpl->get ( 'legendaItem' );
		$extenso = $muda->getFinsPlantioExtenso ();

		$html = '';

		foreach ( $muda->getFinsPlantio () as $i => $codigo ) {
			if (isset ( $extenso [$i] )) {
				$html .= sprintf ( $modelo,
					htmlspecialchars ( $codigo, ENT_QUOTES, 'UTF-8' ),
					htmlspecialchars ( $extenso [$i], ENT_QUOTES, 'UTF-8' ) );
			}
		}

		if ($muda->getComportamentoFolhar () && $muda->getComportamentoFolharExtenso ()) {
			$html .= sprintf ( $modelo,
				htmlspecialchars ( $muda->getComportamentoFolhar (), ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $muda->getComportamentoFolharExtenso (), ENT_QUOTES, 'UTF-8' ) );
		}

		return $html;
	}

	/**
	 * Espécies relacionadas — resolve a orfandade das fichas e distribui
	 * autoridade interna entre elas.
	 *
	 * @param Template $tpl
	 * @param Muda $muda
	 * @return String
	 */
	private static function relacionadas($tpl, $muda) {

		$modelo = $tpl->get ( 'relacionada' );
		$html = '';

		foreach ( Muda::relacionadas ( $muda, 6 ) as $relacionada ) {
			$html .= sprintf ( $modelo,
				$relacionada->getUrl (),
				htmlspecialchars ( $relacionada->getNomePopular (), ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $relacionada->getNomeCientificoCurto (), ENT_QUOTES, 'UTF-8' ) );
		}

		return $html;
	}

	/**
	 * Prancha do mapa de ocorrência.
	 *
	 * @param Template $tpl
	 * @param Muda $muda
	 * @return String
	 */
	private static function mapa($tpl, $muda) {

		if (! $muda->getMapaRegiao ()) {
			return '';
		}

		return sprintf ( $tpl->get ( 'mapa' ),
			htmlspecialchars ( $muda->getMapaRegiao (), ENT_QUOTES, 'UTF-8' ),
			htmlspecialchars ( $muda->getNomePopular (), ENT_QUOTES, 'UTF-8' ),
			htmlspecialchars ( $muda->getNomeCientificoCurto (), ENT_QUOTES, 'UTF-8' ),
			htmlspecialchars ( $muda->getRegioesCultivo (), ENT_QUOTES, 'UTF-8' ) );
	}

}

?>
