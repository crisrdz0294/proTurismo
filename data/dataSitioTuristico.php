<?php
	include 'data.php';
	include '../domain/sitioTuristico.php';

	class DataSitioTuristico{

		public function DataSitioTuristico(){}

		public function insertarSitioTuristico($sitioTuristico){
			$con =new Data();
			$conexion=$con->conect();

			$nombrecomercial=$sitioTuristico->getNombreComercial();
			$nombreresponsable=$sitioTuristico->getNombreResponsable();
		 	$telefonositio=$sitioTuristico->getTelefonoSitio();
			$idprovincia=$sitioTuristico->getIdProvincia();
		 	$idcanton=$sitioTuristico->getIdCanton();
		 	$iddistrito=$sitioTuristico->getIdDistrito();
		 	$direccionexacta=$sitioTuristico->getDireccionExacta();

		 	$consultaUltimoId ="SELECT MAX(idsitioturistico) AS idsitioturistico FROM tbsitioturistico";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbsitioturistico VALUES (".$idSiguiente.",'".$nombrecomercial."','".$nombreresponsable."',".$telefonositio.",".$idprovincia.",".$idcanton.",".$iddistrito.",'".$direccionexacta."');";



             $result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;

		}

		public function mostrarTodosSitiosTuristicos(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbsitioturistico;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$sitiosTuristicos = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$sitioTuristicoTemporal = new SitioTuristico($row['idsitioturistico'],$row['nombrecomercialsitioturistico'],$row['nombreresponsablesitioturistico'],$row['telefonositioturistico'],$row['idprovinciasitioturistico'],$row['idcantonsitioturistico'],$row['iddistritositioturistico'],$row['direccionexactasitioturistico']);
            	array_push($sitiosTuristicos, $sitioTuristicoTemporal);
        	}
        	return $sitiosTuristicos;
		}

		public function actualizarSitioTuristico($sitioturistico){

			$con =new Data();
			$conexion=$con->conect();

			$nombrecomercial=$sitioturistico->getNombreComercial();
			$nombreresponsable=$sitioturistico->getNombreResponsable();
		 	$telefonositio=$sitioturistico->getTelefonoSitio();
		 	$direccionexacta=$sitioturistico->getDireccionExacta();
		 	$idsitio=$sitioturistico->getIdSitio();

		 	$consultaActualizar="UPDATE tbsitioturistico SET nombrecomercialsitioturistico='".$nombrecomercial."',nombreresponsablesitioturistico='".$nombreresponsable."',telefonositioturistico=".$telefonositio.",direccionexactasitioturistico='".$direccionexacta."' WHERE idsitioturistico=".$idsitio.";";

		 		$result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;

		}

		public function eliminarSitioTuristico($idsitioturistico){

			$con =new Data();
			$conexion=$con->conect();

			$consultaEliminar="DELETE FROM tbsitioturistico WHERE idsitioturistico=".$idsitioturistico.";";

			$result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;

		}

		

	}
?>