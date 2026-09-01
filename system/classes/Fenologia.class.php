<?php

/**
 * Desenha a faixa de fenologia — os doze meses do ano com floração e
 * frutificação marcadas.
 *
 * É o dado que sobra da ficha depois que a régua de porte saiu: a altura da
 * árvore adulta induzia o leitor a achar que vendíamos a árvore pronta, e o
 * tamanho que importa para o comprador é o da muda na entrega, que vai no card
 * "Tamanho na entrega" da lateral.
 */
abstract class Fenologia {

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
