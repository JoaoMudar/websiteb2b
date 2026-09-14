<?php

/**
 * Fotos da galeria.
 *
 * As fotos vivem em system/data/galeria.csv, uma planilha que o cliente edita
 * sem tocar em PHP, no mesmo formato do arvores.csv. Publicar uma foto nova é
 * copiar o arquivo para system/images/ e escrever uma linha na planilha.
 *
 * Linha cujo arquivo não está em disco é descartada em silêncio: assim uma
 * planilha adiantada nunca deixa <img> quebrada na página.
 *
 * Substitui a galeria antiga, que pedia os álbuns ao Picasa Web. Aquela API foi
 * desligada pelo Google em 2019 e respondia 404, então a página vinha vazia
 * desde então; e o embed do Google Fotos que estava embaixo dela apontava para
 * URLs lh3.googleusercontent.com que expiraram e respondem 403. Nenhum dos dois
 * dependia de nós para voltar a funcionar. Este depende.
 */
class Galeria {

	/**
	 * Largura a partir da qual a foto vale uma ampliação.
	 *
	 * A grade mostra a foto a 340 px, então vale ampliar a partir de mais ou
	 * menos o dobro disso — abaixo, o lightbox só mostraria a mesma imagem, e
	 * não oferecer a ampliação é melhor do que oferecer uma que não amplia.
	 * O lightbox nunca estica além do tamanho real do arquivo.
	 */
	const LARGURA_AMPLIACAO = 560;

	/**
	 * Largura da miniatura servida na grade.
	 *
	 * A grade mostra a foto a 340 px; 700 px cobre isso com folga inclusive em
	 * tela retina, e é o que evita baixar quase um megabyte de original para
	 * exibir quatro selos.
	 */
	const LARGURA_THUMB = 700;

	/**
	 * Miniatura da foto, gerada uma vez e guardada em disco.
	 *
	 * Feita aqui, e não por um script que alguém precisa lembrar de rodar, para
	 * que a promessa da galeria continue sendo "copie o arquivo e escreva uma
	 * linha na planilha".
	 *
	 * Qualquer falha — sem GD, pasta sem permissão de escrita, JPEG que o PHP
	 * não abre — devolve o próprio original: a página fica mais pesada, nunca
	 * quebrada.
	 *
	 * @param String $relativo Caminho a partir de system/images/
	 * @param Integer $largura Largura do original
	 * @return String Caminho relativo da miniatura, ou o do original
	 */
	private static function miniatura($relativo, $largura) {

		if ($largura <= self::LARGURA_THUMB) {
			return $relativo; // já é pequena o bastante
		}

		$thumb = 'thumbs/' . str_replace ( '/', '_', $relativo );
		$destino = _Path::getIMAGE_BAS () . $thumb;

		if (is_file ( $destino )) {
			return $thumb;
		}

		if (! function_exists ( 'imagecreatefromjpeg' )) {
			return $relativo;
		}

		$pasta = dirname ( $destino );
		if (! is_dir ( $pasta ) && ! @mkdir ( $pasta, 0755, true )) {
			return $relativo;
		}

		$origem = @imagecreatefromjpeg ( _Path::getIMAGE_BAS () . $relativo );
		if (! $origem) {
			return $relativo;
		}

		$alturaOriginal = imagesy ( $origem );
		$alturaNova = ( int ) round ( $alturaOriginal * self::LARGURA_THUMB / $largura );

		$nova = imagecreatetruecolor ( self::LARGURA_THUMB, $alturaNova );
		imagecopyresampled ( $nova, $origem, 0, 0, 0, 0, self::LARGURA_THUMB, $alturaNova, $largura, $alturaOriginal );
		imageinterlace ( $nova, 1 );

		$ok = @imagejpeg ( $nova, $destino, 80 );

		imagedestroy ( $origem );
		imagedestroy ( $nova );

		return $ok ? $thumb : $relativo;
	}

	/**
	 * Fotos válidas do CSV. Carregado uma única vez por requisição.
	 *
	 * @var Array
	 */
	private static $fotos = null;

