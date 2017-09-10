<?php
	class SitioTuristico{

		private $idsitio;
		private $nombrecomercial;
		private $telefonositio;
		private $idprovincia;
		private $idcanton;
		private $iddistrito;
		private $direccionexacta;
        private $sitioWeb;
	
		function SitioTuristico($idsitio,$nombrecomercial,$telefonositio,$idprovincia,$idcanton,$iddistrito,$direccionexacta,$sitioWeb){

			 $this->idsitio=$idsitio;
			 $this->nombrecomercial=$nombrecomercial;
			 $this->telefonositio=$telefonositio;
			 $this->idprovincia=$idprovincia;
			 $this->idcanton=$idcanton;
			 $this->iddistrito=$iddistrito;
			 $this->direccionexacta=$direccionexacta;
             $this->sitioWeb=$sitioWeb;
		}

		public function getIdSitio() {
        	return $this->idsitio;
    	}
    	public function getNombreComercial() {
        	return $this->nombrecomercial;
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

        public function getSitioWeb() {
            return $this->sitioWeb;
        }


	}
  ?>