<?php

$nombret=$_POST["nombret"];
$nombretu=$_POST["para_txt"];
$de = $_POST["de_txt"];
$para = $_POST["para_txt"];
$asunto = $_POST["asunto_txt"];
$mensaje =utf8_decode(nl2br($_POST["mensaje_txa"]));
$cabeceras="MIME-Version:1.0\r\n";
$cabeceras .="Content-type:text/html; charset=iso-8859-1\r\n";
$cabeceras.="From: $de \r\n";

$archivo=$_FILES["archivo_fls"]["tmp_name"];
$destino=$_FILES["archivo_fls"]["name"];

if(move_uploaded_file($archivo,$destino))
{

include_once("phpmailer/class.phpmailer.php");
include_once("phpmailer/class.smtp.php");
require 'phpmailer/PHPMailerAutoload.php';

$mail= new PHPMailer();//creo un objeto de tipo php mailer
$mail->IsSMTP();//protocolo SMTP
$mail-> SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com"; // specify main and backup server
$mail->Port=465;
$mail->From = $de;
$mail->AddAddress($para);
$mail->Username="upolitutor2@gmail.com";
$mail->Password="upoliei2015";
$mail->Subject=$asunto;
$mail->Body=$mensaje;
$mail->WordWrap =50;
$mail->MsgHTML($mensaje);
$mail->AddAttachment($destino);


if($mail->Send())
{
$respuesta= "El mensaje ha sido Enviado";
}else
{
$respuesta =  "error:".$mail->ErrorInfo;
}
}
else
{
$respuesta="Ocurrio un error al subir archivo adjunto";
}
header("Location:formulariomail.php?nombret=mensaje enviado a + $nombret");


?>