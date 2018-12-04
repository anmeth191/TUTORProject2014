<?php
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresarÃ¡ a login.php
if(isset($_SESSION['usuario'])) 
{
 
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<nav>
	<div class="nav-wrapper blue lighten-2">
	<a href="paginatutor.php" class="brand-logo">TUTOR</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	<li><a class="waves-effect waves-light " href="cerrarsesion.php">Cerrar Sesion</a></li>  
	
	</ul>	
	</div>
    </nav>	
	
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

#imagen1{

margin-top:200px;
}


#imagen2{

margin-top:200px;
}


#imagen3{

margin-top:200px;
}
</style>
<body>
      
    <div class="container" id="contenido">
   	 <div class="row">	
      <div class="col s12 ">
	  
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
	 <div class="col s4" id="imagen1">
	  <a href="vercursoadmin.php?idtutor=<?php echo ($datos['nombres'])?>" class="waves-effect waves-light"><img src="images/cursos.jpg" class="circle responsive-image" height="300" width="300"><h1 class="blue-text lighten-2">Gestionar Cursos</h1></a>
	  </div>
	  
	   <div class="col s4" id="imagen2">
	  <a href="verforosadmin.php?idtutor=<?php echo ($datos['nombres'])?>" class="waves-effect waves-light"><img src="images/verforos.jpg" class="circle responsive-image" height="300" width="300"><h1 class="blue-text lighten-2">Gestionar Foros</h1></a>
	  </div>
	<?php
	}
	?>
	  
		<div class="col s4" id="imagen3">
	  <a href="verestudiantes.php" class="waves-effect waves-light"><img src="images/estudiantes.jpg" class="circle responsive-image" height="300" width="300"><h1 class="blue-text lighten-2">Gestionar Estudiantes</h1></a>
        </div>

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
	  
	  $('select').material_select();
	  });
	  
	    $('.slider').slider({
		indicators:false,
		
		});
	  
	  </script>



</body>
</html>
