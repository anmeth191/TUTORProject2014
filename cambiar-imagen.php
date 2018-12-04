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
		

$bytesimagen = file_get_contents($carpeta.'/'.$nombre);

 $cadena=$_POST['carnet'];	  
 $consulta = "SELECT imagenu FROM userss WHERE carne = '$cadena'";
$sele = $conexion->query($consulta); 
 
$row = (mysqli_fetch_array($sele));

$varimagen= $row['imagenu'];
mysqli_free_result($sele);

$sql = "UPDATE userss SET imagenu='".mysqli_escape_string($conexion , $bytesimagen)."'  WHERE carne = '".$cadena."' ";

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

 }



?>