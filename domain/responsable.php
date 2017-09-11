<?php 
	
	class Responsable{

		private $idResponsable;
		private $cedulaResponsable;
		private $nombreResponsable;
		private $primirapellidoResponsable;
		private $segundoapellidoResponsable;
		private $telefonoResponsable;
		private $emailResponsable;


		function Responsable($idResponsable,$cedulaResponsable,$nombreResponsable,
			$primirapellidoResponsable,$segundoapellidoResponsable,$telefonoResponsable,$emailResponsable)
		{
			$this->idResponsable=$idResponsable;
			$this->cedulaResponsable=$cedulaResponsable;
			$this->nombreResponsable=$nombreResponsable;
			$this->primirapellidoResponsable=$primirapellidoResponsable;
			$this->segundoapellidoResponsable=$segundoapellidoResponsable;
			$this->telefonoResponsable=$telefonoResponsable;
			$this->emailResponsable=$emailResponsable;
		}



		public function getIdResponsable(){
			return $this->idResponsable;
		}
		public function getCedulaResponsable(){
			return $this->cedulaResponsable;
		}
		public function getNombreResponsable(){
			return $this->nombreResponsable;
		}
		public function getPrimirapellidoResponsable(){
			return $this->primirapellidoResponsable;
		}
		public function getSegundoapellidoResponsable(){
			return $this->segundoapellidoResponsable;
		}
		public function getTelefonoResponsable(){
			return $this->telefonoResponsable;
		}
		public function getEmailResponsable(){
			return $this->emailResponsable;
		}


	
	
	}
 ?>