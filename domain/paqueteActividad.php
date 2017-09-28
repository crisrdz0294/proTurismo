<?php
	
	class PaqueteActividad{

		private $idpaquete;
		private $idactividad;

		function PaqueteActividad($idpaquete,$idactividad){

			$this->idpaquete=$idpaquete;
			$this->idactividad=$idactividad;
		}

		public function getIdPaquete(){
			return $this->idpaquete;
		}

		public function getIdActividad(){
			return $this->idactividad;
		}

	}

?>