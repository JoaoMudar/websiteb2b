<?php

/**
 * Classe que tem métodos padrões de formatação
 *
 * @author Tiago Wanke Marques
 */
abstract class _Formatting {
	
	/**
	 * Retorna somente os números da string informada;
	 * Se nao houver números na string, retorna null;
	 *
	 * @param string $str
	 * @return integer
	 */
	public function onlyNumber($str) {
		
		$str = preg_replace ( "/[^0-9]/", "", $str );
		
		if (! strlen ( $str )) {
			return null;
		}
		
		return $str;
	}
	
	/**
	 * Valida o formato de um valor monetário (ex: 100.000,00)
	 *
	 * @param string $valor
	 * @return boolean
	 */
	public function validCurrency($valor) {
		if (! preg_match ( "/^[0-9]{1,3}(.[0-9]{3})*,[0-9]{1,2}$/i", $valor )) {
			return false;
		}
		
		return true;
	}
	
	/**
	 * Transforma valor de moeda 1.200,00 para float 1200.00
	 * Retorna o valor float, caso o valor passado como parametro seja inválido retorna false
	 *
	 * @param string $valor
	 * @return float
	 */
	public function currencyToFloat($valor) {
		
		if (! _Formatacao::validaMoeda ( $valor )) {
			return false;
		}
		
		$valorSemPonto = str_replace ( ".", "", $valor );
		$valorFloat = ( float ) str_replace ( ",", ".", $valorSemPonto );
		
		return $valorFloat;
	}
	
	/**
	 * Verifica se um e-mail informado é válido ou não.
	 *
	 * @param string $email
	 * @return boolean
	 */
	public function validEmail($email) {
		
		if (! preg_match ( "/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i", $email )) {
			return false;
		}
		
		return true;
	}
	
	/**
	 * Formata um cpf
	 *
	 * @param string $cpf
	 * @return string
	 */
	function formatCPF($cpf) {
		
		// deixa apenas os números na string
		$cpf = preg_replace ( "/[^0-9]/", "", $cpf );
		
		$cpf = str_pad ( $cpf, 11, 0, STR_PAD_LEFT );
		
		if (strlen ( $cpf ) == 11) {
			$cpf = substr ( $cpf, 0, 3 ) . '.' . substr ( $cpf, 3, 3 ) . '.' . substr ( $cpf, 6, 3 ) . '-' . substr ( $cpf, 9, 2 );
			return $cpf;
		}
		
		return false;
	}
	
	/**
	 * Formata o CNPJ
	 *
	 * @example 
	 * 	$cnpj = 09477614000133
	 *  print _Formatacao->formataCNPJ($cnpj); // 09.477.614/0001-33
	 * 
	 * @param string $cnpj
	 * @return string
	 */
	public function formatCNPJ($cnpj) {
		
		// deixa apenas os números na string
		$cnpj = preg_replace ( "/[^0-9]/", "", $cnpj );
		
		if (strlen ( $cnpj ) == 14) {
			$cnpj = substr ( $cnpj, 0, 2 ) . '.' . substr ( $cnpj, 2, 3 ) . '.' . substr ( $cnpj, 5, 3 ) . '/' . substr ( $cnpj, 8, 4 ) . '-' . substr ( $cnpj, 12, 2 );
			return $cnpj;
		}
		
		return false;
	}
	
	/**
	 * Forma o CEP
	 *
	 * @example 
	 * 	$cep = 89130000
	 * 	print _Formatacao->formataCEP($cep); // 89.130-000
	 * 
	 * @param String $cep
	 * @return String
	 */
	public function formatCEP($cep) {
		
		// deixa apenas os números na string
		$cep = preg_replace ( "/[^0-9]/", "", $cep );
		
		if (strlen ( $cep ) == 8) {
			$cep = substr ( $cep, 0, 2 ) . '.' . substr ( $cep, 2, 3 ) . '-' . substr ( $cep, 5 );
			return $cep;
		}
		
		return false;
	}
	
