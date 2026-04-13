<?php

/**
 * Classe responsável por administrar as views das mudas
 *
 * @author Tiago Piske
 */
abstract class ViewMudas implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'mudas' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // home
				self::index ();
				break;

			case (bool)preg_match ( '/^\\/especies-exoticas\\/?$/', $area ) : // Espécies Exóticas
				self::pesquisaAvancada ( FimPlantio::EX );
				break;

			case (bool)preg_match ( '/^\\/especies-para-sombreamento\\/?$/', $area ) : // Espécies para sombreamento
				self::pesquisaAvancada ( FimPlantio::S );
				break;

			case (bool)preg_match ( '/^\\/especies-frutas-para-consumo-humano\\/?$/', $area ) : // Espécies Frutas para consumo humano
				self::pesquisaAvancada ( FimPlantio::FH );
				break;

			case (bool)preg_match ( '/^\\/especies-com-floracao-exuberante\\/?$/', $area ) : // Espécies Com floração exuberante
				self::pesquisaAvancada ( FimPlantio::FLOR );
				break;

			case (bool)preg_match ( '/^\\/especies-para-recuperacao-de-area-degradada-e-mata-ciliar\\/?$/', $area ) : // Espécies Para recuperação de área degradada e mata ciliar
				self::pesquisaAvancada ( Array (FimPlantio::RMC, FimPlantio::RAD ) );
				break;

			case (bool)preg_match ( '/^\\/(.)*$/', $area ) : // descrição das mudas
				$idMuda = substr ( $area, 1 );
				self::mudas ( $idMuda );
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página das mudas e embalagens.
	 *
	 * @return void
	 */
	private static function index() {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'mudas/index.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		
		$html->docOpen ();
		
		$listaMudas = Muda::retornaListaMudas ();
		
		$strLinhasMudas = '';
		$linhaMuda = $tpl->get ( 'linhaMuda' );
		for($i = 0; $i < count ( $listaMudas ); $i ++) {
			$muda = $listaMudas [$i];
			$strLinhasMudas .= sprintf ( $linhaMuda, $muda->getIdMuda (), //identificador da muda para exibir na tabela 
														$muda->getIdMuda (), //identificador da muda para chamada poupup
														$muda->getNomePopular (), //nome popular
														$muda->getNomeCientifico (), //nome científico
														$muda->getFloracao (), //floração
														$muda->getFrutificacao () ); //frutificação
		}
		
		$tpl->setVar ( 'LINHAS_MUDAS', $strLinhasMudas );
		
		$tpl->show ( 'index' );
		
		$html->docClose ();
	}

	/**
	 * Apresenta a página das mudas de acordo com um tipo de plantio
	 * 
	 * @param FimPlantio[array] - $tipoPlantio
	 * 
	 * @return void
	 */
	private static function pesquisaAvancada($tipoPlantio) {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'mudas/index.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		
		$html->docOpen ();
		
		$listaMudas = Muda::pesquisaAvancada ( $tipoPlantio );
		
		$strLinhasMudas = '';
		$linhaMuda = $tpl->get ( 'linhaMuda' );
		for($i = 0; $i < count ( $listaMudas ); $i ++) {
			$muda = $listaMudas [$i];
			$strLinhasMudas .= sprintf ( $linhaMuda, $muda->getIdMuda (), //identificador da muda para exibir na tabela 
													$muda->getIdMuda (), //identificador da muda para chamada poupup
													$muda->getNomePopular (), //nome popular
													$muda->getNomeCientifico (), //nome científico
													$muda->getFloracao (), //floração
													$muda->getFrutificacao () ); //frutificação
		}
		
		$tpl->setVar ( 'LINHAS_MUDAS', $strLinhasMudas );
		
		$tpl->show ( 'index' );
		
		$html->docClose ();
	}

	/**
	 * Apresenta a página da das mudas.
	 * 
	 * @param Integer $idMuda
	 * @return void
	 */
	private static function mudas($idMuda) {

		$html = new HtmlMainPoupUp ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'mudas/mudas.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		
		$html->docOpen ();
		
		$muda = new Muda ( $idMuda );
		
		$tpl->setVar ( 'NOME_POPULAR', $muda->getNomePopular () );
		$tpl->setVar ( 'NOME_CIENTIFICO', $muda->getNomeCientifico () );
		
		$strFinsPlantio = '';
		$finsPlantio = $muda->getFinsPlantio ();
		for($i = 0; $i < count ( $finsPlantio ); $i ++) {
			$strFinsPlantio .= $tpl->get ( $finsPlantio [$i] );
		}
		$tpl->setVar ( 'FINS_PLANTIO', $strFinsPlantio );
		
		$tpl->setVar ( 'COMPORTAMENTO_FOLHAR', $tpl->get ( $muda->getComportamentoFolhar () ) );
		$tpl->setVar ( 'ALTURA', $muda->getAltura () );
		$tpl->setVar ( 'FLORACAO', $muda->getFloracao () );
		$tpl->setVar ( 'FRUTIFICACAO', $muda->getFrutificacao () );
		$tpl->setVar ( 'COR_FLORACAO', $muda->getCorFloracao () );
		$tpl->setVar ( 'REGIOES_CULTIVO', $muda->getRegioesCultivo () );
		$tpl->setVar ( 'URL_MAPA_REGIAO', $muda->getMapaRegiao () );
		$tpl->setVar ( 'MAPA_REGIAO', $tpl->get ( 'mapaRegiao' ) );
		
		$tpl->show ( 'muda' );
		
		$html->docClose ();
	}

}

?>