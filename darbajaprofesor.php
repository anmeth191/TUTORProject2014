<?php


$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

echo 'conexion Exitosa';
 
$id = $_GET['id_e'];
  
  $sql = "DELETE FROM userss WHERE userss.nombres = '$id' ";
  $stm = $conexion->query($sql);
  
    $sql = "DELETE FROM tutor WHERE tutor.nombret = '$id' ";
  $stm = $conexion->query($sql);
  
header("location:verestudiantesadmin.php");
 

?>