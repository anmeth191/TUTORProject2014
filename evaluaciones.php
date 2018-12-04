<?php


//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresarÃ¡ a login.php
if(isset($_SESSION['usuario'])) 
{

}


$tema= $_GET['tema'];

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}
else


$sql ="SELECT * FROM leccion WHERE leccion.titulo_leccion='$tema'";
 $stm = mysqli_query($conexion , $sql);
$datos = $stm->fetch_array();  

?>

<html>
<head>
<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
	    <link type="text/scss" rel="stylesheet" href="sass/materialize.scss"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
		<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
				
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="verforo.php">verforo</a></li>
  <li><a href="perfil.php">Editar mi perfil</a></li>
  <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
</ul>
</head>

<style type="text/css">

#lidi
{
left:-1000px;
}


#barrabus
{
padding-top:0px;
left:-620px;
width:500px;
}


header{

 padding-left: 240px;

 }

body {

 display: flex;
 min-height: 100vh;
flex-direction: column;


}

#menu{
margin:10px;
}  


#contenido{
  display: flex;
    min-height: 100vh;
    flex-direction: column;	
}

#slide-out
{
 width: 300px;

}

#imagenu{
margin:50px;
}

#tamanoletra
{
font-size:20;
margin : 50px;
}
#contenidoform{

padding:60px;
}

#infoper{
margin-top:220px;

}
</style>

<body>

	  <nav>
	<div class="nav-wrapper blue lighten-2">
    <a href="vercursoadmin.php"class="brand-logo" >TUTOR</a>
	<ul id="nav-mobile" class="right hide-on-med-and-down">
	<li>
<div class="input-field" name="buscador" id="search1">
 <input id="search" type="search" required>
 <label for="search"><i class="material-icons">search</i></label>
 <i class="material-icons">close</i>	
 </div>
</li>
  <li><a class="dropdown-button" data-activates="dropdown1"><i class="material-icons">list</i></a></li>
</ul>
</div>
</nav>

<div class="container">
<div class="row">
<div class="col s12">
<form name="formevaluaciones" action="evaluacionesad.php" method="post" id="formev">


<h4 class="blue-text flow-text ">Evaluaciones Creadas para esta Unidad</h4>

<div class="divider"></div>

<?php

$tema= $_GET['tema'];

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}
else


$sql ="SELECT * FROM evaluaciones WHERE evaluaciones.identificadore='$tema'";
 $stm = mysqli_query($conexion , $sql);
while($datos = $stm->fetch_array())
{  
?>
<span class="red-text"><?php echo $datos["identificadore"];?></span><br>

<span class="red-text"><?php echo $datos["puntaje"];?></span><br>

<span class="red-text"><?php echo $datos["fecha"];?></span><br>

<span class="red-text"><?php echo $datos["linkeva"];?></span><br>

<?php
}
?>

<h4 class="blue-text flow-text ">Crear Evaluaciones Para esta Unidad</h4>

<div class="divider"></div>


<div class="input-field blue-text lighten-2">
<i class="material-icons prefix">email</i>
<input id="puntaje" type="text" name="puntaje">
<label for="puntaje">Escriba el puntaje de la Evaluacion</label>
</div>
<div class ="input-field blue-text lighten-2">
<i class="material-icons prefix">email</i>
<input id="curso" type="text" name="enlace">
<label for="curso">agregue el link de la Evaluacion </label>
</div>

<div class="input-field blue-text lighten-2">
		<i class="material-icons prefix">date_range</i>
		<input type = "date" class="datepicker" name = "fecha" class="validate">
		<label for="icon_prefix">Fecha de creacion</label>
		<div id="fechaCreado"></div>
       </div>

<input type = "hidden" name = "tema" value="<?php echo $datos["titulo_leccion"]; ?>">


<input type="submit" id="boton_validar" value="Crear Evaluacion" class="btn-large blue">

<?php

 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 
  $cadena=$_SESSION["usuario"];
  $sql = "SELECT * FROM userss  where userss.carne='$cadena' ";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  {
  ?>
  
  <a  id="vercursos"href="vercursoadmin.php?idtutor=<?php echo ($datos['nombres'])?>" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">apps</i></a>
  <label for="vercursos">Ver Cursos</label>

<?php
  }
?>
</form>
</div>
</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
	<script>
	
  $(document).ready(function() {
    $('select').material_select();
	  $('#textarea1').val('New Text');
  $('#textarea1').trigger('autoresize');
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  
  });
	</script>
	  
</body>
</html>