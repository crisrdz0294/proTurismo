<?php
	class Canton{

		private $idcanton;
		private $nombrecanton;
		private $idprovinciaCanton;

		function Canton($idcanton,$nombre,$idprovincia){
			 $this->idcanton=$idcanton;
        	 $this->nombrecanton=$nombre;
        	 $this->idprovinciaCanton=$idprovincia;
		}

		public function getIdCanton(){
			return $this->idcanton;
		}
		
		public function getIdProvinciaCanton(){
			return $this->idprovinciaCanton;
		}
		public function getNombreCanton(){
			return $this->nombrecanton;
		}

	}
?>