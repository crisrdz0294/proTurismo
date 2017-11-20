<?php

	include '../data/dataSitioTuristico.php';

	class SitioTuristicoBusiness{

		private $dataSitioTuristico=null;

		public function SitioTuristicoBusiness(){
			$this->dataSitioTuristico=new DataSitioTuristico();
		}

		public function insertarSitioTuristico($sitioTuristico,$imagenes){
			return $this->dataSitioTuristico->insertarSitioTuristico($sitioTuristico,$imagenes);
		}

		public function mostrarTodosSitiosTuristicos(){
			return $this->dataSitioTuristico->mostrarTodosSitiosTuristicos();
		}

		public function actualizarSitioTuristico($sitioTuristico){
			return $this->dataSitioTuristico->actualizarSitioTuristico($sitioTuristico);
		}

		public function eliminarSitioTuristico($idsitioturistico){
			return $this->dataSitioTuristico->eliminarSitioTuristico($idsitioturistico);
		}
	}

 ?>