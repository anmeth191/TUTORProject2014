<?php
 
if (isset($_FILES["file"]))
{
   $reporte = null;
     for($x=0; $x<count($_FILES["file"]["name"]); $x++)
    {
    $file = $_FILES["file"];
    $nombre = $file["name"][$x];
    $tipo = $file["type"][$x];
    $ruta_provisional = $file["tmp_name"][$x];
    $size = $file["size"][$x];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "imagenes/";
	
	
	
	if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
        $reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
    }
    else if($size > 1024*1024)
    {
        $reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
    }
    else if($width > 1024 || $height > 1024)
    {
        $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
    }
    else if($width < 60 || $height < 60)
    {
        $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 60px</p>";
    }
    else
    {
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
       
	}
    }
	
		 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

echo 'conexion Exitosa';


$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descri'];
$tutor = $_POST['tutor']; 
$bytesimagen = file_get_contents($carpeta.'/'.$nombre);

	
$sql ="INSERT curso_intermedio ( titulo , fecha , descripcion , tutor ,imagen , identificador ) VALUES (?,?,?,?,? ,?)";
$stm = $conexion ->prepare ($sql);
$stm->bind_param('ssssss' , $titulo , $fecha , $descripcion , $tutor , $bytesimagen, $titulo);

if ($stm ->execute())
{
echo "Insertado con exito ";

}


}
?>