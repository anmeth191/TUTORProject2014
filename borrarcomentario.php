<?php


$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}
else 
echo 'Conexion Exitosa' ;
 
$id = $_GET['id'];
  
  $sql = "DELETE FROM comentarios WHERE comentario_c = '$id' ";
  $stm = $conexion->query($sql);

  header("location:verforosadmin.php");
  

?>