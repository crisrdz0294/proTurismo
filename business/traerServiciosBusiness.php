<?php
	
	include_once '../data/servicioAlimentacionData.php';
	include_once '../data/servicioHabitacionData.php';
	include_once '../data/servicioTransporteData.php';
	include_once '../data/dataServicios.php';

	class TraerServiciosBusiness{
		private $dataAlimentacion=null;
		private $dataHabitacion=null;
		private $dataTransporte=null;
		private $dataServicios=null;

		public function MostrarServiciosBusiness(){

			$this->dataAlimentacion = new ServicioAlimentacionData();
			$this->dataHabitacion = new ServicioHabitacionData();
			$this->dataTransporte = new ServicioTransporteData();
			$this->dataServicios = new DataServicios();
		}

		function Convertir_UTF8($array){
			foreach ($array as $key => $value) {
				$array[$key] = utf8_encode($value);
			}
			return $array;
		}

		public function obtenerServiciosAlimentacion(){}
		public function obtenerServiciosTransporte(){}
		public function obtenerServiciosHospedaje(){}
	}
		//$paquete = TraerPaqueteTuristicoBusiness::Convertir_UTF8($paquete);
		//echo "".json_encode($paquete).""; dentro de cada metodo
	
?>