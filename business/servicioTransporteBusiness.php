<?php

	include '../data/servicioTransporteData.php';

	class ServicioTransporteBusiness{

		private $servicioTransporteData=null;

		public function ServicioTransporteBusiness(){
			$this->servicioTransporteData = new ServicioTransporteData();
		}

		public function insertarTransporteBusiness($servicioTransporte){
			return $this->servicioTransporteData->insertarServicioTransporte($servicioTransporte);
		}

		public function mostrarTodosServicioTransporte(){
			return $this->servicioTransporteData->mostrarTodosServicioTransporte();
		}

		public function actualizarServicioTransporte($servicioTransporte){
			return $this->servicioTransporteData->actualizarServicioTransporte($servicioTransporte);
		}
		public function eliminarServicioTransporte($idServicioTransporte){
			return $this->servicioTransporteData->eliminarServicioTransporte($idServicioTransporte);
		}
	}


  ?>