	/**
	 * Formata um valor qualquer para a moeda
	 * 
	 * @example 
	 * 	$valor = R$ 10000000;
	 *  print _Formatacao::formataMoeda($valor); // vai imprimir 100.000,00
	 *
	 * @param String $valor
	 * @return String
	 * 
	 */
	public function formatCurrency($moeda) {
		
		return number_format ( $moeda, 2, ',', '.' );
	}
	
	/**
	 * Verifica se um CNPJ é válido ou não
	 *
	 * @param string $cnpj
	 * @return boolean
	 */
	public function validCNPJ($cnpj) {
		
		$cnpj = preg_replace ( "@[./-]@", "", $cnpj );
		
		if (strlen ( $cnpj ) != 14 or ! is_numeric ( $cnpj )) {
			return false;
		}
		
		$k = 6;
		$soma1 = "";
		$soma2 = "";
		for($i = 0; $i < 13; $i ++) {
			$k = $k == 1 ? 9 : $k;
			$soma2 += ($cnpj[$i] * $k);
			$k --;
			if ($i < 12) {
				if ($k == 1) {
					$k = 9;
					$soma1 += ($cnpj[$i] * $k);
					$k = 1;
				} else {
					$soma1 += ($cnpj[$i] * $k);
				}
			}
		}
		
		$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
		$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
		
		return ($cnpj[12] == $digito1 and $cnpj[13] == $digito2);
	}
	
	/**
	 * Verifica se um cpf é válido ou não
	 *
	 * @param string $cpf
	 * @return boolean
	 */
	public function validCPF($cpf) {
		
		$nulo = "12345678909";
		$nulo1 = "11111111111";
		$nulo2 = "22222222222";
		$nulo3 = "33333333333";
		$nulo4 = "44444444444";
		$nulo5 = "55555555555";
		$nulo6 = "66666666666";
		$nulo7 = "77777777777";
		$nulo8 = "88888888888";
		$nulo9 = "99999999999";
		$nulo0 = "00000000000";
		
		if (($cpf == $nulo) || ($cpf == $nulo1) || ($cpf == $nulo2) || ($cpf == $nulo3) || ($cpf == $nulo4) || ($cpf == $nulo5) || ($cpf == $nulo6) || ($cpf == $nulo7) || ($cpf == $nulo8) || ($cpf == $nulo9) || ($cpf == $nulo0)) {
			return false;
		} else {
			// Alocação de cada digito digitado no formulário, em uma celula de um vetor
			for($i = 0; $i < 11; $i ++) {
				$cpf_temp [$i] = "$cpf[$i]";
			}
			
			// Calcula o penúltimo dígito verificador
			$acum = 0;
			for($i = 0; $i < 9; $i ++) {
				$acum = $acum + ($cpf [$i] * (10 - $i));
			}
			
			$x = "$acum";
			$x %= 11;
			if ($x > 1)
				$acum = 11 - $x;
			else
				$acum = 0;
			
			$cpf_temp [9] = "$acum";
			
			// Calcula o último dígito verificador
			$acum = 0;
			for($i = 0; $i < 10; $i ++) {
				$acum = $acum + ($cpf_temp [$i] * (11 - $i));
			}
			
			$x = "$acum";
			$x %= 11;
			if ($x > 1)
				$acum = 11 - $x;
			else
				$acum = 0;
			
			$cpf_temp [10] = "$acum";
			
			// Este laço verifica se o cpf original é igual ao cpf gerado pelos dois laços acima
			$z = 0;
			for($i = 0; $i < 11; $i ++) {
				if ($cpf [$i] != $cpf_temp [$i]) {
					return false;
				}
			}
			if ($z != 1)
				return true;
		
		}
		
		return false;
	}
	
