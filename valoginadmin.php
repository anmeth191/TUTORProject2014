<?php

error_reporting(0);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//conexion a las Base de Datos 
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

	$carnet = htmlspecialchars($_POST["carnet"]);
    $password = htmlspecialchars($_POST["password"]);
   
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//se validan que no falte ni un campo y que esten correctamente ingresados     
    
	if ($carnet=='')
    {
	  $mensaje = "<script>document.getElementById('e_carnet').innerHTML='El campo es requerido';</script>";
	   echo $mensaje;
	}
	else if(!preg_match('/^[0-9]/i', $carnet))
    {
        $mensaje = "<script>document.getElementById('e_carnet').innerHTML='Obligatorio, n&uacute;meros';</script>";
		 echo $mensaje;
    }
	else if(strlen($carnet) < 8)
    {
        $mensaje = "<script>document.getElementById('e_carnet').innerHTML='El m&iacute;nimo permitido 8 caracteres';</script>";
		 echo $mensaje;
    }
    
    else if ($password == '')
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El campo es requerido';</script>";
		 echo $mensaje;
    }
     else
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//se verifica en la base de datos si el carnet del estudiante esta registrado con el fin de no duplicar el registro	

$result = mysqli_query($conexion , "SELECT * FROM administrador WHERE carnet='".$carnet."'");

if($row = mysqli_fetch_array($result))
{

if($row["pass"]==$password)
{
 session_start();
$_SESSION['usuario']=$carnet;


   //echo "Bienvenido administrador";
header("location:paginaadmin.php");

}
}
}
//Finalmente, por ejemplo, podrías redireccionarlo a una nueva página
 //$mensaje = "<script>window.location='login.php';</script>";
  

?>