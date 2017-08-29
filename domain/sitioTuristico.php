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
		private $idactividad;
		private $idservicioalimentacion;
		private $idserviciohospedaje;
		private $idserviciotransporte;
		private $idtrabajocomunal;

		function SitioTuristico($idsitio,$nombrecomercial,$nombreresponsable,$telefonositio,$idprovincia,$idcanton,$iddistrito,$direccionexacta,$idactividad,$idservicioalimentacion,$idserviciohospedaje,$idserviciotransporte,$idtrabajocomunal){

			 $this->idsitio=$idsitio;
			 $this->nombrecomercial=$nombrecomercial;
			 $this->nombreresponsable=$nombreresponsable;
			 $this->telefonositio=$telefonositio;
			 $this->idprovincia=$idprovincia;
			 $this->idcanton=$idcanton;
			 $this->iddistrito=$iddistrito;
			 $this->direccionexacta=$direccionexacta;
			 $this->idactividad=$idactividad;
			 $this->idservicioalimentacion=$idservicioalimentacion;
			 $this->idserviciohospedaje=$idserviciohospedaje;
			 $this->idserviciotransporte=$idserviciotransporte;
			 $this->idtrabajocomunal=$idtrabajocomunal;
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
    	public function getIdActividad() {
        	return $this->idactividad;
    	}
    	public function getIdServicioAlimentacion() {
        	return $this->idservicioalimentacion;
    	}
    	public function getIdServicioHospedaje() {
        	return $this->idserviciohospedaje;
    	}
    	public function getIdServicioTransporte() {
        	return $this->idserviciotransporte;
    	}
    	public function getIdTrabajoComunal() {
        	return $this->idtrabajocomunal;
    	}

	}
  ?>