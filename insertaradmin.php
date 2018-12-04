<?php

error_reporting(0);
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");
if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}
 
$re = htmlspecialchars($_POST["g-recaptcha-response"]);
$a=$_POST["ajax"];


if(isset($a) && $re)
{

$autor=htmlspecialchars ($_POST['autor']);
$carnet=htmlspecialchars ($_POST['carnet']);
$titulo = htmlspecialchars($_POST['titulo']);
$comentario =htmlspecialchars($_POST['problema']);
$fecha = date("F j, Y, g:i a");

if ($titulo=='')
    {
	  $mensaje = "<script>document.getElementById('e_titulo').innerHTML='El campo es requerido';</script>";
	}
    else if ($comentario == '')
    {
        $mensaje = "<script>document.getElementById('e_textarea1').innerHTML='El campo es requerido';</script>";
    }
   else


var_dump ($_POST);
$secret = "6LcGHBQTAAAAAP3xU2HndUNrfTvv_sy-dCJ3MZdT"; 
$ip = $_SERVER["REMOTE_ADDR"];
$captcha = $_POST["g-recaptcha-response"];
$result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
var_dump($result);

$sql = "INSERT foro (carnet , autor ,titulo , comentario , fecha_registro , identificador) VALUES (?,?,?,?,?,?)";
$stm = $conexion ->prepare ($sql);
$stm->bind_param('ssssss' ,$carnet , $autor , $titulo , $comentario , $fecha , $titulo);

if ($stm ->execute())
{



}
}
else

echo "Debes Completar todos los campos";

?>

<html>
<body>
<?php 
error_reporting(0);
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");
if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
//$id = $_GET['id_foro'];
 $sql = "SELECT * FROM foro ";
  $stm = $conexion->query($sql);
 $datos = mysqli_fetch_array($stm);
?>
<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=verforosadmin.php?identi=<?php echo $datos['identificador']?> "> 
<?php
?>
</body>
</html>

 