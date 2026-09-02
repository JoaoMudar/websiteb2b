<?php

/**
 * Sitemap XML gerado em tempo de execução.
 *
 * Gerado, e não gravado em arquivo, para nunca ficar desatualizado: incluir uma
 * espécie no CSV já a coloca no sitemap.
 */
abstract class ViewSitemap implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$base = _Path::getURL ();
		$urls = array ();

		// Fontes de cada grupo de página, para a data de última alteração.
		// O layout compartilhado fica de fora de propósito: um ajuste no rodapé
		// não é motivo para avisar o Google de que o site inteiro mudou.
		$catalogo = array (
			'system/view/ViewMudas.class.php',
			'system/template/mudas/index.tpl.html',
			'system/template/mudas/mudas.tpl.html',
			'system/data/arvores.csv'
		);
		$solucoes = array (
			'system/view/ViewSolucao.class.php',
			'system/template/solucoes/index.tpl.html'
		);
		$entrega = array (
			'system/view/ViewEntrega.class.php',
			'system/template/entrega/index.tpl.html'
		);

		// institucionais
		$urls [] = array ('loc' => $base, 'priority' => '1.0', 'changefreq' => 'monthly', 'lastmod' => self::lastmod ( array (
			'system/view/ViewHome.class.php',
			'system/template/home/index.tpl.html'
		) ) );
		$urls [] = array ('loc' => $base . 'empresa', 'priority' => '0.7', 'changefreq' => 'yearly', 'lastmod' => self::lastmod ( array (
			'system/view/ViewEmpresa.class.php',
			'system/template/empresa/index.tpl.html'
		) ) );
		$urls [] = array ('loc' => $base . 'contato', 'priority' => '0.8', 'changefreq' => 'yearly', 'lastmod' => self::lastmod ( array (
			'system/view/ViewContato.class.php',
			'system/template/contato/index.tpl.html'
		) ) );
		// As perguntas moram na própria view, não no template.
		$urls [] = array ('loc' => $base . 'perguntas-frequentes', 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => self::lastmod ( array (
			'system/view/ViewFaq.class.php',
			'system/template/faq/index.tpl.html'
		) ) );
		$urls [] = array ('loc' => $base . 'fotos', 'priority' => '0.4', 'changefreq' => 'yearly', 'lastmod' => self::lastmod ( array (
			'system/view/ViewFotos.class.php',
			'system/template/fotos/index.tpl.html'
		) ) );
		$urls [] = array ('loc' => $base . 'links', 'priority' => '0.3', 'changefreq' => 'yearly', 'lastmod' => self::lastmod ( array (
			'system/view/ViewLinks.class.php',
			'system/template/links/index.tpl.html'
		) ) );

		// soluções: o cluster de maior valor comercial
		$urls [] = array ('loc' => $base . 'compensacao-florestal-e-prad', 'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => self::lastmod ( $solucoes ) );
		$urls [] = array ('loc' => $base . 'recuperacao-de-mata-ciliar', 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => self::lastmod ( $solucoes ) );

		// entrega
		$urls [] = array ('loc' => $base . 'entrega', 'priority' => '0.6', 'changefreq' => 'monthly', 'lastmod' => self::lastmod ( $entrega ) );

		$entregaCidade = self::lastmod ( array_merge ( $entrega, array ('system/classes/Cidade.class.php' ) ) );
		foreach ( array_keys ( Cidade::todas () ) as $slug ) {
			$urls [] = array ('loc' => $base . 'entrega/' . $slug, 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => $entregaCidade );
		}

		// catálogo e recortes
		$catalogoLastmod = self::lastmod ( $catalogo );

		$urls [] = array ('loc' => $base . 'mudas', 'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $catalogoLastmod );
		$recortes = array (
			'especies-nativas',
			'especies-para-recuperacao-de-area-degradada-e-mata-ciliar',
			'especies-com-floracao-exuberante',
			'especies-para-sombreamento',
			'especies-frutas-para-consumo-humano',
			'especies-exoticas'
		);
		foreach ( $recortes as $recorte ) {
			$urls [] = array ('loc' => $base . 'mudas/' . $recorte . '/', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => $catalogoLastmod );
		}

		// espécies: nativas com prioridade maior, conforme o foco do negócio
		$especieLastmod = self::lastmod ( array (
			'system/data/arvores.csv',
			'system/classes/Muda.class.php',
			'system/view/ViewMudas.class.php'
		) );

		foreach ( Muda::retornaListaMudas () as $muda ) {
			$urls [] = array (
				'loc' => $base . 'mudas/' . $muda->getSlug (),
				'priority' => $muda->isNativa () ? '0.6' : '0.4',
				'changefreq' => 'yearly',
				'lastmod' => $especieLastmod
			);
		}

		header ( 'Content-Type: application/xml; charset=UTF-8' );

		echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

		foreach ( $urls as $url ) {
			echo "  <url>\n";
			echo '    <loc>' . htmlspecialchars ( $url ['loc'], ENT_QUOTES, 'UTF-8' ) . "</loc>\n";

			// Tag vazia invalida o sitemap inteiro; sem data, melhor omitir.
			if (! empty ( $url ['lastmod'] )) {
				echo '    <lastmod>' . $url ['lastmod'] . "</lastmod>\n";
			}

			echo '    <changefreq>' . $url ['changefreq'] . "</changefreq>\n";
			echo '    <priority>' . $url ['priority'] . "</priority>\n";
			echo "  </url>\n";
		}

		echo '</urlset>';
	}

	/**
	 * Data da última alteração dos arquivos que produzem uma página.
	 *
	 * O deploy é FTP incremental: só o arquivo alterado é reenviado, e é o envio
	 * que atualiza o mtime. Por isso o mtime no servidor é a data real da
	 * mudança daquela página, e não a data do último deploy do site inteiro.
	 *
	 * @param Array $arquivos Caminhos relativos à raiz do site
	 * @return String Data em Y-m-d, ou vazio quando nenhum arquivo foi lido
	 */
	private static function lastmod($arquivos) {

		$raiz = _Path::getURL_BAS ();
		$maior = 0;
		$agora = time ();

		foreach ( $arquivos as $arquivo ) {

			$caminho = $raiz . $arquivo;

			if (! is_file ( $caminho )) {
				continue;
			}

			$mtime = filemtime ( $caminho );

			// Relógio adiantado no servidor produziria data no futuro, e o
			// Google descarta o sitemap inteiro por causa dela.
			if ($mtime > $maior && $mtime <= $agora) {
				$maior = $mtime;
			}
		}

		return $maior ? gmdate ( 'Y-m-d', $maior ) : '';
	}

}

?>
