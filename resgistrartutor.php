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
	<a href="verestudiantesadmin.php" class="brand-logo">TUTOR</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	<li><a class="waves-effect waves-light " href="login.php">Iniciar Sesion</a></li>  
	
	</ul>	
	</div>
    </nav>	
	
</head>
<style type="text/css">

.card .card-image .card-title
{
top:0px;

}
</style>
<body>
      
    <div class="container">
   	 <div class="row">	
    <div class="col s12 ">


<form method="POST" id="form_registro" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    
                 <div class="input-field blue-text text-lighter-2">
            <i class="material-icons prefix">account_circle</i>
	   <input id="icon_prefix" type="text" name="nombre">
          <label for="icon_prefix"><a class="tooltipped" data-position="right" data-delay="8" data-tooltip="Escribe tus dos nombres completos">Nombres del Tutor </a></label>
		 	<div id="e_nombre"></div>
			</div>
            
			 <div class="input-field blue-text text-lighter-2">
            <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="apellido">
          <div id="e_apellido"></div>
		  <label for="icon_prefix"><a class="tooltipped" data-position="right" data-delay="8" data-tooltip="Escribe tus dos Apellidos completos">Apellidos del Tutor</a></label>
		 	
			</div>
            
			 <div class="input-field blue-text text-lighter-2">
            <i class="material-icons prefix">credit_card</i>
          <input id="icon_prefix" type="text" name="carnet">
          <label for="icon_prefix"><a class="tooltipped" data-position="right" data-delay="8" data-tooltip="Solo numeros , minimo 8 digitos">Numero de Carnet</a></label>
		 	<div id="e_carnet"></div>
            </div>   

		
		   <div class="input-field blue-text text-lighter-2">
           <i class="material-icons prefix">contact_mail</i>
           <input id="icon_prefix" type="text" name="email">
           <label for="icon_prefix"><a class="tooltipped" data-position="right" data-delay="8" data-tooltip="Escribe un correo para contactarnos contigo ">Correo Electtronico</a></label>
                <div id="e_email"></div>
                </div>  
				
				
				<div class="input-field blue-text text-lighter-2">
			    <i class="material-icons prefix">lock</i>
                <input id="icon-prefix" type="password" name="password">
                <label for="icon_prefix">Contrasena</label>
				<div id="e_password"></div>
                </div>
				
				
				<div class="input-field blue-text text-lighter-2">
				<i class="material-icons prefix">lock</i>
                <input class="icons-prefix" type="password" name="repetir_password">
                <div id="e_repetir_password"></div>
                <label for="icon-prefix">Repita la contrasena</label>
				</div>
    
	
	<input type="hidden" name="ajax">
    <button type="button" class="waves-effect waves-light btn blue darken-3  z-depth-4" id="enviarr" value="Enviar">Registrar</button>
   
   <div id="mensaje"></div>
	
	</div>
	
	
	
	
	
	
	</form>
</div>

</div>

</div>

 <div class="section">
  <div class="container">
  <div class="col s12">
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
  </div>
  </div>
  </div>
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


<script>
    $(function()
    {
         $("#enviarr").click(function(){
 var url = "valregistrotutor.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#form_registro").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#e_nombre").html('');
			   $("#e_apellido").html('');
			   $("#e_carnet").html('');
			   $("#e_email").html('');
               $("#e_password").html('');
               $("#e_repetir_password").html('');
			   
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
    });
    </script>

	  
</body>
</html>
