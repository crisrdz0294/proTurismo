<?php

	include_once 'data.php';
	include '../domain/trabajoComunal.php';

	class DataTrabajoComunal{

		public function DataTrabajoComunal(){}

		public function insertarTrabajoComunal($trabajoComunal){
			
			$con = new Data();
			$conexion = $con->conect();

			$consultaUltimoId ="SELECT MAX(idtrabajocomunal) AS idtrabajocomunal FROM tbtrabajocomunal";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$nombre=$trabajoComunal->getNombreTrabajoComunal();
        	$descripcion=$trabajoComunal->getDescripcionTrabajoComunal();
        	$actividades=$trabajoComunal->getActividadesTrabajoComunal();
        	$requisitos=$trabajoComunal->getRequisitosTrabajoComunal();
        	$direccion=$trabajoComunal->getDireccionTrabajoComunal();
        	$idSitio=$trabajoComunal->getIdSitioTrabajoComunal();

        	$consultaInsertar="INSERT INTO tbtrabajocomunal values (".$idSiguiente.", '".$nombre."',
			'".$descripcion."','".$actividades."','".$requisitos."','".$direccion."',".$idSitio.");";


            $result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;

		}

		public function mostrarTodosTrabajosComunal(){

			$con = new Data();
			$conexion = $con->conect();

			$consultaMostrar = "SELECT * FROM tbtrabajocomunal;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
			$trabajosComunales = [];

			while($row = mysqli_fetch_array($result)){
				$temporalTrabajoComunal= new TrabajoComunal($row['idtrabajocomunal'],$row['nombretrabajocomunal'],
				$row['descripciontrabajocomunal'],$row['actividadestrabajocomunal'],$row['requisitostrabajocomunal'],$row['direcciontrabajocomunal'],$row['idsitioturistico']);

				array_push($trabajosComunales, $temporalTrabajoComunal);
			}

			return $trabajosComunales;

		}


		public function actualizarTrabajoComunal($trabajoComunal){
			$con = new Data();
			$conexion = $con->conect();

			$consultaActualizar = "UPDATE tbtrabajocomunal SET nombretrabajocomunal= '".$trabajoComunal->getNombreTrabajoComunal()."', descripciontrabajocomunal= '".$trabajoComunal->getDescripcionTrabajoComunal()."', actividadestrabajocomunal = '".$trabajoComunal->getActividadesTrabajoComunal()."', requisitostrabajocomunal = '".$trabajoComunal->getRequisitosTrabajoComunal()."', direcciontrabajocomunal = '".$trabajoComunal->getDireccionTrabajoComunal()."', idsitioturistico=".$trabajoComunal->getIdSitioTrabajoComunal()." WHERE idtrabajocomunal= ".$trabajoComunal->getIdTrabajoComunal().";";

			$result= mysqli_query($conexion,$consultaActualizar);
			mysqli_close($conexion);

        	return $result;
		}


		public function eliminarTrabajoComunal($idTrabajoComunal){
			$con = new Data();
			$conexion = $con->conect();


			 $consultaEliminar = "DELETE from tbtrabajocomunal where idtrabajocomunal=" . $idTrabajoComunal . ";";
       		 $result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;

		}

	}

  ?>