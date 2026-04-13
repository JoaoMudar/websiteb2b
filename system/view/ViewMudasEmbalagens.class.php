<?php

/**
 * Classe responsável por administrar as views das mudas e embalagens
 *
 * @author Tiago Piske
 */
abstract class ViewMudasEmbalagens implements IView {

	/**
	 * Inicializa a classe view
	 *
	 * @return void
	 */
	public static function init() {

		$area = _Formatting::returnAccessedArea ( 'mudas-e-embalagens' );
		switch (true) {

			case (bool)preg_match ( '/^\\/?$/', $area ) : // home
				self::index ();
				break;

			case (bool)preg_match ( '/^\\/(.)*$/', $area ) : // descrição das mudas
				$idMudaEmbalagem = substr ( $area, 1 );
				self::mudas ( $idMudaEmbalagem );
				break;

			default : // página inexistente
				ViewPageNotFound::init ();
				break;
		}
	}

	/**
	 * Apresenta a página da das mudas e embalagens.
	 *
	 * @return void
	 */
	private static function index() {

		$html = new HtmlMain ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'mudasEmbalagens/index.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		
		$html->docOpen ();
		
		$listaMudas = MudaEmbalagem::retornaListaMudas ();
		
		$strLinhasMudas = '';
		$linhaMuda = $tpl->get ( 'linhaMuda' );
		for($i = 0; $i < count ( $listaMudas ); $i ++) {
			$mudaEmbalagem = $listaMudas [$i];
			$strLinhasMudas .= sprintf ( $linhaMuda,$mudaEmbalagem->getIdMudaEmbalagem (), //identificador da muda para exibir na tabela 
													$mudaEmbalagem->getIdMudaEmbalagem (), //identificador da muda para chamada poupup
													$mudaEmbalagem->getNomePopular (), //nome popular
													$mudaEmbalagem->getFloracao (), //floração
													$mudaEmbalagem->getFrutificacao (), //frutificação
													$mudaEmbalagem->getCorFloracao () ); //cor da frutificação
		

		}
		
		$tpl->setVar ( 'LINHAS_MUDAS', $strLinhasMudas );
		
		$tpl->show ( 'index' );
		
		$html->docClose ();
	}

	/**
	 * Apresenta a página da das mudas e embalagens.
	 * 
	 * @param Integer $idMudaEmbalagem
	 * @return void
	 */
	private static function mudas($idMudaEmbalagem) {

		$html = new HtmlMainPoupUp ( );
		$tpl = new Template ( _Path::getTEMPLATE_BAS () . 'mudasEmbalagens/mudas.tpl.html' );
		$tpl->setVar ( 'IMAGE_PATH', _Path::getIMAGE_PATH () );
		$tpl->setVar ( 'JS_PATH', _Path::getJS_PATH () );
		$tpl->setVar ( 'URL_PATH', _Path::getURL_PATH () );
		
		$html->docOpen ();
		
		$mudaEmbalagem = new MudaEmbalagem ( $idMudaEmbalagem );
		
		$tpl->setVar ( 'NOME_POPULAR', $mudaEmbalagem->getNomePopular () );
		$tpl->setVar ( 'NOME_CIENTIFICO', $mudaEmbalagem->getNomeCientifico () );
		
		$strFinsPlantio = '';
		$finsPlantio = $mudaEmbalagem->getFinsPlantio ();
		for($i = 0; $i < count ( $finsPlantio ); $i ++) {
			$strFinsPlantio .= $tpl->get ( $finsPlantio [$i] );
		}
		$tpl->setVar ( 'FINS_PLANTIO', $strFinsPlantio );
		
		$tpl->setVar ( 'COMPORTAMENTO_FOLHAR', $tpl->get ( $mudaEmbalagem->getComportamentoFolhar () ) );
		$tpl->setVar ( 'ALTURA', $mudaEmbalagem->getAltura () );
		$tpl->setVar ( 'FLORACAO', $mudaEmbalagem->getFloracao () );
		$tpl->setVar ( 'FRUTIFICACAO', $mudaEmbalagem->getFrutificacao () );
		$tpl->setVar ( 'COR_FLORACAO', $mudaEmbalagem->getCorFloracao () );
		$tpl->setVar ( 'REGIOES_CULTIVO', $mudaEmbalagem->getRegioesCultivo () );
		$tpl->setVar ( 'URL_MAPA_REGIAO', $mudaEmbalagem->getMapaRegiao () );
		$tpl->setVar ( 'MAPA_REGIAO', $tpl->get ( 'mapaRegiao' ) );
		
		$tpl->show ( 'muda' );
		
		$html->docClose ();
	}

}

?>