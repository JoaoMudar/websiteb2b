<?php

/**
 * Classe responsável por gerenciar as informações de uma muda e embalagem
 * 
 * @author Tiago Piske
 */
class Muda {

	/**
	 * Identificador da muda
	 *
	 * @var Integer
	 */
	private $idMuda;

	/**
	 * Nome popular
	 *
	 * @var String
	 */
	private $nomePopular;

	/**
	 * Nome ciêntifico
	 *
	 * @var String
	 */
	private $nomeCientifico;

	/**
	 * Plantios para fins de...
	 *
	 * @var Array
	 */
	private $finsPlantio;

	/**
	 * Comportamento folhar
	 *
	 * @var String
	 */
	private $comportamentoFolhar;

	/**
	 * Altura da muda
	 *
	 * @var String
	 */
	private $altura;

	/**
	 * Período de floração
	 *
	 * @var String
	 */
	private $floracao;

	/**
	 * Período de frutificação
	 *
	 * @var String
	 */
	private $frutificacao;

	/**
	 * Cor da floração quando houver
	 *
	 * @var String
	 */
	private $corFloracao;

	/**
	 * Regiões de ocorrência e cultivo das espécies
	 *
	 * @var String
	 */
	private $regioesCultivo;

	/**
	 * Caminho[URL] do Mapa da região de ocorrência e cultivo das espécies
	 *
	 * @var String
	 */
	private $mapaRegiao;

	/**
	 * Caminho[URL] da Foto da muda
	 *
	 * @var String
	 */
	private $fotoMuda;

	/** 
	 * Construtor 
	 * 
	 * @return void
	 */
	public function __construct($idMuda) {

		$this->construtorMuda ( $idMuda );
	}

	/**
	 * Seta o Identificador da muda e embalagem
	 *
	 * @param Integer
	 * @return void
	 */
	public function setIdMuda($idMuda) {

		$this->idMuda = $idMuda;
	}

	/**
	 * Retorna o identificador da muda e embalagem
	 *
	 * @return Integer
	 */
	public function getIdMuda() {

		return $this->idMuda;
	}

	/**
	 * Seta o Nome popular
	 *
	 * @param String
	 * @return void
	 */
	public function setNomePopular($nomePopular) {

		$this->nomePopular = $nomePopular;
	}

	/**
	 * Retorna o Nome popular
	 *
	 * @return String
	 */
	public function getNomePopular() {

		return $this->nomePopular;
	}

	/**
	 * Seta o Nome ciêntifico
	 *
	 * @param String
	 * @return void
	 */
	public function setNomeCientifico($nomeCientifico) {

		$this->nomeCientifico = $nomeCientifico;
	}

	/**
	 * Retorna o Nome ciêntifico
	 *
	 * @return String
	 */
	public function getNomeCientifico() {

		return $this->nomeCientifico;
	}

	/**
	 * Seta os fins de plantio
	 *
	 * @param Array
	 * @return void
	 */
	public function setFinsPlantio($finsPlantio) {

		$this->finsPlantio = $finsPlantio;
	}

	/**
	 * Retorna os fins de plantio
	 *
	 * @return Array
	 */
	public function getFinsPlantio() {

		return $this->finsPlantio;
	}

	/**
	 * Seta Comportamento folhar
	 *
	 * @param  String
	 * @return void
	 */
	public function setComportamentoFolhar($comportamentoFolhar) {

		$this->comportamentoFolhar = $comportamentoFolhar;
	}

	/**
	 * Retorna Comportamento folhar
	 *
	 * @return String
	 */
	public function getComportamentoFolhar() {

		return $this->comportamentoFolhar;
	}

	/**
	 * Seta a altura da muda
	 *
	 * @param  String
	 * @return void
	 */
	public function setAltura($altura) {

		$this->altura = $altura;
	}

	/**
	 * Retorna a altura da muda
	 *
	 * @return String
	 */
	public function getAltura() {

		return $this->altura;
	}

	/**
	 * Seta o período de floração
	 *
	 * @param  String
	 * @return void
	 */
	public function setFloracao($floracao) {

		$this->floracao = $floracao;
	}

	/**
	 * Retorna o período de floração
	 *
	 * @return String
	 */
	public function getFloracao() {

		return $this->floracao;
	}

	/**
	 * Seta Período de frutificação
	 *
	 * @param String
	 * @return void
	 */
	public function setFrutificacao($frutificacao) {

		$this->frutificacao = $frutificacao;
	}

	/**
	 * Retorna Período de frutificação
	 *
	 * @return String
	 */
	public function getFrutificacao() {

		return $this->frutificacao;
	}

	/**
	 * Seta Cor da floração quando houver
	 *
	 * @param String
	 * @return void 
	 */
	public function setCorFloracao($corFloracao) {

		$this->corFloracao = $corFloracao;
	}

	/**
	 * Retorna Cor da floração quando houver
	 *
	 * @return String
	 */
	public function getCorFloracao() {

		return $this->corFloracao;
	}

	/**
	 * Seta Regiões de ocorrência e cultivo das espécies
	 *
	 * @param String
	 * @return void
	 */
	public function setRegioesCultivo($regioesCultivo) {

		$this->regioesCultivo = $regioesCultivo;
	}

	/**
	 * Retorna Regiões de ocorrência e cultivo das espécies
	 *
	 * @return String
	 */
	public function getRegioesCultivo() {

		return $this->regioesCultivo;
	}

	/**
	 * Seta Caminho[URL] do Mapa da região de ocorrência e cultivo das espécies
	 *
	 * @param String
	 * @return void
	 */
	public function setMapaRegiao($mapaRegiao) {

		$this->mapaRegiao = $mapaRegiao;
	}

	/**
	 * Retorna Caminho[URL] do Mapa da região de ocorrência e cultivo das espécies
	 *
	 * @return void
	 */
	public function getMapaRegiao() {

		return $this->mapaRegiao;
	}

	/**
	 * Seta Caminho[URL] da foto da muda
	 *
	 * @param String
	 * @return void
	 */
	public function setFotoMuda($fotoMuda) {

		$this->fotoMuda = $fotoMuda;
	}

	/**
	 * Retorna Caminho[URL] da foto da muda
	 *
	 * @return void
	 */
	public function getFotoMuda() {

		return $this->fotoMuda;
	}

	/**
	 * Constrói a lista de todas as mudas existentes
	 *
	 * @return Array
	 */
	public static function retornaListaMudas() {

		$listaMudas = array ();
		
		for($i = 1; $i <= 143; $i ++) {
			$listaMudas [] = new Muda ( $i );
		}
		
		return $listaMudas;
	}

	/**
	 * Constrói a lista de mudas de acordo com um Fim de Plantio
	 *
	 * @param FimPlantio $fimPlantio
	 * @return Array
	 */
	public static function pesquisaAvancada($fimPlantio) {

		$listaMudas = array ();
		
		for($i = 1; $i <= 143; $i ++) {
			$muda = new Muda ( $i );
			if (is_array ( $fimPlantio )) {
				for($j = 0; $j < count ( $fimPlantio ); $j ++) {
					if (in_array ( $fimPlantio [$j], $muda->getFinsPlantio () ) && !in_array($muda, $listaMudas)) {
						$listaMudas [] = $muda;
					}
				}
			} elseif (in_array ( $fimPlantio, $muda->getFinsPlantio () )) {
				$listaMudas [] = $muda;
			}
		}
		
		return $listaMudas;
	}

