<?php

include '../data/tuRoomData.php';

class TuRoomBusisnes {
   
    private $tuRoomData=null;
    
    public function TuRoomBusisnes(){
        $this->tuRoomData= new tuRoomData();
    }
    
    public function insertTuRoom($tuRoom){
        
        return $this->tuRoomData->insertTuRoom($tuRoom);
    }
    public function actualizarTuRoom($tuRoom){
        return $this->tuRoomData->actualizarHabitacion($tuRoom);
    }
    
    public function mostrarTuRoom(){
        return $this->tuRoomData->mostrarHabitaciones();
    }
    
    public function eliminarTuRoom($id){
        return $this->tuRoomData->eliminarHabitacion($id);
    }
    
}
