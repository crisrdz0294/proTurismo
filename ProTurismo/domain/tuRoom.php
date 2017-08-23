<?php


class TuRoom {
    private $idHabitacion;
   private $camaHabitacion;
   private $internetHabitacion;
   private $aireAcondicionadoHabitacion;
   private $cableHabitacion;
   private $servicioAlHabitacion;
   
   function TuRoom($cama,$internet,$ac,$cable,$servicio,$id){
       $this->camaHabitacion=$cama;
       $this->internetHabitacion=$internet;
       $this->aireAcondicionadoHabitacion=$ac;
       $this->cableHabitacion=$cable;
       $this->servicioAlHabitacion=$servicio;
       $this->idHabitacion=$id;
   }
   
   function setCamaHabitacion($cama){
       $this->camaHabitacion=$cama;
       
   }
   function getCamaHabitacion(){
       return $this->camaHabitacion;
        
   }
   function  setInternetHabitacion($inter){
       $this->internetHabitacion=$inter;
   }
   function getInternetHabitacion(){
       return $this->internetHabitacion;
   }
   
   function setAireAcondicionadoHabitacion($ac){
       $this->aireAcondicionadoHabitacion=$ac;
       
   }
   
   function  getAireAcondicionadoHabitacion(){
       return $this->aireAcondicionadoHabitacion;
   }
   
   function setCableHabitacion($cable){
       $this->cableHabitacion=$cable;
   }
   
   function  getCableHabitacion(){
       return $this->cableHabitacion;
   }
   
   function  setServicioHabitacion($servicio){
       $this->servicioAlHabitacion=$servicio;
   }
   
   function getServicioHabitacion(){
       return $this->servicioAlHabitacion;
   }
   
   function  setIdHabitacion($id){
       $this->idHabitacion=$id;
   }
   
   function getIdHabitacion(){
       return $this->idHabitacion;
   }
   
   
}
