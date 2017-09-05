<?php
	class SitioTuristico{

		private $idsitio;
		private $nombrecomercial;
		private $nombreresponsable;
		private $telefonositio;
		private $idprovincia;
		private $idcanton;
		private $iddistrito;
		private $direccionexacta;
	
		function SitioTuristico($idsitio,$nombrecomercial,$nombreresponsable,$telefonositio,$idprovincia,$idcanton,$iddistrito,$direccionexacta){

			 $this->idsitio=$idsitio;
			 $this->nombrecomercial=$nombrecomercial;
			 $this->nombreresponsable=$nombreresponsable;
			 $this->telefonositio=$telefonositio;
			 $this->idprovincia=$idprovincia;
			 $this->idcanton=$idcanton;
			 $this->iddistrito=$iddistrito;
			 $this->direccionexacta=$direccionexacta;
		}

		public function getIdSitio() {
        	return $this->idsitio;
    	}
    	public function getNombreComercial() {
        	return $this->nombrecomercial;
    	}
    	public function getNombreResponsable() {
        	return $this->nombreresponsable;
    	}
    	public function getTelefonoSitio() {
        	return $this->telefonositio;
    	}
    	public function getIdProvincia() {
        	return $this->idprovincia;
    	}
    	public function getIdCanton() {
        	return $this->idcanton;
    	}
    	public function getIdDistrito() {
        	return $this->iddistrito;
    	}
    	public function getDireccionExacta() {
        	return $this->direccionexacta;
    	}


	}
  ?>