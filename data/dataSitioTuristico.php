<?php
	include 'data.php';
	include '../domain/sitioTuristico.php';


	class DataSitioTuristico{

		public function DataSitioTuristico(){}

		public function insertarSitioTuristico($sitioTuristico){
			$con =new Data();
			$conexion=$con->conect();

			$nombrecomercial=$sitioTuristico->getNombreComercial();
		 	$telefonositio=$sitioTuristico->getTelefonoSitio();
			$idprovincia=$sitioTuristico->getIdProvincia();
		 	$idcanton=$sitioTuristico->getIdCanton();
		 	$iddistrito=$sitioTuristico->getIdDistrito();
		 	$direccionexacta=$sitioTuristico->getDireccionExacta();
		 	$sitioWeb=$sitioTuristico->getSitioWeb();

		 	$consultaUltimoId ="SELECT MAX(idsitioturistico) AS idsitioturistico FROM tbsitioturistico";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbsitioturistico VALUES (".$idSiguiente.",'".$nombrecomercial."','".$telefonositio."',".$idprovincia.",".$idcanton.",".$iddistrito.",'".$direccionexacta."','".$sitioWeb."');";



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
            	$sitioTuristicoTemporal = new SitioTuristico($row['idsitioturistico'],$row['nombrecomercialsitioturistico'],$row['telefonositioturistico'],$row['idprovinciasitioturistico'],$row['idcantonsitioturistico'],$row['iddistritositioturistico'],$row['direccionexactasitioturistico'],$row['sitiowebsitioturistico']);
            	array_push($sitiosTuristicos, $sitioTuristicoTemporal);
        	}
        	return $sitiosTuristicos;
		}

		public function actualizarSitioTuristico($sitioturistico){

			$con =new Data();
			$conexion=$con->conect();

			$nombrecomercial=$sitioturistico->getNombreComercial();
		 	$telefonositio=$sitioturistico->getTelefonoSitio();
		 	$direccionexacta=$sitioturistico->getDireccionExacta();
		 	$idsitio=$sitioturistico->getIdSitio();
		 	$sitioWeb=$sitioturistico->getSitioWeb();

		 	$consultaActualizar="UPDATE tbsitioturistico SET nombrecomercialsitioturistico='".$nombrecomercial."',telefonositioturistico='".$telefonositio."',direccionexactasitioturistico='".$direccionexacta."', sitiowebsitioturistico='".$sitioWeb."' WHERE idsitioturistico=".$idsitio.";";

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