	/**
	 * Verifica se um cep é válido.
	 *
	 * @example 
	 * 	$cep = '89.130-000';
	 *  _Formatacao->validaCEP($cep); // true
	 * 
	 * 	$cep = '89130000';
	 *  _Formatacao->validaCEP($cep); // false
	 * 
	 * @param String $cep
	 * @return Boolean
	 */
	public function validCEP($cep) {
		
		$cep = trim ( $cep );
		$cep = _Formatacao::soNumero ( $cep );
		$avaliaCep = (bool)preg_match ( "/^[0-9]{5}[0-9]{3}$/", $cep );
		
		return $avaliaCep;
	}
	
	/**
	 * Retorna a descrição de um mês por extenso
	 *
	 * @param integer $mes
	 * @return String
	 */
	public function extensiveMonth($mes) {
		
		switch ($mes) {
			case 1 :
				return 'Janeiro';
			case 2 :
				return 'Fevereiro';
			case 3 :
				return 'Março';
			case 4 :
				return 'Abril';
			case 5 :
				return 'Maio';
			case 6 :
				return 'Junho';
			case 7 :
				return 'Julho';
			case 8 :
				return 'Agosto';
			case 9 :
				return 'Setembro';
			case 10 :
				return 'Outubro';
			case 11 :
				return 'Novembro';
			case 12 :
				return 'Dezembro';
		}
		
		return '';
	}
	
	/**
	 * Rertorna o número de acorodo com o mês passado por extenso
	 *
	 * @param String $mes
	 * @return Integer
	 */
	public function numericMonth($mes) {
		
		$lista = array ();
		$lista ['jan'] = 1;
		$lista ['fev'] = 2;
		$lista ['mar'] = 3;
		$lista ['abr'] = 4;
		$lista ['mai'] = 5;
		$lista ['jun'] = 6;
		$lista ['jul'] = 7;
		$lista ['ago'] = 8;
		$lista ['set'] = 9;
		$lista ['out'] = 10;
		$lista ['nov'] = 11;
		$lista ['dez'] = 12;
		
		$lista ['janeiro'] = 1;
		$lista ['fevereiro'] = 2;
		$lista ['março'] = 3;
		$lista ['abril'] = 4;
		$lista ['maio'] = 5;
		$lista ['junho'] = 6;
		$lista ['julho'] = 7;
		$lista ['agosto'] = 8;
		$lista ['setembro'] = 9;
		$lista ['outubro'] = 10;
		$lista ['novembro'] = 11;
		$lista ['dezembro'] = 12;
		
		return isset ( $lista [$mes] ) ? $lista [$mes] : null;
	}
	
	/**
	 * Transforma os dados de uma array em uma string utilizando um separador entre cada item da array
	 *
	 * @param Array $array
	 * @param String $separator
	 * @return String
	 */
	public function arrayToString($array, $separator) {
		
		$str = '';
		for($i = 0; $i < count ( $array ); $i ++) {
			
			$str .= $array [$i];
			$str .= $i + 1 < count ( $array ) ? $separator : "";
		}
		
		return $str;
	}
	
	/**
	 * Valida uma data no formato brasileiro.
	 *
	 * @param string $data
	 * @return boolean
	 */
	public function validBrDate($data) {
		
		$data = str_replace ( '/', '', $data );
		
		return (bool)preg_match ( "/^((([0][1-9]|[12][0-9])02(19|20)([13579][26]|[02468][048]))|(([0][1-9]|[12][0-8])02(19|20)([02468][12356]|[13579][13579]))|((([0][1-9]|[12][0-9]|30)(0[469]|11)|([0][1-9]|[12][0-9]|3[01])(0[13578]|1[02]))((19|20)[0-9][0-9])))$/", $data );
	}
	
