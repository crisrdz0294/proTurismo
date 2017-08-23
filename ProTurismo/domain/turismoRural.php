<?php

class TurismoRural {

    private $idtipoactividadturistica;
    private $nombretipoactividadturistica;
    private $descripciontipoactividadturistica;
    private $estadoactividadturistica;
    

      function TurismoRural($idtipoactividadturistica,$nombretipoactividadturistica,$descripciontipoactividadturistica,$estadoactividadturistica) 
    {   
        $this->idtipoactividadturistica=$idtipoactividadturistica;
        $this->nombretipoactividadturistica = $nombretipoactividadturistica;
        $this->descripciontipoactividadturistica = $descripciontipoactividadturistica;
        $this->estadoactividadturistica = $estadoactividadturistica;
    }

    public function getIdtipoactividadturistica() {
        return $this->idtipoactividadturistica;
    }

    public function getNombreTipoActividadTuristica() {
        return $this->nombretipoactividadturistica;
    }

    public function getDescripciontipoactividadturistica() {
        return $this->descripciontipoactividadturistica;
    }

    public function getEstadoactividadturistica()  {
        return $this->estadoactividadturistica;
    }

    public function setIdtipoactividadturistica($idtipoactividadturistica) {
        $this->idtipoactividadturistica = $idtipoactividadturistica;
    }

    public function setNombretipoactividadturistica($nombretipoactividadturistica)  {
        $this->nombretipoactividadturistica = $nombretipoactividadturistica;
    }

    public function setDescripciontipoactividadturistica($descripciontipoactividadturistica)  {
        $this->descripciontipoactividadturistica = $descripciontipoactividadturistica;
    }

    public function setEstadoactividadturistica($estadoactividadturistica)  {
        $this->estadoactividadturistica = $estadoactividadturistica;
    }


}