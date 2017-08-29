<?php

	include '../data/servicioAlimentacionData.php';

	class ServicioAlimentacionBusiness{

		private $servicioAlimentacionData=null;

		public function ServicioAlimentacionBusiness(){
			$this->servicioAlimentacionData = new ServicioAlimentacionData();
		}



		public function insertarServicioAlimentacionData($servicioalimentacion){
			return $this->servicioAlimentacionData->insertarServicioAlimentacionData($servicioalimentacion);
		}

		public function mostrarTodosServicioAlimentacion(){
			return $this->servicioAlimentacionData->mostrarTodosServicioAlimentacion();
		}

		public function actualizarServicioAlimentacion($servicioalimentacion){
			return $this->servicioAlimentacionData->actualizarServicioAlimentacion($servicioalimentacion);
		}

		public function eliminarServicioAlimentacion($servicioalimentacion){
			return $this->servicioAlimentacionData->eliminarServicioAlimentacion($servicioalimentacion);
		}
	}
  ?>