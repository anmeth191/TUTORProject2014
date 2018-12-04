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

?>




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
		 		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		 
		  <nav>
	<div class="nav-wrapper blue lighten-2">
    <a href="paginatutor.php"class="brand-logo" >TUTOR</a>
	<ul id="nav-mobile" class="right hide-on-med-and-down">

  <li><a href="cerrarsesion.php">Cerrar Sesion</a>
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
<div class="row">
<div class="cols12">
<img src="images/profesor.jpg" height="500" width="1300">

<table class="striped">
 
 <thead>
 <th class="blue-text lighten-2">Titulo</th>
 <th class="blue-text lighten-2">Fecha</th>

 <th class="blue-text lighten-2">Tutor</th>
 <th class="blue-text lighten-2">Imagen</th>
  <th class="blue-text lighten-2">Evaluaciones</th>
 </thead>
  <tbody>


<?php

 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 
  $carnet=$_GET["idtutor"]; 
  $sql = "SELECT * FROM curso INNER JOIN tutor WHERE curso.id_curso=tutor.id_tutor  AND tutor.nombret='$carnet'";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  

  {
  ?>
  
  <tr>
  
 
  
  <td><?php  echo $datos["titulo"]; ?></td>
  <td> <?php  echo $datos ["fecha"];    ?> </td>
  <td> <?php  echo $datos["nombret"]; ?> </td>
  <td><img width="100" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagen"]);?>"/></a></td>
    <td> <a href = "evaluaciones.php?tema=<?php echo $datos['titulo']?> "><?php echo($datos["evaluaciones"])?></a> </td>
 <td> <a href = "modificar.php?id_cursos=<?php echo $datos['id_curso']?>" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">settings</i></a> </td>
  <td> <a href = "borrarcurso.php?id_cursos=<?php echo $datos['id_curso']?> " class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear </i></a> </td>
    <td> <a href = "leccionesadmin.php?id=<?php echo $datos['id_curso']?> " class="btn-floating btn-large waves-effect waves-light blue" id="lecciones"><i class="material-icons">chrome_reader_mode</i></a> 	<label for="lecciones">Ver Lecciones</label> </td>

 </tr>
  <?php
   
  }
    
  ?>
  </tbody>
 </table>
 
<?php

 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 
  $carnet=$_GET["idtutor"]; 
  $sql = "SELECT * FROM  tutor WHERE tutor.nombret='$carnet'";
  $stm = $conexion->query($sql);
  $datos = mysqli_fetch_array($stm)
  
  ?>
 <a href = "curso.php?nombre=<?php echo $datos["nombret"]; ?>" class="btn-floating btn-large waves-effect waves-light blue" id="curso"><i class="material-icons">create</i></a>
<label for="curso">Crear Curso</label>
  <?php
   
  
    
  ?>

 
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