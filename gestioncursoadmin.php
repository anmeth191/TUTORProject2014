




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
		 
		  <nav>
	<div class="nav-wrapper blue lighten-2">
    <a href="paginaadmin.php"class="brand-logo" >TUTOR</a>
	<ul id="nav-mobile" class="right hide-on-med-and-down">
	<li>
<div class="input-field" name="buscador" id="search1">
 <input id="search" type="search" required>
 <label for="search"><i class="material-icons">search</i></label>
 <i class="material-icons">close</i>	
 </div>
</li>
  <li><a class="dropdown-button" data-activates="dropdown1"><i class="material-icons">list</i></a></li>
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

<table>
 
 <thead>
 <th>Titulo</th>
 <th>Fecha</th>

 <th>Tutor</th>
 <th>Imagen</th>
 </thead>
  <tbody>


<?php

 
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 


 

  
  $sql = "SELECT * FROM curso INNER JOIN tutor where curso.id_curso=tutor.id_tutor ";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  

  {
  ?>
  
  <tr>
  
 
  
  <td><?php  echo $datos["titulo"]; ?></td>
  <td> <?php  echo $datos ["fecha"];    ?> </td>

  <td> <?php  echo $datos["nombret"]; ?> </td>
  <td><img width="100" src="data:image/jpg;base64,<?php echo base64_encode($datos["imagen"]);?>"/></a></td>

  <td> <a href = "borrarcurso.php?id_cursos=<?php echo $datos['id_curso']?> ">Borrar Curso </a> </td>

 </tr>
  <?php
   
  }
    
  ?>
  </tbody>
 </table>
 


 
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