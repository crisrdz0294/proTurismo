<?php
	
	class TipoActividadTuristica
	{

		private $idtipoactividadturistica;
		private $nombretipoactividadturistica;
		private $descripciontipoactividadturistica;		
		private $estadotipoactividadturistica;


		function TipoActividadTuristica($idtipoactividadturistica,$nombretipoactividadturistica,$descripciontipoactividadturistica,$estadotipoactividadturistica)
		{
			$this->idtipoactividadturistica=$idtipoactividadturistica;
			$this->nombretipoactividadturistica=$nombretipoactividadturistica;
			$this->descripciontipoactividadturistica=$descripciontipoactividadturistica;			
			$this->estadotipoactividadturistica=$estadotipoactividadturistica;
		}

		public function getIdtipoactividadturistica(){
			return $this->idtipoactividadturistica;
		}

		public function getNombretipoactividadturistica(){
			return $this->nombretipoactividadturistica;
		}

		public function getDescripciontipoactividadturistica(){
			return $this->descripciontipoactividadturistica;
		}

		public function getEstadotipoactividadturistica(){
			return $this->estadotipoactividadturistica;
		}
	}
?>

