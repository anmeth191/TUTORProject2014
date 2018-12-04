<?php


$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

echo 'conexion Exitosa';
 
$id = $_GET['id'];
  
  $sql = "DELETE FROM leccion WHERE leccion.id_leccion = '$id' ";
  $stm = $conexion->query($sql);

  


?>