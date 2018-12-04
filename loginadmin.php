<?php
	$conexion = mysqli_connect("127.0.0.1","root","","tutor");
		
		if(mysqli_connect_errno())
		{
		
		echo 'Error en la conexion'.mysqli_connect_error();
		}
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
   <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<nav>
	<div class="nav-wrapper blue lighten-2" height="150">
	<a class="brand-logo">TUTOR</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">

	
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
  <div class="section">
  
			  <div class="container" id="contenido"> 
			  <div class="row">
			  <div class="col s7 push-s4">	
             		  
   <form class="col s6" method="POST" id="form_login" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    	
       
	   <h2 class="center-align"><img src="images/fondologin.jpg" class=" circle responsive-img" height="650" width="650"></h2>
			 
			    
		  <div class="input-field blue-text text-lighter-2">
            <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="carnet">
          <label for="icon_prefix">Administrador</label>
		 	<div id="e_carnet" class="red-text"></div>
				
              	</div>
    		
			<div class="input-field blue-text text-lighter-2">
           <i class="material-icons prefix">lock</i>
		   
           <input id="icon_prefix" type="password" name="password">
		  
           <label for="icon_prefix">Contrasena</label>
		  <div id="e_password" class="red-text"></div>
             
				</div>
    	  
    <input type="hidden" name="ajax">
	<button type="button" id="enviarr" class="waves-effect waves-light btn blue darken-3  z-depth-4" value="Enviar">Log in </button>	
	 
	
		
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
    $(function()
    {
         $("#enviarr").click(function(){
 var url = "valoginadmin.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#form_login").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#e_carnet").html('');
			   $("#e_clave").html('');
			  
			  
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
    });
    </script>
	</body>


</html>

