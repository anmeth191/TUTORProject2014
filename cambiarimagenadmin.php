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
     <meta charset="UTF-8">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>  
    <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   <script>
     $(function(){   
       $("#file").on("change", function(){
           /* Limpiar vista previa */
           $("#vista-previa").html('');
           var archivos = document.getElementById('file').files;
           var navegador = window.URL || window.webkitURL;
           /* Recorrer los archivos */
           for(x=0; x<archivos.length; x++)
           {
               /* Validar tamaño y tipo de archivo */
               var size = archivos[x].size;
               var type = archivos[x].type;
               var name = archivos[x].name;
               if (size > 1024*1024)
               {
                   $("#vista-previa").append("<p style='color: red'>El archivo "+name+" supera el máximo permitido 1MB</p>");
               }
               else if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png' && type != 'image/gif')
               {
                   $("#vista-previa").append("<p style='color: red'>El archivo "+name+" no es del tipo de imagen permitida.</p>");
               }
               else
               {
                 var objeto_url = navegador.createObjectURL(archivos[x]);
                 $("#vista-previa").append("<img src="+objeto_url+" width='250' height='250'>");
               }
           }
       });
	   
	       $("#btn").on("click", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "cambiar-imagenadmin.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta").html(datos);
                }
            });
           });
        
     });
    </script>
 
 <script type = "text/javascript">
 
 function enviar (destino)
 {
 
document.curso.action = destino;
document.curso.submit();
 
 }

 </script>
 
 <nav>
	<div class="nav-wrapper blue lighten-2">
    <a class="brand-logo" href="paginatutor.php">TUTOR</a>
	<ul id="nav-mobile" class="right hide-on-med-and-down">
		 <li><a href="verforosadmin.php">Volver a Foros</a></li>

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
        <div class="container" >
		<div class="row">
		<div class="col s3 push-s4">
		<h2 class="center-align"><img src="images/settings.png" class="responsive-img"></h2>
		</div>
		</div>
		</div>
		<div class="container" id="contenido">
		<div class="row">	
		<div class="col s4 push-s3 ">
		<div class="card center-align">
		<div class="card-image center-align">
		
<form name = "curso" method="post" id="formulario" enctype="multipart/form-data">
	
			<div class="card-panel">
Subir imagen: <input type="file" id="file" name="file[]" multiple>
<div id="vista-previa"></div>
    	</div>
		
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

    <input type="hidden" name="carnet" value="<?php echo $data["carne"];?>" />

 
 
 <?php
  
  }
  ?>

      	

    

<button type="button" id="btn">Cambiar imagen</button>	

<div id="respuesta"></div>

</form>
		</div>
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
  
 
    



   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    
	<script>
	
  $(document).ready(function() {
    $('select').material_select();
  });
	</script>
 
 </body>
</html>