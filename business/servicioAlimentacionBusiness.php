<?php

	include '../data/servicioAlimentacionData.php';

	class ServicioAlimentacionBusiness{

		private $servicioAlimentacionData=null;
		

		public function ServicioAlimentacionBusiness(){
			$this->servicioAlimentacionData = new ServicioAlimentacionData();
		}



		public function insertarServicioAlimentacion($servicioAlimentacion){
			return $this->servicioAlimentacionData->insertarServicioAlimentacion($servicioAlimentacion);
		}

		public function mostrarTodosServicioAlimentacion(){
			return $this->servicioAlimentacionData->mostrarTodosServicioAlimentacion();
		}

		public function mostrarTodosSitiosTuristicos(){
			return $this->servicioAlimentacionData->mostrarTodosSitiosTuristicos();
		}

		

		public function actualizarServicioAlimentacion($servicioAlimentacion){
			return $this->servicioAlimentacionData->actualizarServicioAlimentacion($servicioAlimentacion);
		}

		public function eliminarServicioAlimentacion($servicioAlimentacion){
			return $this->servicioAlimentacionData->eliminarServicioAlimentacion($servicioAlimentacion);
		}
	}
  ?>