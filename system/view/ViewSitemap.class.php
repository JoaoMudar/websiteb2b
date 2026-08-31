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

		// institucionais
		$urls [] = array ('loc' => $base, 'priority' => '1.0', 'changefreq' => 'monthly' );
		$urls [] = array ('loc' => $base . 'empresa', 'priority' => '0.7', 'changefreq' => 'yearly' );
		$urls [] = array ('loc' => $base . 'servicos', 'priority' => '0.7', 'changefreq' => 'yearly' );
		$urls [] = array ('loc' => $base . 'contato', 'priority' => '0.8', 'changefreq' => 'yearly' );
		$urls [] = array ('loc' => $base . 'perguntas-frequentes', 'priority' => '0.8', 'changefreq' => 'monthly' );
		$urls [] = array ('loc' => $base . 'fotos', 'priority' => '0.4', 'changefreq' => 'yearly' );
		$urls [] = array ('loc' => $base . 'links', 'priority' => '0.3', 'changefreq' => 'yearly' );

		// soluções — o cluster de maior valor comercial
		$urls [] = array ('loc' => $base . 'compensacao-florestal-e-prad', 'priority' => '0.9', 'changefreq' => 'monthly' );
		$urls [] = array ('loc' => $base . 'recuperacao-de-mata-ciliar', 'priority' => '0.8', 'changefreq' => 'monthly' );
		$urls [] = array ('loc' => $base . 'arborizacao-urbana', 'priority' => '0.8', 'changefreq' => 'monthly' );

		// entrega
		$urls [] = array ('loc' => $base . 'entrega', 'priority' => '0.6', 'changefreq' => 'monthly' );
		foreach ( array_keys ( Cidade::todas () ) as $slug ) {
			$urls [] = array ('loc' => $base . 'entrega/' . $slug, 'priority' => '0.7', 'changefreq' => 'monthly' );
		}

		// catálogo e recortes
		$urls [] = array ('loc' => $base . 'mudas', 'priority' => '0.9', 'changefreq' => 'monthly' );
		$recortes = array (
			'especies-nativas',
			'especies-para-recuperacao-de-area-degradada-e-mata-ciliar',
			'especies-com-floracao-exuberante',
			'especies-para-sombreamento',
			'especies-frutas-para-consumo-humano',
			'especies-exoticas'
		);
		foreach ( $recortes as $recorte ) {
			$urls [] = array ('loc' => $base . 'mudas/' . $recorte . '/', 'priority' => '0.7', 'changefreq' => 'monthly' );
		}

		// espécies: nativas com prioridade maior, conforme o foco do negócio
		foreach ( Muda::retornaListaMudas () as $muda ) {
			$urls [] = array (
				'loc' => $base . 'mudas/' . $muda->getSlug (),
				'priority' => $muda->isNativa () ? '0.6' : '0.4',
				'changefreq' => 'yearly'
			);
		}

		header ( 'Content-Type: application/xml; charset=UTF-8' );

		echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

		foreach ( $urls as $url ) {
			echo "  <url>\n";
			echo '    <loc>' . htmlspecialchars ( $url ['loc'], ENT_QUOTES, 'UTF-8' ) . "</loc>\n";
			echo '    <changefreq>' . $url ['changefreq'] . "</changefreq>\n";
			echo '    <priority>' . $url ['priority'] . "</priority>\n";
			echo "  </url>\n";
		}

		echo '</urlset>';
	}

}

?>
