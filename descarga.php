<?php

$id=$_GET['id'];
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}
else

 $qry = "SELECT archivo FROM comentarios WHERE id_comentario=$id";
 $res = mysqli_query($conexion , $qry);
 $tipo = mysqli_result($res, 0, "archivo");


 header("Content-type: $tipo");
 print $contenido; 


?>