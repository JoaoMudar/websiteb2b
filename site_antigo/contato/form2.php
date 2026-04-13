require_once('phpmailer/PHPMailerAutoload.php');

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->IsHTML();
$mailer->CharSet = "UTF-8";
$mailer->SMTPDebug = 0;
$mailer->Port = 587;
$mailer->Host = 'smtp.unetvale.com.br';
$mailer->SMTPAuth = true;
$mailer->Username = 'enviosite@viveiromudar.com.br';
$mailer->Password = 'f9qobvfx';
$mailer->FromName = 'enviosite@viveiromudar.com.br';
$mailer->From = 'enviosite@viveiromudar.com.br';
$mailer->AddAddress('gferretti@viveiromudar.com.br');
$mailer->Subject = utf8_encode($cabecalho);
$mailer->Body =  utf8_encode($msg);
$mailer->send();
