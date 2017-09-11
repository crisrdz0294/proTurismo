<?php

class ServicioTransporte {
    
    private $idServicioTransporte;
    private $origenServicioTransporte;
    private $destinoServicioTransporte;
    private $kilometrosServicioTransporte;
    private $tipoCarreteraServicioTransporte;
    private $tipoVehiculoServicioTransporte;
    private $precioServicioTransporte;
    private $cantidadPersonasServicioTransporte;

    private $sitioTuristico;


   function ServicioTransporte($idServicioTransporte,$origenServicioTransporte,$destinoServicioTransporte,$kilometrosServicioTransporte,$tipoCarreteraServicioTransporte,$tipoVehiculoServicioTransporte,$precioServicioTransporte, $cantidadPersonasServicioTransporte,$sitioTuristico) 
    {   
        $this->idServicioTransporte=$idServicioTransporte;
        $this->origenServicioTransporte=$origenServicioTransporte;
        $this->destinoServicioTransporte=$destinoServicioTransporte;
        $this->kilometrosServicioTransporte=$kilometrosServicioTransporte;
        $this->tipoCarreteraServicioTransporte=$tipoCarreteraServicioTransporte;
        $this->tipoVehiculoServicioTransporte=$tipoVehiculoServicioTransporte;
        $this->precioServicioTransporte=$precioServicioTransporte;
        $this->cantidadPersonasServicioTransporte=$cantidadPersonasServicioTransporte;

        $this->sitioTuristico=$sitioTuristico;
    }



    public function getIdServicioTransporte() {
        return $this->idServicioTransporte;
    }
    public function getOrigenServicioTransporte() {
        return $this->origenServicioTransporte;
    }
    public function getDestinoServicioTransporte() {
        return $this->destinoServicioTransporte;
    }
    public function getKilometrosServicioTransporte() {
        return $this->kilometrosServicioTransporte;
    }
    public function getTipoCarreteraServicioTransporte() {
        return $this->tipoCarreteraServicioTransporte;
    }
    public function getTipoVehiculoServicioTransporte() {
        return $this->tipoVehiculoServicioTransporte;
    }
    public function getPrecioServicioTransporte() {
        return $this->precioServicioTransporte;
    }
    public function getCantidadPersonasServicioTransporte() {
        return $this->cantidadPersonasServicioTransporte;
    }
    public function getSitioTuristico() {
        return $this->sitioTuristico;
    }







    public function setIdServicioTransporte($idServicioTransporte) {
        $this->idServicioTransporte = $idServicioTransporte;
    }
    public function setOrigenServicioTransporte($origenServicioTransporte) {
        $this->origenServicioTransporte = $origenServicioTransporte;
    }
    public function setDestinoServicioTransporte($destinoServicioTransporte) {
        $this->destinoServicioTransporte = $destinoServicioTransporte;
    }
    public function setKilometrosServicioTransporte($kilometrosServicioTransporte) {
        $this->kilometrosServicioTransporte = $kilometrosServicioTransporte;
    }
    public function setTipoCarreteraServicioTransporte($tipoCarreteraServicioTransporte) {
        $this->tipoCarreteraServicioTransporte = $tipoCarreteraServicioTransporte;
    }
    public function setTipoVehiculoServicioTransporte($tipoVehiculoServicioTransporte) {
        $this->tipoVehiculoServicioTransporte = $tipoVehiculoServicioTransporte;
    }
    public function setPrecioServicioTransporte($precioServicioTransporte) {
        $this->precioServicioTransporte = $precioServicioTransporte;
    }
    public function setCantidadPersonasServicioTransporte($cantidadPersonasServicioTransporte) {
        $this->cantidadPersonasServicioTransporte = $cantidadPersonasServicioTransporte;
    }





}
