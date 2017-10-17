<?php

	class Actividad{

		private $idActividad;
    	private $nombreActividad;
   		private $descripcionActividad;
    	private $estadoActividad;
   	 	private $cantidadPersonasActividad;
	    private $lugarActividad;
	    private $distanciaHospedajeActividad;
	    private $habilidadesActividad;
	    private $horarioActividad;
	    private $idSitio;
	    private $idTipoActividad;
	    private $precioActividad;
	    private $estadoAgregado;
	    

	     function Actividad($idActividad,$nombreActividad,$descripcionActividad,$estadoActividad,$cantidadPersonasActividad,$lugarActividad, $distanciaHospedajeActividad,$habilidadesActividad,$horarioActividad,$idSitio,$idTipoActividad,$precioA,$estadoAgregado) {

	        $this->idActividad=$idActividad;
	        $this->nombreActividad = $nombreActividad;
	        $this->descripcionActividad = $descripcionActividad;
	        $this->estadoActividad = $estadoActividad;
	        $this->cantidadPersonasActividad = $cantidadPersonasActividad;
	        $this->lugarActividad = $lugarActividad;
	        $this->distanciaHospedajeActividad = $distanciaHospedajeActividad;
	        $this->habilidadesActividad = $habilidadesActividad;
	        $this->horarioActividad = $horarioActividad;
	        $this->idSitio=$idSitio;
	        $this->idTipoActividad=$idTipoActividad;
	        $this->precioActividad=$precioA;
	       	$this->estadoAgregado=$estadoAgregado;
	    }

	    public function getIdActividad() {
	        return $this->idActividad;
	    }

	    public function getNombreActividad() {
	        return $this->nombreActividad;
	    }

	    public function getDescripcionActividad() {
	        return $this->descripcionActividad;
	    }

	    public function getEstadoActividad()  {
	        return $this->estadoActividad;
	    }

	    public function getCantidadPersonasActividad(){
	        return $this->cantidadPersonasActividad;
	    }

	    public function getLugarActividad(){
	        return $this->lugarActividad;
	    }

	    public function getDistanciaHospedajeActividad(){
	        return $this->distanciaHospedajeActividad;
	    }

	    public function getHabilidadesActividad(){
	        return $this->habilidadesActividad;
	    }

	    public function getHorarioActividad(){
	        return $this->horarioActividad;
	    }

	    public function getIdSitioActividad(){
	    	return $this->idSitio;
	    }	

	    public function getIdTipoActividadSitio(){
	    	return $this->idTipoActividad;
	    }

	    public function setEstadoAgregado($estado){
    		$this->estadoAgregado=$estado;
		}

		public function getEstadoAgregado(){
	    	return $this->estadoAgregado;
	    }

	    public function getPrecioActividad() {
	        return $this->precioActividad;
	    }

	}

	
?>