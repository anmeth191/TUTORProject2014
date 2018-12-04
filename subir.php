<!DOCTYPE HTML>
<html>
 <head>
     <meta charset="UTF-8">
     <link rel=stylesheet href="EstiloProfesor.css">
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
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
 </head>
 <body>
 <form name = "curso" method="post" id="formulario" enctype="multipart/form-data">
<div id="dcontent">
	<div id="cabecera">
		<div id="titulo">
			<input type = "text" name = "titulo" placeholder="Nombre del curso" autofocus>
		</div>
		<div id="fecha">
			<span><?php 
			function FechaFormateada2($FechaStamp)
			{ 
			  $ano = date('Y',$FechaStamp);
			  $mes = date('n',$FechaStamp);
			  $dia = date('d',$FechaStamp);
			  $diasemana = date('w',$FechaStamp);
			 //
			  $diassemanaN= array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"); 
			  $mesesN=array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			  return $diassemanaN[$diasemana].", $dia de ". $mesesN[$mes] ." de $ano";
			}
			 //
			 $fecha = time();
			 echo FechaFormateada2($fecha);
			?></span>
		</div>
	</div>
	<div id="contenedor">
		<div id="logcurso">
		Subir imagen: <input type="file" id="file" name="file[]" multiple>
			 <div id="vista-previa"></div>
			  <div id="respuesta"></div>
		</div>
		<div id="descurso">
			<textarea placeholder="Escibir una breve descripcion del curso." autofocus name = "descri" cols = 68 rows = 19 ></textarea>
		</div>
		<br />
	</div>
<button type="button" id="btn">Crear Curso</button>	
<button type="button" id="btn"  onClick = "enviar('vercurso.php')">Ver curso</button>	
</div>
 </form>
 </body>
</html>