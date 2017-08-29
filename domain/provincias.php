<?php
	class Provincia{

		private $idprovincia;
		private $nombreprovincia;

		function Provincia($id,$nombre){
			 $this->idprovincia=$id;
        	 $this->nombreprovincia=$nombre;
		}

		public function getIdProvincia(){
			return $this->idprovincia;
		}

		public function getNombreProvincia(){
			return $this->nombreprovincia;
		}
	}
?>