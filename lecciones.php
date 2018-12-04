<?php

$id = $_GET['id'];
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

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
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
	  		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	  
  <ul id="dropdown1" class="dropdown-content">
 
  <li><a href="perfil.php">Editar mi perfil</a></li>
  <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
</ul>
	<nav>
	<div class="nav-wrapper blue lighten-2" id="barranav">
  
	<ul id="nav-mobile" class="right">
	<li><a class="dropdown-button" data-activates="dropdown1"><i class="material-icons">list</i></a></li>
</ul>
</div>
</nav>
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
}
#imagenforo{
margin:160px;
padding-bottom:10px;
}

#infoper{
margin-top:220px;

}
</style>
</head>


<body>



  <div class="container" id="contenido">
  <div class="row">
  <div class="col s12">
  
        <img src="images/leccion.jpg" width="1115" height="600">  

  
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
  {  if($data["imagenu"]!=null)
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

	

    </ul>
</div>
  
<?php



$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}
  
  $sql = "SELECT * FROM leccion WHERE identificador = '$id' ORDER BY leccion.id_leccion ASC";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  

  {
  ?>
  
   <ul class="collection">
   
    <li class="collection-item avatar">
      <i class="material-icons circle blue lighten-2">description</i>
      <span class="title"> <td> <span class="red-text"><?php  echo $datos["titulo_leccion"];?> </span></td></span>
      <p class="blue-text lighten-4"><td><span class="blue-text lighten-4"> <?php  echo $datos ["tema"];    ?> </span></td> <br>
         
      </p>
      <a href="<?php echo $datos['descripcion']?>" target="_blank" class="secondary-content"><i class=" small material-icons">open_in_new</i></a>
    </li>
  </ul>
  <?php
  }
 ?>
 

 <?php



$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}
  
  $sql = "SELECT * FROM curso WHERE curso.id_curso='$id'";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  {
  
  if($datos["evaluaciones"]!=1)
  {
  ?>
  <h2 class="blue-text flow-text">No hay Evaluaciones en esta Unidad </h2>
  <?php
  }
  else
  {
  ?>
  
 <h2 class="blue-text flow-text">  <a href="prueba.php?id=<?php echo ($datos["titulo"])?>" id="eva" class="btn-large btn-floating waves-light waves-effect blue"> <i class="material-icons">import_contacts</i>  </a><label for="eva">Hay evaluaciones en esta Unidad</label></h2>
  
  <?php
  }
  }
 ?>
 
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
      
  });
		</script>
		
	  	<script>  
	 $(document).ready(function(){
      $('.parallax').parallax();
	  
  });
		</script>
	  
		
		
<script type="text/javascript">
window.onload =function(){
		document.onkeypress=chars;
		}
		function chars(evento){
		if(window.event)
		evento=window.event;
		document.getElementById("search1").InnerHTML = String.fromCharCode(evento.charCode);
		
		}
		
</script>				
</body>
</html>
