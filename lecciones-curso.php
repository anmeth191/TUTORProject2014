<?php


$id = $_POST['id'];
$titulo = $_POST['titulo'];
$tema = $_POST['tema'];
$descripcion = $_POST['descripcion'];

echo $titulo;
echo $tema;
echo $descripcion;




$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}


echo $id;

$sql = "INSERT leccion  (titulo_leccion , tema , descripcion , identificador) VALUES (?,?,?,?)";
$stm = $conexion ->prepare ($sql);
$stm->bind_param('ssss' , $titulo , $tema , $descripcion , $id );

if ($stm ->execute())
{

echo "De: ".$titulo." ";
echo "Iitulo: ".$tema."";
echo "comentario: ".$descripcion."";
echo "Fecha: ".$id."";

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
//$id = $_GET['id_foro'];

 $sql = "SELECT * FROM curso ";
  $stm = $conexion->query($sql);

 $datos = mysqli_fetch_array($stm);

?>
 

<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=leccionesadmin.php?id=<?php echo "$id";  ?>"> 


<?php


?>

 </body>
 
 </html>

 