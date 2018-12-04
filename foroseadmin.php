<?php
$id = $_GET["identi"];
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresarÃ¡ a login.php
if(!isset($_SESSION['usuario'])) 
{
  $cadena=$_SESSION['usuario'];

  header('Location: vercurso.php'); 
  exit();
}
else

?>

<html>
<head>
 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<nav>
	<div class="nav-wrapper blue lighten-2" height="150">
	
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	 <li><a href="verforosadmin.php">Volver</a></li>
	</ul>	
	</div>
    </nav>	 

 </head> 
 <style type="text/css">

#lidi
{


left:-1000px;

}


#barrabus
{

padding-top:0px;
left:-620px;
width:500px;
}


header{

 padding-left: 240px;

 }


body {
 padding-left: 300px;
 display: flex;
 min-height: 100vh;
flex-direction: column;

}

#menu{
margin:10px;
}  

#contenido{
  display: flex;
    min-height: 100vh;
    flex-direction: column;	
}
#slide-out
{
 width: 300px;
}
#imagenu{
margin-top:50px;
margin-left:30px;
}

#tamanoletra
{
font-size:20;
padding-top : 10px;
margin-left:80px;
margin-right:80px;
}
#imagenforo{
margin:160px;
padding-bottom:10px;
}

#infoper{
margin-top:220px;

}

#botone{

right:-700px;

}
</style>
<body>

<div class="container">
<div class="row">
<div class="col s12">
<div class="col s4">

    <ul id="slide-out" class="side-nav fixed">
     

	<nav>
	<div class="nav-wrapper blue lighten-2" id="barranav">
    <a class="brand-logo" href="paginatutor.php" ><h4 class="white-text">TUTOR</h4></a>
	
</div>
</nav>
	 
 
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
  {  if($data["imagenu"]!=null)
  {
  ?>

<a href="cambiarimagen.php?carnet=<?php echo $data["carne"];?>"><img width="200" height="200"   id="imagenu" class="circle responsive-image tooltipped" data-position="bottom" data-delay="50" data-tooltip="click sobre la imagen para cambiar"  src="data:image/jpg;base64,<?php echo base64_encode($data["imagenu"]);?>"/></a>

<?php
}
else     if($data["imagenu"]==null)
{
?>   

<a href="cambiarimagen.php?carnet=<?php echo $data["carne"];?>"><img width="200" height="200"   id="imagenu" class="circle responsive-image tooltipped" data-position="bottom" data-delay="50" data-tooltip="click sobre la imagen para cambiar"  src="images/login.png"/></a>


<?php
}
?>
    <ul class="collapsible" data-collapsible="accordion" id="infoper">
    <li>
      <div class="collapsible-header active pink-text"><i class="large material-icons">account_circle</i>Informacion personal</div>
      <div class="collapsible-body"><p>
	    <span class="blue-text  center-align">Nombres: <?php  echo $data["nombres"]; ?><?php  echo $data["apellidos"]; ?></span> <br>
      <span class="blue-text  center-align">Carnet: <?php  echo $data["carne"]; ?></span> 
<br> <span class="blue-text center-align">Carrera: <?php  echo $data["carreras"]; ?></span> 
<br><span class="blue-text  center-align">Turno: <?php  echo $data["turnos"]; ?></span>
<br> <span class="blue-text center-align">Correo: <?php  echo $data["correo"]; ?></span>.</p></div>


   </li>
   </ul>
  <?php
  
  }
  ?>

	
      <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
</div>
<?php

$id = $_GET["identi"];
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");
if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else   
 $c="SELECT * FROM foro INNER JOIN userss WHERE foro.identificador = '$id' AND userss.carne=foro.carnet" ;
  $re = $conexion->query($c);
  while ($datos = mysqli_fetch_array($re))
  {
  ?>
   <ul class="collection">
    <li class="collection-item avatar ">
      <img width="100" height="200"  class="circle responsive-image" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagenu"]);?>"/>
      <span class="title red-text flow-text"><?php  echo nl2br($datos ["titulo"]);?></span>
      <p class="blue-text lighten-2 "><?php  echo $datos["autor"];?><br><?php  echo $datos["fecha_registro"]; ?> <br><br>
	  <div class="divider"></div>
         <?php  echo nl2br($datos ["comentario"]); ?>
      </p>
  
    </li>
	</ul>
  <?php
   }
   ?>
</div>
   
  <p class="flow-text">Respuestas</p> 
   
 <div class="col s10 push-s1 indigo lighten-5">  
