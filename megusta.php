<?PHP

$conexion = mysqli_connect ("127.0.0.1","root","","tutor");

if(mysqli_connect_errno())
{
echo 'Conexion Fallida' . mysqli_connect_error();
}
else 
//Asuamiendo que ya tenemos una conexion establecidad a nuestra base de datos
//obtenemos los valores que nos envia el ajax a nuestro script

$post_id = (int)$_POST["post_id"];
$autor_id = (int)$_POST["autor_id"];
$proceso = array("error"=>false,"msj_error"=>"","yagusta"=>false,"cantidad"=>0);

//verificamos que los parametros esten correctos
if (empty($post_id) || empty($autor_id)) {
$proceso["error"] = true;
$proceso["msj_error"] = "Ocurrio un error, por favor intentalo de nuevo";
echo json_encode($proceso);
exit();
}

// ya dio me gusta?, indiquemosle al usuario
$yagusto = mysql_query("SELECT COUNT(*) FROM `megusta` WHERE autor_id=$autor_id AND post_id=$post_id");

if ($yagusto > 0) {
$proceso["error"] = true;
$proceso["msj_error"] = "Ya te gusta esta publicacion";
echo json_encode($proceso);
exit();
}

//Almacenamos el nuevo ME GUSTA
 $consulta_ajax = mysql_query("INSERT INTO `megusta` (autor_id,post_id,fecha) VALUES($autor_id,$post_id,NOW())");

if ($consulta_ajax) {
$proceso["cantidad"] = mysql_query("SELECT COUNT(*) FROM `megusta` WHERE post_id=$post_id");
echo json_encode($proceso);
exit();
}

?>