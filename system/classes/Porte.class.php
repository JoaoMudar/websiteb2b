<?php

/**
 * Desenha a régua de porte — a escala compartilhada de 0 a 60 m contra a qual
 * toda espécie do catálogo é medida.
 *
 * Existe porque altura é o único dado presente em praticamente todas as 142
 * espécies (floração, por exemplo, só existe em 36) e porque é a pergunta que o
 * comprador de arborização de fato faz: quanto isso cresce na calçada?
 */
abstract class Porte {

	/**
	 * Marcas de referência: medidas que o leitor já sabe estimar de cabeça.
	 *
	 * @return Array
	 */
	private static function referencias() {

		return array (
			array ('metros' => 4.0, 'texto' => '4 m — caminhão baú' ),
			array ('metros' => 1.7, 'texto' => '1,7 m — pessoa' )
		);
	}

	/**
	 * Converte metros em porcentagem da escala.
	 *
	 * @param Float $metros
	 * @return String
	 */
	private static function pct($metros) {

		$valor = ($metros / Muda::ALTURA_MAX_ESCALA) * 100;

		return round ( $valor, 2 ) . '%';
	}

	/**
	 * Número no padrão brasileiro, sem casa decimal desnecessária.
	 *
	 * @param Float $numero
	 * @return String
	 */
	public static function numero($numero) {

		return rtrim ( rtrim ( number_format ( $numero, 1, ',', '' ), '0' ), ',' );
	}

	/**
	 * Faixa de altura por extenso, para rótulo e texto alternativo.
	 *
	 * @param Muda $muda
	 * @return String
	 */
	public static function faixaTexto($muda) {

		$faixa = $muda->alturaMinMax ();
		if (! $faixa) {
			return '';
		}

		return self::numero ( $faixa ['min'] ) . '–' . self::numero ( $faixa ['max'] ) . ' m';
	}

	/**
	 * Eixo vertical com os valores da escala.
	 *
	 * @return String
	 */
	private static function eixo() {

		$html = '<div class="porte-axis" aria-hidden="true">';

		foreach ( array (60, 45, 30, 15, 0 ) as $marca ) {
			$html .= '<span style="--at:' . self::pct ( $marca ) . '">' . $marca . ($marca ? '' : ' m') . '</span>';
		}

		return $html . '</div>';
	}

	/**
	 * Linhas de referência dentro da área do gráfico.
	 *
	 * @return String
	 */
	private static function marcasReferencia() {

		$html = '';

		foreach ( self::referencias () as $ref ) {
			$html .= '<div class="porte-ref" style="--at:' . self::pct ( $ref ['metros'] ) . '">'
				. '<span>' . $ref ['texto'] . '</span></div>';
		}

		return $html;
	}

	/**
	 * Uma coluna do gráfico.
	 *
	 * @param Muda $muda
	 * @param Boolean $comLink
	 * @return String
	 */
	private static function coluna($muda, $comLink = false) {

		$faixa = $muda->alturaMinMax ();
		if (! $faixa) {
			return '';
		}

		// --max mede a barra contra a escala; --minrel divide a barra entre a
		// parte garantida (sólida) e a variação até o máximo (hachurada)
		$max = self::pct ( $faixa ['max'] );
		$minrel = round ( ($faixa ['min'] / $faixa ['max']) * 100, 2 ) . '%';

		$nome = htmlspecialchars ( $muda->getNomePopular (), ENT_QUOTES, 'UTF-8' );
		$rotulo = $comLink ? '<a href="' . $muda->getUrl () . '">' . $nome . '</a>' : $nome;

		return '<div class="porte-col" style="--max:' . $max . ';--minrel:' . $minrel . '">'
			. '<span class="porte-val">' . self::faixaTexto ( $muda ) . '</span>'
			. '<div class="porte-bar"><div class="porte-range"></div><div class="porte-sure"></div></div>'
			. '<span class="porte-label">' . $rotulo . '</span>'
			. '</div>';
	}

	/**
	 * Gráfico com várias espécies — usado no hero da home.
	 *
	 * @param Muda[] $mudas
	 * @return String
	 */
	public static function chart($mudas) {

		$descricao = array ();
		foreach ( $mudas as $muda ) {
			$descricao [] = $muda->getNomePopular () . ', ' . self::faixaTexto ( $muda );
		}

		$colunas = '';
		foreach ( $mudas as $muda ) {
			$colunas .= self::coluna ( $muda, true );
		}

		return '<div class="porte-chart" role="img" aria-label="Porte de espécies do catálogo em escala de 0 a 60 metros: '
			. htmlspecialchars ( implode ( '; ', $descricao ), ENT_QUOTES, 'UTF-8' ) . '.">'
			. self::eixo ()
			. '<div class="porte-plot">' . self::marcasReferencia () . $colunas . '</div>'
			. '</div>';
	}

