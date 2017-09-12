<?php

include_once  'data.php';
include '../domain/tuRoom.php';
include '../domain/sitioTuristico.php';


class TuRoomData {

    function TuRoomData(){}

    public function insertTuRoom($tuRoom){
        $con= new Data();
        $conexion=$con->conect();

        $consultaUltimoId ="SELECT MAX(idserviciohospedaje) AS idserviciohospedaje FROM tbserviciohospedaje";
	       $maximoId=mysqli_query($conexion,$consultaUltimoId);
    	   $idSiguiente=1;

	       if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        }

           $internet=$tuRoom->getInternetHabitacion();
           $cable=$tuRoom->getCableHabitacion();
           $cama=$tuRoom->getCamaHabitacion();
           $aire=$tuRoom->getAireAcondicionadoHabitacion();
           $ventilador=$tuRoom->getVentiladorHabitacion();
           $vista=$tuRoom->getVistaHabitacion();
           $camas=$tuRoom->getCantidadCamasHabitacion();
           $personas=$tuRoom->getCantidadPersonasHabitacion();
           $acceso=$tuRoom->getAccesibilidadHabitacion();
           $banos=$tuRoom->getBanosHabitacion();
           $idSitio=$tuRoom->getIdSitio();

           $consultaInsertar="INSERT INTO tbserviciohospedaje
            VALUES (".$idSiguiente.",
            '".$cama."',
            ".$internet.",
            ".$cable.",
            ".$aire.",
            ".$ventilador.",
            ".$camas.",
            ".$personas.",
            '".$vista."',
            ".$banos.",
            ".$acceso.",
            ".$idSitio.");";

          $result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;

    }

    public function mostrarHabitaciones(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbserviciohospedaje;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$tuRoom = [];
        	while ($row = mysqli_fetch_array($result)) {

            	$temporalHabitacion = new TuRoom(
              $row['tipocamaserviciohospedaje'],
               $row['internetserviciohospedaje'],
                $row['aireacondicionadoserviciohospedaje'],
                $row['cableserviciohospedaje'],
                $row['idserviciohospedaje'],
                  $row['cantidadcamasserviciohospedaje'],

               $row['ventiladorserviciohospedaje'],
                       $row['vistaserviciohospedaje'],
               $row['cantidadpersonasserviciohospedaje'],

                $row['banosserviciohospedaje'],
                $row['accesibilidadserviciohospedaje'],
                $row['idsitioturistico']);
            	array_push($tuRoom, $temporalHabitacion);
        	}
        	return $tuRoom;

		}


		public function actualizarHabitacion($tuRoom){

			$con = new Data();
			$conexion = $con->conect();
                 $idRoom=$tuRoom->getIdHabitacion();
                 $internet=$tuRoom->getInternetHabitacion();
                 $cable=$tuRoom->getCableHabitacion();
                 $cama=$tuRoom->getCamaHabitacion();
                 $aire=$tuRoom->getAireAcondicionadoHabitacion();
                 $ventilador=$tuRoom->getVentiladorHabitacion();
                 $vista=$tuRoom->getVistaHabitacion();
                 $camas=$tuRoom->getCantidadCamasHabitacion();
                 $personas=$tuRoom->getCantidadPersonasHabitacion();
                 $acceso=$tuRoom->getAccesibilidadHabitacion();
                 $banos=$tuRoom->getBanosHabitacion();
                 $idSitio=$tuRoom->getIdSitio();


			 $consultaActualizar = "UPDATE tbserviciohospedaje SET tipocamaserviciohospedaje= '".$cama."',
        internetserviciohospedaje =". $internet.",
        cableserviciohospedaje=".$cable.",
        aireacondicionadoserviciohospedaje=".$aire.",
        ventiladorserviciohospedaje=".$ventilador.",
      cantidadcamasserviciohospedaje=".$camas.",
      cantidadpersonasserviciohospedaje=".$personas.",
      vistaserviciohospedaje='".$vista."',
      banosserviciohospedaje=".$banos.",
      accesibilidadserviciohospedaje	=".$acceso.",
      idsitioturistico=".$idSitio."  WHERE idserviciohospedaje=".$idRoom.";";

              	$result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}

		public function eliminarHabitacion($idTuRoom){
			$con = new Data();
			$conexion = $con->conect();

			 $consultaEliminar = "DELETE from tbserviciohospedaje where idserviciohospedaje=" . $idTuRoom . ";";
       		 $result = mysqli_query($conexion, $consultaEliminar);
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

}
