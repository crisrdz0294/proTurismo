<?php

	include '../data/dataTipoActividad.php';

	class TipoActividadBusiness{

		private $dataTipoActividad=null;

		public function TipoActividadBusiness(){
			$this->dataTipoActividad = new DataTipoActividad();
		}

		public function insertarTipoActividad($tipoActividad){
			return $this->dataTipoActividad->insertarTipoActividad($tipoActividad);
		}

		public function mostrarTodosTiposActividades(){
			return $this->dataTipoActividad->mostrarTodosTiposActividades();
		}

		public function actualizarTipoActividad($tipoActividad){
			return $this->dataTipoActividad->actualizarTiposActividades($tipoActividad);
		}

		public function eliminarTipoActividad($idTipoActividad){
			return $this->dataTipoActividad->eliminarTipoActividad($idTipoActividad);
		}
	}
  ?>