<?php

$id = $_GET["identi"];
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");
if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else   
      $curso="SELECT * FROM comentarios INNER JOIN userss WHERE comentarios.identificador = '$id' AND userss.carne=comentarios.carnet ORDER BY comentarios.id_comentario ASC" ;

  $result = $conexion->query($curso);
  while ($datos = mysqli_fetch_array($result))
  {
  
  ?>
    <ul class="collection">
    <li class="collection-item avatar">
	
    <a href = "borrarcomentario.php?id=<?php echo $datos['comentario_c'];?> " class="btn-floating btn-large waves-effect waves-light red" id="botone"><i class="material-icons">close</i></a> 	<label for="lecciones">Ver Lecciones</label> 

	  <?php 
      if($datos["imagenu"]!=null)
       {	
	   ?>
	 <img width="100" height="200"  class="circle responsive-image" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagenu"]);?>"/>

    <?php
	 }
	 else  
	 if($datos["imagenu"]==null)
	 {
	 ?>
	  <img width="100" height="200"  class="circle responsive-image" src="images/login.png"/> 
	  <?php
	  }
	  ?>
	  
	<p class="blue-text lighten-2"><?php  echo $datos["fecha_c"]; ?> <br><?php  echo $datos["autor_c"];?> Dijo:<br><br>
	 <div class="divider"></div>
	 
     <?php  echo nl2br($datos ["comentario_c"]); ?>
	 </p>
    <?php 
	if($datos["subioa"]==1)
	{
	if($datos["extension"]!='jpg' && $datos["extension"]!='png' )
	{ 
	?>
	<a class="btn-floating red lighten-2"href="<?php echo($datos["archivo"]);?> "> <i class="material-icons">file_download</i></a>
	<?php
	  }
	 else
	 {
	 ?>
	  <img class="materialboxed" width="200" height="200" src="<?php echo($datos["archivo"]);?>"/>
	 <?php
	 }
	 }
	 else
	 if($datos["subioa"]==0)
	 {
	 ?>
	 <p></p>
	 
	 <?php
	 }
	 ?>
	 
    </li>
	</ul>
  <?php
   }
   ?>
</div>
</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
	  
	 
</body>
</html>

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
	 
  <script src='https://www.google.com/recaptcha/api.js'></script>
 </head> 
<body>

  <div class="container" id="contenido">
  <div class="row">
  <div class="col s8">
  <div id="mensaje"></div>
	
<form method="POST" id="form_ajax" action="foropadmin.php" enctype="multipart/form-data">
<input type = "hidden" name = "id" value="<?php echo $id; ?>">
        
   
			
<?php

   $conexion = mysqli_connect ("127.0.0.1","root","","tutor");
   if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 
    $id = $_GET["identi"];
   $cadena=$_SESSION['usuario'];
  $sql1 = "SELECT * FROM userss INNER JOIN foro WHERE userss.carne='".$cadena."' AND foro.identificador='".$id."' " ;
  $stmm = $conexion->query($sql1);
 
   
  
  while ($data = mysqli_fetch_array($stmm))
  {
 
  ?>
   <input type="hidden" id="e_autor" name="eautor" value="<?php echo $data["nombres"];?>" />
    <input type="hidden" id="e_carnet" name="ecarnet" value="<?php echo $data["carne"];?>" />
    <input type="hidden" id="e_titulo" name="etitulo" value="<?php echo $data["titulo"];?>" />
 <?php
  
  }
  ?>

         
  
               <div class="input-field blue-text lighten-2">
			   <i class="material-icons prefix">chat</i>
                <textarea name="comentario" id="textarea1" class="materialize-textarea"></textarea>
				<label for="textarea1">Comentario</label>
                <div id="comentario"></div>
				<div class="file-field input-field">
<div class="waves-effect waves-light btn blue lighten-2">
<input  class="btn-floating blue" type="file" name="archivo_fls"> <i class="material-icons">attach_file</i></input>
</div>
 <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
</div>
				
	</div>
	<div id="recap" class="g-recaptcha" data-sitekey="6LcGHBQTAAAAAB03XZNUKEkiBzc_2dHtcSIsnIz7"></div>	
    
    <input type="hidden" name="validar">
    <br>
	<button class="btn waves-effect waves-light blue lighten-2" type="submit" id="boton_validar" value="Crear Comentario">Crear Comentario</button>
	</br>	
</form>
</div>
</div>
</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
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
</body>
</html>	