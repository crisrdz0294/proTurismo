<?php
	
	include '../data/paqueteTuristicoData.php';
	
	class TraerPaqueteTuristicoBusiness{

		private $dataPaquete=null;

		public function TraerPaqueteTuristicoBusiness(){

			$this->dataPaquete = new PaqueteTuristicoData();
		}

	
		public function cargarPaqueteTuristico(){
			
			$idpaquete=$_POST['idprueba'];
			$paquete=$this->dataPaquete->mostrarPaquetePorId($idpaquete);
			$paquete = TraerPaqueteTuristicoBusiness::Convertir_UTF8($paquete);
			echo "".json_encode($paquete)."";
		}

		public function cargarPrecioPaquete(){
			$idpaquete=$_POST['idpaquete'];
			$precioPaquete=$this->dataPaquete->obtenerPrecioPaquete($idpaquete);
			$precioPaquete = TraerPaqueteTuristicoBusiness::Convertir_UTF8($precioPaquete);
			echo "".json_encode($precioPaquete)."";
		}
		
		function Convertir_UTF8($array){
			foreach ($array as $key => $value) {
				$array[$key] = utf8_encode($value);
			}
			return $array;
		}

		public function actualizarPaquete(){

			$idpaquete=$_POST['idpaquete'];
			$nombre=$_POST['nombre'];
			$descripcion=$_POST['descripcion'];
			$itinerario=$_POST['itinerario'];
			$cantidad=$_POST['cantidad'];

       		$result=$this->dataPaquete->actualizarPaqueteTuristico($idpaquete,$nombre,$descripcion,$cantidad,$itinerario);

       		if ($result == 0) {
                echo 'Exito al modificar el paquete turistico';
            }else if($result == 1){
               echo 'Fallo al modificar, hay actividades agregadas al paquete';
            }else if($result == 2){
            	echo 'Fallo al modificar, hay servicios agregadas al paquete';
            }
		}

	}

?>

<?php

	$op = $_POST['opcion'];
	$traerPaquete = new TraerPaqueteTuristicoBusiness;
	if($op == 1){
	 	$traerPaquete->cargarPaqueteTuristico();
	}else if($op == 2){
		$traerPaquete->cargarPrecioPaquete();
	}else if($op == 3){
		$traerPaquete->actualizarPaquete();
	}
	
?>