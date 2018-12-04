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

else 

 
$id = $_GET['id_cursos'];
$consulta = "SELECT * FROM curso INNER JOIN tutor  WHERE curso.id_curso= '$id' AND tutor.id_tutor='$id' ";

  $stm = mysqli_query($conexion , $consulta);

while ($datos = $stm->fetch_array())  
{

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
            var ruta = "modificar-curso.php";
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
    <a  class="brand-logo" href="paginatutor.php" >TUTOR</a>
	<ul id="nav-mobile" class="right hide-on-med-and-down">
	<li>

</li>
  <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
</ul>
</div>
</nav>
 </head>
 
 <body>
 <div class="container">
  <img src="images/profesor.jpg" height="500" width="1300">
  <h1 class="blue-text lighten-2">Modificar Curso </h1>
 <div class="row">
 <form name = "curso" method="post" id="formulario" enctype="multipart/form-data" action = "modificar-curso.php">
<input type = "hidden" name = "id" value="<?php echo $id; ?>">
 <div class="col s6">
 
	  <div class="input-field">
	    <i class="material-icons prefix">account_circle</i>
	  <input type = "text" name = "tutor_nombre" value="<?php echo($datos["nombret"]);?>" >
	  <label for="icon_prefix">Nombres del Tutor</label>
		<div id="tutorn"></div>
		</div>
		
		
		  <div class="input-field">
	    <i class="material-icons prefix">account_circle</i>
		<input type = "text" name = "tutor_apellido" value="<?php echo($datos["apellidot"]);?>">
		<div id="tutora"></div>
		  <label for="icon_prefix">Apellidos del Tutor</label>
		  </div>
		  
		<div class="input-field">
		<i class="material-icons prefix">email</i>
		<input type = "text" name = "tutor_email" value="<?php echo($datos["emailt"]);?>">
	    <div id="tutore"></div>
		<label for="icon_prefix">Correo electronico</label>
		</div>
		
		<div class="input-field">
		<i class="material-icons prefix">phone</i>
		<input type = "text" name = "tutor_telefono" value="<?php echo($datos["telefonot"]);?>">
		<div id="tutort"></div>
	    <label for="icon_prefix">Telefono de contacto</label>	
		</div>
		
		 <div class="input-field ">
           <i class="material-icons prefix">mode_edit</i>
            <textarea name = "descripciont" class="materialize-textarea" id="icon_prefix2" value="<?php echo nl2br ($datos["descripciont"]);?>"></textarea>
		    <label for="icon_prefix2">Escriba una descripcion </label>
        </div>
		
	
       
	<div class="input-field">
	<i class="material-icons prefix">description</i>
	<input type = "text" name = "titulo" value="<?php echo($datos["titulo"]);?>">
		<div id="titulo"></div>
		<label for="icon_prefix">Titulo del curso</label>
		</div>

	
		<div class="card-image">
<div id="vista-previ"></div>
</div>		
<div class="card-content">
<div class="file-field input-field">
<div class="btn blue"> 
<span>Suba una imagen</span>
<input type="file" id="file_tutor" name="file_tutor" multiple>		

</div>
</div>
</div> 
		
		
	
		</div>
		<div class="col s6">
		
		
		<div class="input-field">
		<i class="material-icons prefix">date_range</i>
		<input type ="date" class="datepicker" name = "fecha" value="<?php echo($datos["fecha"]);?>">
		<label for="icon_prefix">Fecha de creacion</label>
		<div id="fechaCreado"></div>
       </div>
		
	     <div class="input-field">
		<i class="material-icons prefix">timer</i>
		<input type = "text" name = "duracion" value="<?php echo($datos["duracion"]);?>">
		<label for="icon_prefix">Duracion del curso</label>
		<div id="duracion">	</div>
		</div>
        
		<div class="input-field">
		<i class="material-icons prefix">assignment</i>
		<input type = "text" name = "evaluaciones" value="<?php echo($datos["evaluaciones"]);?>">
		<div id="evaluaciones"></div>		
		 <label for="icon_prefix">Numero de Evaluaciones</label>	
	    </div>
	
        <div class="input-field">
		<i class="material-icons prefix">description</i>
		<textarea id="editor1" name = "descri" class="materialize-textarea" value="<?php echo($datos["descripcion"]);?>"></textarea>
		<label for="icon_prefix">Agregue una descripcion al curso
		</div>
		 
		<div class="input-field">
		<i class="material-icons prefix">import_contacts</i>
		<textarea name = "requisitos" class="materialize-textarea" value="<?php echo($datos["requisitos"]);?>"></textarea>
		<label for="icon_prefix">Agregue requisitos para el curso
		</div>
		
		<div class="input-field">
		<i class="material-icons prefix">import_contacts</i>
		<textarea name = "aprender" class="materialize-textarea" value="<?php echo($datos["aprender"]);?>"></textarea>
			<label for="icon_prefix">Que vas a aprender en este curso?
		</div>
		
		<div class="input-field">
	<i class="material-icons prefix">accessibility</i>
		<textarea name = "dirigido" class="materialize-textarea" value="<?php echo($datos["dirigido"]);?>"></textarea>
			<label for="icon_prefix">A quien esta dirigido?
		</div>
		
		
		
		<select name="nivel" value="<?php echo($datos["nivel"]);?>">
		<option value=""disabled selected>Nivel de curso</option>
		<option value="principiante"> Principiante</option>
		<option value="intermedio"> Intermedio</option>
		<option value="avanzado">Avanzado</option>
		<div class="e_nivel"></div>
		<select>
	
<?php
}
?>	
		
<div class="card-image">
<div id="vista-previa"></div>
</div>		
<div class="card-content">
<div class="file-field input-field">
<div class="btn blue"> 
<span>Subir una imagen</span>
 <input type="file" id="file" name="file[]" multiple>

</div>
</div>
</div> 

<div id="respuesta"></div>

</div>
</div>

<button class="btn-large waves-effect waves-light red" type="button" id="btn">Modificar Curso</button>	

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
  
  <a  id="vercursos"href="vercursoadmin.php?idtutor=<?php echo ($datos['nombres'])?>" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">apps</i></a>
  <label for="vercursos">Ver Cursos</label>

<?php
  }
?>
</form>
</div>
 <div id="respuesta"></div>
 
 
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
	  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  });
	</script>
 
 </body>
</html>