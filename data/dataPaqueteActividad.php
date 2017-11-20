<?php
	
	include_once 'data.php';

	class DataPaqueteActividad{

		public function DataPaqueteActividad(){}

		public function agregarActividadPaquete($idpaquete,$idactividad){

			$con =new Data();
			$conexion=$con->conect();

			$precioActividad;
			$precioPaquete;

			$consultaAgregar="INSERT INTO tbpaqueteturisticoactividad VALUES(".$idpaquete.",".$idactividad.");";
			$result = mysqli_query($conexion, $consultaAgregar);

			$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}


			$consultaPrecioActividad ="SELECT precioactividad FROM tbactividad WHERE idactividad=".$idactividad."";
    		$resultPrecioActividad=mysqli_query($conexion,$consultaPrecioActividad);
    		

    		if ($row2 = mysqli_fetch_row($resultPrecioActividad)) {
        		$precioActividad = trim($row2[0]);
    		}


    		$precioNuevo=$precioPaquete+$precioActividad;

     		$consultaActualizarPrecio = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo." WHERE idpaqueteturistico= ".$idpaquete.";";
				$resultActualizarPrecio= mysqli_query($conexion,$consultaActualizarPrecio);

        	mysqli_close($conexion);
        	return $result;
		}

		public function descartarActividadPaquete($idpaquete,$idactividad){
			$con =new Data();
			$conexion=$con->conect();
			$precioActividad;
			$precioPaquete;

			$consultaDescartar = "DELETE FROM tbpaqueteturisticoactividad WHERE idpaqueteturistico = ".$idpaquete." AND idactividad = ".$idactividad.";";
			$result = mysqli_query($conexion, $consultaDescartar);
        	

        	$consultaMostrar ="SELECT preciopaqueteturistico FROM tbpaqueteturistico where idpaqueteturistico=".$idpaquete."";
    		$precioConsulta=mysqli_query($conexion,$consultaMostrar);
    		

    		if ($row = mysqli_fetch_row($precioConsulta)) {
        		$precioPaquete = trim($row[0]);
    		}


			$consultaPrecioActividad ="SELECT precioactividad FROM tbactividad WHERE idactividad=".$idactividad."";
    		$resultPrecioActividad=mysqli_query($conexion,$consultaPrecioActividad);
    		

    		if ($row2 = mysqli_fetch_row($resultPrecioActividad)) {
        		$precioActividad = trim($row2[0]);
    		}


    		$precioNuevo=$precioPaquete-$precioActividad;

     		$consultaActualizarPrecio = "UPDATE tbpaqueteturistico SET preciopaqueteturistico= ".$precioNuevo." WHERE idpaqueteturistico= ".$idpaquete.";";
				$resultActualizarPrecio= mysqli_query($conexion,$consultaActualizarPrecio);
        	mysqli_close($conexion);
        	return $result;	
		}

		public function obtenerIdActividadesPaquete(){

			$con =new Data();
			$conexion=$con->conect();
			$consultaMostrar="SELECT * FROM tbpaqueteturisticoactividad;";

			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$listaIdActividades = array();
        	$estado=true;
        	while ($row = mysqli_fetch_array($result)) {

        		$valores=array("idactividad"=>$row["idactividad"],"idpaquete"=>$row["idpaqueteturistico"]);
            	array_push($listaIdActividades, $valores);
        	}
        	return $listaIdActividades;

		}

		

	}
?>