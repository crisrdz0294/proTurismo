<?php 
	
	class TrabajoComunal{

		private $idTrabajoComunal;
		private $nombreTrabajoComunal;
		private $descripcionTrabajoComunal;
		private $actividadesTrabajoComunal;
		private $requisitosTrabajoComunal;
		private $direccionTrabajoComunal;
		private $idsitio;

		function TrabajoComunal($idTrabajoComunal,$nombreTrabajoComunal,$descripcionTrabajoComunal,
			$actividadesTrabajoComunal,$requisitosTrabajoComunal,$direccionTrabajoComunal,$idsitio){
			$this->idTrabajoComunal=$idTrabajoComunal;
			$this->nombreTrabajoComunal=$nombreTrabajoComunal;
			$this->descripcionTrabajoComunal=$descripcionTrabajoComunal;
			$this->actividadesTrabajoComunal=$actividadesTrabajoComunal;
			$this->requisitosTrabajoComunal=$requisitosTrabajoComunal;
			$this->direccionTrabajoComunal=$direccionTrabajoComunal;
			$this->idsitio=$idsitio;
		}

		public function getIdTrabajoComunal(){
			return $this->idTrabajoComunal;
		}

		public function getNombreTrabajoComunal(){
			return $this->nombreTrabajoComunal;
		}

		public function getDescripcionTrabajoComunal(){
			return $this->descripcionTrabajoComunal;
		}

		public function getActividadesTrabajoComunal(){
			return $this->actividadesTrabajoComunal;
		}

		public function getRequisitosTrabajoComunal(){
			return $this->requisitosTrabajoComunal;
		}

		public function getDireccionTrabajoComunal(){
			return $this->direccionTrabajoComunal;
		}

		public function setNombreTrabajoComunal($nombreTrabajoComunal){
			$this->nombreTrabajoComunal=$nombreTrabajoComunal;
		}

		public function setDescripcionTrabajoComunal($descripcionTrabajoComunal){
			$this->descripcionTrabajoComunal=$descripcionTrabajoComunal;
		}

		public function setActividadesTrabajoComunal($actividadesTrabajoComunal){
			$this->actividadesTrabajoComunal=$actividadesTrabajoComunal;
		}

		public function setRequisitosTrabajoComunal($requisitosTrabajoComunal){
			$this->requisitosTrabajoComunal=$requisitosTrabajoComunal;
		}

		public function setDireccionTrabajoComunal($direccionTrabajoComunal){
			$this->direccionTrabajoComunal=$direccionTrabajoComunal;
		}

		public function getIdSitioTrabajoComunal(){
			return $this->idsitio;
		}
	}
 ?>