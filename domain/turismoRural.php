<?php

class TurismoRural {

    private $idtipoactividadturistica;
    private $nombretipoactividadturistica;
    private $descripciontipoactividadturistica;
    private $estadoactividadturistica;
    private $cantidadpersonasactividadturistica;
    private $lugaractividadturistica;
    private $distanciahospedajeactividadturistica;
    private $habilidadesactividadturistica;
    private $horarioactividadturistica;
    

      function TurismoRural($idtipoactividadturistica,$nombretipoactividadturistica,$descripciontipoactividadturistica,$estadoactividadturistica,$cantidadpersonas,$lugaractividad,
        $distanciahospedajeactividad,$habilidadesactividad,$horarioactividad) {   
        $this->idtipoactividadturistica=$idtipoactividadturistica;
        $this->nombretipoactividadturistica = $nombretipoactividadturistica;
        $this->descripciontipoactividadturistica = $descripciontipoactividadturistica;
        $this->estadoactividadturistica = $estadoactividadturistica;
        $this->cantidadpersonasactividadturistica = $cantidadpersonas;
        $this->lugaractividadturistica = $lugaractividad;
        $this->distanciahospedajeactividadturistica = $distanciahospedajeactividad;
        $this->habilidadesactividadturistica = $habilidadesactividad;
        $this->horarioactividadturistica = $horarioactividad;
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

    public function getCantidadPersonasActividadTuristica(){
        return $this->cantidadpersonasactividadturistica;
    }

    public function getLugarActividadTuristica(){
        return $this->lugaractividadturistica;
    }

    public function getDistanciaHospedajeActividadTuristica(){
        return $this->distanciahospedajeactividadturistica;
    }

    public function getHabilidadesActividadTuristica(){
        return $this->habilidadesactividadturistica;
    }

    public function getHorarioActividadTuristica(){
        return $this->horarioactividadturistica;
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