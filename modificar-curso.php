<?php

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

echo 'conexion Exitosa';

if (isset($_FILES["file"]))
{
   $reporte = null;
   
     for($x=0; $x<count($_FILES["file"]["name"]); $x++)
    {
    $file = $_FILES["file"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    //$size = $file["size"][$x];
    //$dimensiones = getimagesize($ruta_provisional);
    $width = 50;  /*$dimensiones[0];*/
    $height = 100; /*$dimensiones[1];*/
    $carpeta = "imagenes/";

$src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
		
	
$id =$_POST['id'];
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$dura=$_POST['duracion'];
$eva=$_POST['evaluaciones'];
$descripcion =$_POST['descri'];
$requi = $_POST['requisitos'];
$apre = $_POST['aprender'];
$diri = $_POST['dirigido'];
$niv = $_POST['nivel'];
$bytesimagen = file_get_contents($carpeta.'/'.$nombre);
  
$query = "SELECT imagen FROM curso WHERE id_curso = '$id'";
$sele = $conexion->query($query); 
 
$row = (mysqli_fetch_array($sele));

$varimagen= $row['imagen'];
mysqli_free_result($sele);

$sql = "UPDATE curso SET titulo='".$titulo."', fecha ='".$fecha."', duracion='".$dura."', evaluaciones='".$eva."', descripcion='".$descripcion."' ,requisitos='".$requi."',aprender='".$apre."',dirigido='".$diri."',nivel='".$niv."',imagen='".mysqli_escape_string($conexion , $bytesimagen)."'  WHERE id_curso = '".$id."' ";

$result = $conexion->query($sql);


if($result)
{

echo "Actualizacion Correcta";




}

else
{
echo "Error Actualizacion";
}

}
}


?>



<?php
 if (isset($_FILES["file_tutor"]))
{
  
    $file = $_FILES["file_tutor"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    //$size = $file["size"];
  //  $dimensiones = getimagesize($ruta_provisional);
    $width = 50 ; /*$dimensiones[0];*/
    $height =100; //$dimensiones[1];
    $carpeta = "imagenestutores/";
	
	


$src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
		
	
    
		
		 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

echo 'conexion Exitosa';

$id =$_POST['id'];
$nombre_t= $_POST['tutor_nombre'];
$apellido_t= $_POST['tutor_apellido'];
$correo_t =$_POST['tutor_email'];
$telefono_t = $_POST['tutor_telefono'];
$descrip = $_POST['descripciont'];
$bytesimagen = file_get_contents($carpeta.'/'.$nombre);

  
$query = "SELECT fotot FROM tutor WHERE id_tutor = '$id'";
$sele = $conexion->query($query); 
 
$row = (mysqli_fetch_array($sele));

$varimagen= $row['fotot'];
mysqli_free_result($sele);


$sql = "UPDATE tutor SET nombret='".$nombre_t."', apellidot ='".$apellido_t."', emailt='".$correo_t."', telefonot='".$telefono_t."', descripciont='".$descrip."' ,fotot='".mysqli_escape_string($conexion , $bytesimagen)."'  WHERE tutor.id_tutor = '".$id."' ";


$result = $conexion->query($sql);

if($result)
{

echo "Actualizacion Correcta";


exit;


}

else
{
echo "Error Actualizacion";
}

}
?>