	/**
	 * Transforma um date time em uma array com duas posições.
	 * 'data' = data no formato brasileiro (dd/mm/aaaa)
	 * 'hora' = hora no formato hh:mm:ss
	 *
	 * @example 
	 * 	$dateTime = '2008-11-13 11:19:21';
	 *  $dataHora = _Formatacao::dateTimeToDataHoraBr($dateTime);
	 *  print $dataHora['data']; // 13/11/2008
	 *  print $dataHora['hora']; // 11:19:21
	 * 
	 * @param String $dateTime
	 * @return String[]
	 */
	public function dateTimeToDateTimeBr($dateTime) {
		
		$data = substr ( $dateTime, 0, strpos ( $dateTime, ' ' ) );
		$hora = substr ( $dateTime, strpos ( $dateTime, ' ' ) );
		
		$retorno = array ();
		$db = DBFactory::factory();
		$retorno ['data'] = $db->dataBdToBr ( $data );
		$retorno ['hora'] = $hora;
		
		return $retorno;
	}
	
	/**
	 * Transforma um date em uma array com duas posições.
	 * 'data' = data no formato brasileiro (dd/mm/aaaa)
	 *
	 * @example 
	 * 	$date = '2008-11-13';
	 *  print $data['data']; // 13/11/2008
	 * 
	 * @param String $date
	 * @return String[]
	 */
	public function dateToDateBr($date) {
		
		$db = DBFactory::factory();
		return $db->dataBdToBr ( $date );
	}
	
	/**
	 * Retorna a string da área acessada. Método utilizado nas Views.
	 *
	 * @var String $area
	 * @return String
	 */
	public static function returnAccessedArea($area = '') {

		if (_Path::getURL_PATH () . $area == '/') {

			$letra = substr ( $_SERVER ['REQUEST_URI'], 0, 1 );
			if ($letra == '/') {

				$area = substr ( $_SERVER ['REQUEST_URI'], 1 );
				$area = _Path::prepareReturn($area);
				$area = preg_replace ( '/[?]PHPSESSID=(.)*/', '', $area );

			} else {

				$area = $_SERVER ['REQUEST_URI'];
				$area = preg_replace ( '/[?]PHPSESSID=(.)*/', '', $area );
			}

		} else {

			$strSub = _Path::getURL_PATH () . $area;
			$count = strlen ( $strSub );
			$area = substr_replace ( _Path::prepareReturn ( $_SERVER ['REQUEST_URI'] ), '', 0, $count );
			$area = preg_replace ( '/[?]PHPSESSID=(.)*/', '', $area );
		}
		return $area;
	}
	
	/**
	 * Formata um texto para ser utilizado como link.
	 * 
	 * @example 
	 * 	$link = _Formatacao::textoToLink('Naxes participa de evento');
	 *	// retorna 'naxes-participa-de-evento';
	 * 
	 * @param String $texto
	 * @return String
	 */
	public function textToLink($texto) {
		$texto = str_replace ( ',', '', $texto );
		$texto = str_replace ( '/', '-', $texto );
		$texto = str_replace ( '\\', '-', $texto );
		$texto = str_replace ( '.', '-', $texto );
		$texto = str_replace ( '&#039;', '', $texto );
		$texto = str_replace ( "&quot;", '', $texto );
		
		return strtolower ( str_replace ( ' ', '-', self::stripAccent( $texto ) ) );
	}
	
	/**
	 * Formata um link texto para ser utilizado como texto.
	 * 
	 * @example 
	 * 	$link = _Formatacao::textoToLink('naxes-participa-de-evento');
	 *	// retorna 'naxes participa de evento';
	 * 
	 * @param String $texto
	 * @return String
	 */
	public function linkToText($texto) {
		
		return strtolower ( str_replace ( '-', ' ', $texto ) );
	}
	
