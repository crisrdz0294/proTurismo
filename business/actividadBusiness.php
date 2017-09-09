<?php

	include '../data/dataActividad.php';

	class ActividadBusiness{

		private $dataActividad=null;

		public function ActividadBusiness(){
			$this->dataActividad = new DataActividad();
		}

		public function insertarActividad($actividad){
			return $this->dataActividad->insertarActividad($actividad);
		}

		public function mostrarTodasActividades(){
			return $this->dataActividad->mostrarTodasActividades();
		}

		public function actualizarActividad($actividad){
			return $this->dataActividad->actualizarActividad($actividad);
		}

		public function eliminarActividad($idActividad){
			return $this->dataActividad->eliminarActividad($idActividad);
		}
	}
  ?>