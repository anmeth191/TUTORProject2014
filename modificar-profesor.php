<?php

$ide = $_GET['id_e'];


$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}


else 
 // 
  $sql = "SELECT * FROM userss WHERE identificador=1 AND id_usuario='$ide'";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  {
  
  ?>
  
 
 
<!DOCTYPE HTML>
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
		
		<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
				

	<nav>
	<div class="nav-wrapper blue lighten-2">
	<a href="paginatutor.php" class="brand-logo">TUTOR</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	
	<li><a class="waves-effect waves-light " href="cerrarsesion.php">Cerrar Sesion</a></li>  
	
	</ul>	
	</div>
    </nav>	

	

	
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(function()
    {
         $("#boton_validar").click(function(){
 var url = "modificar-estudiante_m.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#form_ajax").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               
			 
			   $("#e_nombre").html('');
			   $("#e_apellido").html('');
			      $("#e_carrera").html('');
				  $("#e_turno").html('');
				    $("#e_carne").html('');
                  $("#e_email").html('');			   
                  $("#e_password").html('');
			       $("#e_tipo").html('');
					 	  
							 	     
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
    });
    </script>
</head>
<body>

<div class="container">
<div class="row">
<div class="col s12">

    <h1>Modificar registro del Usuario </h1>
    <div id="mensaje"></div>
<form method="POST" id="form_ajax" action="<?php echo $_SERVER["PHP_SELF"] ?>">
   
	<input type = "hidden" name="idu" value="<?php echo $datos["id_usuario"]; ?>">
  


  
   
                <div class="input-field" >        
                <input class="blue-text lighten-2" id="nombree" type="text" name="nombre" value="<?php  echo $datos["nombres"]; ?> ">
                <label for="nombree">Nombre del estudiante</label>
                 <div id="e_nombre"></div>				
				</div>
				
				
		        <div class="input-field">  
                <input class="blue-text lighten-2" id="apellidos" type="text" name="apellido" value="<?php  echo $datos["apellidos"]; ?> ">
                <label for="apellidos">Apellidos del Estudiante</label>
				<div id="e_apellido"></div>
				</div>
				
				
                 <div class="input-field">
                <input id="carne" class="blue-text lighten-2" type="text" name="carne" value="  <?php  echo $datos["carne"]; ?> ">
                <label for="carne">Carnet del Estudiante</label>
				<div id="e_carne"></div>
                </div>
				
                 <div class="input-field">
                <input id="carreras" class="blue-text lighten-2" type="text" name="carrera" value="  <?php  echo $datos["carreras"]; ?> ">
                <label for="carreras">Carrera del Estudiante</label>
				<div id="e_carrera"></div>
                </div>
			
	

                <div class="input-field">
                <input class="blue-text lighten-2" id="turnos" type="text" name="turno" value="<?php  echo $datos["turnos"];?>">
                <label for="turnos">Turno de Estudiante</label>
				<div id="e_turno"></div>
                </div>
				
				<div class="input-field">
                <input type="email" id="correo" class="blue-text lighten-2" name="email" value="  <?php  echo $datos["correo"]; ?> ">
                <label for="correo">Correo del Estudiante</label>
				<div id="e_email"></div>
                 </div>
		
        
	            <div class="input-field">	
                <input type="text" name="password"  class="blue-text lighten-2" id="contrasena"  value="<?php echo $datos["contrasena"]; ?>" >
                <div id="e_password"></div>
                <label for="contrasena">Contraseña del Estudiante</label>
				</div>
                 
				 <div class="input-field">
                <input type="text" name="tipo"  class="blue-text lighten-2" id="turno" value="<?php  echo $datos["turnos"];?>">
                <div id="e_tipo"></div>
				<label for="turno">Turno del Estudiante</label>
                </div>
	
	
    <input type="hidden" name="validar">
	
    <input class="btn blue" type="submit" id="boton_validar" value="Modificar Estudiante"> <a href="verestudiantesadmin.php" id="vere" class="btn-large btn-floating waves-effect waves-light"><i class="material-icons blue">apps</i></a>
	<label for="vera">Ver Estudiantes</label>
	

  <?php
   
  }
    
  ?>
</form>
	
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
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>	





