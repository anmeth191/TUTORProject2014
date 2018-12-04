<?php

//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresarÃ¡ a login.php
if(isset($_SESSION['usuario'])) 
{

}
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}
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
	   
	   $("#file_tutor").on("change", function(){
           /* Limpiar vista previa */
           $("#vista-previ").html('');
           var archivo = document.getElementById('file_tutor').files;
           var navegado = window.URL || window.webkitURL;
           /* Recorrer los archivos */
           for(x=0; x<archivo.length; x++)
           {
               /* Validar tamaño y tipo de archivo */
               var sizee = archivo[x].size;
               var typee = archivo[x].type;
               var namee = archivo[x].name;
               if (sizee > 1024*1024)
               {
                   $("#vista-previ").append("<p style='color: red'>El archivo "+namee+" supera el máximo permitido 1MB</p>");
               }
               else if(typee != 'image/jpeg' && typee != 'image/jpg' && typee != 'image/png' && typee != 'image/gif')
               {
                   $("#vista-previ").append("<p style='color: red'>El archivo "+namee+" no es del tipo de imagen permitida.</p>");
               }
               else
               {
                 var objeto_ur = navegado.createObjectURL(archivo[x]);
                 $("#vista-previ").append("<img src="+objeto_ur+" width='250' height='250'>");
               }
           }
       });
	   
	
      
        
       $("#btn").on("click", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "multiple-ajax.php";
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
	<a href="paginatutor.php" class="brand-logo">TUTOR</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	<li><a class="waves-effect waves-light " href="cerrarsesion.php">Iniciar Sesion</a></li>  
	
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
 
 <div class="container" id="contenido">
 <img src="images/profesor.jpg" height="500" width="1300">
 <h2 class="blue-text lighten-2">Creacion de Curso</h2><br>
  <h4 class="red-text lighten-2">Todos los campos con asterisco son requeridos</h4>
 <div class="row">
 
  
<?php

 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 
  $carnet=$_GET["nombre"]; 
  $sql = "SELECT * FROM  tutor WHERE tutor.nombret='$carnet'";
  $stm = $conexion->query($sql);
  $datos = mysqli_fetch_array($stm)
  
  ?>
   <form name = "curso" method="post" id="formulario" enctype="multipart/form-data">
 <div class="col s6">
 
	  <div class="input-field">
	    <i class="material-icons prefix">account_circle</i>
	  <input type = "text" name = "tutor_nombre" value="<?php echo $datos["nombret"]?>">
	  <label for="icon_prefix">Nombres del Tutor</label>
		<div id="tutorn"></div>
		</div>
		
		
		  <div class="input-field">
	    <i class="material-icons prefix">account_circle</i>
		<input type = "text" name = "tutor_apellido" value="<?php echo $datos["apellidot"]?>">
		<div id="tutora"></div>
		  <label for="icon_prefix">Apellidos del Tutor</label>
		  </div>
		  
		<div class="input-field">
		<i class="material-icons prefix">email</i>
		<input type = "text" name = "tutor_email" value="<?php echo $datos["emailt"]?>">
	    <div id="tutore"></div>
		<label for="icon_prefix">Correo electronico</label>
		</div>
		
		<div class="input-field">
		<i class="material-icons prefix">phone</i>
		<input type = "text" name = "tutor_telefono" value="<?php echo $datos["telefonot"]?>">
		<div id="tutort"></div>
	    <label for="icon_prefix">Telefono de contacto</label>	
		</div>
<?php

?>		
	
	<div class="input-field ">
           <i class="material-icons prefix">mode_edit</i>
            <textarea name = "descripciont" class="materialize-textarea" id="icon_prefix2"></textarea>
		    <label for="icon_prefix2">Escriba una descripcion </label>
        </div>
		
	
       
	<div class="input-field">
	<i class="material-icons prefix">description</i>
	<input type = "text" name = "titulo">
		<div id="titulo"></div>
		<label for="icon_prefix">Titulo del curso * </label>
		</div>

	
		<div class="card-image">
<div id="vista-previ"></div>
</div>		
<div class="card-content">
<div class="file-field input-field">
<div class="btn blue"> 
<span>tutor imagen </span>
<input type="file" id="file_tutor" name="file_tutor" multiple>		

</div>
</div>
</div> 

<label for="file_tutor">Obligatorio subir una imagen *</label>		
		
	
		</div>
		<div class="col s6">
		
		
		<div class="input-field">
		<i class="material-icons prefix">date_range</i>
		<input type = "date" class="datepicker" name = "fecha">
		<label for="icon_prefix">Fecha de creacion *</label>
		<div id="fechaCreado"></div>
       </div>
		
	     <div class="input-field">
		<i class="material-icons prefix">timer</i>
		<input type = "text" name = "duracion">
		<label for="icon_prefix">Duracion del curso *</label>
		<div id="duracion">	</div>
		</div>
        
		<div class="input-field">
		<i class="material-icons prefix">assignment</i>
		<input type = "text" name = "evaluaciones">
		<div id="evaluaciones"></div>		
		 <label for="icon_prefix">Numero de Evaluaciones </label>	
	    </div>
	
        <div class="input-field">
		<i class="material-icons prefix">description </i>
		<textarea id="editor1" name = "descri" class="materialize-textarea"></textarea>
		<label for="icon_prefix">Agregue una descripcion al curso *</label>
		</div>
		 
		<div class="input-field">
		<i class="material-icons prefix">import_contacts</i>
		<textarea name = "requisitos" class="materialize-textarea"></textarea>
		<label for="icon_prefix">Agregue requisitos para el curso *</label>
		</div>
		
		<div class="input-field">
		<i class="material-icons prefix">import_contacts</i>
		<textarea name = "aprender" class="materialize-textarea"></textarea>
			<label for="icon_prefix">Que vas a aprender en este curso?</label>
		</div>
		
		<div class="input-field">
	<i class="material-icons prefix">accessibility</i>
		<textarea name = "dirigido" class="materialize-textarea" ></textarea>
			<label for="icon_prefix">A quien esta dirigido?</label>
		</div>
		
		
		
		<select name="nivel">
		<option value=""disabled selected>Nivel de curso * </option>
		<option value="principiante"> Principiante</option>
		<option value="intermedio"> Intermedio</option>
		<option value="avanzado">Avanzado</option>
		<div class="e_nivel"></div>
		<select>
<div class="card-image">
<div id="vista-previa"></div>
</div>		
<div class="card-content">
<div class="file-field input-field">
<div class="btn blue"> 
<span>curso imagen </span>
 <input type="file" id="file" name="file[]" multiple>
</div>
</div>
</div> 
<label for="file">Obligatorio subir una imagen *</label>
<div id="respuesta"></div>
</div>
</div>

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
  
  <a id="vercurso" href="vercursoadmin.php?idtutor=<?php echo ($datos['nombres'])?>" class="btn-large btn-floating waves-effect waves-light blue"><i class="material-icons">apps</i></a>
  <label for="vercurso">Ver Cursos</label>

<?php
  }
?>
	<button class="btn red waves-effect light-btn" type="button" id="btn">Crear Curso</button>	
    </form>
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
	
  $(document).ready(function() {
    $('select').material_select();
	  $('#textarea1').val('New Text');
  $('#textarea1').trigger('autoresize');
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  
  });
	</script>
 
 </body>
</html>