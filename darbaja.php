<?php


$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

echo 'conexion Exitosa';
 
$id = $_GET['id_e'];
  
  $sql = "DELETE FROM userss WHERE userss.id_usuario = '$id' ";
  $stm = $conexion->query($sql);
header("location:verestudiantes.php");
 

?>