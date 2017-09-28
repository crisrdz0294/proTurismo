<?php
	
	include_once 'data.php';
	include '../domain/actividad.php';

	class DataActividad{

		public function DataActividad(){}

		public function insertarActividad($actividad){
			$con = new Data();
			$conexion = $con->conect();

			$nombre=$actividad->getNombreActividad();
			$descripcion=$actividad->getDescripcionActividad();
			$estado=$actividad->getEstadoActividad();
			$cantidadPersonas=$actividad->getCantidadPersonasActividad();
			$lugarActivdad=$actividad->getLugarActividad();
			$distanciaHospedaje=$actividad->getDistanciaHospedajeActividad();
			$horarioActividad=$actividad->getHorarioActividad();
			$idSitio=$actividad->getIdSitioActividad();
			$idTipoActividad=$actividad->getIdTipoActividadSitio();
			$habilidadesActividad=$actividad->getHabilidadesActividad();

			$consultaUltimoId ="SELECT MAX(idactividad) AS idactividad FROM tbactividad";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbactividad VALUES(".$idSiguiente.",'".$nombre."','".$descripcion."',".$estado.",".$cantidadPersonas.",'".$lugarActivdad."','".$distanciaHospedaje."','".$habilidadesActividad."','".$horarioActividad."',".$idSitio.",".$idTipoActividad.");";

        	$result = mysqli_query($conexion, $consultaInsertar);
        	mysqli_close($conexion);
        	return $result;

        }

        public function mostrarTodasActividades(){

        	$con= new Data();
			$conexion=$con->conect();

			$consultaMostrar="SELECT * FROM tbactividad;";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$actividades = array();

        	while($row = mysqli_fetch_array($result)){
        		$temporalActividad=new Actividad($row['idactividad'],$row['nombreactividad'],$row['descripcionactividad'],$row['estadoactividad'],$row['cantidadpersonasactividad'],$row['lugaractividad'],$row['distanciahospedajeactividad'],$row['habilidadesactividad'],$row['horarioactividad'],$row['idsitioturistico'],$row['idtipoactividad'],0);

        		array_push($actividades,$temporalActividad);
        	}

        	return $actividades;
        }

        public function actualizarActividad($actividad){
			$con = new Data();
			$conexion = $con->conect();

			$nombre=$actividad->getNombreActividad();
			$descripcion=$actividad->getDescripcionActividad();
			$estado=$actividad->getEstadoActividad();
			$cantidadPersonas=$actividad->getCantidadPersonasActividad();
			$lugarActivdad=$actividad->getLugarActividad();
			$distanciaHospedaje=$actividad->getDistanciaHospedajeActividad();
			$horarioActividad=$actividad->getHorarioActividad();
			$idSitio=$actividad->getIdSitioActividad();
			$idTipoActividad=$actividad->getIdTipoActividadSitio();
			$habilidadesActividad=$actividad->getHabilidadesActividad();
			$id=$actividad->getIdActividad();

			$consultaActualizar = "UPDATE tbactividad SET  nombreactividad= '".$nombre."', descripcionactividad= '".$descripcion."', estadoactividad = ".$estado.", cantidadpersonasactividad = ".$cantidadPersonas.", lugaractividad = '".$lugarActivdad."', distanciahospedajeactividad='".$distanciaHospedaje."',habilidadesactividad='".$habilidadesActividad."',horarioactividad='".$horarioActividad."',idsitioturistico=".$idSitio.",idtipoactividad=".$idTipoActividad." WHERE idactividad= ".$id.";";
		
			$result= mysqli_query($conexion,$consultaActualizar);
			mysqli_close($conexion);

        	return $result;
		}


		public function eliminarActividad($idactividad){
			$con = new Data();
			$conexion = $con->conect();


			 $consultaEliminar = "DELETE from tbactividad where idactividad=" . $idactividad . ";";
       		 $result = mysqli_query($conexion, $consultaEliminar);
        	mysqli_close($conexion);

        	return $result;

		}

	}
?>