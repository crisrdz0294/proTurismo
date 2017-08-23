<?php

class ServicioAlimentacion {
    
    private $idServicioAlimentacion;
    private $tipoAlimentacionServicioAlimentacion;
    private $tiempoComidasServicioAlimentacion;
    private $descripcionAlimentacionServicioAlimentacion;

   function ServicioAlimentacion($idServicioAlimentacion,$tipoAlimentacionServicioAlimentacion,$tiempoComidasServicioAlimentacion,$descripcionAlimentacionServicioAlimentacion) 
    {   
        $this->idServicioAlimentacion=$idServicioAlimentacion;
	   $this->tipoAlimentacionServicioAlimentacion=$tipoAlimentacionServicioAlimentacion;
	   $this->tiempoComidasServicioAlimentacion=$tiempoComidasServicioAlimentacion;
	   $this->descripcionAlimentacionServicioAlimentacion=$descripcionAlimentacionServicioAlimentacion;
    }



    public function getIdServicioAlimentacion() {
        return $this->idServicioAlimentacion;
    }
    public function getTipoAlimentacionServicioAlimentacion() {
        return $this->tipoAlimentacionServicioAlimentacion;
    }
   public function getTiempoComidasServicioAlimentacion() {
        return $this->tiempoComidasServicioAlimentacion;
    }
   public function getDescripcionAlimentacionServicioAlimentacion() {
        return $this->descripcionAlimentacionServicioAlimentacion;
    }
    


    public function setIdServicioAlimentacion($idServicioAlimentacion) {
        $this->idServicioAlimentacion = $idServicioAlimentacion;
    }
    public function setTipoAlimentacionServicioAlimentacion($tipoAlimentacionServicioAlimentacion) {
        $this->tipoAlimentacionServicioAlimentacion = $tipoAlimentacionServicioAlimentacion;
    }
    public function setTiempoComidasServicioAlimentacion($tiempoComidasServicioAlimentacion) {
        $this->tiempoComidasServicioAlimentacion = $tiempoComidasServicioAlimentacion;
    }
    public function setDescripcionAlimentacionServicioAlimentacion($descripcionAlimentacionServicioAlimentacion) {
        $this->descripcionAlimentacionServicioAlimentacion = $descripcionAlimentacionServicioAlimentacion;
    }





}
