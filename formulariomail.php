<?php
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresarÃ¡ a login.php
if(!isset($_SESSION['usuario'])) 
{

  header('Location: vercurso.php'); 
  exit();
}
else
?>
<?php

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

 $cadena=$_SESSION['usuario'];
$nombre = $_GET["nombret"];
$consulta = "SELECT * FROM tutor INNER JOIN userss  WHERE tutor.nombret='$nombre' AND userss.carne='$cadena'" ;

  $stm = mysqli_query($conexion , $consulta);

$datos = $stm->fetch_array();  


?>


<html>
<head>
<!--Import Google Icon Font-->
    <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		
		<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
				<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

		
  <ul id="dropdown1" class="dropdown-content">

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
 padding-left: 300px;
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
	<div class="nav-wrapper blue lighten-2" id="barranav">
	
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	

	<li><a class="dropdown-button" data-activates="dropdown1" id="botoncas">
	 <i class="material-icons">list</i></a>
	  </li>
	  </ul>
	  </div>
</nav>

	<div id="d1"></div>

<div class="container" id="contenido">
<div class="row">
<div class="col s4">

    <ul id="slide-out" class="side-nav fixed">
     

	<nav>
	<div class="nav-wrapper blue lighten-2" id="barranav">
    <a class="brand-logo" href="vercurso.php" ><h4 class="white-text">TUTOR</h4></a>
	
</div>
</nav>
	 
 
	<?php
   $conexion = mysqli_connect ("127.0.0.1","root","","tutor");
   if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 

   $cadena=$_SESSION['usuario'];
  $sql1 = "SELECT * FROM userss WHERE carne='".$cadena."'";
  $stmm = $conexion->query($sql1);
  while ($data = mysqli_fetch_array($stmm))
  {
  ?>
<span class="pink-text  lighten-2" id="tamanoletra" > <?php  echo $data["nombres"]; ?> <?php  echo $data["apellidos"]; ?> </span>

<a href="cambiarimagen.php?carnet=<?php echo $data["carne"];?>"><img width="200" height="200"   id="imagenu" class="circle responsive-image tooltipped" data-position="bottom" data-delay="50" data-tooltip="click sobre la imagen para cambiar"  src="data:image/jpg;base64,<?php echo base64_encode($data["imagenu"]);?>"/></a>

    <ul class="collapsible" data-collapsible="accordion" id="infoper">
    <li>
      <div class="collapsible-header active pink-text"><i class="large material-icons">account_circle</i>Informacion personal</div>
      <div class="collapsible-body"><p>
      <span class="blue-text  center-align">Carnet: <?php  echo $data["carne"]; ?></span> 
<br> <span class="blue-text center-align">Carrera: <?php  echo $data["carreras"]; ?></span> 
<br><span class="blue-text  center-align">Turno: <?php  echo $data["turnos"]; ?></span>
<br> <span class="blue-text center-align">Correo: <?php  echo $data["correo"]; ?></span>.</p></div>
   </li>
   </ul>
  <?php
  
  }
  ?>

	
 
    </ul>
</div>


<div class="col s12" id="contenidoform">


<form name="mail_frm" action="envio-mail.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="nombret" value="<?php echo $datos["nombret"];?>" />

<div class="input-field blue-text lighten-2">
<i class="material-icons prefix">contact_mail</i>
<input type="text" id="icon_prefix" name="de_txt" value="<?php  echo ($datos["correo"]); ?>"><br>
<label for="icon_prefix"> De: </label>
</div>
<div class="input-field blue-text lighten-2">
<i class="material-icons prefix">contact_mail</i>
<input type="text" name="para_txt" id="icon_prefix"value=" <?php echo($datos["emailt"]);?>"><br>
<label for="icon_prefix">Para:</label>
</div>
<div class="input-field blue-text lighten-2">
<i class="material-icons prefix">mode_edit</i>
<input type="text" name="asunto_txt" id="icon_prefix">
<label for="icon_prefix">Asunto</label>
</div>

<div class="file-field input-field">
<div class="btn blue lighten-2">
<span>Adjuntar Archivo</span>
<input type="file" name="archivo_fls"> 
</div>
 <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
</div>

<div class="input-field blue-text lighten-2">
<i class="material-icons prefix">comment</i>
<textarea name="mensaje_txa" class="materialize-textarea" id="textarea2">De:<?php echo($datos["nombres"])?><?php echo($datos["apellidos"])?><br>
Carnet:<?php echo($datos["carne"])?><br>
Carrera:<?php echo($datos["carreras"])?><br>
Turno:<?php echo($datos["turnos"])?>

</textarea>
<label for="textarea2">Mensaje:</label>
</div>

<button class="btn waves-effect waves-light blue lighten-2" type="button" id="btn"  onClick = "enviar('envio-mail.php')">Enviar</button>	
<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
if(isset($_GET["nombret"]))
{
echo "<span>".$_GET["nombret"]. "</span>";
}

?>	
</form>
</div>
</div>
</div>
</div>

<footer class="page-footer blue lighten-2" id="pie">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Universidad Politecnica de Nicaragua</h5>
                <p class="grey-text text-lighten-4">Escuela de Ingenieria de la UPOLI.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Mas Enlaces</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Contactenos</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Acerca de Nosotros</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Desarrolladores</a></li>
                
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright blue lighten-1" id="pie2">
            <div class="container ">
            © 2015 Copyright Escuela de Ingenieria UPOLI
  
            </div>
          </div>
        </footer>


		

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  
 
	  
	  <script type="text/javascript">

function validarform(){
var verificar=true;
var expRegemail=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

if(!document.mail_frm.de_txt.value){
alert("El campo 'De' es Requerido");
document.mail_frm.de_txt.focus();
verificar=false;
}
else if(!expRegemail.exec(document.mail_frm.de_txt.value)){
 alert("El campo De no es valido");
 document.mail_frm.de_txt.focus();
 verificar=false;
} 
if(verificar){
document.mail_frm.submit();
}
}
 function enviar (destino)
 {
 
document.mail_frm.action = destino;
document.mail_frm.submit();
 
 }
</script>

	  <script>  
	 $(document).ready(function(){
	 
	   $(".dropdown-button").dropdown({
	         inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'right' // Displays dropdown with edge aligned to the left of button
	   });
	   });
  

 

     
</script>
  </body>
        
</html>