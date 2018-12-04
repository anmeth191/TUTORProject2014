<?php
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresarÃ¡ a login.php
if(!isset($_SESSION['usuario'])) 
{

  header('Location: perfil.php'); 
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
	 <li><a href="perfil.php">Configuracion</a></li>

	
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
background:#f5f5f5;

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
             		  
   <form class="col s6" method="POST" id="form_cambiarnombre" action="<?php echo $_SERVER["PHP_SELF"] ?>">
   
   	<?php
   $conexion = mysqli_connect ("127.0.0.1","root","","tutor");
   if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 

   $cadena=$_GET['carnet'];
  $sql1 = "SELECT * FROM userss WHERE carne='".$cadena."'";
  $stmm = $conexion->query($sql1);
  while ($data = mysqli_fetch_array($stmm))
  {
  ?>

    <input type="hidden" id="e_carnet" name="idusuario" value="<?php echo $data["id_usuario"];?>" />

 
 
 <?php
  
  }
  ?>
    	
          <h2 class="center-align"><img src="images/settings.png" class="responsive-img"></h2>
	  
			 
			    
		  <div class="input-field blue-text text-lighter-2">
            <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="nombre">
          <label for="icon_prefix">Nombres</label>
		 	<div id="e_nombre"></div>
				
              	</div>
    		
			<div class="input-field blue-text text-lighter-2">
           <i class="material-icons prefix">account_circle</i>
           <input id="icon_prefix" type="text" name="apellido">
           <label for="icon_prefix">Apellidos</label>
		  <div id="e_apellido"></div>
             
				</div>
    	  
    <input type="hidden" name="ajax">
	<button type="button" id="enviarr" class="waves-effect waves-light btn blue darken-3  z-depth-4" value="Enviar">Actualizar Nombre</button>	
	 
	
		
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
 var url = "cambiar-nombre.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#form_cambiarnombre").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#e_nombre").html('');
			   $("#e_apellido").html('');
			   $("#e_carnet").html(''); 
			  
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
    });
    </script>
	</body>


</html>

