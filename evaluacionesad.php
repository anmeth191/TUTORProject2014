<?php

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}
else


$score=$_POST["puntaje"];
$enlace=$_POST["enlace"];
$fechac=$_POST["fecha"];
$tema=$_POST["tema"];


$sql = "INSERT `evaluaciones` (`puntaje`, `linkeva`, `fecha`, `identificadore`) VALUES (?,?,?,?)";
$stm = $conexion ->prepare ($sql);
$stm->bind_param('ssss' , $score , $enlace , $fechac , $tema );


if ($stm ->execute())
{
echo "Insertado con exito ";

}

?>




