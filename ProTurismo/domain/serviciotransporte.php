<?php

class ServicioTransporte {
    
    private $idServicioTransporte;
    private $precioServicioTransporte;
    private $lugarSalidaServicioTransporte;
    private $cantidadPersonasServicioTransporte;

   function ServicioTransporte($idServicioTransporte,$precioServicioTransporte, $lugarSalidaServicioTransporte, $cantidadPersonasServicioTransporte) 
    {   
        $this->idServicioTransporte=$idServicioTransporte;
        $this->precioServicioTransporte=$precioServicioTransporte;
        $this->lugarSalidaServicioTransporte=$lugarSalidaServicioTransporte;
        $this->cantidadPersonasServicioTransporte=$cantidadPersonasServicioTransporte;
    }



    public function getIdServicioTransporte() {
        return $this->idServicioTransporte;
    }
    public function getPrecioServicioTransporte() {
        return $this->precioServicioTransporte;
    }
    public function getLugarSalidaServicioTransporte() {
        return $this->lugarSalidaServicioTransporte;
    }

    public function getCantidadPersonasServicioTransporte() {
        return $this->cantidadPersonasServicioTransporte;
    }

    public function setIdServicioTransporte($idServicioTransporte) {
        $this->idServicioTransporte = $idServicioTransporte;
    }
    public function setPrecioServicioTransporte($precioServicioTransporte) {
        $this->precioServicioTransporte = $precioServicioTransporte;
    }
   public function setLugarSalidaServicioTransporte($lugarSalidaServicioTransporte) {
        $this->lugarSalidaServicioTransporte = $lugarSalidaServicioTransporte;
    }

    public function setCantidadPersonasServicioTransporte($cantidadPersonasServicioTransporte) {
        $this->cantidadPersonasServicioTransporte = $cantidadPersonasServicioTransporte;
    }





}
