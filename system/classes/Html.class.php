<?php

/**
 * Responsável pelo gerenciamento do layout do site.
 *
 * Cada view define o seu próprio título, descrição e dados estruturados antes
 * de chamar docOpen(). O que não for definido cai nos valores padrão abaixo.
 *
 * @author Tiago Wanke Marques
 */
abstract class Html {

	/**
	 * Título usado quando a view não define o seu.
	 */
	const TITLE_PADRAO = 'Viveiro Florestal Mudar - Mudas de Árvores Nativas em SC';

	/**
	 * Sufixo acrescentado aos títulos definidos pelas views.
	 */
	const TITLE_SUFIXO = ' | Viveiro Florestal Mudar';

	/**
	 * Descrição usada quando a view não define a sua.
	 */
	const DESCRIPTION = 'Viveiro florestal em Agrolândia (SC) desde 1996. Mudas de árvores nativas para compensação florestal, PRAD e recuperação de áreas. Entrega em todo o Sul do Brasil.';

	/**
	 * Comprimento máximo da meta description antes do Google truncar.
	 */
	const DESCRIPTION_MAX = 158;

	/**
	 * Instância da classe template
	 */
	protected $template;

	/**
	 * Ação do formulário padrão
	 */
	protected $action;

	/**
	 * Título da página
	 */
	protected $title;

	/**
	 * Descrição da página.
	 *
	 * @var String
	 */
	protected $description;

	/**
	 * URL canônica da página.
	 *
	 * @var String
	 */
	protected $canonical;

	/**
	 * Imagem de compartilhamento.
	 *
	 * @var String
	 */
	protected $ogImage;

	/**
	 * Tipo Open Graph da página.
	 *
	 * @var String
	 */
	protected $ogType = 'website';

	/**
	 * Blocos de dados estruturados acumulados pela view.
	 *
	 * @var Array
	 */
	protected $jsonLd = array ();

	/**
	 * Diretiva para os robôs de busca.
	 *
	 * @var String
	 */
	protected $robots = 'index, follow';

	/**
	 * Mensagem que o visitante envia ao clicar no WhatsApp.
	 *
	 * @var String
	 */
	protected $whatsappMessage;

	/**
	 * Rótulo do botão de WhatsApp.
	 *
	 * @var String
	 */
	protected $whatsappLabel = 'Falar no WhatsApp';

	/**
	 * Construtor
	 *
	 * @param String $file
	 * @return void
	 */
	function __construct($file = false) {

		if (! $file) {
			$file = _Path::getTEMPLATE_BAS () . "layout/html.tpl.html";
		}

		$this->template = new Template ( $file );
	}

	/**
	 * Para setar a ação do formulario
	 *
	 * @param String $action Arquivo que o action do formulario deve enviar
	 * @return void;
	 */
	function setAction($action) {

		$this->action = $action;
	}

	/**
	 * Seta o title da página.
	 *
	 * @param String $title
	 * @param Boolean $raw Quando true usa o título exatamente como informado,
	 *                     sem acrescentar o nome da empresa
	 * @return void
	 */
	public function setTitle($title, $raw = false) {

		$this->title = $raw ? $title : $title . self::TITLE_SUFIXO;
	}

	/**
	 * Seta a descrição da página, cortada no limite que o Google exibe.
	 *
	 * @param String $description
	 * @return Boolean
	 */
	public function setDescription($description) {

		$description = trim ( preg_replace ( '/\s+/u', ' ', strip_tags ( $description ) ) );

		if (mb_strlen ( $description, 'UTF-8' ) > self::DESCRIPTION_MAX) {

			// corta no limite e descarta a última palavra, que veio partida
			$palavras = explode ( ' ', mb_substr ( $description, 0, self::DESCRIPTION_MAX, 'UTF-8' ) );
			if (count ( $palavras ) > 1) {
				array_pop ( $palavras );
			}

			$description = rtrim ( implode ( ' ', $palavras ), ' ,.;:-' ) . '…';
		}

		$this->description = $description;
		return true;
	}

	/**
	 * Seta a URL canônica da página.
	 *
	 * @param String $canonical Caminho relativo à raiz do site, ex: 'mudas/ipe'
	 * @return void
	 */
	public function setCanonical($canonical) {

		$this->canonical = _Path::getURL () . ltrim ( $canonical, '/' );
	}

	/**
	 * Seta a imagem de compartilhamento em redes sociais.
	 *
	 * @param String $ogImage URL absoluta
	 * @return void
	 */
	public function setOgImage($ogImage) {

		$this->ogImage = $ogImage;
	}

	/**
	 * Seta o tipo Open Graph (website, article, product...).
	 *
	 * @param String $ogType
	 * @return void
	 */
	public function setOgType($ogType) {

		$this->ogType = $ogType;
	}

	/**
	 * Define a diretiva de indexação da página.
	 *
	 * @param String $robots ex: 'noindex, follow'
	 * @return void
	 */
	public function setRobots($robots) {

		$this->robots = $robots;
	}

	/**
	 * Acrescenta um bloco de dados estruturados à página.
	 *
	 * @param Array $schema
	 * @return void
	 */
	public function addJsonLd($schema) {

		$this->jsonLd [] = $schema;
	}

