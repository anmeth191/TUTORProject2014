<?php

$mensaje = null;


   
if (isset($_POST["validar"]))
{   


   

   
    $nombre = htmlspecialchars($_POST["nombre"]);
	$apellido = htmlspecialchars($_POST["apellido"]);
	  $carrera = htmlspecialchars($_POST["carrera"]);
	    $carnet = htmlspecialchars($_POST["carne"]);
       $turno = htmlspecialchars($_POST["turno"]);	
	   $email = htmlspecialchars($_POST["email"]);
	    $password = htmlspecialchars($_POST["password"]);
       $tipo = htmlspecialchars($_POST["tipo"]);
  
   
	
	
	echo $nombre ;
    	echo $apellido ;	
	echo $carrera ;
	echo $turno;
	echo $email ;
		echo $carnet ;

	
	echo $password ;
	echo $tipo ;
	
	
	// parametros para evaluar el campo de texto del carnet del estudiante
	/*if ($id == '')
    {
        $mensaje = "<script>document.getElementById('e_id').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^[0-9\s]+$/i', $id))
    {
        $mensaje = "<script>document.getElementById('e_id').innerHTML='Error, s&oacute;lo se permiten numeros';</script>";
    }
	 else 
	 if(strlen($id) < 2)
    {
        $mensaje = "<script>document.getElementById('e_id').innerHTML='El m&iacute;nimo permitido 2 caracteres';</script>";
    }
    else 
	if(strlen($id) > 50)
    {
        $mensaje = "<script>document.getElementById('e_id').innerHTML='El m&aacute;ximo permitido 50 caracteres';</script>";
    }
	else 
	
	// Parametros para evaluar el nombre del estudiante que se desea registrar
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
	// Parametros para evaluar el apellido del estudiante que se desea registrar
	else
	if ($apellido == '')
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
    }
	//parametros para evaluar el sexo del estudiante

	
	// Parametros para evaluar el email del estudiante que se desea registrar
	
	else if ($email == '')
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/', $email))
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='Error, formato de email incorrecto';</script>";
    }
    else if(strlen($email) < 8)
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El m&iacute;nimo permitido 8 caracteres';</script>";
    }
    else if(strlen($email) > 80)
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El m&aacute;ximo permitido 50 caracteres';</script>";
    }
	// Parametros para evaluar la contraseña  del estudiante que se desea registrar
    else if ($password == '')
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $password))
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='Obligatorio, letras y n&uacute;meros';</script>";
    }
    else if(strlen($password) < 8)
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El m&iacute;nimo permitido 8 caracteres';</script>";
    }
        else if(strlen($password) > 16)
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El m&aacute;ximo permitido 16 caracteres';</script>";
    }
    
	*/




$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}



$sql = "UPDATE userss SET nombres='".$nombre."', apellidos ='".$apellido."',carreras='".$carrera."', correo ='".$email."' , contrasena='".$password."' , turnos='".$tipo."'  WHERE carne= '".$carnet."' ";

$result = $conexion->query($sql);


if($result)
{

echo "Actualizacion Correcta";



exit;


}

else
{
echo "Error Actualizacion";
}


echo $mensaje;
}

?>
<html>
<head>
</head>
<body>

<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=verestudiantes.php"> 
</body>
</html>
<?php


?>