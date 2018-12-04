
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

		
  <ul id="dropdown1" class="dropdown-content">

  <li><a href="perfil.php">Editar mi perfil</a></li>
  <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
</ul>
	

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
margin-top:50px;
margin-left:30px;
}

#tamanoletra
{
font-size:20;
margin : 50px;
position: relative; 
bottom: -20px;
}
#imagenforo{
margin:160px;
padding-bottom:10px;
}

#infoper{
margin-top:220px;

}

.card .card-image .card-title
{
top:0px;

}
</style>
</head>

<body>
<nav>
	<div class="nav-wrapper blue lighten-2" id="barranav">
	
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	
	<li id="lidi">
	<form name="form1" action="" method="post" id="formm">
	<div class="input-field"  id="barrabus">
         <input id="search" type="search" name="t1" onKeyUp="aa();">
          <label for="search"><i class="material-icons">search</i></label>
		   <i class="material-icons">close</i>
      </div>
		   </form>
		</li> 	
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
   <h4 class="center-align blue-text">Bienvenido</h4>
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
  if($data["imagenu"]!=null)
  {
  ?>

<a href="cambiarimagen.php?carnet=<?php echo $data["carne"];?>"><img width="200" height="200"   id="imagenu" class="circle responsive-image tooltipped" data-position="bottom" data-delay="50" data-tooltip="click sobre la imagen para cambiar"  src="data:image/jpg;base64,<?php echo base64_encode($data["imagenu"]);?>"/></a>

<?php
}
else     if($data["imagenu"]==null)
{
?>   

<a href="cambiarimagen.php?carnet=<?php echo $data["carne"];?>"><img width="200" height="200"   id="imagenu" class="circle responsive-image tooltipped" data-position="bottom" data-delay="50" data-tooltip="click sobre la imagen para cambiar"  src="images/login.png"/></a>


<?php
}
?>

 <ul class="collapsible" data-collapsible="accordion" id="infoper">
    <li>
      <div class="collapsible-header active pink-text"><i class="large material-icons">account_circle</i>Informacion personal</div>
      <div class="collapsible-body"><p>
	    <span class="blue-text  center-align">Nombres: <?php  echo $data["nombres"]; ?><?php  echo $data["apellidos"]; ?></span> <br>
      <span class="blue-text  center-align">Carnet: <?php  echo $data["carne"]; ?></span> 
<br> <span class="blue-text center-align">Carrera: <?php  echo $data["carreras"]; ?></span> 
<br><span class="blue-text  center-align">Turno: <?php  echo $data["turnos"]; ?></span>
<br> <span class="blue-text center-align">Correo: <?php  echo $data["correo"]; ?></span>.</p></div>
  <?php
  
  }
  ?>

	
      <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
   

</div>
<div class="col s12 " id="menu">

 <ul class="tabs">
        <li class="tab col s3"><a href="#cursos" class="active "  >Pizarron</a></li>
        <li class="tab col s3"><a  href="#foros">Debates</a></li>
        <li class="tab col s3"><a href="#personas">Tutores</a></li>
       
      </ul>
	  
</div>
<div id="cursos" class="col s12 "> 

<div class="col s4">
 <h4 class="center-align blue-text lighten-2">Principiante</h4>

<?php
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 
    $cadena=$_SESSION['usuario'];
    $sql = "SELECT * FROM curso INNER JOIN tutor WHERE nivel='principiante' AND tutor.id_tutor=curso.id_curso";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
{
  ?> 
  <div class="card">
  <div class="card-image">
  <img width="100" height="200" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagen"]);?>"/>
  <span class="card-title"><?php  echo $datos["titulo"]; ?></span> 
  </div>
<div class="card-content"> 
<p class="blue-text"> Por:<?php  echo $datos["nombret"]; ?> </p>
</div>
 <div class="card-action">
 
            <a href = "lecciones.php?id=<?php echo $datos['id_curso']?>" class="blue-text">Ver Lecciones</a> 
              <a href="descripcion.php?id=<?php echo $datos['id_curso']?>" class="blue-text" >Descripcion</a>
	
</div>
</div>
  <?php
   
  }
    
  ?>

  	 

</div>
<div class="col s4">
<h4 class="center-align blue-text lighten-2">Intermedio</h4>

<?php

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 
  
  $sql = "SELECT * FROM curso INNER JOIN tutor WHERE nivel='intermedio' AND tutor.id_tutor=curso.id_curso";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  {
  ?>

  <div class="card">
  <div class="card-image">
  <img width="100" height="200" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagen"]);?>"/>
  <span class="card-title"><?php  echo $datos["titulo"]; ?></span> 
  </div>
<div class="card-content"> 
<p class="blue-text"> Por:<?php  echo $datos["nombret"]; ?> </p>
</div>
 <div class="card-action">
            <a href = "lecciones.php?id=<?php echo $datos['id_curso']?> " class="blue-text">Ver Lecciones</a> 
              <a href="descripcion.php?id=<?php echo $datos['id_curso']?>" class="blue-text">Descripcion</a>
</div>
</div>
  <?php
   
  }
    
  ?>

