
<?php
$id = $_GET['id'];
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
<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	  
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
</ul>
	<nav>
	<div class="nav-wrapper blue lighten-2">
  
	<ul id="nav-mobile" class="right hide-on-med-and-down">
	


 
 </div>
</li>
  <li><a class="dropdown-button" data-activates="dropdown1"><i class="material-icons">list</i></a></li>
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
background:#f5f5f5;
}

 

#menu{
margin:10px;
}  


#contenido{
  display: flex;
    min-height: 100vh;
    flex-direction: column;	
	background:#ffffff;
}

#slide-out
{
 width: 300px;

}

#imagenu{
margin:50px;
}

#tamanoletra
{
font-size:20;
padding : 60px;

}

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
margin : 50px;
}
#imagenforo{
margin:160px;
padding-bottom:10px;
}

#infoper{
margin-top:10px;

}
</style>

</head>

<body >

<div class="container" id="contenido">
<div class="row">
<div class="col s4">

    <ul id="slide-out" class="side-nav fixed">
     

	<nav>
	<div class="nav-wrapper blue lighten-2" id="barranav">
    <a class="brand-logo" href="vercurso.php" ><h4 class="white-text">TUTOR</h4></a>
	
</div>
</nav>
	 
 
	<?php
   $conexion = mysqli_connect ("127.0.0.1","root","","tutor");
   if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 

 
  $sql1 = "SELECT * FROM tutor WHERE id_tutor='".$id."'";
  $stmm = $conexion->query($sql1);
  while ($data = mysqli_fetch_array($stmm))
  {
  ?>

<img class="circle responsive-image" width="200" height="200" id="imagenu" src="data:image/jpg;base64,<?php echo base64_encode($data["fotot"]);?>">

    <ul class="collapsible" data-collapsible="accordion" id="infoper">
    <li>
      <div class="collapsible-header active pink-text"><i class="large material-icons">account_circle</i>Informacion Tutor</div>
      <div class="collapsible-body"><p>
	    <span class="blue-text  center-align">Nombres: <?php  echo $data["nombret"]; ?><?php  echo $data["apellidot"]; ?></span> 
<br><br> <span class="blue-text center-align">Correo: <?php  echo $data["emailt"]; ?></span>
<br><br> <span class="blue-text center-align">Telefono: <?php  echo $data["telefonot"]; ?></span>
<br><br> <span class="blue-text center-align">Descripcion: <?php  echo $data["descripciont"]; ?></span></p></div>
  <?php
  
  }
  ?>

	
     
    </ul>
</div>
  

<div class="col s12">



<?php



$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 
  
  $sql = "SELECT * FROM curso WHERE id_curso='".$id."'";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  {
  ?>
<h5 class=" red-text lighten-2 center-align"><?php  echo $datos["titulo"];?></h5> 
  <div class="card">
  
</div>

  <ul class="collapsible popout" data-collapsible="accordion">
    <li>
      <div class="collapsible-header active blue-text lighten-2"><i class="material-icons">content_paste</i>Descripcion</div>
      <div class="collapsible-body"><p class="flow-text " > <br><?php  echo nl2br($datos["descripcion"]);?> </br></p></div>
    </li>
    <li>
      <div class="collapsible-header blue-text lighten-2"><i class="material-icons">vpn_key</i>Requisitos</div>
      <div class="collapsible-body"><p class="flow-text"></hr><br><?php echo nl2br($datos["requisitos"]); ?></p></div>
    </li>
    <li>
      <div class="collapsible-header blue-text lighten-2"><i class="material-icons">wb_incandescent</i>Que voy a Aprender ?</div>
      <div class="collapsible-body"><p class="flow-text"><br><?php echo nl2br($datos["aprender"]); ?></p></div>
	  </li>
	    <li>
      <div class="collapsible-header blue-text lighten-2"><i class="material-icons">local_library</i>A quien esta dirigido?</div>
      <div class="collapsible-body"><p class="flow-text"><br><?php  echo nl2br($datos["dirigido"]); ?></p></div>
	  </li>
	  <li>
	   <div class="collapsible-header active blue-text lighten-2"><i class="material-icons">query_builder</i>Duracion</div>
      <div class="collapsible-body"><p class="flow-text " > <br><?php  echo nl2br($datos["duracion"]);?> </br></p></div>
    </li>
    <li>
      <div class="collapsible-header blue-text lighten-2"><i class="material-icons">description</i>Evaluaciones</div>
      <div class="collapsible-body"><p class="flow-text"></hr><br><?php echo nl2br($datos["evaluaciones"]); ?></p></div>
    </li>
    <li>
      <div class="collapsible-header blue-text lighten-2"><i class="material-icons">swap_calls</i>Dificultad </div>
      <div class="collapsible-body"><p class="flow-text"><br><?php echo nl2br($datos["nivel"]); ?></p></div>
    </li>
	  
	   <a id="leccion" href ="lecciones.php?id=<?php echo $datos['id_curso']?>" class="btn-large btn-floating waves-light waves-effect red"><i class="material-icons">description</i></a>  
	  <label for="leccion">Ver Lecciones de la Unidad </label>
  </ul>

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
		
		
 <!--Import jQuery before materialize.js-->
		
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
 <script>  
	 $(document).ready(function(){
	   $(".button-collapse").sideNav();
	   $(".dropdown-button").dropdown();
	   
	    $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
    
	
	
  });
		</script>
	
  </body>
        
</html>