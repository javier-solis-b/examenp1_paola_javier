<?php
function conectaDB() 
{ 
  	$host = 'localhost'; 
	$user = 'id21363273_javier';  //nombre de Usuario que proporciona 000webhost
	$pass = 'Javi1234.';

   if (!( $link = @mysqli_connect($host,$user,$pass)) )
   {
      echo "Error al realizar la conexión a la base de datos.";
      exit();
   }

   if (!mysqli_select_db($link,"id21363273_miempresa")) //nombre de la BD que proporciona 000webhost
   { 
      echo "Error al seleccionar la base de datos."; 
      exit(); 
   }    
   return $link; 
}
?>


