<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//conexion a las Base de Datos
error_reporting(0);
	$conexion = mysqli_connect("127.0.0.1","root","","tutor");
		
		if(mysqli_connect_errno())
		{
		
		echo 'Error en la conexion'.mysqli_connect_error();
		}
		else 
		
		
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Se capturan los datos por metodo post desde registro.php
$mensaje = null;

if (isset($_POST["ajax"]))
{
    $nombre = htmlspecialchars($_POST["nombre"]);
	$apellido = htmlspecialchars($_POST["apellido"]);
	$carnet = htmlspecialchars($_POST["carnet"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $repetir_password = htmlspecialchars($_POST["repetir_password"]);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////capturar imagen por defecto y guardarla en la base de datos





//se validan que no falte ni un campo y que esten correctamente ingresados     
    
	if ($nombre == '')
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El campo es requerido';</script>";
		echo "".$mensaje;
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombre))
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
			echo "".$mensaje;
    }
    else if(strlen($nombre) < 2)
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El m&iacute;nimo permitido 2 caracteres';</script>";
			echo "".$mensaje;
    }
    else if(strlen($nombre) > 50)
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El m&aacute;ximo permitido 50 caracteres';</script>";
			echo "".$mensaje;
    }
	else if ($apellido == '')
    {
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El campo es requerido';</script>";
			echo "".$mensaje;
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $apellido))
    {
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
			echo "".$mensaje;
    }
    else if(strlen($apellido) < 2)
    {
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El m&iacute;nimo permitido 2 caracteres';</script>";
			echo "".$mensaje;
    }
    else if(strlen($apellido) > 50)
    {
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El m&aacute;ximo permitido 50 caracteres';</script>";
			echo "".$mensaje;
    } 
	else if ($carnet=='')
    {
	  $mensaje = "<script>document.getElementById('e_carnet').innerHTML='El campo es requerido';</script>";
	  	echo "".$mensaje;
	}
	else if(!preg_match('/^[0-9]/i', $carnet))
    {
        $mensaje = "<script>document.getElementById('e_carnet').innerHTML='Obligatorio, n&uacute;meros';</script>";
			echo "".$mensaje;
    }
	else if(strlen($carnet) < 8)
    {
        $mensaje = "<script>document.getElementById('e_carnet').innerHTML='El m&iacute;nimo permitido 8 caracteres';</script>";
			echo "".$mensaje;
    }
    else if ($email == '')
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El campo es requerido';</script>";
			echo "".$mensaje;
    }
   
    else if(strlen($email) < 8)
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El m&iacute;nimo permitido 8 caracteres';</script>";
			echo "".$mensaje;
    }
    else if(strlen($email) > 80)
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El m&aacute;ximo permitido 50 caracteres';</script>";
			echo "".$mensaje;
    }
    else if ($password == '')
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El campo es requerido';</script>";
			echo "".$mensaje;
    }
    else if(!preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $password))
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='Obligatorio, letras y n&uacute;meros';</script>";
			echo "".$mensaje;
    }
    else if(strlen($password) < 8)
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El m&iacute;nimo permitido 8 caracteres';</script>";
			echo "".$mensaje;
    }
        else if(strlen($password) > 16)
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El m&aacute;ximo permitido 16 caracteres';</script>";
			echo "".$mensaje;
    }
    else if ($repetir_password != $password)
    {
        $mensaje = "<script>document.getElementById('e_repetir_password').innerHTML='Los password no coinciden';</script>";
			echo "".$mensaje;
    } 
	else
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//se verifica en la base de datos si el carnet del estudiante esta registrado con el fin de no duplicar el registro	
$query=("SELECT * FROM userss WHERE carne ='".$carnet."'");
$row=mysqli_query($conexion , $query) or die ();
$ray = mysqli_num_rows($row);
  
  if($ray>0)
  {
  echo 'El carnet ya existe';
  exit();
  }
else
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// si el carnet no esta registrado se procede a registrar el estudiante 
$sql = "INSERT INTO userss  ( nombres , apellidos, carne , correo , contrasena , identificador) VALUES ('".$nombre."' , '".$apellido."', '".$carnet."'  , '".$email."' , '".$password."',1)";
$result = mysqli_query($conexion , $sql)or die (mysqli_error($conexion));

 

 //Finalmente, por ejemplo, podrías redireccionarlo a una nueva página
 $mensaje = "<script>window.location='login.php';</script>";
   
}

echo $mensaje;

?>