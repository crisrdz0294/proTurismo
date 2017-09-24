<?php

	include '../data/paqueteTuristicoData.php';

	class paqueteTuristicoBusiness{

		private $paqueteTuristicoData=null;
		

		public function paqueteTuristicoBusiness(){
			$this->paqueteTuristicoData = new PaqueteTuristicoData();
		}


		public function insertarPaqueteTuristico($paqueteTuristico){
			return $this->paqueteTuristicoData->insertarPaqueteTuristico($paqueteTuristico);
		}

		public function mostrarTodosPaqueteTuristico(){
			return $this->PaqueteTuristicoData->mostrarTodosPaqueteTuristico();
		}


		public function actualizarPaqueteTuristico($paqueteTuristico){
			return $this->paqueteTuristicoData->actualizarPaqueteTuristico($paqueteTuristico);
		}

		public function eliminarPaqueteTuristico($paqueteTuristico){
			return $this->paqueteTuristicoData->eliminarPaqueteTuristico($paqueteTuristico);
		}
	}
  ?>