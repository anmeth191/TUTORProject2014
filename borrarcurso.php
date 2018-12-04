<?php


$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

echo 'conexion Exitosa';
 
$id = $_GET['id_cursos'];
  
  $sql = "DELETE FROM curso WHERE curso.id_curso = '$id' ";
  $stm = $conexion->query($sql);

    $sql = "DELETE FROM tutor WHERE tutor.id_tutor = '$id' ";
  $stm = $conexion->query($sql);


?>