	/**
	 * Remove acentos e cedilha de uma string
	 *
	 * @param String $texto
	 * @return String
	 */
	function stripAccent($texto) {
		
		$trocarIsso = array ('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ü', 'Ú', 'Ÿ', '%' );
		
		$porIsso = array ('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'Y', '' );
		$titletext = str_replace ( $trocarIsso, $porIsso, $texto );
		
		return $titletext;
	}
	
	/**
	 * Valida o tamanho de uma string;
	 * Se o tamanho da String for menor que o tamanho mínimo passado é retornado -1;
	 * Se o tamanho da String for maior que o tamanho máximo passado é retornado 1;
	 * Se o tamanho da String estiver entre os tamanhos mínimo e máximo passados é retornado 0.
	 * 
	 * @param String $texto
	 * @param Integer $tamanhoMinimo
	 * @param Integer $tamanhoMaximo
	 * @return Integer -1(menor que mínimo), 0(String ok), 1(maior que máximo)
	 */
	function validStringSize($texto, $tamanhoMinimo, $tamanhoMaximo) {
		
		$totalCaracteres = strlen ( trim ( $texto ) );
		if ($totalCaracteres < $tamanhoMinimo) {
			
			return - 1;
		} elseif ($totalCaracteres > $tamanhoMaximo) {
			
			return 1;
		}
		
		return 0;
	}
	
	/**
	 * Retorna um nome randomico geralmente utilizados para gravar arquivos;
	 * O nome é gerado a partir da criptogradia do nome inicial informado concatenado com _ mais o dia, mês, ano, hora, minuto e segundo.
	 *
	 * @param string $name
	 * @return string
	 */
	public function getRandomName($name) {
		
		$nameMD5 = md5($name);
		$ext = substr( $name, strpos($name, '.'));
		
		$retorno = $nameMD5 . '_' . date('dmY_His') .  $ext;
		
		return $retorno;
	}	

	/**
	 * Retorna uma array com o nome dos arquivos encontrados na url informada;
	 * Utilizado para ler os arquivos de upload que estão no servidor do seecs.
	 *
	 * @param String $url
	 * @return String[]
	 */
	public function getFilesFromURL($url) {
		$files = file ($url);
		$total = count($files);
		$return = array();
		for($i = 0; $i < $total; $i++) {
			
			$file = strtolower($files[$i]);
			if(preg_match ( '/^(.)*a href=(.)*$/', $file)) {
				
				$html = substr($file, strpos($file, '<a href="'));
				$html = str_replace('<a href="', '', substr($html, 0, strpos($html, '">')));
				$return[] = $html;
			}
		}

		return $return;
	}
	
	/**
	 * Todos os textos do site que podem ser adicionados imagens no meio, devem ter o caminho da imagem corrigido, pois o mesmo funciona apenas dentro do seecs
	 * e não no site do cliente;
	 * Para isso este método recebe o texto e subsitui no caminho das imagens o "../../" pelo caminho relativo da imagem onde ela esta no servidor do seecs.
	 *
	 * @param String $text
	 * @return String
	 */
	public function correctImagePath($text) {
		
		// Exemplo do caminho no texto 
		// src="../../system/upload/seecssample/contentUpload/teste/pic3.jpg"
		
		//Exemplo de como deve ficar
		//src="http://localhost/www.seecs.com.br/trunk/system/upload/seecssample/contentUpload/teste/pic3.jpg"
		$return = str_replace('src="../../system/upload/', 'src="' . URL_UPLOAD_SEECS_PATH, $text);
		
		
		// Exemplo do caminho no texto (para flashes) 
		//data="../../system/upload/seecssample/contentUpload/teste/expressInstall.swf" type="application/x-shockwave-flash"
		//value="../../system/upload/seecssample/contentUpload/teste/expressInstall.swf"
		
		//Exemplo de como deve ficar
		//data="http://localhost/www.seecs.com.br/trunk/system/upload/seecssample/contentUpload/teste/expressInstall.swf"
		//value="http://localhost/www.seecs.com.br/trunk/system/upload/seecssample/contentUpload/teste/expressInstall.swf"
		$return = str_replace('data="../../system/upload/', 'data="' . URL_UPLOAD_SEECS_PATH, $return);
		$return = str_replace('value="../../system/upload/', 'value="' . URL_UPLOAD_SEECS_PATH, $return);
		
		
		
		return $return;
	}
}

?>