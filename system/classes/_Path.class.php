<?php

session_start ();

/**
 * Possuí métodos para retornar os caminhos do sistema.
 *
 * @author Tiago Wanke Marques
 */
abstract class _Path {

	public static function getURL_BAS() {
		return self::prepareReturn( getcwd() . '/' );
	}

	public static function getURL_PATH() {
		$dir = dirname( $_SERVER['SCRIPT_NAME'] );
		$dir = self::prepareReturn( $dir );
		return rtrim( $dir, '/' ) . '/';
	}

	public static function getURL() {
		$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
		$port = isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : 80;
		$defaultPort = ($scheme === 'https') ? 443 : 80;
		$portSuffix = ($port != $defaultPort) ? ':' . $port : '';
		return $scheme . '://' . $_SERVER['SERVER_NAME'] . $portSuffix . self::getURL_PATH();
	}

	public static function getADMIN_PATH() {
		return self::getURL_PATH() . 'admin/';
	}

	public static function getUPLOAD_BAS() {
		return self::prepareReturn( self::getURL_BAS() . 'system/upload/' );
	}

	public static function getUPLOAD_PATH() {
		return self::prepareReturn( self::getURL() . 'system/upload/' );
	}

	public static function getTEMPLATE_BAS() {
		return self::prepareReturn( self::getURL_BAS() . 'system/template/' );
	}

	public static function getJS_PATH() {
		return self::prepareReturn( self::getURL() . 'system/js/' );
	}

	public static function getCSS_PATH() {
		return self::prepareReturn( self::getURL() . 'system/css/' );
	}

	public static function getIMAGE_PATH() {
		return self::prepareReturn( self::getURL() . 'system/images/' );
	}

	public static function getIMAGE_BAS() {
		return self::prepareReturn( self::getURL_BAS() . 'system/images/' );
	}

	public static function getAJAX_PATH() {
		return self::prepareReturn( self::getURL() . 'system/ajax/' );
	}

	public static function getAJAX_BAS() {
		return self::prepareReturn( self::getURL_BAS() . 'system/ajax/' );
	}

	public static function prepareReturn($str) {
		return str_replace( '\\', '/', $str );
	}
}

/**
 * Inclui o arquivo de uma classe caso ele ainda n�o foi incluido
 *
 * @param String $class_name Nome da classe
 * @return void
 */
spl_autoload_register(function($className) {

	if (strpos ( $className, 'View' ) !== false) {

		require_once (_Path::getURL_BAS () . 'system/view/' . $className . '.class.php');

	} elseif (strpos ( $className, 'Controller' ) !== false) {

		require_once (_Path::getURL_BAS () . 'system/controller/' . $className . '.class.php');

	} else {

		require_once (_Path::getURL_BAS () . 'system/classes/' . $className . '.class.php');
	}
});

?>