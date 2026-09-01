<?php

/**
 * Cidades com página própria de entrega.
 *
 * A pesquisa de palavras-chave apontou termos locais do Vale do Itajaí e do
 * Meio-Oeste com pouquíssima concorrência e comprador certo. Cada cidade tem
 * H1, texto e mensagem de WhatsApp próprios — é isso que faz a página aparecer
 * na busca local, e não uma lista de nomes numa página só.
 */
abstract class Cidade {

	/**
	 * @return Array
	 */
	public static function todas() {

		return array (

			'agrolandia-sc' => array (
				'nome' => 'Agrolândia',
				'uf' => 'SC',
				'regiao' => 'Alto Vale do Itajaí',
				'resumo' => 'Sede do viveiro. Retirada no local ou entrega no mesmo dia.',
				'texto' => 'Agrolândia é a sede do Viveiro Florestal Mudar desde 1996. O viveiro fica na Rua Wilhelm Doering, 300, no Centro, com 3 hectares de área produtiva. Clientes da cidade podem retirar as mudas no local, combinar entrega no mesmo dia e visitar a produção antes de fechar o pedido. Já fornecemos as mudas da arborização da Prefeitura Municipal de Agrolândia.'
			),

			'rio-do-oeste-sc' => array (
				'nome' => 'Rio do Oeste',
				'uf' => 'SC',
				'regiao' => 'Alto Vale do Itajaí',
				'resumo' => 'Entrega semanal no Alto Vale, com frota própria.',
				'texto' => 'Rio do Oeste fica no Alto Vale do Itajaí, a mesma microrregião do nosso viveiro em Agrolândia. Atendemos produtores rurais, empreiteiras e a administração municipal com mudas nativas para recuperação de mata ciliar, reserva legal e plantio urbano, entregues com caminhão baú próprio.'
			),

			'laurentino-sc' => array (
				'nome' => 'Laurentino',
				'uf' => 'SC',
				'regiao' => 'Alto Vale do Itajaí',
				'resumo' => 'Vizinha ao viveiro, no Alto Vale do Itajaí.',
				'texto' => 'Laurentino está no Alto Vale do Itajaí, na área de atendimento direto do viveiro. Fornecemos mudas de espécies nativas da região para recomposição de nascentes e faixa ciliar, projetos de compensação ambiental e plantios de enriquecimento, com entrega própria e nota fiscal.'
			),

			'corupa-sc' => array (
				'nome' => 'Corupá',
				'uf' => 'SC',
				'regiao' => 'Norte catarinense',
				'resumo' => 'Atendimento no Norte do estado, região do Vale do Itapocu.',
				'texto' => 'Corupá fica no Norte catarinense, em região de Mata Atlântica bem preservada e forte atividade agrícola. Fornecemos mudas de árvores nativas para recuperação de área degradada, mata ciliar e reserva legal, com entrega por frota própria e nota fiscal.'
			),

			'videira-sc' => array (
				'nome' => 'Videira',
				'uf' => 'SC',
				'regiao' => 'Meio-Oeste catarinense',
				'resumo' => 'Entrega no Meio-Oeste, com carga fechada.',
				'texto' => 'Videira está no Meio-Oeste catarinense, região de agroindústria e de exigências ambientais frequentes ligadas a licenciamento. Atendemos empresas, cooperativas e prefeituras com mudas nativas para compensação florestal e PRAD, e com espécies de floração exuberante para praças e ruas.'
			),

			'cacador-sc' => array (
				'nome' => 'Caçador',
				'uf' => 'SC',
				'regiao' => 'Meio-Oeste catarinense',
				'resumo' => 'Atendimento no Meio-Oeste, com carga fechada.',
				'texto' => 'Caçador é um dos polos florestais e madeireiros de Santa Catarina, e por isso uma região com muita exigência de reposição florestal obrigatória. Fornecemos mudas de árvores nativas para reposição, recuperação de área degradada e faixa ciliar, com responsabilidade técnica de engenheiro florestal.'
			)
		);
	}

	/**
	 * Dados de uma cidade pelo slug.
	 *
	 * @param String $slug
	 * @return Array|null
	 */
	public static function porSlug($slug) {

		$todas = self::todas ();

		return isset ( $todas [$slug] ) ? $todas [$slug] : null;
	}

	/**
	 * Nome com a UF, como aparece em título e texto.
	 *
	 * @param Array $cidade
	 * @return String
	 */
	public static function nomeCompleto($cidade) {

		return $cidade ['nome'] . '/' . $cidade ['uf'];
	}

}

?>
