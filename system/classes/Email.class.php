<?php

/**
 * Classe utilizada para o envio de email
 *
 * @author Tiago Wanke Marques
 */
class Email {

	/**
	 * Para quem o email será enviado
	 */
	protected $to;

	/**
	 * Assunto do email
	 */
	protected $subject;

	/**
	 * Conteãdo do email
	 */
	protected $message;

	/**
	 * Nome do remetente
	 */
	protected $fromName;

	/**
	 * Email do remetente
	 */
	protected $fromMail;

	/**
	 * Seta o destinatário
	 *
	 * @param String $to
	 * @return void
	 */
	public function setTo($to) {

		$this->to = $to;
	}

	/**
	 * Seta o assunto
	 *
	 * @param String $subject
	 * @return void
	 */
	public function setSubject($subject) {

		$this->subject = $subject;
	}

	/**
	 * Seta o conteúdo do email
	 *
	 * @param String $message
	 * @return void
	 */
	public function setMessage($message) {

		$this->message = $message;
	}

	/**
	 * Seta o nome do remetente
	 *
	 * @param String $name
	 * @return void
	 */
	public function setFromName($name) {

		$this->fromName = $name;
	}

	/**
	 * Seta o email do remetente
	 *
	 * @param String $mail
	 * @return void
	 */
	public function setFromMail($mail) {

		$this->fromMail = $mail;
	}

	/**
	 * Retorna o destinatário
	 *
	 * @return String
	 */
	public function getTo() {

		return $this->to;
	}

	/**
	 * Retorna o assunto
	 *
	 * @return String
	 */
	public function getSubject() {

		return $this->subject;
	}

	/**
	 * Retorna a menssagem
	 *
	 * @return String
	 */
	public function getMessage() {

		return $this->message;
	}

	/**
	 * Retorna o nome do remetente
	 *
	 * @return String
	 */
	public function getFromName() {

		return $this->fromName;
	}

	/**
	 * Retorna o email do remetente
	 *
	 * @return String
	 */
	public function getFromMail() {

		return $this->fromMail;
	}

	/**
	 * Envia um email
	 *
	 * @return boolean
	 */
	public function sendEmail() {

		require_once __DIR__ . '/PHPMailer/class.phpmailer.php';
		require_once __DIR__ . '/PHPMailer/class.smtp.php';

		// Carrega variáveis do .env se ainda não estiverem definidas
		$envFile = __DIR__ . '/../../../.env';
		if (file_exists($envFile)) {
			foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
				if (strpos(trim($line), '#') === 0) continue;
				if (strpos($line, '=') !== false) {
					list($key, $value) = explode('=', $line, 2);
					if (!isset($_ENV[trim($key)])) {
						$_ENV[trim($key)] = trim($value);
					}
				}
			}
		}

		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = $_ENV['SMTP_HOST'];
		$mail->SMTPAuth = true;
		$mail->Username = $_ENV['SMTP_USER'];
		$mail->Password = $_ENV['SMTP_PASS'];
		$mail->SMTPSecure = $_ENV['SMTP_SECURE'];
		$mail->Port = (int) $_ENV['SMTP_PORT'];

		$mail->From = $_ENV['SMTP_FROM'];
		$mail->FromName = $_ENV['SMTP_FROM_NAME'];
		$mail->addAddress($this->to, 'Gilberto Ferretti');

		$mail->Subject = $this->subject;
		$mail->Body    = utf8_decode(nl2br($this->message));
		$mail->AltBody = utf8_decode($this->message);

		if(!$mail->send()) {
			return 'Não foi possível enviar o e-mail.'.$mail->ErrorInfo;
		}

		return true;
	}
}

?>