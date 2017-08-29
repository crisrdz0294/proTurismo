<?php
	include 'data.php';
	include '../domain/sitioTuristico.php'

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
		 	$idactividad=$sitioTuristico->getIdActividad();
		 	$idservicioalimentacion=$sitioTuristico->getIdServicioAlimentacion();
		 	$idserviciohospedaje=$sitioTuristico->getIdServicioHospedaje();
		 	$idserviciotransporte=$sitioTuristico->getIdServicioTransporte();
		 	$idtrabajocomunal=$sitioTuristico->getIdTrabajoComunal();

		 	$consultaUltimoId ="SELECT MAX(idsitioturistico) AS idsitioturistico FROM tbsitioturistico";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbsitioturistico VALUES(".$idSiguiente.",'".$nombrecomercial"','".$nombreresponsable."','".$telefonositio."',".$idprovincia.",".$idcanton.",".$iddistrito.",'".$direccionexacta."',".$idactividad",".$idservicioalimentacion.",".$idserviciohospedaje.",".$idserviciotransporte.",".$idtrabajocomunal.");";

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
            	$sitioTuristicoTemporal = new SitioTuristico($row['idsitioturistico'],$row['nombrecomercial'],$row['nombreresponsable'],$row['telefonositio'],$row['idprovincia'],$row['idcanton'],$row['iddistrito'],$row['direccionexacta'],$row['idactividadturistica'],$row['idservicioalimentacion'],$row['idserviciohospedaje'],$row['idserviciotransporte'],$row['idtrabajocomunal']);
            	array_push($sitiosTuristicos, $sitioTuristicoTemporal);
        	}
        	return $sitiosTuristicos;
		}
	}
?>