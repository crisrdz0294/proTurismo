<?php

class ServicioAlimentacion 
{
    
    private $idServicioAlimentacion;
    private $tiempoComidasServicioAlimentacion;
    private $descripcionAlimentacionServicioAlimentacion;
    private $precioServicioAlimentacion;
    private $adicionalesServicioAlimentacion;
    private $alimentacionllevarServicioAlimentacion;


   function ServicioAlimentacion($idServicioAlimentacion,$tiempoComidasServicioAlimentacion,$descripcionAlimentacionServicioAlimentacion,$precioServicioAlimentacion,$adicionalesServicioAlimentacion,$alimentacionllevarServicioAlimentacion) 
    {   
       $this->idServicioAlimentacion=$idServicioAlimentacion;
	   $this->tiempoComidasServicioAlimentacion=$tiempoComidasServicioAlimentacion;
	   $this->descripcionAlimentacionServicioAlimentacion=$descripcionAlimentacionServicioAlimentacion;
       $this->precioServicioAlimentacion=$precioServicioAlimentacion;
       $this->adicionalesServicioAlimentacion=$adicionalesServicioAlimentacion;
       $this->alimentacionllevarServicioAlimentacion=$alimentacionllevarServicioAlimentacion;
    }



    public function getIdServicioAlimentacion() {
        return $this->idServicioAlimentacion;
    }
   public function getTiempoComidasServicioAlimentacion() {
        return $this->tiempoComidasServicioAlimentacion;
    }

   public function getDescripcionAlimentacionServicioAlimentacion() {
        return $this->descripcionAlimentacionServicioAlimentacion;
    } 
    public function getPrecioServicioAlimentacion() {
        return $this->precioServicioAlimentacion;
    }
    public function getAdicionalesServicioAlimentacion() {
        return $this->adicionalesServicioAlimentacion;
    }
    public function getAlimentacionllevarServicioAlimentacion() {
        return $this->alimentacionllevarServicioAlimentacion;
    }






    public function setIdServicioAlimentacion($idServicioAlimentacion) {
        $this->idServicioAlimentacion = $idServicioAlimentacion;
    }
    public function setTiempoComidasServicioAlimentacion($tiempoComidasServicioAlimentacion) {
        $this->tiempoComidasServicioAlimentacion = $tiempoComidasServicioAlimentacion;
    }


    public function setDescripcionAlimentacionServicioAlimentacion($descripcionAlimentacionServicioAlimentacion) {
        $this->descripcionAlimentacionServicioAlimentacion = $descripcionAlimentacionServicioAlimentacion;
    }
    public function setPrecioServicioAlimentacion($precioServicioAlimentacion) {
        $this->precioServicioAlimentacion = $precioServicioAlimentacion;
    }
    public function setAdicionalesServicioAlimentacion($adicionalesServicioAlimentacion) {
        $this->adicionalesServicioAlimentacion = $adicionalesServicioAlimentacion;
    }
    public function setAlimentacionllevarServicioAlimentacion($alimentacionllevarServicioAlimentacion) {
        $this->alimentacionllevarServicioAlimentacion = $alimentacionllevarServicioAlimentacion;
    }



}
