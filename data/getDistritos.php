<?php
	require ('../data/data2.php');
	$idcanton=$_POST['idcanton'];

	$queryM = "SELECT iddistrito, nombredistrito FROM tbdistrito WHERE idcanton = '$idcanton' ";
	$resultado = $mysqli->query($queryM);

	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['iddistrito']."'>".$row['nombredistrito']."</option>";
	}
	
	echo $html;
 ?>