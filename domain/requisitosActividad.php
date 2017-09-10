<?php


class requisitosActividad {
    
    private $idRequisitosActividad;
    private $edadRequisitosActividad;
    private $conocimientoRequisitosActividad;
    private $estadoFisicoRequisitosActividad;
    private $equipoNecesarioRequisitosActividad;
    private $aptitudesRequisitosActividad;

   function requisitosActividad($idRequisitosActividad,$edadRequisitosActividad,$conocimientoRequisitosActividad,$estadoFisicoRequisitosActividad,$equipoNecesarioRequisitosActividad,$aptitudesRequisitosActividad) 
    {   
        $this->idRequisitosActividad=$idRequisitosActividad;
        $this->edadRequisitosActividad=$edadRequisitosActividad;
        $this->conocimientoRequisitosActividad=$conocimientoRequisitosActividad;
        $this->estadoFisicoRequisitosActividad=$estadoFisicoRequisitosActividad;
        $this->equipoNecesarioRequisitosActividad=$equipoNecesarioRequisitosActividad;
        $this->aptitudesRequisitosActividad=$aptitudesRequisitosActividad;
    }



    public function getIdRequisitosActividad() {
        return $this->idRequisitosActividad;
    }
   public function getEdadRequisitosActividad() {
        return $this->edadRequisitosActividad;
    }
    public function getConocimientoRequisitosActividad() {
        return $this->conocimientoRequisitosActividad;
    }
    public function getEstadoFisicoRequisitosActividad() {
        return $this->estadoFisicoRequisitosActividad;
    }
    public function getEquipoNecesarioRequisitosActividad() {
        return $this->equipoNecesarioRequisitosActividad;
    }
    public function getAptitudesRequisitosActividad() {
        return $this->aptitudesRequisitosActividad;
    }
    public function setIdRequisitosActividad($idRequisitosActividad) {
        $this->idRequisitosActividad = $idRequisitosActividad;
    }
    public function setEdadRequisitosActividad($edadRequisitosActividad) {
        $this->edadRequisitosActividad = $edadRequisitosActividad;
    }
    public function setConocimientoRequisitosActividad($conocimientoRequisitosActividad) {
        $this->conocimientoRequisitosActividad = $conocimientoRequisitosActividad;
    }
    public function setEstadoFisicoRequisitosActividad($estadoFisicoRequisitosActividad) {
        $this->estadoFisicoRequisitosActividad = $estadoFisicoRequisitosActividad;
    }
    public function setEquipoNecesarioRequisitosActividad($equipoNecesarioRequisitosActividad) {
        $this->equipoNecesarioRequisitosActividad = $equipoNecesarioRequisitosActividad;
    }
    public function setAptitudesRequisitosActividad($aptitudesRequisitosActividad) {
        $this->aptitudesRequisitosActividad = $aptitudesRequisitosActividad;
    }
   
}
