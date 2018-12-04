<?php


$id = $_GET['id'];
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

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


  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	  
	  <nav>
	<div class="nav-wrapper blue lighten-2">
    <a href="paginatutor.php"class="brand-logo" >TUTOR</a>
	<ul id="nav-mobile" class="right hide-on-med-and-down">

  <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
</ul>
</div>
</nav>
<style type="text/css">

#barranav
{
 padding-left: 0px;

}


header{

 padding-left: 240px;

 }


body {

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

}

#imagenu{
margin:50px;
}

#tamanoletra
{
font-size:20;
padding : 60px;

}
</style>
</head>



<body>
<div class="container">
<div class="row">
<div class="col s12">
<img src="images/profesor.jpg" height="500" width="1300" class="responsive-image">
<table class="striped">
 
 <thead>
 
 
 <th class="blue-text lighten-2">Titulo</th>
 <th class="blue-text lighten-2">Tema</th>
 <th class="blue-text lighten-2">Ver Leccion</th>
  <th class="blue-text lighten-2">Borrar Leccion</th>

 
 </thead>
  <tbody>


<?php



$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 


 

  
  $sql = "SELECT * FROM leccion WHERE identificador = '$id'";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  

  {
  ?>
  
  <tr>
  
 

  <td> <?php  echo $datos["titulo_leccion"];?></td>
  <td> <?php  echo $datos ["tema"];?> </td>
  <td> <a href = "<?php echo $datos['descripcion']?>" class="btn-floating btn-large waves-effect waves-light blue " id="verle"><i class="material-icons">chrome_reader_mode</i></a><label for="verle">Ver Lecciones</label> </td>
    <td> <a href ="borrarleccion.php?id=<?php echo $datos['id_leccion']?>" class="btn-large btn-floating waves-effect waves-light red"><i class="material-icons">clear</i> </a> </td> 
 </tr>
  <?php
   
  }
    
  ?>
  </tbody>
 </table>
 


</form>

</body>
</html>
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
</head>

<body>
     <div class="striped blue lighten-2">
	 
    <h1 class="flow-text white-text">Crear de Lecciones </h1>
    </div>
	<div id="mensaje"></div>
<form method="POST" id="form_ajax" action="lecciones-curso.php">
   
	
              
			   <div class="input-field blue-text lighten-2">
				 <i class="material-icons prefix">description</i>
                <input type="text" name="titulo" id="titulo">
				<label for="titulo">Titulo de la Leccion</label>
                <div id="e_nombre"></div>
                </div>
			
            
           
                 <div class="input-field blue-text lighten-2">
				 <i class="material-icons prefix" >description</i>
                <input type="text" name="tema" id="tema">
				<label for="tema">Tema de La Leccion</label>
                <div id="e_nombre"></div>
                </div>
          
                 <div class="input-field blue-text lighten-2">
				 <i class="material-icons prefix">filter_list</i>
                <textarea name="descripcion" id="textarea" class="materialize-textarea"cols = "30" rows="30"></textarea>
                <label for="textarea">Pegue aqui el Link  google sites de la Leccion</label>
				<div id="e_apellido"></div>
				</div>
				
    
<input type = "hidden" name = "id" value="<?php echo $id; ?>">
   
 
    <input class="btn blue"type="submit" id="boton_validar" value="Crear Leccion">
    
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
  
  <a id="vercursos" href="vercursoadmin.php?idtutor=<?php echo ($datos['nombres'])?>" class="btn-large btn-floating waves-effect waves-light blue"><i class="material-icons">apps</i></a>
  <label for="vercursos">Ver Cursos</label>

<?php
  }
?>

	
</form>
</div>
</div>
</div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>	