<?php
error_reporting(0);

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 


if(isset($_POST["g-recaptcha-response"])&& $_POST["g-recaptcha-response"])
{

 
$file = $_FILES['archivo_fls'];
$nombre = $file['name'];
$carpeta="img/";
opendir($carpeta);
$destino = $carpeta.$_FILES['archivo_fls']['name'];
$trozos = explode(".", $destino); 
$extension = end($trozos);


//copy($_FILES['archivo_fls']['tmp_name'],$destino);

if(move_uploaded_file($_FILES['archivo_fls']['tmp_name'],$destino))
{
$subioimagen=1;

}
else
{
$subioimagen=0;

}
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
$bytesimagen = file_get_contents($carpeta.'/'.$nombre);


$sql = "INSERT comentarios (autor_c , titulo_c , comentario_c , fecha_c , identificador , carnet , subioa , archivo , extension) VALUES (?,?,?,?,?,?,?,?,?)";
$stm = $conexion ->prepare ($sql);
$stm->bind_param('sssssssss' , $autor , $titulo , $comentario , $fecha , $titulo , $car,$subioimagen , $destino , $extension);

if ($stm ->execute())
{



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
 
<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=foroseadmin.php?identi=<?php echo $titulo?> "> 
 </html>
