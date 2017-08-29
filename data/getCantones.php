<?php
	require ('../data/data2.php');
	$idprovincia=$_POST['idprovincia'];

	$queryM = "SELECT idcanton, nombrecanton FROM tbcanton WHERE idprovincia = '$idprovincia' ";
	$resultado = $mysqli->query($queryM);

	$html= "<option value='0'>Seleccionar canton</option>";

	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['idcanton']."'>".$row['nombrecanton']."</option>";
	}
	
	echo $html;
 ?>