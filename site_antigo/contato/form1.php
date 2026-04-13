<body bgcolor="#FFFFFF" background="bg1.gif" link="#CCCCCC" vlink="#CCCCCC" alink="#CCCCCC">
<div align="center"><strong></strong></div>
<?
#Código de formulario
$msg = "Nome: $nome\n";
$msg .= "Telefone: $telefone\n"; 
$msg .= "E-mail: $email\n"; 
$msg .= "Cidade: $cidade\n"; 
$msg .= "Assunto: $assunto\n"; 


$cabecalho = "From: $email";#Titulo da mensagem

mail("celso_sauron@hotmail.com", "$assunto", $msg, $cabecalho);#Aonde se encontra seu@email.com, deve estar o seu e-mail!

echo "<center><h1>E-mail Enviado Com Sucesso!<br>Obrigado Pela Preferência, $nome</h1></center>";    #Texto um de agradecimento
echo "<center><h3>Em breve responderemos</h3></center>";#Texto dois de agradecimento
?>
<?
include("copy.php")
?>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
