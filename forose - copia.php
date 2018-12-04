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
	<a href="vercurso.php" class="brand-logo">TUTOR</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	 <li><a href="vercurso.php">Volver</a></li>
	</ul>	
	</div>
    </nav>	 

 </head> 
<body>

<div class="container">
<div class="row">
<div class="col s12">

<?php

$id = $_GET["identi"];
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");
if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else   
  $c="SELECT * FROM foro INNER JOIN userss WHERE identificador = '$id' AND userss.carne=foro.carnet" ;
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
   
 <div class="col s10 push-s1">  
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
    <img width="100" height="200"  class="circle responsive-image" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagenu"]);?>"/>
     <p class="blue-text lighten-2"><?php  echo $datos["fecha_c"]; ?> <br><?php  echo $datos["autor_c"];?> Dijo:<br><br>
	 <div class="divider"></div>
     <?php  echo nl2br($datos ["comentario_c"]); ?>
      </p>
    
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

  <div class="container">
  <div class="row">
  <div class="col s8">
  <div id="mensaje"></div>
	
<form method="POST" id="form_ajax" action="forop.php">
<input type = "hidden" name = "id" value="<?php echo $id; ?>">
        
   
			
<?php

   $conexion = mysqli_connect ("127.0.0.1","root","","tutor");
   if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 

   $cadena=$_SESSION['usuario'];
  $sql1 = "SELECT * FROM userss INNER JOIN foro WHERE carne='".$cadena."'" ;
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

         
        </tr>
		<tr>
            <td>Comentario:</td>
            
                <textarea name="comentario" rows="10" rols="50"></textarea>
                <div id="comentario"></div>
	
	<div id="recap" class="g-recaptcha" data-sitekey="6LcGHBQTAAAAAB03XZNUKEkiBzc_2dHtcSIsnIz7"></div>	
    
    <input type="hidden" name="validar">
    <br>
	<button class="waves-effect waves-light-btn" type="submit" id="boton_validar" value="Crear Comentario">Crear Comentario</button>
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