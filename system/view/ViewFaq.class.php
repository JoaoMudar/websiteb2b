<?php

/**
 * Perguntas frequentes.
 *
 * Resposta direta e curta logo abaixo da pergunta é o formato que os resumos
 * gerados por IA e os blocos de resposta do Google mais citam — e é também o
 * que economiza uma ida e volta no WhatsApp.
 */
abstract class ViewFaq implements IView {

	/**
	 * @return Array
	 */
	public static function perguntas() {

		return array (

			array ('pergunta' => 'Qual a quantidade mínima de mudas?',
				'resposta' => 'Trabalhamos com atacado e atendemos projetos de qualquer escala, de algumas centenas a dezenas de milhares de mudas. Mande a quantidade pelo WhatsApp que confirmamos se atendemos.' ),

			array ('pergunta' => 'Qual o prazo de entrega das mudas?',
				'resposta' => 'Espécies de produção corrente costumam ter disponibilidade imediata. Espécies específicas, mudas mais altas ou quantidades grandes exigem produção programada, que leva meses. Consulte assim que tiver a lista, e não às vésperas do prazo do órgão ambiental.' ),

			array ('pergunta' => 'Vocês entregam em quais estados?',
				'resposta' => 'Santa Catarina, Paraná e Rio Grande do Sul, com frota própria — caminhão baú preparado para transporte de mudas. Também é possível retirar no viveiro, em Agrolândia/SC, combinando antes.' ),

			array ('pergunta' => 'Quais embalagens e tamanhos de muda existem?',
				'resposta' => 'São oito formatos. Tubete de 50 g entrega mudas de 10 a 15 cm, para plantio em larga escala. Sacos de 10×18 a 28×32 entregam de 30 cm a 2,5 m. Baldes de 3,5, 5 e 8 litros entregam de 1,0 m a 2,5 m, indicados para arborização urbana.' ),

			array ('pergunta' => 'As mudas vêm com nota fiscal?',
				'resposta' => 'Sim. Toda entrega é acompanhada de nota fiscal. A produção é conduzida sob responsabilidade técnica do Eng. Florestal Gilberto Ferretti, CREA/SC 35178-8.' ),

			array ('pergunta' => 'Quantas espécies vocês produzem?',
				'resposta' => 'São ' . Muda::total () . ' espécies em catálogo, sendo ' . count ( Muda::pesquisaAvancada ( FimPlantio::NA ) ) . ' nativas e ' . count ( Muda::pesquisaAvancada ( FimPlantio::EX ) ) . ' exóticas. Do total, ' . count ( Muda::pesquisaAvancada ( FimPlantio::RAD ) ) . ' são indicadas para recuperação de área degradada e ' . count ( Muda::pesquisaAvancada ( FimPlantio::RMC ) ) . ' para recomposição de mata ciliar. Cada espécie tem ficha própria com porte adulto, floração, frutificação e mapa de ocorrência.' ),

			array ('pergunta' => 'Que espécies usar em compensação florestal ou PRAD?',
				'resposta' => 'A lista sai do projeto aprovado pelo órgão ambiental. Se ele ainda estiver em elaboração, podemos indicar espécies nativas de ocorrência regional compatíveis com o tipo de área, usando o mapa de ocorrência natural de cada espécie do catálogo.' ),

			array ('pergunta' => 'Vocês só vendem mudas ou também executam o plantio?',
				'resposta' => 'Os dois. Além do fornecimento, executamos recomposição de áreas degradadas, recuperação de mata ciliar, adensamento de capoeiras, reflorestamento, arborização urbana, poda e tratos silviculturais.' ),

			array ('pergunta' => 'Vocês atendem prefeituras e órgãos públicos?',
				'resposta' => 'Sim. Já executamos arborização urbana e poda para a Prefeitura Municipal de Agrolândia e fornecemos para obras públicas, como a duplicação da BR-101, nos consórcios dos lotes 6 e 8.' ),

			array ('pergunta' => 'De onde vêm as sementes?',
				'resposta' => 'As sementes de espécies nativas são coletadas na região e adquiridas de fontes idôneas. As de Pinus e Eucalyptus vêm de fornecedores certificados como International Paper, IPEF, Klabin e Rigesa.' ),

			array ('pergunta' => 'Dá para visitar o viveiro antes de comprar?',
				'resposta' => 'Sim. O viveiro fica na Rua Wilhelm Doering, 300, Centro, em Agrolândia/SC. Combine a visita pelo WhatsApp para que alguém possa acompanhar e mostrar a produção.' ),

			array ('pergunta' => 'Qual a melhor época para plantar?',
				'resposta' => 'No Sul do Brasil o plantio é feito no período de maior disponibilidade de água no solo, evitando os meses mais secos e as geadas fortes. Como a produção da muda leva meses, o pedido precisa anteceder bastante a janela de plantio.' )
		);
	}

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'perguntas-frequentes' );

		if (! preg_match ( '/^\\/?$/', $area )) {
			ViewPageNotFound::init ();
			return;
		}

		self::indexFaq ();
	}

	/**
	 * @return void
	 */
	private static function indexFaq() {

		$perguntas = self::perguntas ();
		$mensagem = 'Olá! Vim pela página de perguntas frequentes e queria tirar uma dúvida.';

		$html = new HtmlMain ( );
		$html->setTitle ( 'Perguntas Frequentes — Mudas, Prazo, Entrega e Embalagens' );
		$html->setDescription ( 'Quantidade mínima, prazo de produção, embalagens, entrega no Sul do Brasil, nota fiscal e espécies para PRAD: as dúvidas mais comuns sobre mudas florestais.' );
		$html->setCanonical ( 'perguntas-frequentes' );
		$html->setWhatsappMessage ( $mensagem, 'Falar no WhatsApp' );

		$html->addJsonLd ( Seo::faqJsonLd ( $perguntas ) );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'Perguntas frequentes', 'url' => _Path::getURL () . 'perguntas-frequentes' )
		) ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'faq/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'TOTAL_MUDAS', Muda::total () );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'CTA', Seo::whatsappButtonHtml ( $mensagem, 'Perguntar no WhatsApp', 'faq' ) );
		$tpl->setVar ( 'CTA_LATERAL', Seo::whatsappButtonHtml ( $mensagem, 'Falar no WhatsApp', 'faq-lateral' ) );

		$modelo = $tpl->get ( 'faqItem' );
		$html_faq = '';
		foreach ( $perguntas as $item ) {
			$html_faq .= sprintf ( $modelo,
				htmlspecialchars ( $item ['pergunta'], ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $item ['resposta'], ENT_QUOTES, 'UTF-8' ) );
		}
		$tpl->setVar ( 'FAQ', $html_faq );

		$html->docOpen ();
		$tpl->show ( 'indexFaq' );
		$html->docClose ();
	}

}

?>
