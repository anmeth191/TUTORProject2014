<?php


$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 


if(isset($_POST["g-recaptcha-response"])&& $_POST["g-recaptcha-response"])
{

var_dump($_POST);
$secret = "6LcGHBQTAAAAAP3xU2HndUNrfTvv_sy-dCJ3MZdT"; 
$ip = $_SERVER["REMOTE_ADDR"];
$captcha = $_POST["g-recaptcha-response"];
$result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
var_dump($result);


$autor= $_POST['eautor'];
$car= $_POST['ecarnet'];
$titulo = $_POST['etitulo'];
$comentario = $_POST['comentario'];
$fecha = date("F j, Y, g:i a");


$sql = "INSERT comentarios (autor_c , titulo_c , comentario_c , fecha_c , identificador,carnet) VALUES (?,?,?,?,?,?)";
$stm = $conexion ->prepare ($sql);
$stm->bind_param('ssssss' , $autor , $titulo , $comentario , $fecha , $titulo,$car);

if ($stm ->execute())
{

echo "De: ".$autor." ";
echo "Iitulo: ".$titulo."";
echo "comentario: ".$comentario."";
echo "Fecha: ".$fecha."";

}

}
?>

<html>
<body>
<?php 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();
}
 $sql = "SELECT * FROM comentarios ";
  $stm = $conexion->query($sql);

 $datos = mysqli_fetch_array($stm);

?>
 
 </body>
 
<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=forose.php?identi=<?php echo $titulo?> "> 
 </html>
