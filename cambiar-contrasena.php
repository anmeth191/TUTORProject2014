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
    $vpassword = htmlspecialchars($_POST["vcontrasena"]);
    $password = htmlspecialchars($_POST["password"]);
    $repetir_password = htmlspecialchars($_POST["repetir_password"]);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////capturar imagen por defecto y guardarla en la base de datos




//se validan que no falte ni un campo y que esten correctamente ingresados     
    if ($vpassword == '')
    {
        $mensaje = "<script>document.getElementById('e_vcontrasena').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $vpassword))
    {
        $mensaje = "<script>document.getElementById('e_vcontrasena').innerHTML='Obligatorio, letras y n&uacute;meros';</script>";
    }
    else if(strlen($vpassword) < 8)
    {
        $mensaje = "<script>document.getElementById('e_vcontrasena').innerHTML='El m&iacute;nimo permitido 8 caracteres';</script>";
    }
        else if(strlen($vpassword) > 16)
    {
        $mensaje = "<script>document.getElementById('e_vcontrasena').innerHTML='El m&aacute;ximo permitido 16 caracteres';</script>";
    } 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	
$id=htmlspecialchars($_POST["idusuario"]); 

$resp = mysqli_query ($conexion , "SELECT contrasena FROM userss WHERE id_usuario='$id'");
$row = mysqli_fetch_array ($resp);
$passvieja = $row["contrasena"];
if ($vpassword == $passvieja)
{
if ($password == '')
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
    else if ($repetir_password != $password)
    {
        $mensaje = "<script>document.getElementById('e_repetir_password').innerHTML='Los password no coinciden';</script>";
    }else if ($repetir_password==$password)
{	
mysqli_query ($conexion , "UPDATE userss SET contrasena='$password'  WHERE id_usuario='$id'");
echo "La contraseña ha sido cambiada exitoamente.";
}
else{
echo "Error: Por Favor Verifique su Contrasena.";
} //Finalmente, por ejemplo, podrías redireccionarlo a una nueva página
}
else if($vpassword != $passvieja)
{
echo "Error: Contrasena de Usuario Incorrecta";

}
// $mensaje = "<script>window.location='login.php';</script>";
}   


echo $mensaje;

?>