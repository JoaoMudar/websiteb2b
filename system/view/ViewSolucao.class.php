<?php

/**
 * Landing pages de solução: compensação florestal e PRAD, recuperação de mata
 * ciliar e arborização urbana.
 *
 * Existem separadas porque /servicos empilhava oito serviços numa página só,
 * competindo consigo mesma. Cada página aqui atende uma intenção de busca
 * distinta e tem H1, descrição, FAQ e mensagem de WhatsApp próprios.
 */
abstract class ViewSolucao implements IView {

	/**
	 * Inicializa a view a partir do slug da solução.
	 *
	 * @param String $slug
	 * @return void
	 */
	public static function init($slug = '') {

		$paginas = self::paginas ();

		if (! isset ( $paginas [$slug] )) {
			ViewPageNotFound::init ();
			return;
		}

		$area = _Formatting::returnAccessedArea ( $slug );
		if (! preg_match ( '/^\\/?$/', $area )) {
			ViewPageNotFound::init ();
			return;
		}

		self::pagina ( $slug, $paginas [$slug] );
	}

	/**
	 * Conteúdo das três landings.
	 *
	 * @return Array
	 */
	private static function paginas() {

		return array (

			/* ---------------------------------------------------------------- *
			 * Compensação florestal e PRAD — a página de maior valor comercial
			 * ---------------------------------------------------------------- */
			'compensacao-florestal-e-prad' => array (

				'eyebrow' => 'Regularização ambiental',
				'titulo_curto' => 'Compensação florestal e PRAD',
				'h1' => 'Compensação florestal e PRAD: mudas nativas para cumprir a obrigação',
				'title' => 'Compensação Florestal e PRAD — Mudas Nativas em SC',
				'descricao' => 'Mudas nativas para compensação florestal, reposição obrigatória e PRAD em Santa Catarina. Viveiro próprio, engenheiro florestal responsável e entrega em todo o Sul.',
				'subtitulo' => 'Fornecimento de mudas nativas e execução de plantio para quem precisa cumprir exigência de órgão ambiental em Santa Catarina, Paraná e Rio Grande do Sul.',
				'lede' => 'Se a sua empresa suprimiu vegetação, extraiu material ou recebeu condicionante em licença ambiental, a obrigação costuma virar uma lista de espécies nativas, uma quantidade e um prazo. É exatamente isso que produzimos.',
				'mensagem' => 'Olá! Tenho uma obrigação de compensação florestal/PRAD e queria saber como o Viveiro Mudar pode ajudar.',
				'cta_topo_texto' => '<strong>Já tem o projeto aprovado ou a lista de espécies?</strong> Mande a lista, a quantidade e o prazo pelo WhatsApp. Respondemos com disponibilidade, embalagem e orçamento.',
				'cta_topo_rotulo' => 'Tirar dúvida sobre compensação florestal',
				'cta_fim_texto' => '<strong>Ainda está montando o projeto?</strong> Podemos indicar espécies nativas de ocorrência regional compatíveis com a área e com a exigência do órgão ambiental.',
				'cta_fim_rotulo' => 'Falar com o engenheiro florestal',
				'lateral_texto' => 'Prazo apertado costuma ser o problema. Diga a data-limite que respondemos com o que dá para atender.',
				'lateral_especies_titulo' => 'Nativas para recuperação',
				'lateral_especies' => array ('acoita-cavalo', 'angico-vermelho', 'canafistula', 'bracatinga', 'aroeira-vermelha', 'baguacu' ),
				'lateral_especies_link' => 'especies-para-recuperacao-de-area-degradada-e-mata-ciliar/',
				'servico' => 'Fornecimento de mudas nativas para compensação florestal e PRAD',

				'corpo' => '
<h2>O que é compensação florestal</h2>
<p>Compensação florestal é a obrigação de repor a vegetação suprimida em um empreendimento. Ela aparece de várias formas: reposição florestal obrigatória para quem consome ou suprime matéria-prima florestal, condicionante de licença ambiental, compensação por intervenção em Área de Preservação Permanente e regularização de Reserva Legal prevista no Código Florestal (Lei 12.651/2012).</p>
<p>Na prática, o empreendedor recebe do órgão ambiental — em Santa Catarina, o IMA — uma exigência com três variáveis: <strong>quais espécies</strong>, <strong>quantas mudas</strong> e <strong>até quando</strong>. Quem costuma passar por isso são construtoras e consórcios de obra viária, mineradoras e extratoras de saibro e brita, indústrias em ampliação, loteadores, produtores rurais em regularização de CAR e prefeituras.</p>

<h2>O que é um PRAD</h2>
<p>O PRAD — Projeto de Recuperação de Área Degradada — é o documento técnico que descreve como uma área vai voltar a ter cobertura vegetal. Ele define o diagnóstico da área, as espécies nativas de ocorrência regional, o espaçamento e a densidade de plantio, o cronograma de execução e o monitoramento posterior.</p>
<p>O PRAD é elaborado e protocolado por profissional habilitado e aprovado pelo órgão ambiental. Depois de aprovado, ele vira uma lista de compras muito específica — e é aí que a maior parte dos prazos escorrega, porque muda nativa de espécie certa não se compra de um dia para o outro.</p>

<h2>Como o Viveiro Mudar entra no processo</h2>
<ul class="arrow-list">
  <li><strong>Você manda a lista.</strong> Espécies, quantidade, altura desejada e a data-limite do órgão ambiental.</li>
  <li><strong>Conferimos disponibilidade.</strong> Dizemos o que temos pronto, o que precisa de produção programada e em quanto tempo.</li>
  <li><strong>Definimos embalagem.</strong> Tubete para plantio em larga escala, saco ou balde quando a exigência pede muda mais desenvolvida.</li>
  <li><strong>Entregamos com nota fiscal.</strong> Frota própria, caminhão baú preparado para transporte de mudas, em PR, SC e RS.</li>
  <li><strong>Se precisar, executamos o plantio.</strong> Recomposição, adensamento e tratos silviculturais, com responsabilidade técnica de engenheiro florestal.</li>
</ul>
<p>Não elaboramos nem aprovamos o projeto no órgão ambiental — isso é atribuição do responsável técnico que assina o seu PRAD. O que fazemos é garantir que as mudas certas existam, na quantidade certa, dentro do prazo.</p>

<h2>Espécies nativas para compensação e PRAD</h2>
<p>Do nosso catálogo, <strong>108 espécies são nativas</strong>. Delas, <strong>95 são indicadas para recuperação de área degradada</strong> e <strong>56 para recomposição de mata ciliar</strong> — as duas categorias que mais aparecem em exigência de órgão ambiental.</p>
<p>Cada ficha traz porte adulto, comportamento foliar, época de floração e frutificação e o mapa de ocorrência natural da espécie no Brasil, que é o que sustenta o argumento de "espécie nativa de ocorrência regional" diante do analista.</p>

<h2>Projetos já entregues</h2>
<ul class="clients-done-list">
  <li><strong>Consórcio Lote 8 — Duplicação da BR-101</strong> — recomposição de áreas de extração de terra.</li>
  <li><strong>Consórcio Lote 6 — Duplicação da BR-101</strong> — recomposição de áreas de extração de pedra e brita, no Morro do Boi.</li>
  <li><strong>Novelsul — Rio do Sul</strong> — recuperação de mata ciliar.</li>
  <li><strong>Metalúrgica Riosulense</strong> — plantio de espécies nativas.</li>
  <li><strong>Klabin</strong> — reflorestamento de Pinus sp. e construção de cerca.</li>
</ul>',

				'faq' => array (
					array ('pergunta' => 'Vocês elaboram o PRAD?',
						'resposta' => 'O projeto é elaborado e protocolado pelo responsável técnico contratado para o seu licenciamento. Nós fornecemos as mudas nativas previstas no projeto e, quando contratado, executamos o plantio e os tratos silviculturais com responsabilidade técnica de engenheiro florestal.' ),
					array ('pergunta' => 'Qual o prazo para entregar uma quantidade grande de mudas nativas?',
						'resposta' => 'Depende da espécie e da altura exigida. Espécies de produção corrente costumam ter disponibilidade imediata; espécies específicas ou mudas mais desenvolvidas exigem produção programada. Por isso vale consultar assim que o projeto for aprovado, e não às vésperas do prazo.' ),
					array ('pergunta' => 'Existe quantidade mínima de mudas?',
						'resposta' => 'Trabalhamos com atacado e projetos de qualquer escala, de algumas centenas a dezenas de milhares de mudas. Mande a quantidade que respondemos se atendemos.' ),
					array ('pergunta' => 'As mudas vêm com nota fiscal e documentação?',
						'resposta' => 'Sim. Toda entrega é acompanhada de nota fiscal, e a produção é conduzida sob responsabilidade técnica do Eng. Florestal Gilberto Ferretti, CREA/SC 35178-8.' ),
					array ('pergunta' => 'Vocês entregam fora de Santa Catarina?',
						'resposta' => 'Sim. Entregamos em Santa Catarina, Paraná e Rio Grande do Sul com frota própria — caminhão baú preparado para o transporte seguro de mudas.' ),
					array ('pergunta' => 'Como escolher as espécies certas para a minha área?',
						'resposta' => 'A lista sai do projeto aprovado. Se ele ainda estiver em elaboração, podemos indicar espécies nativas de ocorrência regional compatíveis com o tipo de área — mata ciliar, área degradada, adensamento de capoeira — a partir do mapa de ocorrência de cada espécie do catálogo.' )
				)
			),

			/* ---------------------------------------------------------------- *
			 * Mata ciliar
			 * ---------------------------------------------------------------- */
			'recuperacao-de-mata-ciliar' => array (

				'eyebrow' => 'Serviço',
				'titulo_curto' => 'Recuperação de mata ciliar',
				'h1' => 'Recuperação de mata ciliar e nascentes',
				'title' => 'Recuperação de Mata Ciliar e Nascentes — Mudas Nativas',
				'descricao' => 'Mudas nativas e execução de plantio para recomposição de mata ciliar, nascentes e Áreas de Preservação Permanente em SC, PR e RS. Viveiro em Agrolândia/SC.',
				'subtitulo' => 'Recomposição de faixa ciliar e de nascentes com espécies nativas de ocorrência regional, em conformidade com o Código Florestal.',
				'lede' => 'A faixa de vegetação às margens de rios, córregos e nascentes é Área de Preservação Permanente. Quando ela precisa ser recomposta, o que resolve é espécie nativa certa, na densidade certa, plantada na época certa.',
				'mensagem' => 'Olá! Preciso recuperar mata ciliar e queria saber sobre mudas nativas do Viveiro Mudar.',
				'cta_topo_texto' => '<strong>Sabe quantos metros de faixa precisa recompor?</strong> Mande a metragem e a localização pelo WhatsApp que ajudamos a estimar a quantidade de mudas.',
				'cta_topo_rotulo' => 'Falar sobre mata ciliar no WhatsApp',
				'cta_fim_texto' => '<strong>Precisa também da execução?</strong> Fazemos o plantio e os tratos silviculturais, além do fornecimento das mudas.',
				'cta_fim_rotulo' => 'Pedir orçamento no WhatsApp',
				'lateral_texto' => 'Diga a metragem da faixa e o tipo de curso d\'água que estimamos a quantidade de mudas.',
				'lateral_especies_titulo' => 'Nativas para mata ciliar',
				'lateral_especies' => array ('acoita-cavalo', 'angico-branco', 'araca-amarelo', 'baga-de-macaco', 'camboata-vermelho', 'aroeira-branca' ),
				'lateral_especies_link' => 'especies-para-recuperacao-de-area-degradada-e-mata-ciliar/',
				'servico' => 'Recuperação de mata ciliar e nascentes',

				'corpo' => '
<h2>O que a lei exige</h2>
<p>O Código Florestal (Lei 12.651/2012) define como Área de Preservação Permanente as faixas marginais de qualquer curso d\'água natural, medidas a partir da borda da calha do leito regular. A largura da faixa varia conforme a largura do curso d\'água — para cursos com menos de 10 metros de largura, a faixa é de 30 metros. Nascentes e olhos d\'água têm raio mínimo de 50 metros.</p>
<p>Quando essa faixa está descoberta, a recomposição é obrigatória. Ela costuma aparecer como condicionante de licença, como pendência do Cadastro Ambiental Rural ou dentro de um Programa de Regularização Ambiental.</p>

<h2>Espécies que usamos</h2>
<p>Das 108 espécies nativas do nosso catálogo, <strong>56 são indicadas para recomposição de mata ciliar</strong>. São espécies com ocorrência natural na região, tolerantes a solo úmido e, em boa parte dos casos, atrativas para fauna — o que acelera a dispersão natural e a regeneração da área.</p>
<p>Cada ficha do catálogo mostra o mapa de ocorrência natural da espécie no Brasil, o porte adulto e a época de frutificação, que é o dado que interessa para atrair fauna.</p>

<h2>Como conduzimos o trabalho</h2>
<ul class="arrow-list">
  <li><strong>Fornecimento de mudas</strong> em tubete, saco ou balde, conforme a altura desejada no plantio.</li>
  <li><strong>Execução do plantio</strong>, quando contratado, com equipe própria.</li>
  <li><strong>Adensamento de capoeira</strong> para acelerar a regeneração natural em áreas parcialmente cobertas.</li>
  <li><strong>Tratos silviculturais</strong> de manutenção — coroamento, controle de competição e replantio de falhas.</li>
</ul>
<p>Já executamos recuperação de mata ciliar para a <strong>Novelsul, em Rio do Sul</strong>, e recomposição de áreas de extração para os consórcios de duplicação da <strong>BR-101</strong>.</p>',

				'faq' => array (
					array ('pergunta' => 'Quantas mudas por hectare são necessárias?',
						'resposta' => 'A densidade é definida pelo projeto técnico aprovado e varia conforme o estado de degradação da área e a exigência do órgão ambiental. Mande as características da área que ajudamos a estimar a quantidade.' ),
					array ('pergunta' => 'Qual a melhor época para plantar mata ciliar no Sul do Brasil?',
						'resposta' => 'O plantio costuma ser feito no período de maior disponibilidade de água no solo, evitando os meses mais secos e as geadas fortes. Como a produção da muda leva meses, o pedido precisa ser feito bem antes da janela de plantio.' ),
					array ('pergunta' => 'Vocês só vendem as mudas ou também plantam?',
						'resposta' => 'Os dois. Fornecemos as mudas e, quando contratado, executamos o plantio, o adensamento e os tratos silviculturais, com responsabilidade técnica de engenheiro florestal.' ),
					array ('pergunta' => 'Que tamanho de muda usar em mata ciliar?',
						'resposta' => 'Depende do projeto e da pressão de competição da área. Tubete de 50 g atende plantio em larga escala; sacos e baldes entregam mudas de 30 cm a 2,5 m, indicadas quando é preciso vantagem inicial sobre a vegetação concorrente.' )
				)
			),

			/* ---------------------------------------------------------------- *
			 * Arborização urbana
			 * ---------------------------------------------------------------- */
			'arborizacao-urbana' => array (

				'eyebrow' => 'Serviço',
				'titulo_curto' => 'Arborização urbana',
				'h1' => 'Arborização urbana para prefeituras e empreendimentos',
				'title' => 'Arborização Urbana — Mudas para Prefeituras e Condomínios',
				'descricao' => 'Mudas de árvores para arborização urbana, praças e loteamentos, escolhidas por porte adulto e floração. Fornecimento, plantio e poda em SC, PR e RS.',
				'subtitulo' => 'Fornecimento de mudas, plantio e poda para prefeituras, loteamentos, condomínios e empreendimentos comerciais.',
				'lede' => 'Em arborização urbana, a escolha errada aparece dez anos depois: raiz levantando calçada, copa na rede elétrica, poda cara todo ano. O critério que evita isso é o porte adulto da espécie — e é por ele que organizamos o catálogo.',
				'mensagem' => 'Olá! Preciso de mudas para arborização urbana e queria falar com o Viveiro Mudar.',
				'cta_topo_texto' => '<strong>Tem um projeto de arborização ou uma lista de ruas?</strong> Mande as quantidades e as restrições do local — rede elétrica, largura de calçada — que indicamos espécies compatíveis.',
				'cta_topo_rotulo' => 'Falar sobre arborização no WhatsApp',
				'cta_fim_texto' => '<strong>Atende licitação ou compra direta?</strong> Emitimos nota fiscal e temos experiência com prefeituras da região.',
				'cta_fim_rotulo' => 'Pedir orçamento no WhatsApp',
				'lateral_texto' => 'Diga a quantidade e onde as árvores vão: sob rede elétrica, em calçada estreita ou em praça.',
				'lateral_especies_titulo' => 'Floração exuberante',
				'lateral_especies' => array ('ipe-amarelo', 'ipe-roxo', 'manaca-da-serra', 'ipe-rosa', 'ipe-branco', 'manduirana' ),
				'lateral_especies_link' => 'especies-com-floracao-exuberante/',
				'servico' => 'Arborização urbana, paisagismo e poda',

				'corpo' => '
<h2>Escolher pelo porte adulto</h2>
<p>Toda espécie do nosso catálogo traz o porte adulto medido contra uma escala única de 0 a 60 metros. Isso torna a comparação direta: sob rede elétrica, espécies de pequeno porte; em canteiro central e praça, porte médio a grande; em calçada estreita, espécies de copa contida e sistema radicular menos agressivo.</p>
<p>Exemplos do catálogo: o <a href="[[URL_PATH]]mudas/ipe-amarelo">ipê-amarelo</a> fica entre 4 e 10 m, adequado a ruas com restrição de altura; o <a href="[[URL_PATH]]mudas/ipe-roxo">ipê-roxo</a> chega a 35 m e pede espaço de praça ou parque.</p>

<h2>Floração como argumento de projeto</h2>
<p>São <strong>34 espécies de floração exuberante</strong> no catálogo, com cor e período de floração informados na ficha. Dá para escalonar a floração ao longo do ano em um mesmo bairro, escolhendo espécies com meses de floração diferentes — a faixa de fenologia de cada ficha mostra isso mês a mês.</p>

<h2>O que fornecemos</h2>
<ul class="arrow-list">
  <li><strong>Mudas já formadas</strong>, de 1,0 m a 2,5 m em sacos e baldes — porte que resiste melhor a via pública.</li>
  <li><strong>Plantio e replantio</strong> com equipe própria.</li>
  <li><strong>Poda de condução e manutenção</strong> de árvores urbanas.</li>
  <li><strong>Jardinagem corporativa</strong> e paisagismo em áreas comerciais.</li>
</ul>
<p>Executamos arborização urbana e poda para a <strong>Prefeitura Municipal de Agrolândia</strong> e jardinagem e paisagismo no <strong>trevo de Trombudo Central</strong>, para a Retsul.</p>',

				'faq' => array (
					array ('pergunta' => 'Que espécie plantar sob rede elétrica?',
						'resposta' => 'Espécies de pequeno porte, que se mantêm abaixo da rede na fase adulta. No catálogo dá para filtrar visualmente pelo porte adulto de cada espécie, medido em escala de 0 a 60 metros.' ),
					array ('pergunta' => 'Qual altura de muda usar em via pública?',
						'resposta' => 'Em calçada e canteiro recomenda-se muda já formada, normalmente de 1,5 m a 2,5 m, entregue em balde de 5 ou 8 litros. Muda pequena em via pública sofre com pisoteio, vandalismo e roçada.' ),
					array ('pergunta' => 'Vocês atendem prefeitura?',
						'resposta' => 'Sim. Já executamos arborização urbana e poda para a Prefeitura Municipal de Agrolândia, e fornecemos para obras públicas como a duplicação da BR-101. Emitimos nota fiscal e temos engenheiro florestal responsável.' ),
					array ('pergunta' => 'É possível escalonar a floração ao longo do ano?',
						'resposta' => 'Sim. Cada ficha de espécie mostra os meses de floração e a cor das flores. Combinando espécies com períodos diferentes, o projeto mantém floração em boa parte do ano.' )
				)
			)
		);
	}

