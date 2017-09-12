<?php
	include_once 'data.php';

	include '../domain/empresa.php';
	include '../domain/sitioTuristico.php';
   include '../domain/responsable.php';

	class EmpresaData{

		public function EmpresaData(){}

		public function insertarEmpresa($empresa){
			$con =new Data();
			$conexion=$con->conect();

			$nombre=$empresa->getNombreEmpresa();
      $responsable=$empresa->getIdResponsableEmpresa();
      $contacto=$empresa->getContactoTelefonicoEmpresa();
      $email=$empresa->getEmailEmpresa();
      $web=$empresa->getSitioWebEmpresa();
      $sitio=$empresa->getIdSitioTuristico();



		 	$consultaUltimoId ="SELECT MAX(idmicroempresa ) AS idmicroempresa  FROM tbmicroempresa ";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbmicroempresa  VALUES (
            ".$idSiguiente.",
            '".$nombre."',
            '".$contacto."',
            '".$email."',
             '".$web."',
            '.$sitio.',
					'.$responsable.');";



             $result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;

		}

		public function mostrarEmpresas(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbmicroempresa ;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$empresas = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$empresaNueva = new Empresa($row['idmicroempresa'],$row['nombremicroempresa'],$row['contactotelefonomicroempresa'],$row['emailmicroempresa'],$row['sitiowebmicroempresa'],$row['idsitioturistico'],$row['idresponsable']);
            	array_push($empresas, $empresaNueva);
        	}
        	return $empresas;
		}

		public function actualizarEmpresa($empresa){

			$con =new Data();
			$conexion=$con->conect();
       $id=$empresa->getIdEmpresa();
      $nombre=$empresa->getNombreEmpresa();
      $responsable=$empresa->getIdResponsableEmpresa();
      $contacto=$empresa->getContactoTelefonicoEmpresa();
      $email=$empresa->getEmailEmpresa();
      $web=$empresa->getSitioWebEmpresa();
      $sitio=$empresa->getIdSitioTuristico();

		 	$consultaActualizar="UPDATE tbmicroempresa SET
			 nombremicroempresa='".$nombre."',
			 responsablemicroempresa ='".$responsable."',
      contactotelefonomicroempresa ='".$contacto."',
      emailmicroempresa='".$email."',
       sitiowebmicroempresa ='".$web."',
        	idsitioturistico =".$sitio."
       WHERE idmicroempresa=".$id.";";

		 		$result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;

		}

		public function eliminarEmpresas($idEmpresa){

			$con =new Data();
			$conexion=$con->conect();

			$consultaEliminar="DELETE FROM tbmicroempresa WHERE idmicroempresa =".$idEmpresa.";";

			$result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;

		}

		public function mostrarSitiosTuristicos(){

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

	public function mostrarResponsables(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbresponsable;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);

			$responsable = [];
			while ($row = mysqli_fetch_array($result)) {
					$temporaralResponsable = new Responsable(

							$row['idresponsable'],
							$row['cedularesponsable'],
							$row['nombreresponsable'],
							$row['primerapellidoresponsable'],
							$row['segundoapellidoresponsable'],
							$row['telefonoresponsable'],
							$row['emailresponsable']
					);

					array_push($responsable, $temporaralResponsable);
			}
			return $responsable;
	}

}
?>
