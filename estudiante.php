<html>
<head>
</head>
<body>
<table>
 
 <thead>
 
 
 <th>Titulo</th>
 <th>Tema</th>
 <th>Comentario</th>

 
 </thead>
  <tbody>


<?php


$id = $_GET['identi'];
$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{

echo 'Conexion Fallida' . mysqli_connect_error();

}

else 

echo 'conexion Exitosa';
 

  
  $sql = "SELECT * FROM leccion WHERE id_leccion = '$id'";
  $stm = $conexion->query($sql);
  while ($datos = mysqli_fetch_array($stm))
  

  {
  ?>
  
  <tr>
  
 

  <td> <?php  echo $datos["titulo_leccion"];?> </td>
  <td><?php  echo $datos ["tema"];    ?> </td>
    <td><?php  echo $datos ["descripcion"];    ?></td> 
  
  
  
  
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