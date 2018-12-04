<html>
<head>

<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
	    <link type="text/scss" rel="stylesheet" href="sass/materialize.scss"  media="screen,projection"/>
      <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
		<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
				

	<nav>
	<div class="nav-wrapper blue lighten-2">
	<a href="paginaadmin.php" class="brand-logo">TUTOR</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
	
		<li id="lidi">
	<form name="form1" action="" method="post" id="formm">
    <div class="input-field"  id="barrabus">
         <input id="search" type="search" value="Buscar Estudiante" name="t1" onKeyUp="aa();">
          <label for="search"><i class="material-icons">search</i></label>
		   
		  <i class="material-icons">close</i>
      </div>
		   </form>
		</li> 	
	<li><a class="waves-effect waves-light " href="cerrarsesion.php">Cerrar Sesion</a></li>  
	
	
	</ul>	
	</div>
    </nav>	
	<div id="d1"></div>

</head>

<style type="text/css">




#barrabus
{

padding-top:0px;
left:-620px;
width:500px;
}


header{



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
#lidi
{


left:-1000px;

} 

#tutor
{

margin-top:30px;



}

</style>
<body>



<div class="container">
<div class="row">
<div class="col s12">

<a href="resgistrartutor.php" class="btn-floating btn-large waves-effect waves-light blue" id="tutor"><i class="material-icons">account_circle</i></a>
<label for="tutor">Inscribir un Tutor en la Plataforma </label>
<h1 class="blue-text lighten-2">Estudiantes Registrados en la Plataforma</h1>

<?php
//
 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 
 // 
  $sql = "SELECT * FROM userss WHERE identificador=0 ORDER BY `id_usuario` ASC";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  //
  {
  ?>
   
   
	
	<div class="col s4">
    <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
	      <?php 
      if($datos["imagenu"]!=null)
       {	
	   ?>
	 <img width="100" height="300"  class="activator" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagenu"]);?>"/>
    <?php
	 }
	 else  
	 if($datos["imagenu"]==null)
	 {
	 ?>
	  <img width="100" height="300"  class="activator" src="images/login.png"/> 
	  <?php
	  }
	  ?>
    </div>
    <div class="card-content">
      <span class="card-title activator  pink-text lighten-2"> <?php  echo $datos["nombres"]; ?> <?php  echo $datos ["apellidos"]; ?> <i class="material-icons right">account_circle</i></span>
      <p>   
	 <a href = "modificar-estudiantea.php?id_e=<?php echo $datos['id_usuario']?> "> Modificar Estudiante </a> 
    <a href = "darbaja.php?id_e=<?php echo $datos['id_usuario']?> ">Retirar este Estudiante </a> 
	</p>
    </div>
    <div class="card-reveal">
      <span class="card-title pink-text lighten-2">Datos de Estudiante<i class="material-icons right">close</i></span>
<p>
 <h5 class="blue-text lighten-2"> Carrera:<?php  echo $datos ["carreras"]; ?> </h5>
  <h5 class="blue-text lighten-2">Email:<?php  echo $datos["correo"]; ?></h5> 
   <h5 class="blue-text lighten-2">Turno:<?php  echo $datos["turnos"]; ?></h5>  
 <h5 class="blue-text lighten-2">Carnet:00<?php  echo $datos["carne"]; ?></h5>  
 <h5 class="blue-text lighten-2">Contraseña:<?php  echo $datos["contrasena"]; ?></h5> 
 
</p>
  </div>
  </div>
  </div>
  
  <?php
  }
  ?>

</div>

<div class="col s12">
<h1 class="blue-text lighten-2">Profesores  Registrados en la Plataforma</h1>
	
<?php
//
 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 
 // 
  $sql = "SELECT * FROM userss  INNER JOIN tutor WHERE userss.nombres=tutor.nombret   AND identificador=1 GROUP BY tutor.nombret";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  //
  {
  ?>
   
   
	
	<div class="col s4">
    <div class="card">
    <div class="card-image waves-effect waves-block waves-light">     
	<?php 
      if($datos["fotot"]!=null)
       {	
	   ?>
	 <img width="100" height="300"  class="activator" src="data:image/jpg;base64,<?php echo base64_encode($datos["fotot"]);?>"/>
    <?php
	 }
	 else  
	 if($datos["imagenu"]==null)
	 {
	 ?>
	  <img width="100" height="300"  class="activator" src="images/login.png"/> 
	  <?php
	  }
	  ?>
    </div>
    <div class="card-content">
      <span class="card-title activator  pink-text lighten-2"> <?php  echo $datos["nombres"]; ?> <?php  echo $datos ["apellidos"]; ?> <i class="material-icons right">account_circle</i></span>
      <p>   
	 <a href = "modificar-profesor.php?id_e=<?php echo $datos['id_usuario']?> "> Modificar Profesor </a> 
    <a href = "darbajaprofesor.php?id_e=<?php echo $datos['nombres']?> ">Retirar este Profesor </a> 
	</p>
    </div>
    <div class="card-reveal">
      <span class="card-title pink-text lighten-2">Datos de Estudiante<i class="material-icons right">close</i></span>
<p>
 <h5 class="blue-text lighten-2"> Carrera:<?php  echo $datos ["carreras"]; ?> </h5>
  <h5 class="blue-text lighten-2">Email:<?php  echo $datos["correo"]; ?></h5> 
   <h5 class="blue-text lighten-2">Turno:<?php  echo $datos["turnos"]; ?></h5>  
 <h5 class="blue-text lighten-2">Carnet:00<?php  echo $datos["carne"]; ?></h5>  
 <h5 class="blue-text lighten-2">Contraseña:<?php  echo $datos["contrasena"]; ?></h5> 
 
</p>
  </div>
  </div>
  </div>
  
  <?php
  }
  ?>

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
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
function aa()
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","seadmin.php?nm="+document.form1.t1.value,false);
xmlhttp.send(null);

document.getElementById("d1").innerHTML=xmlhttp.responseText;


}
</script> 
</body>
</html>