	/**
	 * Régua de uma espécie só — usada na ficha.
	 *
	 * @param Muda $muda
	 * @return String
	 */
	public static function single($muda) {

		$faixa = $muda->alturaMinMax ();

		if (! $faixa) {
			// trepadeiras e afins: dizer que não se aplica é melhor que desenhar
			// uma barra vazia
			return '<p class="porte-caption">Porte arbóreo não se aplica a esta espécie.</p>';
		}

		return '<div class="porte-single" role="img" aria-label="Altura de '
			. htmlspecialchars ( $muda->getNomePopular (), ENT_QUOTES, 'UTF-8' ) . ': '
			. self::faixaTexto ( $muda ) . ', em escala de 0 a 60 metros.">'
			. self::eixo ()
			. '<div class="porte-plot">' . self::marcasReferencia () . self::coluna ( $muda ) . '</div>'
			. '</div>'
			. '<p class="porte-caption">Altura adulta · escala 0–60 m · faixa hachurada = variação até o máximo</p>';
	}

	/**
	 * Barra minúscula para a linha do catálogo, para dar de varrer 142 espécies
	 * por porte com o olho.
	 *
	 * @param Muda $muda
	 * @return String
	 */
	public static function mini($muda) {

		$faixa = $muda->alturaMinMax ();
		if (! $faixa) {
			return '<span class="porte-mini" aria-hidden="true"></span>';
		}

		$sure = self::pct ( $faixa ['min'] );
		$range = self::pct ( $faixa ['max'] - $faixa ['min'] );

		return '<span class="porte-mini" aria-hidden="true" style="--minrel:' . $sure . ';--rangerel:' . $range . '">'
			. '<i class="m-sure"></i><i class="m-range"></i></span>';
	}

	/**
	 * Faixa de fenologia — só aparece quando o período foi reconhecido.
	 *
	 * @param Muda $muda
	 * @return String
	 */
	public static function fenologia($muda) {

		$floracao = $muda->mesesFloracao ();
		$frutificacao = $muda->mesesFrutificacao ();

		if (! $floracao && ! $frutificacao) {
			return '';
		}

		$iniciais = array ('J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D' );

		$html = '<div class="pheno"><h3>Fenologia</h3>';

		$html .= '<div class="pheno-row pheno-head"><span></span>';
		foreach ( $iniciais as $inicial ) {
			$html .= '<span>' . $inicial . '</span>';
		}
		$html .= '</div>';

		if ($floracao) {
			$cor = self::corDaFloracao ( $muda->getCorFloracao () );
			$html .= '<div class="pheno-row"><span class="pheno-label">Floração</span>';
			for($mes = 1; $mes <= 12; $mes ++) {
				$estilo = $floracao [$mes] && $cor ? ' style="--cor:' . $cor . '"' : '';
				$html .= '<span class="pheno-cell' . ($floracao [$mes] ? ' on' : '') . '"' . $estilo . '></span>';
			}
			$html .= '</div>';
		}

		if ($frutificacao) {
			$html .= '<div class="pheno-row"><span class="pheno-label">Frutificação</span>';
			for($mes = 1; $mes <= 12; $mes ++) {
				$html .= '<span class="pheno-cell' . ($frutificacao [$mes] ? ' on-fruit' : '') . '"></span>';
			}
			$html .= '</div>';
		}

		$nota = array ();
		if ($floracao && $muda->getFloracao ()) {
			$nota [] = 'Floração: ' . $muda->getFloracao ();
		}
		if ($frutificacao && $muda->getFrutificacao ()) {
			$nota [] = 'Frutificação: ' . $muda->getFrutificacao ();
		}
		if ($nota) {
			$html .= '<p class="pheno-note">' . htmlspecialchars ( implode ( ' · ', $nota ), ENT_QUOTES, 'UTF-8' ) . '</p>';
		}

		return $html . '</div>';
	}

	/**
	 * Traduz a cor da floração descrita no catálogo para um valor de tela.
	 * Cor desconhecida cai no verde padrão da faixa, nunca em uma cor inventada.
	 *
	 * @param String $descricao
	 * @return String
	 */
	private static function corDaFloracao($descricao) {

		if (! $descricao) {
			return '';
		}

		$cores = array (
			'amarelo-alaranjada' => '#E9A020',
			'amarelo-claro' => '#EBD473',
			'amarela' => '#E5B92B',
			'vermelho-alaranjada' => '#D9541F',
			'vermelha' => '#B8281E',
			'branco-rósea' => '#F0D5DC',
			'róseo-branca' => '#F0D5DC',
			'róseo-avermelhada' => '#C9647A',
			'lilás-rósea' => '#C08BC0',
			'azul-violeta' => '#5C5BA8',
			'lilás' => '#9B7CC0',
			'rosa' => '#DC8AA6',
			'branca' => '#F2F0E8'
		);

		$chave = mb_strtolower ( trim ( $descricao ), 'UTF-8' );

		return isset ( $cores [$chave] ) ? $cores [$chave] : '';
	}

}

?>
