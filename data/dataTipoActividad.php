<?php
	
	include_once 'data.php';
	include '../domain/turismoRural.php';
	
	class DataTipoActividad{

		public function DataTipoActividad(){}

		public function insertarTipoActividad($tipoActividadTuristica){

			$con = new Data();
			$conexion = $con->conect();

			$nombre=$tipoActividadTuristica->getNombreTipoActividadTuristica();
			$descripcion=$tipoActividadTuristica->getDescripciontipoactividadturistica();
			$estado=$tipoActividadTuristica->getEstadoactividadturistica();
			$cantidadpersonas=$tipoActividadTuristica->getCantidadPersonasActividadTuristica();
			$lugaractividad=$tipoActividadTuristica->getLugarActividadTuristica();
     		$distanciahospedaje=$tipoActividadTuristica->getDistanciaHospedajeActividadTuristica();
     		$habilidadesactividad=$tipoActividadTuristica->getHabilidadesActividadTuristica();
    		$horarioactividad=$tipoActividadTuristica->getHorarioActividadTuristica();

			$consultaUltimoId ="SELECT MAX(idtipoactividad) AS idtipoactividad FROM tbtipoactividad";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbtipoactividad VALUES (".$idSiguiente.",'".
        		$nombre."','".
        		$descripcion."',".$estado.",".$cantidadpersonas.",'".$lugaractividad."','".$distanciahospedaje."',
        		'".$habilidadesactividad."','".$horarioactividad."');";

              	$result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;
		}

		public function mostrarTodosTiposActividades(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbtipoactividad;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$tiposActividadesTuristica = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$temporaralTipoActividad = new TurismoRural($row['idtipoactividad'], $row['nombretipoactividad'], $row['descripciontipoactividad'], $row['estadotipoactividad'],$row['cantidadpersonastipoctividad'],$row['lugartipoactividad'],$row['distanciahospedajetipoactividad'],$row['habilidadestipoactividad'],$row['horariotipoactividad']);
            	array_push($tiposActividadesTuristica, $temporaralTipoActividad);
        	}
        	return $tiposActividadesTuristica;

		}

		public function actualizarTiposActividades($tipoActividad){

			$nombre=$tipoActividad->getNombreTipoActividadTuristica();
			$descripcion=$tipoActividad->getDescripciontipoactividadturistica();
			$estado=$tipoActividad->getEstadoactividadturistica();
			$cantidadpersonas=$tipoActividad->getCantidadPersonasActividadTuristica();
			$lugaractividad=$tipoActividad->getLugarActividadTuristica();
     		$distanciahospedaje=$tipoActividad->getDistanciaHospedajeActividadTuristica();
     		$habilidadesactividad=$tipoActividad->getHabilidadesActividadTuristica();
    		$horarioactividad=$tipoActividad->getHorarioActividadTuristica();

			$con = new Data();
			$conexion = $con->conect();

			 $consultaActualizar = "UPDATE tbtipoactividad SET nombretipoactividad= '".$nombre."', descripciontipoactividad='" .$descripcion. "',estadotipoactividad=" .$estado.",
			 	 cantidadpersonastipoctividad=".$cantidadpersonas.",lugartipoactividad='".$lugaractividad."',
			 	 distanciahospedajetipoactividad='".$distanciahospedaje."',habilidadestipoactividad='".$habilidadesactividad."',
			 	 horariotipoactividad='".$horarioactividad."' WHERE idtipoactividad=" . $tipoActividad->getIdtipoactividadturistica() . ";";

              	$result = mysqli_query($conexion, $consultaActualizar);
        	mysqli_close($conexion);

        	return $result;
		}

		public function eliminarTipoActividad($idTipoActividad){
			$con = new Data();
			$conexion = $con->conect();

			 $consultaEliminar = "DELETE from tbtipoactividad where idtipoactividad=" . $idTipoActividad . ";";
       		 $result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;
		}

	}
  ?>