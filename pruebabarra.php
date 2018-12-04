	<!DOCTYPE HTML>
	<html>
	<head>
	</head>
	<body>
	<form name="form1" action="" method="post">
	
	  <input type="text" name="t1" onKeyUp="aa();">
   <div id="d1"></div>
	  
	   </form>
	   
	    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	
<script type="text/javascript">
function aa()
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","sea.php?nm="+document.form1.t1.value,false);
xmlhttp.send(null);

document.getElementById("d1").innerHTML=xmlhttp.responseText;


}
</script> 
	  </body>
	 
	  </html>