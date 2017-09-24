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
			return $this->paqueteTuristicoData->mostrarTodosPaqueteTuristicos();
		}


		public function actualizarPaqueteTuristico($paqueteTuristico){
			return $this->paqueteTuristicoData->actualizarPaqueteTuristico($paqueteTuristico);
		}

	}
  ?>