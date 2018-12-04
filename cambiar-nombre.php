<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//conexion a las Base de Datos
error_reporting(0);
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Se capturan los datos por metodo post desde registro.php
$mensaje = null;

if (isset($_POST["ajax"]))
{
    $nombre = htmlspecialchars($_POST["nombre"]);
	$apellido = htmlspecialchars($_POST["apellido"]);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////capturar imagen por defecto y guardarla en la base de datos



	
 






//se validan que no falte ni un campo y que esten correctamente ingresados     
    
	if ($nombre == '')
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombre))
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
    }
    else if(strlen($nombre) < 2)
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El m&iacute;nimo permitido 2 caracteres';</script>";
    }
    else if(strlen($nombre) > 50)
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El m&aacute;ximo permitido 50 caracteres';</script>";
    }
	else if ($apellido == '')
    {
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $apellido))
    {
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
    }
    else if(strlen($apellido) < 2)
    {
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El m&iacute;nimo permitido 2 caracteres';</script>";
    }
    else if(strlen($apellido) > 50)
    {
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El m&aacute;ximo permitido 50 caracteres';</script>";
    } else
	
    $id=htmlspecialchars($_POST["idusuario"]);	
	
	 
	
     $sql = "UPDATE userss  SET nombres='".$nombre."', apellidos='".$apellido."' WHERE id_usuario=$id";
   
 $result = $conexion->query($sql);
   if($result)
   {

   echo "Actualizacion Correcta";
    $mensaje = "<script>window.location='perfil.php';</script>";


   exit;
   }

else
{

echo "Error Actualizacion";

} 



 

 //Finalmente, por ejemplo, podrías redireccionarlo a una nueva página

   
}

echo $mensaje;

?>