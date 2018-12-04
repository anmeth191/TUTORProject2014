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
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
</ul>
	<nav>
	<div class="nav-wrapper blue lighten-2">
    <a class="brand-logo" >TUTOR</a>
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
 <div class="card-panel"><h4> Bienvenido:
<?php
   $conexion = mysqli_connect ("127.0.0.1","root","","tutor");
   if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 

   $cadena=$_SESSION['usuario'];
  $sql1 = "SELECT nombres FROM userss WHERE carne='".$cadena."'";
  $stmm = $conexion->query($sql1);
  while ($data = mysqli_fetch_array($stmm))
  {
  ?>
 
 <span><?php  echo $data["nombres"]; ?> </span>
 
 
 <?php
  
  }
  ?>
</h4>
</div>

</head>
<body>
<div class="container">
<div class="row">
<div class="col s8">

<?php

//$id = $_GET['id_foro'];

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

echo 'conexion Exitosa';
 

  
  $sql = "SELECT * FROM foro";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  

  {
  ?>
  
  
  
  <ul class="collection">
    <li class="collection-item avatar">
      <img src="images/yuna.jpg" alt="" class="circle">
      <span class="title">  <?php  echo $datos ["titulo"];?> </span>
      <p>  <?php  echo $datos ["autor"];?><br>
        <?php  echo $datos["fecha_registro"]; ?> 
      </p>
      <a href = "forose.php?identi=<?php echo $datos['identificador']?> " class="secondary-content"><i class="material-icons">chat_bubble_outline</i></a>
    </li> 
 </ul>
  <?php
   
  }
    
  ?>
</div>
</div>
</div>

<footer class="page-footer blue lighten-2">
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
          <div class="footer-copyright blue lighten-1">
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
	   $(".button-collapse").sideNav();
	   $(".dropdown-button").dropdown();
	   
	    $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
    
	
	
  });
		</script>
	
  </body>
        
</html>