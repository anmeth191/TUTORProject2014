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
	
	<nav>
	<div class="nav-wrapper blue lighten-2" height="150">
	<a href="vercurso.php" class="brand-logo">TUTOR</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	 <li><a href="vercurso.php">Volver</a></li>
	</ul>	
	</div>
    </nav>	 
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
margin-top:100px;
}

#menu{
margin:10px;

}  

  .parallax-container {
      height:600px;
    }
        


</style>
 <script src='https://www.google.com/recaptcha/api.js'></script>
  </head> 
  <body>
              <div class="parallax-container">
  			  <div class="parallax"><img src="images/crearforo.jpg" class="responsive-image" width="1000" height="1000"></div>
			  <h1 class="white-text center-align"> Crea tu foro <br> y interactua con tus <br> companeros</h1>
			  </div>
			  <div class="container" id="contenido"> 
			  <div class="row">
			  <div class="col s12">	
			  

             		  
   <form  method="POST" id="form_cambiarnombre" action="<?php echo $_SERVER["PHP_SELF"] ?>">
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

    <input type="hidden" id="e_autor" name="autor" value="<?php echo  $data["nombres"];?>" />
	   <input type="hidden" id="e_carnet" name="carnet" value="<?php echo  $data["carne"];?>" />

 
 
 <?php
  
  }
  ?>
  	    
		  <div class="input-field blue-text lighten-2">
            <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="titulo">
          <label for="icon_prefix">Titulo</label>
		  
		 	<div id="e_titulo"></div>
				
              	</div>
				
				    <div class="input-field col s12 blue-text lighten-2 ">
					<i class="material-icons prefix">description</i>
          <textarea id="textarea1" class="materialize-textarea" name="problema"></textarea>
          <label for="textarea1">Escribe tu Post</label>
		  
	<div id="recap" class="g-recaptcha" data-sitekey="6LcGHBQTAAAAAB03XZNUKEkiBzc_2dHtcSIsnIz7"></div>
				
			
    	  
    <input type="hidden" name="ajax">
	<button type="button" id="enviarr" class="waves-effect waves-light btn blue darken-3  z-depth-4" value="Enviar">Crear Foro</button>	
	 
	</form>
		
		<div id="mensaje"></div>
        </div>
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
 
	</form>
  
	


	 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	<script>  
	 $(document).ready(function(){
      $('.parallax').parallax({
	 
	  });
	    $('.slider').slider({
		indicators:false,
		interval:6000,
		height:750
		});
		 // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
		</script>  
	  
	
<script>
    $(function()
    {
         $("#enviarr").click(function(){
 var url = "insertar.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#form_cambiarnombre").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
                  $("#e_autor").html('');
				   $("#e_carnet").html('');
			   $("#e_titulo").html('');
			   $("#e_textarea1").html(''); 
			  $("#recap").html('');
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
    });
    </script>
	</body>


</html>

