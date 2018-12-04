<!DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>  
    <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="container">
<div class="row">
<div class="col s12">
<?php

$nm=$_GET['nm'];

 $conexion = mysqli_connect ("127.0.0.1","root","","tutor");
   if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 

if($nm=="")
{
}
else
{
 $sql = "SELECT * FROM userss  WHERE  (nombres like ('$nm%%') OR  apellidos like ('$nm%%')) AND identificador=0";
 
 
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  {
  ?>
 
	<div class="col s4">
    <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagenu"]);?>" width="100" height="300">
    </div>
    <div class="card-content">
      <span class="card-title activator  pink-text lighten-2"> <?php  echo $datos["nombres"]; ?> <?php  echo $datos ["apellidos"]; ?> <i class="material-icons right">account_circle</i></span>
      <p>   
	 <a href = "modificar-estudiante.php?id_e=<?php echo $datos['id_usuario']?> "> Modificar Estudiante </a> 
    <a href = "darbaja.php?id_e=<?php echo $datos['id_usuario']?> ">Retirar este Estudiante </a> 
	</p>
    </div>
    <div class="card-reveal">
      <span class="card-title pink-text lighten-2">Datos de Estudiante<i class="material-icons right">close</i></span>
<p>
 <h5 class="blue-text lighten-2"> Carrera:<?php  echo $datos ["carreras"]; ?> </h5>
  <h5 class="blue-text lighten-2">Email:<?php  echo $datos["correo"]; ?></h5> 
   <h5 class="blue-text lighten-2">Contraseña:<?php  echo $datos["turnos"]; ?></h5>  
 <h5 class="blue-text lighten-2">Carnet:<?php  echo $datos["carne"]; ?></h5>  
 <h5 class="blue-text lighten-2">Contraseña:<?php  echo $datos["contrasena"]; ?></h5> 
 
</p>
  </div>
  </div>
  </div>
	



  <?php
  }
  }
   ?>  
  </div>
   </div>
    </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
  </html>