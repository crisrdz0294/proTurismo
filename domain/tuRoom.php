<?php


class TuRoom {
    private $idHabitacion;
   private $camaHabitacion;
   private $internetHabitacion;
   private $aireAcondicionadoHabitacion;
   private $cableHabitacion;
   private $cantidadCamasHabitacion;
   private $ventiladorHabitacion;
   private $vistaHabitacion;
   private $cantidadPersonasHabitacion;
   private $banosHabitacion;
   private $accesibilidadHabitacion;
   function TuRoom($cama,$internet,$ac,$cable,$id,$cantidadCamasHabitacion,$ventiladorHabitacion,$vistaHabitacion,$cantidadPersonasHabitacion,$banosHabitacion,$accesibilidadHabitacion){
       $this->camaHabitacion=$cama;
       $this->internetHabitacion=$internet;
       $this->aireAcondicionadoHabitacion=$ac;
       $this->cableHabitacion=$cable;
       $this->idHabitacion=$id;
       $this->cantidadCamasHabitacion=$cantidadCamasHabitacion;
       $this->ventiladorHabitacion=$ventiladorHabitacion;
        $this->vistaHabitacion=$vistaHabitacion;
       $this->cantidadPersonasHabitacion=$cantidadPersonasHabitacion;
       $this->banosHabitacion=$banosHabitacion;
       $this->accesibilidadHabitacion=$accesibilidadHabitacion;
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

   function  setIdHabitacion($id){
       $this->idHabitacion=$id;
   }

   function getIdHabitacion(){
       return $this->idHabitacion;
   }

   function  setCantidadCamasHabitacion($id){
       $this->cantidadCamasHabitacion=$id;
   }

   function getCantidadCamasHabitacion(){
       return $this->cantidadCamasHabitacion;
   }

   function  setVistaHabitacion($id){
       $this->vistaHabitacion=$id;
   }

   function getVistaHabitacion(){
       return $this->vistaHabitacion;
   }
   function  setCantidadPersonasHabitacion($id){
       $this->cantidadPersonasHabitacion=$id;
   }

   function getCantidadPersonasHabitacion(){
       return $this->cantidadPersonasHabitacion;
   }

   function  setBanosHabitacion($id){
       $this->banosHabitacion=$id;
   }

   function getBanosHabitacion(){
       return $this->banosHabitacion;
   }
   function  setAccesibilidadHabitacion($id){
       $this->accesibilidadHabitacion=$id;
   }

   function getAccesibilidadHabitacion(){
       return $this->accesibilidadHabitacion;
   }

   function  setVentiladorHabitacion($id){
       $this->accesibilidadHabitacion=$id;
   }

   function getVentiladorHabitacion(){
       return $this->accesibilidadHabitacion;
   }


}
