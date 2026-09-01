<?php

/**
 * Gerencia as informações de uma muda.
 *
 * Os dados das espécies vivem em system/data/arvores.csv — uma planilha que o
 * cliente edita sem tocar em PHP. O slug de cada espécie está gravado no CSV
 * (nunca calculado em tempo de execução) para que incluir uma espécie nova não
 * desloque URLs já indexadas.
 *
 * @author Tiago Piske
 */
class Muda {

	/**
	 * Topo da escala da régua de porte, em metros.
	 * A espécie mais alta do catálogo chega a 60 m.
	 */
	const ALTURA_MAX_ESCALA = 60;

	/**
	 * Registros do CSV indexados por id. Carregado uma única vez por requisição.
	 *
	 * @var Array
	 */
	private static $registros = null;

	/**
	 * Índice slug => id.
	 *
	 * @var Array
	 */
	private static $porSlug = null;

	private $idMuda;
	private $slug;
	private $nomePopular;
	private $nomeCientifico;
	private $origem;
	private $finsPlantio = array ();
	private $finsPlantioExtenso = array ();
	private $comportamentoFolhar;
	private $comportamentoFolharExtenso;
	private $altura;
	private $floracao;
	private $frutificacao;
	private $corFloracao;
	private $regioesCultivo;
	private $mapaRegiao;
	private $descricao;
	private $fotoMuda;

	/**
	 * Construtor
	 *
	 * @param Integer $idMuda
	 * @return void
	 */
	public function __construct($idMuda) {

		$this->construtorMuda ( $idMuda );
	}

	/* ------------------------------------------------------------------ *
	 * Carga dos dados
	 * ------------------------------------------------------------------ */

	/**
	 * Lê o CSV das espécies uma única vez e mantém em cache estático.
	 *
	 * @return void
	 */
	private static function carrega() {

		if (self::$registros !== null) {
			return;
		}

		self::$registros = array ();
		self::$porSlug = array ();

		$arquivo = _Path::getURL_BAS () . 'system/data/arvores.csv';
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

			$id = ( int ) $registro ['id'];
			if (! $id) {
				continue;
			}

			self::$registros [$id] = $registro;
			if ($registro ['slug'] !== '') {
				self::$porSlug [$registro ['slug']] = $id;
			}
		}

