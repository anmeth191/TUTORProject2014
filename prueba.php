<?php

$id=$_GET["id"];
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

 $sql = "SELECT * FROM evaluaciones  WHERE identificadore='$id'";
  $stm = $conexion->query($sql);

 while($datos = mysqli_fetch_array($stm))
{
?>


<!DOCTYPE HTML>
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

  <li><a href="perfil.php">Editar mi perfil</a></li>
  <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
</ul>	  
<style type="text/css">
header{

 padding-left: 240px;

 }


body {

 display: flex;
 min-height: 100vh;
flex-direction: column;


}

 #contenido{
  display: flex;
    min-height: 100vh;
    flex-direction: column;	
}

#menu{
margin:10px;
}  




</style>

	
 </head> 

  
  <body>
  <nav>
 
	<div class="nav-wrapper blue lighten-2">
	<a href="vercurso.php" class="brand-logo">TUTOR</a>
	<ul id="nav-mobile" class="right hide-on-med-and-down">
		<li><a class="dropdown-button" data-activates="dropdown1" id="botoncas">
	 <i class="material-icons">list</i></a>
	  </li>
	  </ul>
	  </div>
</nav> 


<h3 class="blue-text"><?php echo $datos["identificadore"];?></h3>

<h3 class="blue-text"><?php echo $datos["puntaje"];?></h3>
<h3 class="blue-text"><?php echo $datos["fecha"];?></h3>

 </div>

 <div class="container" id="contenido">
 <div class="row">
 <div class="col s12 pull-s1">
 <?php echo $datos["linkeva"];?>
  </div>
	</div>
	</div>		 

  

 
  <footer class="page-footer blue lighten-1">
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

	
  
	


	 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  	<script>  
	 $(document).ready(function(){
      $('.parallax').parallax({
	 
	  });
	    $('.slider').slider({
		indicators:false,
		interval:6000,
		height:800
		});
		 // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
		</script>
	  
	

	</body>


</html>

<?php
}
?>