	/**
	 * Define os atributos da muda de acordo com o parametro repassado 
	 *
	 * @return void
	 */
	private function construtorMuda($idMuda) {

		switch ($idMuda) {
			case 1 :
				$this->setIdMuda ( 1 );
				$this->setNomePopular ( 'Acácia-mimosa' );
				$this->setNomeCientifico ( 'Acacia podalyraefolia A. Cunn. ex G. Don' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '5-7m' );
				$this->setRegioesCultivo ( 'Cultivada em todo o Brasil.' );
				$this->setFloracao ( 'julho-agosto' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Acácia_mimosa.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 2 :
				$this->setIdMuda ( 2 );
				$this->setNomePopular ( 'Acácia-negra' );
				$this->setNomeCientifico ( 'Acacia mearnsii De Willd.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::IND ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '8-15m' );
				$this->setRegioesCultivo ( 'Cultivada no RS, SC e PR.' );
				$this->setFloracao ( 'setembro-novembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarelo-claro' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Acácia_negra.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 3 :
				$this->setIdMuda ( 3 );
				$this->setNomePopular ( 'Açoita-cavalo' );
				$this->setNomeCientifico ( 'Luehea divaricata Mart.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '15-25m' );
				$this->setRegioesCultivo ( 'Sul da BA, RJ, SP, MG, GO, MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Açoita_cavalo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 4 :
				$this->setIdMuda ( 4 );
				$this->setNomePopular ( 'Agulheiro' );
				$this->setNomeCientifico ( 'Seguieria langsdorffii Moq.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '8-16m' );
				$this->setRegioesCultivo ( 'Sul da BA, MG até SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Agulheiro.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 5 :
				$this->setIdMuda ( 5 );
				$this->setNomePopular ( 'Alecrim' );
				$this->setNomeCientifico ( 'Holocalyx balansae Mich.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '15-25m' );
				$this->setRegioesCultivo ( 'SP até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( NULL );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 6 :
				$this->setIdMuda ( 6 );
				$this->setNomePopular ( 'Amora-preta' );
				$this->setNomeCientifico ( 'Morus nigra L.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::FH, FimPlantio::FA, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '7-12m' );
				$this->setRegioesCultivo ( 'Cultivada no Sul e Sudeste do Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'a partir de setembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Amora_preta.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 7 :
				$this->setIdMuda ( 7 );
				$this->setNomePopular ( 'Angico-branco' );
				$this->setNomeCientifico ( 'Anadenanthera colubrina (Vell.) Brenan' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '12-15m' );
				$this->setRegioesCultivo ( 'MA até o PR e GO. É cultivado em SC e RS.' );
				$this->setFloracao ( 'novembro-janeiro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'branca' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Angico_branco.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 8 :
				$this->setIdMuda ( 8 );
				$this->setNomePopular ( 'Angico-vermelho' );
				$this->setNomeCientifico ( 'Parapiptadenia rigida (Benth.) Brenan' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'MG, MS, SP até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Angico_vermelho.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 9 :
				$this->setIdMuda ( 9 );
				$this->setNomePopular ( 'Aperta-goela' );
				$this->setNomeCientifico ( 'Gomidesia affinis (Cambess) D. Legrand' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::RMC ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '4-6m' );
				$this->setRegioesCultivo ( 'MG, SP até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'junho-outubro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Aperta_goela.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 10 :
				$this->setIdMuda ( 10 );
				$this->setNomePopular ( 'Araçá-amarelo' );
				$this->setNomeCientifico ( 'Psidium cattleianum Sabine' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '3-6m' );
				$this->setRegioesCultivo ( 'BA até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'setembro-março' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Araçá_amarelo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 11 :
				$this->setIdMuda ( 11 );
				$this->setNomePopular ( 'Araçá-da-serra' );
				$this->setNomeCientifico ( 'Calycorectes acutatus (Miq.) Toledo' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '6-14m' );
				$this->setRegioesCultivo ( 'MG, SP e PR. É cultivado no RS e SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'dezembro-janeiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Araçá_da_serra.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 12 :
				$this->setIdMuda ( 12 );
				$this->setNomePopular ( 'Araçá-piranga' );
				$this->setNomeCientifico ( 'Eugenia leitonii Legr.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '8-14m' );
				$this->setRegioesCultivo ( 'Sul da Ba até o PR. É cultivado no RS e SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'fevereiro-março' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Araçá_piranga.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 13 :
				$this->setIdMuda ( 13 );
				$this->setNomePopular ( 'Araçá-vermelho' );
				$this->setNomeCientifico ( 'Eugenia multicostata D. Legrand' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '10-30m' );
				$this->setRegioesCultivo ( 'Sul de SP ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'outubro-novembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Araçá_vermelho.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 14 :
				$this->setIdMuda ( 14 );
				$this->setNomePopular ( 'Araribá-amarelo' );
				$this->setNomeCientifico ( 'Centrolobium robustum (Vell.) Mart. ex Benth.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '18-25m' );
				$this->setRegioesCultivo ( 'Sul da BA até SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Araribá_amarelo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 15 :
				$this->setIdMuda ( 15 );
				$this->setNomePopular ( 'Aroeira-branca' );
				$this->setNomeCientifico ( 'Schinus lentiscifolius Marchand' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '5-8m' );
				$this->setRegioesCultivo ( 'Regiões de altitude do Rj até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Aroeira_branca.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 16 :
				$this->setIdMuda ( 16 );
				$this->setNomePopular ( 'Aroeira-piriquita' );
				$this->setNomeCientifico ( 'Schinus molle L.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '4-8m' );
				$this->setRegioesCultivo ( 'MG até o RS, em campos de altitude.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Aroeira_piriquita.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 17 :
				$this->setIdMuda ( 17 );
				$this->setNomePopular ( 'Aroeira-vermelha' );
				$this->setNomeCientifico ( 'Schinus terebinthifolius Raddi' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '5-10m' );
				$this->setRegioesCultivo ( 'PE, MS até RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Aroeira_vermelha.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 18 :
				$this->setIdMuda ( 18 );
				$this->setNomePopular ( 'Baga-de-macaco' );
				$this->setNomeCientifico ( 'Posoqueria latifolia (Rudge) Roem. & Schult.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '6-15m' );
				$this->setRegioesCultivo ( 'Sul da BA até SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'junho-julho' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Baga_de_macaco.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 19 :
				$this->setIdMuda ( 19 );
				$this->setNomePopular ( 'Baguaçú' );
				$this->setNomeCientifico ( 'Talauma ovata St. Hil.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'Sul de MG até o norte do RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Baguaçú.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 20 :
				$this->setIdMuda ( 20 );
				$this->setNomePopular ( 'Bracatinga' );
				$this->setNomeCientifico ( 'Mimosa scabrella Benth.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::IND, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '5-15m' );
				$this->setRegioesCultivo ( 'SP até RS, em regiões de altitudes na floresta de pinhais' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Bracatinga.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 21 :
				$this->setIdMuda ( 21 );
				$this->setNomePopular ( 'Butiá' );
				$this->setNomeCientifico ( 'Butia capitata (Mart. Ex Drude) Becc.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '4-6m' );
				$this->setRegioesCultivo ( 'PR, SC e RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'janeiro-março' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Butiá.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 22 :
				$this->setIdMuda ( 22 );
				$this->setNomePopular ( 'Cabreúva' );
				$this->setNomeCientifico ( 'Myrocarpus frondosus Fr. All.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'Sul da BA ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cabreúva.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 23 :
				$this->setIdMuda ( 23 );
				$this->setNomePopular ( 'Calistemone' );
				$this->setNomeCientifico ( 'Callistemom viminalis (Sol. Ex Gaertn.) G. Don ex Loud.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '5-7m' );
				$this->setRegioesCultivo ( 'Cultivado em todo o Brasil.' );
				$this->setFloracao ( 'junho-setembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'vermelha' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Calistemone.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 24 :
				$this->setIdMuda ( 24 );
				$this->setNomePopular ( 'Camboatá-vermelho' );
				$this->setNomeCientifico ( 'Cupania vernalis Camp.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '10-22m' );
				$this->setRegioesCultivo ( 'MG, MS, SP até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Camboatá_vermelho.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 25 :
				$this->setIdMuda ( 25 );
				$this->setNomePopular ( 'Canafístula' );
				$this->setNomeCientifico ( 'Peltophorum dubium (Spreng.) Taub.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '15-25m' );
				$this->setRegioesCultivo ( 'BA, MS, MG, GO, RJ até o PR. Cultivada em SC e RS.' );
				$this->setFloracao ( 'dezembro-fevereiro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Canafístula.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 26 :
				$this->setIdMuda ( 26 );
				$this->setNomePopular ( 'Canela-de-tempero' );
				$this->setNomeCientifico ( 'Cinnamomum zeylanicum Nees' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '8-12m' );
				$this->setRegioesCultivo ( 'Cultivada em todo o Brasil, porém suscetível a geada.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Canela_de_tempero.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 27 :
				$this->setIdMuda ( 27 );
				$this->setNomePopular ( 'Canela-fogo' );
				$this->setNomeCientifico ( 'Cryptocarya aschersoniana Mez' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '25-25m' );
				$this->setRegioesCultivo ( 'MG ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Canela_fogo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 28 :
				$this->setIdMuda ( 28 );
				$this->setNomePopular ( 'Canela-garuva' );
				$this->setNomeCientifico ( 'Nectandra rigida (H.B.K.) Nees' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '15-20m' );
				$this->setRegioesCultivo ( 'Desde a região Amazônica até o RS, exceto Nordeste.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Canela_garuva.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 29 :
				$this->setIdMuda ( 29 );
				$this->setNomePopular ( 'Canela-guaicá' );
				$this->setNomeCientifico ( 'Ocotea puberula (Reich.) Nees' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '15-25m' );
				$this->setRegioesCultivo ( 'RJ, MG, MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Canela_guaicá.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 30 :
				$this->setIdMuda ( 30 );
				$this->setNomePopular ( 'Canela-imbuia' );
				$this->setNomeCientifico ( 'Nectandra megapotamica (Spreng.) Mez' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '15-25m' );
				$this->setRegioesCultivo ( 'SP ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Canela_imbuia.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 31 :
				$this->setIdMuda ( 31 );
				$this->setNomePopular ( 'Canela-preta' );
				$this->setNomeCientifico ( 'Ocotea catharinensis Mez' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '25-30m' );
				$this->setRegioesCultivo ( 'SP ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Canela_preta.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 32 :
				$this->setIdMuda ( 32 );
				$this->setNomePopular ( 'Canela-sassafrás' );
				$this->setNomeCientifico ( 'Ocotea odorifera (Vell.) Rohwer' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '15-25m' );
				$this->setRegioesCultivo ( 'Sul da BA ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Canela_sassafrás.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 33 :
				$this->setIdMuda ( 33 );
				$this->setNomePopular ( 'Canjerana' );
				$this->setNomeCientifico ( 'Cabralea canjerana (Vell.) Mart.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'MG, MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Canjerana.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 34 :
				$this->setIdMuda ( 34 );
				$this->setNomePopular ( 'Capororoca' );
				$this->setNomeCientifico ( 'Rapanea ferruginea (Ruiz et Pav.) Mez' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '6-12m' );
				$this->setRegioesCultivo ( 'Todo o Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Capororoca.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 35 :
				$this->setIdMuda ( 35 );
				$this->setNomePopular ( 'Capororocão' );
				$this->setNomeCientifico ( 'Rapanea umbellata (Mart. ex DC.) Mez' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '5-15m' );
				$this->setRegioesCultivo ( 'MG ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'março-abril e  outubro-novembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Capororocão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 36 :
				$this->setIdMuda ( 36 );
				$this->setNomePopular ( 'Caroba' );
				$this->setNomeCientifico ( 'Jacaranda micrantha Cham.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '10-25m' );
				$this->setRegioesCultivo ( 'MG ao RS.' );
				$this->setFloracao ( 'outubro-dezembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'lilás' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Caroba.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 37 :
				$this->setIdMuda ( 37 );
				$this->setNomePopular ( 'Carvalho-europeu' );
				$this->setNomeCientifico ( 'Quercus robur L.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'Cultivada nas regiões de altitude do RS, SC e PR.' );
				$this->setFloracao ( 'outubro-dezembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'lilás' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Carvalho_europeu.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 38 :
				$this->setIdMuda ( 38 );
				$this->setNomePopular ( 'Castanha-da-praia' );
				$this->setNomeCientifico ( 'Bombacopsis glabra (Pasq.) A. Rob.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '4-6m' );
				$this->setRegioesCultivo ( 'PE ao RJ. É cultivada em SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'janeiro-fevereiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Castanha_da_praia.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 39 :
				$this->setIdMuda ( 39 );
				$this->setNomePopular ( 'Cedro-rosa' );
				$this->setNomeCientifico ( 'Cedrela fissilis Vell.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-35m' );
				$this->setRegioesCultivo ( 'MG ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cedro_rosa.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 40 :
				$this->setIdMuda ( 40 );
				$this->setNomePopular ( 'Cereja-australiana' );
				$this->setNomeCientifico ( 'Eugenia reinwardtiana (Blume) DC.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::FH, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '2-5m' );
				$this->setRegioesCultivo ( 'Cultivada na região Sudeste, e SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'a partir de setembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cereja_australiana.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 41 :
				$this->setIdMuda ( 41 );
				$this->setNomePopular ( 'Cereja-do-rio-grande' );
				$this->setNomeCientifico ( 'Eugenia involucrata DC.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '5-8m (10-15m na mata)' );
				$this->setRegioesCultivo ( 'MG ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'outubro-dezembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cereja_do_rio_grande.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 42 :
				$this->setIdMuda ( 42 );
				$this->setNomePopular ( 'Chal-Chal' );
				$this->setNomeCientifico ( 'Allophyllus edulis (St. Hil) Randlk.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '6-10m' );
				$this->setRegioesCultivo ( 'Região Amazônica até o Ceará, MS, MG, BA, RJ até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Chal_chal.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 43 :
				$this->setIdMuda ( 43 );
				$this->setNomePopular ( 'Cinamomo' );
				$this->setNomeCientifico ( 'Melia azedarach L.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '15-20m' );
				$this->setRegioesCultivo ( 'Cultivado nas regiões sul e sudeste do Brasil.' );
				$this->setFloracao ( 'setembro-novembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'lilás-rósea' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cinamomo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 44 :
				$this->setIdMuda ( 44 );
				$this->setNomePopular ( 'Cipreste-português' );
				$this->setNomeCientifico ( 'Cupressus lusitanica Mill.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::IND ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'Cultivado em todo Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cipreste_português.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 45 :
				$this->setIdMuda ( 45 );
				$this->setNomePopular ( 'Cocão' );
				$this->setNomeCientifico ( 'Erythroxylum argentinum O. E. Schultz' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '5-7m' );
				$this->setRegioesCultivo ( 'SP ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cocão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 46 :
				$this->setIdMuda ( 46 );
				$this->setNomePopular ( 'Cortiça-crespa' );
				$this->setNomeCientifico ( 'Rollinia sylvatica(St. Hil.) Mart.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '6-8m' );
				$this->setRegioesCultivo ( 'PE ao RS, MG, GO e MS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'janeiro-abril' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cortiça-crespa.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 47 :
				$this->setIdMuda ( 47 );
				$this->setNomePopular ( 'Cortiça-lisa' );
				$this->setNomeCientifico ( 'Anona cacans Warm.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '12-16m' );
				$this->setRegioesCultivo ( 'MG, RJ até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'janeiro-março' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cortiça_lisa.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 48 :
				$this->setIdMuda ( 48 );
				$this->setNomePopular ( 'Cotoneaster ' );
				$this->setNomeCientifico ( 'Cotoneaster franchetii Bois' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '3-4m' );
				$this->setRegioesCultivo ( 'Cultivada nas regiões de altitude do sul e sudeste do Brasil.' );
				$this->setFloracao ( 'setembro-outubro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'branco-rósea' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Cotoneaster.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 49 :
				$this->setIdMuda ( 49 );
				$this->setNomePopular ( 'Dedaleiro' );
				$this->setNomeCientifico ( 'Lafoensia pacari St. Hill.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '10-18m' );
				$this->setRegioesCultivo ( 'MG, SP, MS até SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Dedaleiro.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 50 :
				$this->setIdMuda ( 50 );
				$this->setNomePopular ( 'Embaúba' );
				$this->setNomeCientifico ( 'Cecropia glaziovi Snethlage' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '8-16m' );
				$this->setRegioesCultivo ( 'BA até o PR. É cultivada no RS e SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'janeiro-fevereiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Embaúba.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 51 :
				$this->setIdMuda ( 51 );
				$this->setNomePopular ( 'Erva-mate' );
				$this->setNomeCientifico ( 'Ilex paraguariensisSt. Hill.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::IND, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '4-8m' );
				$this->setRegioesCultivo ( 'MS, SP até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Erva_mate.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 52 :
				$this->setIdMuda ( 52 );
				$this->setNomePopular ( 'Espatódea' );
				$this->setNomeCientifico ( 'Spathodea nilotica Seem' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '15-20m' );
				$this->setRegioesCultivo ( 'Cultivada em todo o Brasil.' );
				$this->setFloracao ( 'novembro-abril' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'vermelho-alaranjada' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Espatódea.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 53 :
				$this->setIdMuda ( 53 );
				$this->setNomePopular ( 'Espinheira-santa' );
				$this->setNomeCientifico ( 'Maytenus ilicifolia Mart. ex. Reiss.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '4-5m' );
				$this->setRegioesCultivo ( 'RS, SC, PR, SP e MS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Espinheira_santa.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 54 :
				$this->setIdMuda ( 54 );
				$this->setNomePopular ( 'Eucalipto-limão' );
				$this->setNomeCientifico ( 'Eucalyptus citriodora Hook. F.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::IND ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '15-30m' );
				$this->setRegioesCultivo ( 'Cultivado no PR, SC e RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Eucalipto_limão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 55 :
				$this->setIdMuda ( 55 );
				$this->setNomePopular ( 'Eucalipto-cidra' );
				$this->setNomeCientifico ( 'Eucalyptus dunni Maiden' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::IND ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '30-35m' );
				$this->setRegioesCultivo ( 'Cultivado no PR, SC e RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Eucalipto_cidra.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 56 :
				$this->setIdMuda ( 56 );
				$this->setNomePopular ( 'Eucalipto-rosa' );
				$this->setNomeCientifico ( 'Eucalyptus grandis W. Hill ex Maiden' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::IND ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '20-40m' );
				$this->setRegioesCultivo ( 'Cultivado em todo o Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Eucalipto_rosa.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 57 :
				$this->setIdMuda ( 57 );
				$this->setNomePopular ( 'Falsa-canela' );
				$this->setNomeCientifico ( 'Cinnamomum burmanni (Nees & T. Nees) Blume' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '6-8m' );
				$this->setRegioesCultivo ( 'Cultivada em todo o Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Falsa_canela.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 58 :
				$this->setIdMuda ( 58 );
				$this->setNomePopular ( 'Falso-barbatimão' );
				$this->setNomeCientifico ( 'Cassia leptophylla Vog.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '8-10m' );
				$this->setRegioesCultivo ( 'PR e SC. É cultivado no RS.' );
				$this->setFloracao ( 'novembro-janeiro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Falso_barbatimão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 59 :
				$this->setIdMuda ( 59 );
				$this->setNomePopular ( 'Farinha-seca' );
				$this->setNomeCientifico ( 'Machaerium stipitatum (DC.) Vog.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'RJ, SP, MG, MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Farinha_seca.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 60 :
				$this->setIdMuda ( 60 );
				$this->setNomePopular ( 'Figueira-folha-fina' );
				$this->setNomeCientifico ( 'Ficus enormis (Mart. ex Miq.) Miq' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '6-14m' );
				$this->setRegioesCultivo ( 'Todo o Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Figueira_folha_fina.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 61 :
				$this->setIdMuda ( 61 );
				$this->setNomePopular ( 'Figueira-mata-pau' );
				$this->setNomeCientifico ( 'Ficus guaraniticaSchodat' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'RJ, MG, MS, GO, SP e PR. É cultivada em SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Figueira_mata_pau.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 62 :
				$this->setIdMuda ( 62 );
				$this->setNomePopular ( 'Flamboyant' );
				$this->setNomeCientifico ( 'Delonix regia (Bojer ex Hook.) Raf.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '10-12m' );
				$this->setRegioesCultivo ( 'Cultivado em todo Brasil.' );
				$this->setFloracao ( 'outubro-janeiro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'vermelha' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Flamboyant.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 63 :
				$this->setIdMuda ( 63 );
				$this->setNomePopular ( 'Gerivá' );
				$this->setNomeCientifico ( 'Syagrus romanzoffiana (Cham.) Glassm.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'ES, RJ, MG, GO , MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'fevereiro-agosto' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Gerivá.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 64 :
				$this->setIdMuda ( 64 );
				$this->setNomePopular ( 'Goiaba' );
				$this->setNomeCientifico ( 'Psidium guajava L.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '3-6m' );
				$this->setRegioesCultivo ( 'RJ ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'dezembro-março' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Goiaba.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 65 :
				$this->setIdMuda ( 65 );
				$this->setNomePopular ( 'Goiaba-da-serra' );
				$this->setNomeCientifico ( 'Acca sellowiana (O.Berg) Burret' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '3-4m' );
				$this->setRegioesCultivo ( 'Norte o RS até o PR.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Goiaba_da_serra.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 66 :
				$this->setIdMuda ( 66 );
				$this->setNomePopular ( 'Grandiúva' );
				$this->setNomeCientifico ( 'Trema micrantha (L.) Blum.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '5-12m' );
				$this->setRegioesCultivo ( 'RJ, MG, GO, MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Grandiúva.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 67 :
				$this->setIdMuda ( 67 );
				$this->setNomePopular ( 'Grevílea' );
				$this->setNomeCientifico ( 'Grevillea robusta A. Cunn. Ex. R. Br.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::S, FimPlantio::O, FimPlantio::IND, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '15-20m' );
				$this->setRegioesCultivo ( 'É cultivada em SP, PR, SC e RS.' );
				$this->setFloracao ( 'agosto-dezembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarelo-alaranjada' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Grevílea.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 68 :
				$this->setIdMuda ( 68 );
				$this->setNomePopular ( 'Grevílea-anã' );
				$this->setNomeCientifico ( 'Grevillea banksii R. Br.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::FA, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '3-6m' );
				$this->setRegioesCultivo ( 'Cultivada nas regiões Sul e Sudeste do Brasil.' );
				$this->setFloracao ( 'maio-setembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'róseo-avermelhada' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Grevílea_anã.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 69 :
				$this->setIdMuda ( 69 );
				$this->setNomePopular ( 'Grumixama' );
				$this->setNomeCientifico ( 'Eugenia brasiliensisLam.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '10-15m' );
				$this->setRegioesCultivo ( 'Sul da BA até SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'novembro-dezembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Grumixama.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 70 :
				$this->setIdMuda ( 70 );
				$this->setNomePopular ( 'Guabiju' );
				$this->setNomeCientifico ( 'Myrcianthes pungens (Berg.) Legr.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '15-20m' );
				$this->setRegioesCultivo ( 'SP até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'janeiro-fevereiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Guabiju.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 71 :
				$this->setIdMuda ( 71 );
				$this->setNomePopular ( 'Guabiroba' );
				$this->setNomeCientifico ( 'Campomanesia xanthocarpa Berg.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'MG, SP, MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'novembro-dezembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Guabiroba.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 72 :
				$this->setIdMuda ( 72 );
				$this->setNomePopular ( 'Guabiroba-crespa' );
				$this->setNomeCientifico ( 'Campomanesia reitziana D. Legrand' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'MG, SP, MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'outubro-novembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Guabiroba_crespa.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 73 :
				$this->setIdMuda ( 73 );
				$this->setNomePopular ( 'Guaçatunga' );
				$this->setNomeCientifico ( 'Casearia sylvestris Sw.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '4-6m' );
				$this->setRegioesCultivo ( 'Todo o Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Guaçatunga.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 74 :
				$this->setIdMuda ( 74 );
				$this->setNomePopular ( 'Guamirim-folha-larga' );
				$this->setNomeCientifico ( 'Calyptranthes grandifolia O. Berg.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '5-14m' );
				$this->setRegioesCultivo ( 'RJ até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Guamirim_folha_larga.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 75 :
				$this->setIdMuda ( 75 );
				$this->setNomePopular ( 'Guapuruvu' );
				$this->setNomeCientifico ( 'Schizolobium parahyba (Vell.) Blake' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'BA até SC. É cultivada também no RS.' );
				$this->setFloracao ( 'agosto-outubro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Guapuruvu.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 76 :
				$this->setIdMuda ( 76 );
				$this->setNomePopular ( 'Ingá-anão' );
				$this->setNomeCientifico ( 'Inga veraWilld.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::S, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '5-10m' );
				$this->setRegioesCultivo ( 'SP ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'dezembro a março' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ingá_anão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 77 :
				$this->setIdMuda ( 77 );
				$this->setNomePopular ( 'Ingá-banana' );
				$this->setNomeCientifico ( 'Inga uruguensis Hooker at Arnott' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '5-10m' );
				$this->setRegioesCultivo ( 'SP até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'dezembro-fevereiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ingá_banana.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 78 :
				$this->setIdMuda ( 78 );
				$this->setNomePopular ( 'Ingá-de-metro' );
				$this->setNomeCientifico ( 'Inga edulis Mart.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '6-25m' );
				$this->setRegioesCultivo ( 'Região amazônica, toda orla litorânea desde o RN até norte de SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'a partir de maio' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ingá_de_metro.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 79 :
				$this->setIdMuda ( 79 );
				$this->setNomePopular ( 'Ingá-feijão' );
				$this->setNomeCientifico ( 'Inga marginata Willd.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '5-15m' );
				$this->setRegioesCultivo ( 'Todo o Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'março-maio' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ingá_feijão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 80 :
				$this->setIdMuda ( 80 );
				$this->setNomePopular ( 'Ingá-macaco' );
				$this->setNomeCientifico ( 'Inga sessilis (Vell.) Mart.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '12-20m' );
				$this->setRegioesCultivo ( 'MG até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'julho-janeiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ingá_macaco.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 81 :
				$this->setIdMuda ( 81 );
				$this->setNomePopular ( 'Ingá-quatro-quinas' );
				$this->setNomeCientifico ( 'Inga striata Benth.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '25-30m' );
				$this->setRegioesCultivo ( 'AM até AL. É cultivada em MG até SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ingá_quatro_quinas.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 82 :
				$this->setIdMuda ( 82 );
				$this->setNomePopular ( 'Ipê-roxo' );
				$this->setNomeCientifico ( 'Handroanthus avellanedae (Lor. Ex Griseb.) Mattos' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-35m' );
				$this->setRegioesCultivo ( 'MA até o RS.' );
				$this->setFloracao ( 'junho-agosto' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'rosa' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ipê_roxo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 83 :
				$this->setIdMuda ( 83 );
				$this->setNomePopular ( 'Ipê-amarelo' );
				$this->setNomeCientifico ( 'Handroanthus chrysotrichus (Mart. ex DC) Mattos' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '4-10m' );
				$this->setRegioesCultivo ( 'ES até SC. É cultivada no RS.' );
				$this->setFloracao ( 'agosto-setembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ipê_amarelo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 84 :
				$this->setIdMuda ( 84 );
				$this->setNomePopular ( 'Ipê-amarelo-da-serra' );
				$this->setNomeCientifico ( 'Handroanthus alba (Cham.) Mattos' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'RJ, MG até o RS.' );
				$this->setFloracao ( 'julho-setembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ipê_amarelo_da_serra.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 85 :
				$this->setIdMuda ( 85 );
				$this->setNomePopular ( 'Ipê-amarelo-de-jardim' );
				$this->setNomeCientifico ( 'Tecoma stans (L.) Juss. ex Kunth.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '5-7m' );
				$this->setRegioesCultivo ( 'Cultivado em todo o Brasil.' );
				$this->setFloracao ( 'abril-setembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ipê_amarelo_de_jardim.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 86 :
				$this->setIdMuda ( 86 );
				$this->setNomePopular ( 'Ipê-branco' );
				$this->setNomeCientifico ( 'Handroanthus roseo-alba (Rild.) Mattos' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '7-16m' );
				$this->setRegioesCultivo ( 'Norte de SP, MG, MS e GO. É cultivado no PR, SC e RS.' );
				$this->setFloracao ( 'agosto-outubro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'róseo-branca' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ipê_branco.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 87 :
				$this->setIdMuda ( 87 );
				$this->setNomePopular ( 'Ipê-rosa' );
				$this->setNomeCientifico ( 'Handroanthus heptaphyllus (Vell.) Mattos' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'Sul da BA, ES, MG, RJ e SP. É cultivado no PR, SC e RS.' );
				$this->setFloracao ( 'julho-setembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'rosa' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ipê_rosa.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 88 :
				$this->setIdMuda ( 88 );
				$this->setNomePopular ( 'Jabuticaba' );
				$this->setNomeCientifico ( 'Myrciaria trunciflora Berg' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '10-15m' );
				$this->setRegioesCultivo ( 'MG, MS, SP até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'agosto-setembro e janeiro-fevereiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Jabuticaba.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 89 :
				$this->setIdMuda ( 89 );
				$this->setNomePopular ( 'Jacarandá mimoso' );
				$this->setNomeCientifico ( 'Jacaranda mimosifolia D. Don' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::IND, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '12-15m' );
				$this->setRegioesCultivo ( 'Cultivado em todo o Brasil.' );
				$this->setFloracao ( 'dezembro-março' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'azul-violeta' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Jacarandá_mimoso.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 90 :
				$this->setIdMuda ( 90 );
				$this->setNomePopular ( 'Jambolão' );
				$this->setNomeCientifico ( 'Syzygium cumini (L.) Skeels' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::FH, FimPlantio::FA, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '15-20m' );
				$this->setRegioesCultivo ( 'Cultivado em todo o Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'a partir de setembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Jambolão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 91 :
				$this->setIdMuda ( 91 );
				$this->setNomePopular ( 'Leucena' );
				$this->setNomeCientifico ( 'Leucaena leucocephala (Lam.) R. de Wit' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '5-7m' );
				$this->setRegioesCultivo ( 'Pode ser cultivada em todo Brasil, contudo é sensível a geadas.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Leucena.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 92 :
				$this->setIdMuda ( 92 );
				$this->setNomePopular ( 'Ligustro' );
				$this->setNomeCientifico ( 'Ligustrum lucidum W. T. Aiton' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::S, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '7-10m' );
				$this->setRegioesCultivo ( 'Cultivado no Sul e Sudeste do Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Ligustro.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 93 :
				$this->setIdMuda ( 93 );
				$this->setNomePopular ( 'Limoeiro-do-mato' );
				$this->setNomeCientifico ( 'Randia armata (Sw.) DC.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( NULL );
				$this->setAltura ( NULL );
				$this->setRegioesCultivo ( 'PR, SC e RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'junho' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Limoeiro_do_mato.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 94 :
				$this->setIdMuda ( 94 );
				$this->setNomePopular ( 'Louro-cravo' );
				$this->setNomeCientifico ( 'Pimenta pseudocaryophyllus (Gomes) L. R. Landrum' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '4-10m' );
				$this->setRegioesCultivo ( 'BA, MG, GO até SC. É cultivada também no RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Louro_cravo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 95 :
				$this->setIdMuda ( 95 );
				$this->setNomePopular ( 'Louro-pardo' );
				$this->setNomeCientifico ( 'Cordia trichotoma (Vell.) Arrab. ex Steud.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::IND, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'CE até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Louro_pardo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 96 :
				$this->setIdMuda ( 96 );
				$this->setNomePopular ( 'Magnólia-amarela' );
				$this->setNomeCientifico ( 'Michelia champaca L.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '7-10m' );
				$this->setRegioesCultivo ( 'Cultivada no PR, SC e RS.' );
				$this->setFloracao ( 'outubro-novembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Magnólia_amarela.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 97 :
				$this->setIdMuda ( 97 );
				$this->setNomePopular ( 'Mamica-de-porca' );
				$this->setNomeCientifico ( 'Zanthoxylum rhoifolium Lam.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '6-12m' );
				$this->setRegioesCultivo ( 'Todo o Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Mamica_de_porca.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 98 :
				$this->setIdMuda ( 98 );
				$this->setNomePopular ( 'Manacá-da-serra' );
				$this->setNomeCientifico ( 'Tibouchina mutabilis Cong.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '7-12m' );
				$this->setRegioesCultivo ( 'RJ até SC.' );
				$this->setFloracao ( 'novembro-fevereiro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'branco-rósea' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Manacá_da_serra.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 99 :
				$this->setIdMuda ( 99 );
				$this->setNomePopular ( 'Manduirana' );
				$this->setNomeCientifico ( 'Senna macranthera (Collad.) Irwin et Barn.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '6-8m' );
				$this->setRegioesCultivo ( 'CE até SP e MG. É cultivada no PR, SC e RS.' );
				$this->setFloracao ( 'dezembro-abril' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Manduirana.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 100 :
				$this->setIdMuda ( 100 );
				$this->setNomePopular ( 'Maracujá-amarelo' );
				$this->setNomeCientifico ( 'Passiflora alata Curtis' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( NULL );
				$this->setRegioesCultivo ( 'BA até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'dezembro-maio' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Maracujá_amarelo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 101 :
				$this->setIdMuda ( 101 );
				$this->setNomePopular ( 'Maracujá-do-mato' );
				$this->setNomeCientifico ( 'Passiflora edulis Sims' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( NULL );
				$this->setRegioesCultivo ( 'Todo o Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'dezembro-maio' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Maracujá_do_mato.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 102 :
				$this->setIdMuda ( 102 );
				$this->setNomePopular ( 'Maria-preta' );
				$this->setNomeCientifico ( 'Diospyros inconstans Jacquin' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '6-9m' );
				$this->setRegioesCultivo ( 'MG até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'a partir de janeiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Maria_preta.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 103 :
				$this->setIdMuda ( 103 );
				$this->setNomePopular ( 'Maricá' );
				$this->setNomeCientifico ( 'Acacia polyphylla DC.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '15-20m' );
				$this->setRegioesCultivo ( 'Região amazônica até o PR e SP. Cultivada em SC e no RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Maricá.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 104 :
				$this->setIdMuda ( 104 );
				$this->setNomePopular ( 'Mogno' );
				$this->setNomeCientifico ( 'Swietenia macrophylla King.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '25-30m' );
				$this->setRegioesCultivo ( 'Toda região Amazônica. É cultivada na região centro-sul do país.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Mogno.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 105 :
				$this->setIdMuda ( 105 );
				$this->setNomePopular ( 'Mulungu-do-litoral' );
				$this->setNomeCientifico ( 'Erythrina speciosa Andrews' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '3-5m' );
				$this->setRegioesCultivo ( 'ES, MG até SC.' );
				$this->setFloracao ( 'junho-setembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'vermelha' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Mulungu_do_litoral.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 106 :
				$this->setIdMuda ( 106 );
				$this->setNomePopular ( 'Murta' );
				$this->setNomeCientifico ( 'Myrtus communis L.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '5-7m' );
				$this->setRegioesCultivo ( 'Cultivada em todo território brasileiro.' );
				$this->setFloracao ( 'no decorre de todo ano' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'branca' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Murta.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 107 :
				$this->setIdMuda ( 107 );
				$this->setNomePopular ( 'Olandi' );
				$this->setNomeCientifico ( 'Calophyllum brasiliensis Camb.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'Região Amazônica até o norte de SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'novembro-dezembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Olandi.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 108 :
				$this->setIdMuda ( 108 );
				$this->setNomePopular ( 'Paineira- rosa' );
				$this->setNomeCientifico ( 'Campomanesia xanthocarpa Berg.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '15-30m' );
				$this->setRegioesCultivo ( 'RJ, MG, GO, SP, MS e norte no PR. É cultivada no RS e SC.' );
				$this->setFloracao ( 'dezembro-abril' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'rosa' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Paineira_rosa.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 109 :
				$this->setIdMuda ( 109 );
				$this->setNomePopular ( 'Palmeira-buriti' );
				$this->setNomeCientifico ( 'Trithrinax brasiliensis Mart.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '2-13m' );
				$this->setRegioesCultivo ( 'PR, SC e RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'a partir de setembro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Palmeira_buriti.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 110 :
				$this->setIdMuda ( 110 );
				$this->setNomePopular ( 'Palmeira-real' );
				$this->setNomeCientifico ( 'Archontophoenix alexandrae (F. Muell.) H. Wendl. & Drude' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::FH, FimPlantio::O, FimPlantio::IND ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '18-22m' );
				$this->setRegioesCultivo ( 'É cultivada no Sudeste e Sul do Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Palmeira_real.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 111 :
				$this->setIdMuda ( 111 );
				$this->setNomePopular ( 'Palmiteiro' );
				$this->setNomeCientifico ( 'Euterpe edulis Mart.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::IND, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'Sul da BA, MS, MG até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'abril-agosto' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Palmiteiro.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 112 :
				$this->setIdMuda ( 112 );
				$this->setNomePopular ( 'Pata-de-vaca' );
				$this->setNomeCientifico ( 'Bauhinia forficata Link' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '5-9m' );
				$this->setRegioesCultivo ( 'RJ, MG até o RS.' );
				$this->setFloracao ( 'outubro-janeiro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'branca' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pata_de_vaca.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 113 :
				$this->setIdMuda ( 113 );
				$this->setNomePopular ( 'Pau-Brasil' );
				$this->setNomeCientifico ( 'Caesalpinea echinata Lam.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '8-12m' );
				$this->setRegioesCultivo ( 'CE até o RJ. Pode ser cultivado como curiosidade em SP, PR, SC e RS.' );
				$this->setFloracao ( 'setembro-outubro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pau_brasil.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 114 :
				$this->setIdMuda ( 114 );
				$this->setNomePopular ( 'Pau-cigarra' );
				$this->setNomeCientifico ( 'Senna multijuga (Rich.) Irwin et Barn.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '6-10m' );
				$this->setRegioesCultivo ( 'Todo o Brasil.' );
				$this->setFloracao ( 'dezembro-abril' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pau_cigarra.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 115 :
				$this->setIdMuda ( 115 );
				$this->setNomePopular ( 'Pau-ferro' );
				$this->setNomeCientifico ( 'Caesalpinea ferrea Mart. ex Tul. var. leiostachya Benth.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'PI até SP. É cultivada no PR, SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pau_ferro.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 116 :
				$this->setIdMuda ( 116 );
				$this->setNomePopular ( 'Pau-formiga' );
				$this->setNomeCientifico ( 'Triplaris brasiliana Cham. ' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'MT, MS, SP. É cultivada no PR, SC e RS.' );
				$this->setFloracao ( 'agosto-outubro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'rosa' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pau_formiga.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 117 :
				$this->setIdMuda ( 117 );
				$this->setNomePopular ( 'Pau-jacaré' );
				$this->setNomeCientifico ( 'Piptadenia gonoacantha (Mart.) Macbr.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'RJ, MG, MS até SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pau_jacaré.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 118 :
				$this->setIdMuda ( 118 );
				$this->setNomePopular ( 'Pau-óleo' );
				$this->setNomeCientifico ( 'Copaifera trapezifolia Hayne' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '10-25m' );
				$this->setRegioesCultivo ( 'BA,MG, PE, PR, RS, SC e SP..' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pau_óleo.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 119 :
				$this->setIdMuda ( 119 );
				$this->setNomePopular ( 'Peroba' );
				$this->setNomeCientifico ( 'Aspidosperma parvifolium A. DC.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '10-15m' );
				$this->setRegioesCultivo ( 'Sul da BA até o RS, MG, GO e MS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Peroba.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 120 :
				$this->setIdMuda ( 120 );
				$this->setNomePopular ( 'Pinheiro-alemão' );
				$this->setNomeCientifico ( 'Cunninghamia lanceolata (Lamb.) Hooker f.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '25-45m' );
				$this->setRegioesCultivo ( 'Cultivado no Sul do Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pinheiro_alemão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 121 :
				$this->setIdMuda ( 121 );
				$this->setNomePopular ( 'Pinheiro-brasileiro' );
				$this->setNomeCientifico ( 'Araucaria angustifolia (Bert.) Kuntze' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::IND, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '20-50m' );
				$this->setRegioesCultivo ( 'MG, RJ até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'abril-maio' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pinheiro_brasileiro.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 122 :
				$this->setIdMuda ( 122 );
				$this->setNomePopular ( 'Pinheiro-de-natal' );
				$this->setNomeCientifico ( 'Araucaria columnaris (Forst.) Hook.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '40-60m' );
				$this->setRegioesCultivo ( 'Cultivado no PR, SC e RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pinheiro_de_natal.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 123 :
				$this->setIdMuda ( 123 );
				$this->setNomePopular ( 'Pinus' );
				$this->setNomeCientifico ( 'Pinus taeda L.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::S, FimPlantio::O, FimPlantio::IND ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '25-30m' );
				$this->setRegioesCultivo ( 'Cultivado principalmente no RS e SC.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pinus.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 124 :
				$this->setIdMuda ( 124 );
				$this->setNomePopular ( 'Pitanga' );
				$this->setNomeCientifico ( 'Eugenia uniflora L.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '6-12m' );
				$this->setRegioesCultivo ( 'MG até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'outubro-janeiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Pitanga.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 125 :
				$this->setIdMuda ( 125 );
				$this->setNomePopular ( 'Plátano' );
				$this->setNomeCientifico ( 'Platanus acerifolia (Aiton) Willd.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::S, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-30m' );
				$this->setRegioesCultivo ( 'Cultivado no Sul do Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Plátano.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 126 :
				$this->setIdMuda ( 126 );
				$this->setNomePopular ( 'Quaresmeira' );
				$this->setNomeCientifico ( 'Tibouchina granulosa Cogn.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '8-12m' );
				$this->setRegioesCultivo ( 'BA, RJ, SP e MG. É cultivada em SC.' );
				$this->setFloracao ( 'junho-agosto e dezembro-março' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'lilás' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Quaresmeira.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 127 :
				$this->setIdMuda ( 127 );
				$this->setNomePopular ( 'Romã' );
				$this->setNomeCientifico ( 'Punica granatumL.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::FH, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '3-4m' );
				$this->setRegioesCultivo ( 'Cultivado em todo Brasil.' );
				$this->setFloracao ( 'a partir de setembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'vermelho-alaranjada' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Romã.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 128 :
				$this->setIdMuda ( 128 );
				$this->setNomePopular ( 'Salso-chorão' );
				$this->setNomeCientifico ( 'Salix alba L.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '10-20m' );
				$this->setRegioesCultivo ( 'Cultivado nas regiões de altitude do Sul do Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Salso_chorão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 129 :
				$this->setIdMuda ( 129 );
				$this->setNomePopular ( 'Sete-capotes' );
				$this->setNomeCientifico ( 'Campomanesia guazumifolia (Camb.) Berg' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '6-10m' );
				$this->setRegioesCultivo ( 'RJ, MG, SP, MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'março-maio' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Sete_capotes.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 130 :
				$this->setIdMuda ( 130 );
				$this->setNomePopular ( 'Sibipiruna' );
				$this->setNomeCientifico ( 'Caesalpinea peltophoroides Benth.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '8-16m' );
				$this->setRegioesCultivo ( 'RJ, BA e MS. É cultivada em SP, PR, SC e RS.' );
				$this->setFloracao ( 'agosto-novembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Sibipiruna.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 131 :
				$this->setIdMuda ( 131 );
				$this->setNomePopular ( 'Sombreiro' );
				$this->setNomeCientifico ( 'Clitoria fairchildiana Howard' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '6-12m' );
				$this->setRegioesCultivo ( 'AM, PA, MA e TO. É cultivado como ornamental nos estados do Sul e Sudeste do Brasil' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Sombreiro.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 132 :
				$this->setIdMuda ( 132 );
				$this->setNomePopular ( 'Tanheiro' );
				$this->setNomeCientifico ( 'Alchornea triplinervia (Spreng.) M. Arg.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::S, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '15-30m' );
				$this->setRegioesCultivo ( 'BA ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Tanheiro.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 133 :
				$this->setIdMuda ( 133 );
				$this->setNomePopular ( 'Tarumã' );
				$this->setNomeCientifico ( 'Vitex montevidensis Cham. ' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '5-20m' );
				$this->setRegioesCultivo ( 'MG, MS até o RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'janeiro-março' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Tarumã.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 134 :
				$this->setIdMuda ( 134 );
				$this->setNomePopular ( 'Timbaúva' );
				$this->setNomeCientifico ( 'Enterolobium contortisiliquum (Vell.) Morong' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '20-35m' );
				$this->setRegioesCultivo ( 'PA, MA, PI até MS e RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Timbaúva.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 135 :
				$this->setIdMuda ( 135 );
				$this->setNomePopular ( 'Timbó' );
				$this->setNomeCientifico ( 'Ateleia glazioveana Baill.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::S, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '8-18m' );
				$this->setRegioesCultivo ( 'PR ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Timbó.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 136 :
				$this->setIdMuda ( 136 );
				$this->setNomePopular ( 'Tipuana ' );
				$this->setNomeCientifico ( 'Tipuana tipu (Benth.) Kuntze' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::S, FimPlantio::O, FimPlantio::FLOR ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '12-15m' );
				$this->setRegioesCultivo ( 'Cultivada nas regiões Sul e Sudeste do Brasil.' );
				$this->setFloracao ( 'setembro-dezembro' );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( 'amarela' );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Tipuana.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 137 :
				$this->setIdMuda ( 137 );
				$this->setNomePopular ( 'Tucaneira' );
				$this->setNomeCientifico ( 'Cytharexylum myrianthum Cham.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FA, FimPlantio::O, FimPlantio::RMC, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '8-20m' );
				$this->setRegioesCultivo ( 'BA ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Tucaneira.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 138 :
				$this->setIdMuda ( 138 );
				$this->setNomePopular ( 'Tuia' );
				$this->setNomeCientifico ( 'Thuja occidentalis L.' );
				$this->setFinsPlantio ( Array (FimPlantio::EX, FimPlantio::O ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '15-20m' );
				$this->setRegioesCultivo ( 'Cultivada nas regiões Sul e Sudeste do Brasil.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Tuia.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 139 :
				$this->setIdMuda ( 139 );
				$this->setNomePopular ( 'Urucum' );
				$this->setNomeCientifico ( 'Bixa orellana L.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '3-5m' );
				$this->setRegioesCultivo ( 'Região amazônica até a BA. É cultivada nos demais estados.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'final do verão e no início do outono' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Urucum.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 140 :
				$this->setIdMuda ( 140 );
				$this->setNomePopular ( 'Uva-do-japão' );
				$this->setNomeCientifico ( 'Hovenia dulcis Thunb.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::S, FimPlantio::O, FimPlantio::IND ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::D );
				$this->setAltura ( '10-15m' );
				$this->setRegioesCultivo ( 'Cultivada principalmente no Sul, e em todas regiões do Brasil como curiosidade. ' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Uva_do_japão.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 141 :
				$this->setIdMuda ( 141 );
				$this->setNomePopular ( 'Uvaia' );
				$this->setNomeCientifico ( 'Eugenia pyriformis Camb.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::FH, FimPlantio::FA, FimPlantio::O, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::SD );
				$this->setAltura ( '6-13m' );
				$this->setRegioesCultivo ( 'SP ao RS' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( 'setembro-janeiro' );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Uvaia.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
			
			case 142 :
				$this->setIdMuda ( 142 );
				$this->setNomePopular ( 'Vassourão-preto' );
				$this->setNomeCientifico ( 'Vernonia discolor (Spreng.) Less.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '10-15m' );
				$this->setRegioesCultivo ( 'MG ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Vassourão_preto.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
				
		case 143 :
				$this->setIdMuda ( 143 );
				$this->setNomePopular ( 'Vassourão-pretos' );
				$this->setNomeCientifico ( 'Vernonia discolor (Spreng.) Less.' );
				$this->setFinsPlantio ( Array (FimPlantio::NA, FimPlantio::RAD ) );
				$this->setComportamentoFolhar ( ComportamentoFolhar::P );
				$this->setAltura ( '10-15m' );
				$this->setRegioesCultivo ( 'MG ao RS.' );
				$this->setFloracao ( NULL );
				$this->setFrutificacao ( NULL );
				$this->setCorFloracao ( NULL );
				$this->setMapaRegiao ( _Path::getIMAGE_PATH () . 'mudas/mapas/Vassourão_preto.jpg' );
				$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
				break;
		}
	
	}
}

?>