		fclose ( $handle );
	}

	/**
	 * Preenche os atributos a partir do registro do CSV.
	 *
	 * @param Integer $idMuda
	 * @return void
	 */
	private function construtorMuda($idMuda) {

		self::carrega ();

		$id = ( int ) $idMuda;
		if (! isset ( self::$registros [$id] )) {
			return; // espécie inexistente: objeto fica vazio, ver existe()
		}

		$registro = self::$registros [$id];

		$this->setIdMuda ( $id );
		$this->slug = $registro ['slug'];
		$this->setNomePopular ( $registro ['nome_popular'] );
		$this->setNomeCientifico ( $registro ['nome_cientifico'] );
		$this->origem = $registro ['origem'];
		$this->setAltura ( $registro ['altura'] );
		$this->setFloracao ( $registro ['floracao'] );
		$this->setFrutificacao ( $registro ['frutificacao'] );
		$this->setCorFloracao ( $registro ['cor_floracao'] );
		$this->setRegioesCultivo ( $registro ['regioes_ocorrencia_cultivo'] );
		$this->setComportamentoFolhar ( $registro ['comportamento_folhar_codigo'] );
		$this->comportamentoFolharExtenso = $registro ['comportamento_folhar'];
		$this->descricao = $registro ['descricao'];

		$this->setFinsPlantio ( $registro ['fins_plantio_codigos'] !== '' ? preg_split ( '/\s+/', $registro ['fins_plantio_codigos'] ) : array () );

		$this->finsPlantioExtenso = array ();
		if ($registro ['fins_plantio'] !== '') {
			foreach ( explode ( '|', $registro ['fins_plantio'] ) as $fim ) {
				$this->finsPlantioExtenso [] = trim ( $fim );
			}
		}

		$this->setMapaRegiao ( $registro ['mapa_regiao'] !== '' ? _Path::getIMAGE_PATH () . $registro ['mapa_regiao'] : '' );
		$this->setFotoMuda ( _Path::getIMAGE_PATH () . 'mudas/' );
	}

	/**
	 * Indica se a muda foi encontrada no catálogo.
	 *
	 * @return Boolean
	 */
	public function existe() {

		return $this->idMuda !== null;
	}

	/* ------------------------------------------------------------------ *
	 * Acessores
	 * ------------------------------------------------------------------ */

	public function setIdMuda($idMuda) {
		$this->idMuda = $idMuda;
	}

	public function getIdMuda() {
		return $this->idMuda;
	}

	public function setNomePopular($nomePopular) {
		$this->nomePopular = $nomePopular;
	}

	public function getNomePopular() {
		return $this->nomePopular;
	}

	public function setNomeCientifico($nomeCientifico) {
		$this->nomeCientifico = $nomeCientifico;
	}

	public function getNomeCientifico() {
		return $this->nomeCientifico;
	}

	public function setFinsPlantio($finsPlantio) {
		$this->finsPlantio = $finsPlantio;
	}

	public function getFinsPlantio() {
		return $this->finsPlantio;
	}

	public function setComportamentoFolhar($comportamentoFolhar) {
		$this->comportamentoFolhar = $comportamentoFolhar;
	}

	public function getComportamentoFolhar() {
		return $this->comportamentoFolhar;
	}

	public function setAltura($altura) {
		$this->altura = $altura;
	}

	public function getAltura() {
		return $this->altura;
	}

	public function setFloracao($floracao) {
		$this->floracao = $floracao;
	}

	public function getFloracao() {
		return $this->floracao;
	}

	public function setFrutificacao($frutificacao) {
		$this->frutificacao = $frutificacao;
	}

	public function getFrutificacao() {
		return $this->frutificacao;
	}

	public function setCorFloracao($corFloracao) {
		$this->corFloracao = $corFloracao;
	}

	public function getCorFloracao() {
		return $this->corFloracao;
	}

	public function setRegioesCultivo($regioesCultivo) {
		$this->regioesCultivo = $regioesCultivo;
	}

	public function getRegioesCultivo() {
		return $this->regioesCultivo;
	}

	public function setMapaRegiao($mapaRegiao) {
		$this->mapaRegiao = $mapaRegiao;
	}

	public function getMapaRegiao() {
		return $this->mapaRegiao;
	}

	public function setFotoMuda($fotoMuda) {
		$this->fotoMuda = $fotoMuda;
	}

	public function getFotoMuda() {
		return $this->fotoMuda;
	}

	public function getSlug() {
		return $this->slug;
	}

	/**
	 * Binômio sem a autoridade — "Handroanthus albus" em vez de
	 * "Handroanthus albus (Cham.) Sandwith". É a forma usada em título de
	 * página e em rótulo, onde a autoridade só ocuparia espaço.
	 *
	 * @return String
	 */
	public function getNomeCientificoCurto() {

		if (! $this->nomeCientifico) {
			return '';
		}

		$palavras = preg_split ( '/\s+/', trim ( $this->nomeCientifico ) );

		return implode ( ' ', array_slice ( $palavras, 0, 2 ) );
	}

	public function getOrigem() {
		return $this->origem;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function getFinsPlantioExtenso() {
		return $this->finsPlantioExtenso;
	}

	public function getComportamentoFolharExtenso() {
		return $this->comportamentoFolharExtenso;
	}

	/**
	 * Endereço da página da espécie.
	 *
	 * @return String
	 */
	public function getUrl() {

		return _Path::getURL_PATH () . 'mudas/' . $this->slug;
	}

	/**
	 * Espécie nativa do Brasil?
	 *
	 * @return Boolean
	 */
	public function isNativa() {

		return in_array ( FimPlantio::NA, ( array ) $this->finsPlantio );
	}

	/* ------------------------------------------------------------------ *
	 * Dados derivados — régua de porte e fenologia
	 * ------------------------------------------------------------------ */

	/**
	 * Extrai a faixa de altura em metros de textos como "15-25m" ou
	 * "5-8m (10-15m na mata)" — sempre a primeira faixa informada.
	 *
	 * @return Array|null array('min' => Float, 'max' => Float)
	 */
	public function alturaMinMax() {

		if (! $this->altura) {
			return null; // trepadeiras não têm porte arbóreo
		}

		if (! preg_match ( '/(\d+(?:[.,]\d+)?)\s*-\s*(\d+(?:[.,]\d+)?)\s*m/i', $this->altura, $partes )) {
			return null;
		}

		$min = ( float ) str_replace ( ',', '.', $partes [1] );
		$max = ( float ) str_replace ( ',', '.', $partes [2] );

		return array ('min' => min ( $min, $max ), 'max' => max ( $min, $max ) );
	}

	/**
	 * Converte um período textual ("julho-agosto", "novembro-janeiro",
	 * "junho-agosto e dezembro-março") em 12 posições booleanas.
	 *
	 * Devolve null quando o texto não é um período reconhecível — nesse caso a
	 * interface mostra o texto original em vez de desenhar uma faixa errada.
	 *
	 * @param String $periodo
	 * @return Array|null
	 */
	private static function mesesDoPeriodo($periodo) {

		$periodo = trim ( mb_strtolower ( $periodo, 'UTF-8' ) );
		if ($periodo === '') {
			return null;
		}

		if (preg_match ( '/todo\s+(o\s+)?ano|ano\s+todo/u', $periodo )) {
			return array_fill ( 1, 12, true );
		}

		$meses = array_fill ( 1, 12, false );
		$trechos = preg_split ( '/\s+e\s+/u', $periodo );
		$reconheceu = false;

		foreach ( $trechos as $trecho ) {

			$trecho = trim ( $trecho );
			if ($trecho === '') {
				continue;
			}

			// "dezembro a março" e "dezembro-março" descrevem o mesmo período
			$trecho = preg_replace ( '/\s+a\s+/u', '-', $trecho );

			if (preg_match ( '/^([a-zçãáéêíóôõú]+)\s*-\s*([a-zçãáéêíóôõú]+)$/u', $trecho, $partes )) {

				$de = _Formatting::numericMonth ( $partes [1] );
				$ate = _Formatting::numericMonth ( $partes [2] );

				if (! $de || ! $ate) {
					return null;
				}

				// períodos que viram o ano, como novembro-janeiro
				$mes = $de;
				while ( true ) {
					$meses [$mes] = true;
					if ($mes == $ate) {
						break;
					}
					$mes = $mes == 12 ? 1 : $mes + 1;
				}
				$reconheceu = true;

			} else {

				$unico = _Formatting::numericMonth ( $trecho );
				if ($unico === null) {
					return null; // "a partir de setembro", "final do verão"...
				}

				$meses [$unico] = true;
				$reconheceu = true;
			}
		}

		return $reconheceu ? $meses : null;
	}

	/**
	 * @return Array|null
	 */
	public function mesesFloracao() {

		return self::mesesDoPeriodo ( $this->floracao );
	}

	/**
	 * @return Array|null
	 */
	public function mesesFrutificacao() {

		return self::mesesDoPeriodo ( $this->frutificacao );
	}

	/**
	 * Parágrafo-resposta da página da espécie. Usa o texto da coluna
	 * "descricao" quando o cliente preencheu; senão constrói a partir dos campos.
	 *
	 * @return String
	 */
	public function getResumo() {

		if ($this->descricao) {
			return $this->descricao;
		}

		$origem = $this->isNativa () ? 'espécie nativa do Brasil' : 'espécie exótica cultivada no Brasil';

		$frase = 'O ' . mb_strtolower ( $this->nomePopular, 'UTF-8' ) . ' (<em>' . $this->nomeCientifico . '</em>) é uma ' . $origem;

		$faixa = $this->alturaMinMax ();
		if ($faixa) {
			$frase .= ', que atinge de ' . self::numeroBr ( $faixa ['min'] ) . ' a ' . self::numeroBr ( $faixa ['max'] ) . ' metros de altura';
		}

		if ($this->comportamentoFolharExtenso) {
			$frase .= ', de folhagem ' . mb_strtolower ( $this->comportamentoFolharExtenso, 'UTF-8' );
		}
		$frase .= '.';

		if ($this->regioesCultivo) {
			$frase .= ' Ocorrência: ' . rtrim ( $this->regioesCultivo, '.' ) . '.';
		}

		// A origem já foi dita na primeira frase; não repetir NA/EX na lista de usos
		$usos = array ();
		foreach ( $this->finsPlantio as $i => $codigo ) {
			if ($codigo == FimPlantio::NA || $codigo == FimPlantio::EX) {
				continue;
			}
			if (isset ( $this->finsPlantioExtenso [$i] )) {
				$usos [] = mb_strtolower ( $this->finsPlantioExtenso [$i], 'UTF-8' );
			}
		}

		if ($usos) {
			$frase .= ' Indicada para ' . self::listaPorExtenso ( $usos ) . '.';
		}

		if ($this->floracao && $this->corFloracao) {
			$frase .= ' Floresce em ' . $this->floracao . ', com flores de cor ' . $this->corFloracao . '.';
		}

		return $frase;
	}

	/**
	 * Junta itens em texto corrido: "a, b e c".
	 *
	 * @param Array $itens
	 * @return String
	 */
	private static function listaPorExtenso($itens) {

		if (count ( $itens ) == 1) {
			return $itens [0];
		}

		$ultimo = array_pop ( $itens );
		return implode ( ', ', $itens ) . ' e ' . $ultimo;
	}

	/**
	 * Formata número no padrão brasileiro, sem casa decimal desnecessária.
	 *
	 * @param Float $numero
	 * @return String
	 */
	private static function numeroBr($numero) {

		return rtrim ( rtrim ( number_format ( $numero, 1, ',', '' ), '0' ), ',' );
	}

	/* ------------------------------------------------------------------ *
	 * Consultas ao catálogo
	 * ------------------------------------------------------------------ */

	/**
	 * Resolve o slug de uma espécie para o seu id.
	 *
	 * @param String $slug
	 * @return Integer|null
	 */
	public static function idPorSlug($slug) {

		self::carrega ();
		return isset ( self::$porSlug [$slug] ) ? self::$porSlug [$slug] : null;
	}

	/**
	 * Total de espécies no catálogo.
	 *
	 * @return Integer
	 */
	public static function total() {

		self::carrega ();
		return count ( self::$registros );
	}

	/**
	 * Todas as mudas do catálogo.
	 *
	 * @return Muda[]
	 */
	public static function retornaListaMudas() {

		self::carrega ();

		$listaMudas = array ();
		foreach ( array_keys ( self::$registros ) as $id ) {
			$listaMudas [] = new Muda ( $id );
		}

		return $listaMudas;
	}

	/**
	 * Mudas que atendem a um ou mais fins de plantio.
	 *
	 * @param FimPlantio|FimPlantio[] $fimPlantio
	 * @return Muda[]
	 */
	public static function pesquisaAvancada($fimPlantio) {

		$procurados = is_array ( $fimPlantio ) ? $fimPlantio : array ($fimPlantio );

		$listaMudas = array ();
		foreach ( self::retornaListaMudas () as $muda ) {

			foreach ( $procurados as $procurado ) {
				if (in_array ( $procurado, $muda->getFinsPlantio () )) {
					$listaMudas [] = $muda;
					break; // uma muda entra na lista uma única vez
				}
			}
		}

		return $listaMudas;
	}

	/**
	 * Espécies que compartilham fins de plantio com a muda informada, para o
	 * bloco de relacionadas. Nativas sobem na lista.
	 *
	 * @param Muda $muda
	 * @param Integer $limite
	 * @return Muda[]
	 */
	public static function relacionadas($muda, $limite = 6) {

		$fins = $muda->getFinsPlantio ();
		if (! $fins) {
			return array ();
		}

		$pontuadas = array ();
		foreach ( self::retornaListaMudas () as $candidata ) {

			if ($candidata->getIdMuda () == $muda->getIdMuda ()) {
				continue;
			}

			$comuns = count ( array_intersect ( $fins, $candidata->getFinsPlantio () ) );
			if (! $comuns) {
				continue;
			}

			$pontuadas [] = array ('muda' => $candidata, 'peso' => $comuns + ($candidata->isNativa () ? 0.5 : 0) );
		}

		usort ( $pontuadas, array ('Muda', 'comparaPeso' ) );

		$relacionadas = array ();
		foreach ( array_slice ( $pontuadas, 0, $limite ) as $item ) {
			$relacionadas [] = $item ['muda'];
		}

		return $relacionadas;
	}

	/**
	 * Ordena da maior para a menor afinidade.
	 *
	 * @return Integer
	 */
	public static function comparaPeso($a, $b) {

		if ($a ['peso'] == $b ['peso']) {
			return strcmp ( $a ['muda']->getNomePopular (), $b ['muda']->getNomePopular () );
		}

		return $a ['peso'] < $b ['peso'] ? 1 : - 1;
	}

}

?>