	/**
	 * Define a mensagem que o visitante envia ao clicar no WhatsApp, para que
	 * a origem do contato apareça sozinha na conversa.
	 *
	 * @param String $mensagem
	 * @param String $rotulo Texto do botão
	 * @return void
	 */
	public function setWhatsappMessage($mensagem, $rotulo = '') {

		$this->whatsappMessage = $mensagem;

		if ($rotulo) {
			$this->whatsappLabel = $rotulo;
		}
	}

	/**
	 * Preenche no template as variáveis de SEO e de conversão comuns a todos
	 * os layouts.
	 *
	 * @return void
	 */
	protected function setVarsCabecalho() {

		$title = strlen ( $this->title ) ? $this->title : self::TITLE_PADRAO;
		$description = strlen ( $this->description ) ? $this->description : self::DESCRIPTION;
		$canonical = $this->canonical ? $this->canonical : _Path::getURL () . ltrim ( _Formatting::returnAccessedArea ( '' ), '/' );
		$ogImage = $this->ogImage ? $this->ogImage : _Path::getIMAGE_PATH () . 'pictures/DSC07748.jpg';

		$this->template->setVar ( 'TITLE', htmlspecialchars ( $title, ENT_QUOTES, 'UTF-8' ) );
		$this->template->setVar ( 'DESCRIPTION', htmlspecialchars ( $description, ENT_QUOTES, 'UTF-8' ) );
		$this->template->setVar ( 'CANONICAL', htmlspecialchars ( $canonical, ENT_QUOTES, 'UTF-8' ) );
		$this->template->setVar ( 'OG_TYPE', $this->ogType );
		$this->template->setVar ( 'ROBOTS', $this->robots );
		$this->template->setVar ( 'PLACA', Seo::specPlateHtml () );
		$this->template->setVar ( 'OG_IMAGE', htmlspecialchars ( $ogImage, ENT_QUOTES, 'UTF-8' ) );

		// A empresa vai em toda página; o resto é o que a view acrescentou
		$blocos = Seo::jsonLdTag ( Seo::organizationJsonLd () );
		foreach ( $this->jsonLd as $schema ) {
			$blocos .= "\n" . Seo::jsonLdTag ( $schema );
		}
		$this->template->setVar ( 'JSONLD', $blocos );

		$this->template->setVar ( 'ANALYTICS', $this->analytics () );

		$this->template->setVar ( 'WHATSAPP_URL', htmlspecialchars ( Seo::whatsappUrl ( $this->whatsappMessage ), ENT_QUOTES, 'UTF-8' ) );
		$this->template->setVar ( 'WHATSAPP_LABEL', htmlspecialchars ( $this->whatsappLabel, ENT_QUOTES, 'UTF-8' ) );

		// URL versionada: sem ela o Cloudflare e o navegador seguem servindo a
		// folha antiga depois do deploy, e o HTML novo renderiza sem estilo.
		$this->template->setVar ( "CSS_LAYOUT", _Path::asset ( 'system/css/layout.css' ) );

		$this->template->setVar ( "CSS_PATH", _Path::getCSS_PATH () );
		$this->template->setVar ( "JS_PATH", _Path::getJS_PATH () );
		$this->template->setVar ( "URL_PATH", _Path::getURL_PATH () );
		$this->template->setVar ( "UPLOAD_BAS", _Path::getUPLOAD_BAS () );
		$this->template->setVar ( "URL_BAS", _Path::getURL_BAS () );
		$this->template->setVar ( "IMAGE_PATH", _Path::getIMAGE_PATH () );

		$this->template->setVar ( 'css', '' );
		$this->template->setVar ( 'javascript', '' );
	}

	/**
	 * Bloco do Google Analytics. Sem Measurement ID configurado não escreve nada.
	 *
	 * @return String
	 */
	protected function analytics() {

		if (! Seo::GA4_ID) {
			return '';
		}

		$id = Seo::GA4_ID;

		return '<script async src="https://www.googletagmanager.com/gtag/js?id=' . $id . '"></script>' . "\n"
			. '<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}'
			. 'gtag(\'js\',new Date());gtag(\'config\',\'' . $id . '\');</script>';
	}

	/**
	 * Adiciona um arquivo javaScript no header
	 *
	 * @param File $jsFile
	 * @return void
	 */
	function addJsFile($jsFile) {

		$jsFile = "<script type=\"text/javascript\" src='" . $jsFile . "'></script>";
		$this->template->setVar ( "javascript", $jsFile . '[[javascript]]' );
	}

	/**
	 * Adiciona um arquivo css no header
	 *
	 * @param String $css
	 * @return void
	 */
	function addCssFile($cssFile) {

		$cssFile = "<link rel=\"stylesheet\" href=\"" . $cssFile . "\" type=\"text/css\" media=\"screen, projection\" />";

		$this->template->setVar ( "css", $cssFile . '[[css]]' );
	}

	/**
	 * Adiciona um js ao onload do body
	 *
	 * @param String $command
	 * @return void
	 */
	public function addOnload($command) {

		$this->template->setVar ( "onload", $command . '; [[onload]]' );
	}

	/**
	 * Adiciona um arquivo xajax
	 *
	 * @param String $ajax
	 */
	function addAjax($ajax) {

		$this->template->setVar ( 'ajax', $ajax );
	}

}

?>
