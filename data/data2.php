<?php
	$mysqli= new mysqli("localhost","root","","bdturismo");

	if(mysqli_connect_errno()){
		echo 'Fallo conexion:',mysql_errno();
		exit();	
	}
?>