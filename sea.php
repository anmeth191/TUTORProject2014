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
</head>
<body>
<?php

$nm=$_GET['nm'];

 $conexion = mysqli_connect ("127.0.0.1","root","","tutor");
   if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 

if($nm=="")
{
}
else
{
 $sql = "SELECT * FROM curso INNER JOIN tutor WHERE ((tutor.nombret like ('$nm%')AND tutor.id_tutor=curso.id_curso) OR (curso.titulo like ('$nm%')AND tutor.id_tutor=curso.id_curso))";
 
 
  $stm = $conexion->query($sql);
  while ($data = mysqli_fetch_array($stm))
  {
  ?>
 
  <div class="row">
  <div class="col s12">
  <div class="col s4 push-s3">

       <ul class="collection">
    <li class="collection-item avatar">
    <img width="100" height="200"  class="circle responsive-image" src="data:image/jpg;base64,<?php echo base64_encode($data["imagen"]);?>"/>
     <p class="blue-text lighten-2"><?php  echo $data["titulo"]; ?><br>Por:<?php  echo $data["nombret"];?> <br><br>
	 <div class="divider"></div>
	          <a href = "lecciones.php?id=<?php echo $data['id_curso']?>" class="blue-text">Ver Lecciones</a> 
              <a href="descripcion.php?id=<?php echo $data['id_curso']?>" class="blue-text" >Descripcion</a>
     
      </p>
    
    </li>
	</ul>
 
           
	

</div>
  </div>
  </div>

  <?php
  }
  }
   ?>  
  
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
  </html>