	/**
	 * Monta e apresenta uma landing.
	 *
	 * @param String $slug
	 * @param Array $config
	 * @return void
	 */
	private static function pagina($slug, $config) {

		$url = _Path::getURL () . $slug;

		$html = new HtmlMain ( );
		$html->setTitle ( $config ['title'] );
		$html->setDescription ( $config ['descricao'] );
		$html->setCanonical ( $slug );
		$html->setWhatsappMessage ( $config ['mensagem'], 'Falar no WhatsApp' );

		$html->addJsonLd ( Seo::serviceJsonLd ( $config ['servico'], $config ['descricao'], $url ) );
		$html->addJsonLd ( Seo::faqJsonLd ( $config ['faq'] ) );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => $config ['titulo_curto'], 'url' => $url )
		) ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'solucoes/index.tpl.html' );

		$tpl->setVar ( 'BREADCRUMB_PAI', '' );
		$tpl->setVar ( 'EYEBROW', htmlspecialchars ( $config ['eyebrow'], ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'TITULO_CURTO', htmlspecialchars ( $config ['titulo_curto'], ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'H1', htmlspecialchars ( $config ['h1'], ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'SUBTITULO', htmlspecialchars ( $config ['subtitulo'], ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'LEDE', htmlspecialchars ( $config ['lede'], ENT_QUOTES, 'UTF-8' ) );
		$tpl->setVar ( 'CORPO', $config ['corpo'] );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );

		$tpl->setVar ( 'CTA_TOPO_TEXTO', $config ['cta_topo_texto'] );
		$tpl->setVar ( 'CTA_FIM_TEXTO', $config ['cta_fim_texto'] );
		$tpl->setVar ( 'LATERAL_TEXTO', htmlspecialchars ( $config ['lateral_texto'], ENT_QUOTES, 'UTF-8' ) );

		$tpl->setVar ( 'CTA_TOPO', Seo::whatsappButtonHtml ( $config ['mensagem'], $config ['cta_topo_rotulo'], $slug . '-topo' ) );
		$tpl->setVar ( 'CTA_FIM', Seo::whatsappButtonHtml ( $config ['mensagem'], $config ['cta_fim_rotulo'], $slug . '-fim' ) );
		$tpl->setVar ( 'CTA_LATERAL', Seo::whatsappButtonHtml ( $config ['mensagem'], 'Falar no WhatsApp', $slug . '-lateral' ) );

		$tpl->setVar ( 'FAQ', self::faq ( $tpl, $config ['faq'] ) );
		$tpl->setVar ( 'LATERAL_ESPECIES', self::lateralEspecies ( $tpl, $config ) );
		$tpl->setVar ( 'LATERAL_CIDADES', self::lateralCidades ( $tpl ) );

		// Por último: o texto de cada landing também traz [[URL_PATH]], e a
		// substituição é de uma passada só — se rodasse antes, os links do corpo
		// sairiam com o marcador cru na página.
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );

		$html->docOpen ();

		$tpl->show ( 'solucao' );

		$html->docClose ();
	}

	/**
	 * @param Template $tpl
	 * @param Array $perguntas
	 * @return String
	 */
	private static function faq($tpl, $perguntas) {

		$modelo = $tpl->get ( 'faqItem' );
		$html = '';

		foreach ( $perguntas as $item ) {
			$html .= sprintf ( $modelo,
				htmlspecialchars ( $item ['pergunta'], ENT_QUOTES, 'UTF-8' ),
				$item ['resposta'] );
		}

		return $html;
	}

	/**
	 * Card lateral com espécies reais do catálogo, para levar o leitor da
	 * página de solução para as fichas.
	 *
	 * @param Template $tpl
	 * @param Array $config
	 * @return String
	 */
	private static function lateralEspecies($tpl, $config) {

		$modelo = $tpl->get ( 'especieLink' );
		$itens = '';

		foreach ( $config ['lateral_especies'] as $slug ) {

			$idMuda = Muda::idPorSlug ( $slug );
			if (! $idMuda) {
				continue;
			}

			$muda = new Muda ( $idMuda );
			$itens .= sprintf ( $modelo,
				$muda->getSlug (),
				htmlspecialchars ( $muda->getNomePopular (), ENT_QUOTES, 'UTF-8' ),
				htmlspecialchars ( $muda->getNomeCientificoCurto (), ENT_QUOTES, 'UTF-8' ) );
		}

		if (! $itens) {
			return '';
		}

		return sprintf ( $tpl->get ( 'lateralEspecies' ),
			htmlspecialchars ( $config ['lateral_especies_titulo'], ENT_QUOTES, 'UTF-8' ),
			$itens,
			$config ['lateral_especies_link'] );
	}

	/**
	 * @param Template $tpl
	 * @return String
	 */
	private static function lateralCidades($tpl) {

		$modelo = $tpl->get ( 'cidadeLink' );
		$html = '';

		foreach ( Cidade::todas () as $slug => $cidade ) {
			$html .= sprintf ( $modelo, $slug, htmlspecialchars ( Cidade::nomeCompleto ( $cidade ), ENT_QUOTES, 'UTF-8' ) );
		}

		return $html;
	}

}

?>