</div>
<div class="col s4">
<h4 class="center-align blue-text lighten-2">Avanzado</h4>
<?php

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 
  
  $sql = "SELECT * FROM curso INNER JOIN tutor WHERE nivel='avanzado' AND tutor.id_tutor=curso.id_curso";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  {
  ?>
 

  <div class="card">
  <div class="card-image">
  <img width="100" height="200" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagen"]);?>"/>
  <span class="card-title"><?php  echo $datos["titulo"]; ?></span> 
  </div>
<div class="card-content"> 
<p class="blue-text"> Por:<?php  echo $datos["nombret"]; ?> </p>
</div>
 <div class="card-action">
            <a href = "lecciones.php?id=<?php echo $datos['id_curso']?> " class="blue-text">Ver Lecciones</a> 
              <a href="descripcion.php?id=<?php echo $datos['id_curso']?>" class="blue-text">Descripcion</a>
</div>
</div>
  <?php
   
  }
    
  ?>

</div>
</div>


<div class="container">
<div class="row">
<div id="foros" class="col s12 ">
<div class="card">
<div class="card-image">
<img src="images/debates.jpg" class="responsive-image" width="1000" height="600">
 </div>
<div class="card-content">
<p class=" flow-text blue-text ">
Bienvenido a la seccion de Debates en la plataforma<br>
 Busca o navega por los temas que te interesan y participa en la conversación. 
 de igual manera puedes crear tu propio tema de conversacion.Si no sabes lo que buscas, nuestros colaboradores en 
 los debates te ayudarán a encontrar la respuesta
 adecuada.</p>
</div>

 </div>
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
<input type="hidden" id="e_carnet" name="idusuario" value="<?php echo $data["id_usuario"];?>" />

<a class="btn-floating btn-large waves-effect waves-light pink lighten-2" href="crearforo.php?id=<?php echo $data["id_usuario"];?>">
<i class="material-icons">add</i></a>
<label for="material-icons">Crear Foro</label>

 <?php
  }
  ?>
  
<?php

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 
  
  $sql = "SELECT * FROM foro INNER JOIN userss WHERE userss.carne=foro.carnet ORDER BY foro.id_foro ASC";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  {
  ?>
   <ul class="collection">
    <li class="collection-item avatar">
  <?php 
      if($datos["imagenu"]!=null)
       {	
	   ?>
	 <img width="100" height="200"  class="circle responsive-image" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagenu"]);?>"/>
    <?php
	 }
	 else  
	 if($datos["imagenu"]==null)
	 {
	 ?>
	  <img width="100" height="200"  class="circle responsive-image" src="images/login.png"/> 
	  <?php
	  }
	  ?>  
    <span class="title pink-text lighten-2">  <?php  echo nl2br($datos["titulo"]);?> </span>
    <p class="blue-text lighten-2">  <?php  echo $datos ["autor"];?><br>
    <?php  echo $datos["fecha_registro"]; ?> 
    </p>
    <a href = "forose.php?identi=<?php echo $datos['titulo']?> " class="secondary-content"><i class="material-icons">chat_bubble_outline</i></a>
	
    </li> 
 </ul>
 
  <?php  
  }    
  ?>
</div>
</div>
</div>


<div class="container" id="personas">
<div class="row">
<div  class="col s12 ">
<div class="card">
<div class="card-image">
<img src="images/tutores.jpg" class="responsive-image" width="1000" height="600">
 </div>
<div class="card-content">
<p class="blue-text lighten-2 flow-text">Estos son los TUTORES registrados en la plataforma<br>
En donde puedes contactarte via correo electronico directamente desde la plataforma , por si tienes una duda y deseas aclarla
</p>
</div>
</div>



<?php

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 
  
  $sql = "SELECT * FROM tutor GROUP BY nombret";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  {
  ?>
  
 
 
   <div class="col s4 push-s1">
   <img width="150" height="150"  class="circle responsive-image " src="data:image/jpg;base64,<?php echo base64_encode($datos["fotot"]);?>"/>
    <div class="card-content">   
     <p class="pink-text lighten-2 left-align">  <?php  echo $datos ["nombret"];?><br></p>
	 </div>
	 <div class="card-action">
            <a class="pink-text center-align" href = "formulariomail.php?nombretu=<?php echo ($datos['nombret']);?> " class="blue-text"><i class="material-icons">email</i> Enviar Email</a>            
</div>
</div>
     <?php  
  }    
  ?>	
</div>
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
		
		
 <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
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
	   
	    $('.tabs-wrapper .row').pushpin({ top: $('.tabs-wrapper').offset().top });
	   
	  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
  
 $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

	
	
  });
  

    $('ul.tabs').tabs('select_tab', 'tab_id');

     
</script>
		
<script type="text/javascript">
function aa()
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","sea.php?nm="+document.form1.t1.value,false);
xmlhttp.send(null);

document.getElementById("d1").innerHTML=xmlhttp.responseText;


}
</script> 
		




  </body>
        
</html>