	/**
	 * Lê a planilha uma única vez e mantém em cache estático.
	 *
	 * @return void
	 */
	private static function carrega() {

		if (self::$fotos !== null) {
			return;
		}

		self::$fotos = array ();

		$arquivo = _Path::getURL_BAS () . 'system/data/galeria.csv';
		if (! file_exists ( $arquivo )) {
			return;
		}

		$handle = fopen ( $arquivo, 'r' );
		if (! $handle) {
			return;
		}

		$cabecalho = fgetcsv ( $handle, 0, ';' );
		if ($cabecalho === false) {
			fclose ( $handle );
			return;
		}

		// O arquivo é salvo com BOM para abrir corretamente no Excel
		$cabecalho [0] = preg_replace ( '/^\xEF\xBB\xBF/', '', $cabecalho [0] );

		while ( ($linha = fgetcsv ( $handle, 0, ';' )) !== false ) {

			if (count ( $linha ) == 1 && trim ( $linha [0] ) === '') {
				continue; // linha em branco
			}

			$registro = array ();
			foreach ( $cabecalho as $i => $coluna ) {
				$registro [$coluna] = isset ( $linha [$i] ) ? trim ( $linha [$i] ) : '';
			}

			if (! isset ( $registro ['arquivo'] ) || $registro ['arquivo'] === '') {
				continue;
			}

			// O caminho é relativo a system/images/ e vem de uma planilha que o
			// cliente edita à mão. Lista branca em vez de lista negra: só passa
			// letra, dígito, traço, ponto, sublinhado e barra. Contrabarra, ":" e
			// qualquer outra coisa já ficam de fora por não estarem na lista, e o
			// ".." e a barra inicial são barrados à parte.
			$caminho = $registro ['arquivo'];

			if (! preg_match ( '/^[A-Za-z0-9_\-\/.]+$/', $caminho )
				|| strpos ( $caminho, '..' ) !== false
				|| substr ( $caminho, 0, 1 ) === '/') {
				continue;
			}

			$absoluto = _Path::getIMAGE_BAS () . $caminho;
			if (! is_file ( $absoluto )) {
				continue;
			}

			$dimensoes = getimagesize ( $absoluto );
			if ($dimensoes === false) {
				continue; // não é imagem que o PHP saiba ler
			}

			self::$fotos [] = array (
				'url' => _Path::getIMAGE_PATH () . $caminho,
				'thumb' => _Path::getIMAGE_PATH () . self::miniatura ( $caminho, $dimensoes [0] ),
				'unidade' => isset ( $registro ['unidade'] ) ? $registro ['unidade'] : '',
				'legenda' => isset ( $registro ['legenda'] ) ? $registro ['legenda'] : '',
				// Sem alt próprio a legenda serve; alt vazio em foto de conteúdo
				// deixa o leitor de tela sem nada para anunciar.
				'alt' => (isset ( $registro ['alt'] ) && $registro ['alt'] !== '') ? $registro ['alt'] : $registro ['legenda'],
				'largura' => $dimensoes [0],
				'altura' => $dimensoes [1],
				'ampliavel' => $dimensoes [0] >= self::LARGURA_AMPLIACAO
			);
		}

		fclose ( $handle );
	}

	/**
	 * Fotos de uma unidade, na ordem da planilha.
	 *
	 * @param String $unidade 'agrolandia' ou 'itapema'
	 * @return Array
	 */
	public static function porUnidade($unidade) {

		self::carrega ();

		$fotos = array ();
		foreach ( self::$fotos as $foto ) {
			if ($foto ['unidade'] === $unidade) {
				$fotos [] = $foto;
			}
		}

		return $fotos;
	}

	/**
	 * Alguma foto da unidade merece ampliação?
	 *
	 * Serve para não mandar ao navegador o script do lightbox numa página em que
	 * nenhuma foto é clicável.
	 *
	 * @param String $unidade
	 * @return Boolean
	 */
	public static function temAmpliavel($unidade) {

		foreach ( self::porUnidade ( $unidade ) as $foto ) {
			if ($foto ['ampliavel']) {
				return true;
			}
		}

		return false;
	}

}

?>
