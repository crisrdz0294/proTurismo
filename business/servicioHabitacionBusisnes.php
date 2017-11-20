<?php

include '../data/servicioHabitacionData.php';

class ServicioHabitacionBusisnes {

    private $servicioHabitacionData=null;

    public function ServicioHabitacionBusisnes(){
        $this->servicioHabitacionData = new ServicioHabitacionData();
    }

    public function insertServicioHabitacion($servicioHabitacion,$imagenes){

        return $this->servicioHabitacionData->insertServicioHabitacion($servicioHabitacion,$imagenes);
    }
    public function actualizarServicioHabitacion($servicioHabitacion){
        return $this->servicioHabitacionData->actualizarHabitacion($servicioHabitacion);
    }

    public function mostrarServicioHabitacion(){
        return $this->servicioHabitacionData->mostrarHabitaciones();
    }

    public function eliminarServicioHabitacion($id){
        return $this->servicioHabitacionData->eliminarHabitacion($id);
    }

   public function mostrarSitios(){
     return $this->servicioHabitacionData->mostrarTodosSitiosTuristicos();
   }
}
