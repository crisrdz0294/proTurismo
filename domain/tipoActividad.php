<?php
	
	class TipoActividad{

		private $idTipoActividad;
		private $nombreTipoActividad;
		private $descripcionTipoActividad;

		function TipoActividad($id,$nombre,$descripcion){
			$this->idTipoActividad=$id;
			$this->nombreTipoActividad=$nombre;
			$this->descripcionTipoActividad=$descripcion;
		}

		public function getIdTipoActividad(){
			return $this->idTipoActividad;
		}

		public function getNombreTipoActividad(){
			return $this->nombreTipoActividad;
		}

		public function getDescripcionTipoActividad(){
			return $this->descripcionTipoActividad;
		}
	}
?>