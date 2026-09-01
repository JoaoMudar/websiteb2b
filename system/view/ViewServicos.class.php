<?php

/**
 * Classe responsável por administrar as views dos serviços.
 *
 * @author Tiago Piske
 */
abstract class ViewServicos implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'servicos' );
		switch (true) {

			case (bool)preg_match ( '/^\/?$/', $area ) :
				self::indexServicos ();
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página dos serviços — hub que distribui para as landings.
	 *
	 * @return void
	 */
	private static function indexServicos() {

		$mensagem = 'Olá! Vim pela página de serviços do site e queria um orçamento.';

		$html = new HtmlMain ( );
		$html->setTitle ( 'Serviços Florestais — Reflorestamento e Recuperação Ambiental' );
		$html->setDescription ( 'Recuperação de áreas degradadas, mata ciliar, reflorestamento, arborização urbana e tratos silviculturais em SC, PR e RS, com engenheiro florestal responsável.' );
		$html->setCanonical ( 'servicos' );
		$html->setWhatsappMessage ( $mensagem, 'Falar no WhatsApp' );
		$html->addJsonLd ( Seo::breadcrumbJsonLd ( array (
			array ('nome' => 'Início', 'url' => _Path::getURL () ),
			array ('nome' => 'Serviços', 'url' => _Path::getURL () . 'servicos' )
		) ) );
		$html->addJsonLd ( Seo::serviceJsonLd ( 'Serviços florestais e ambientais', 'Recuperação de áreas degradadas, mata ciliar, reflorestamento, arborização urbana, poda e tratos silviculturais.', _Path::getURL () . 'servicos' ) );

		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'servicos/index.tpl.html' );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH () );
		$tpl->setVar ( 'TOTAL_MUDAS', Muda::total () );
		$tpl->setVar ( 'PLACA_CLARA', Seo::specPlateHtml ( 'spec-plate-light' ) );
		$tpl->setVar ( 'CTA', Seo::whatsappButtonHtml ( $mensagem, 'Pedir orçamento no WhatsApp', 'servicos' ) );
		$tpl->setVar ( 'CTA_LATERAL', Seo::whatsappButtonHtml ( $mensagem, 'Falar no WhatsApp', 'servicos-lateral' ) );

		$html->docOpen ();

		$tpl->show ( 'indexServicos' );

		$html->docClose ();
	}

}

?>
