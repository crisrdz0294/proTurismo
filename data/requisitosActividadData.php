<?php

include_once 'data.php';
include '../domain/requisitosActividad.php';
include '../domain/actividad.php';

	class requisitosActividadData{

		public function requisitosActividadData(){}

		public function insertarRequisitosActividad($requisitosActividad ){

			$con = new Data();
			$conexion = $con->conect();

			$edad=$requisitosActividad-> getEdadRequisitosActividad();
                        $conocimiento=$requisitosActividad->getConocimientoRequisitosActividad();
   			$estadoFisico=$requisitosActividad->getEstadoFisicoRequisitosActividad();
                        $equipo=$requisitosActividad->getEquipoNecesarioRequisitosActividad();
                        $aptitudes=$requisitosActividad->getAptitudesRequisitosActividad();
                        $idAct=$requisitosActividad->getIdActividad();
			$consultaUltimoId ="SELECT MAX(idrequisitos) AS idrequisitos FROM tbrequisitos";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbrequisitos VALUES (
						".$idSiguiente.",
						".$edad.",
						'".$conocimiento."',
						'".$equipo."',
						'".$estadoFisico."',
						'".$aptitudes."',
						".$idAct.");";

              	$result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;
		}

	public function mostrarTodosRequisitosActividad(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbrequisitos;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$requisitosActividad= [];
        	while ($row = mysqli_fetch_array($result)) {


            	$temporaralTipoActividad = new requisitosActividad($row['idrequisitos'], $row['edadrequisitos'], $row['conocimientorequisitos'],$row['estadofisicorequisitos'],$row['equiporequisitos'],$row['aptitudrequisitos'],$row['idactividad']);


            	array_push($requisitosActividad, $temporaralTipoActividad);
        	}
        	return $requisitosActividad;

		}

		public function actualizarRequisitosActividad($requisitosActividad){

			 $con = new Data();
			 $conexion = $con->conect();
             $id=$requisitosActividad->getIdRequisitosActividad();
             $edad=$requisitosActividad-> getEdadRequisitosActividad();
             $conocimiento=$requisitosActividad->getConocimientoRequisitosActividad();
   			 $estadoFisico=$requisitosActividad->getEstadoFisicoRequisitosActividad();
             $equipo=$requisitosActividad->getEquipoNecesarioRequisitosActividad();
             $aptitudes=$requisitosActividad->getAptitudesRequisitosActividad();
             $idAct=$requisitosActividad->getIdActividad();
			 $consultaActualizar = "UPDATE tbrequisitos SET edadrequisitos=" . $edad . ",conocimientorequisitos='" .$conocimiento."',equiporequisitos='".$equipo."',estadofisicorequisitos='".$estadoFisico."',aptitudrequisitos='".$aptitudes."',idrequisitos=".$idAct." WHERE idrequisitos=". $id.";";

              	$result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}


		public function eliminarRequisitosActividad($idRequisitosActividad){
			$con = new Data();
			$conexion = $con->conect();

			 $consultaEliminar = "DELETE from tbrequisitos where idrequisitos=" . $idRequisitosActividad . ";";
       		 $result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;
		}

		public function mostrarTodasActividades(){

			$con= new Data();
	$conexion=$con->conect();

	$consultaMostrar="SELECT * FROM tbactividad;";

	$result = mysqli_query($conexion, $consultaMostrar);
	mysqli_close($conexion);
			$actividades = [];

			while($row = mysqli_fetch_array($result)){
				$temporalActividad=new Actividad($row['idactividad'],$row['nombreactividad'],$row['descripcionactividad'],$row['estadoactividad'],$row['cantidadpersonasactividad'],$row['lugaractividad'],$row['distanciahospedajeactividad'],$row['habilidadesactividad'],$row['horarioactividad'],$row['idsitioturistico'],$row['idtipoactividad'],0);

				array_push($actividades,$temporalActividad);
			}

			return $actividades;
		}

	}
