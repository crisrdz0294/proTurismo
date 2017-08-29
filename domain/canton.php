<?php
	class Canton{

		private $idcanton;
		private $nombrecanton;

		function Canton($idcanton,$nombre){
			 $this->idcanton=$idcanton;
        	 $this->nombrecanton=$nombre;
        	 $this->idprovincia=$idprovincia;
		}

		public function getIdCanton(){
			return $this->idcanton;
		}
		
		public function getNombreCanton(){
			return $this->nombrecanton;
		}
	}
?>