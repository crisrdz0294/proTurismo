<?php


class ServicioHabitacion {
    private $idHabitacion;
   private $camaHabitacion;
   private $internetHabitacion;
   private $aireAcondicionadoHabitacion;
   private $cableHabitacion;
   private $cantidadCamasHabitacion;
   private $ventiladorHabitacion;
   private $vistaHabitacion;
   private $cantidadPersonasHabitacion;
   private $cantidadCuartosHabitacion;
   private $banosHabitacion;
   private $accesibilidadHabitacion;
   private $idSitio;
   

   function ServicioHabitacion($cama,$internet,$ac,$cable,$id,$cantidadCamasHabitacion,$ventiladorHabitacion,$vistaHabitacion,$cantidadPersonasHabitacion,$cantidadCuartosHabitacion,$banosHabitacion,$accesibilidadHabitacion,$idsitio){
       $this->camaHabitacion=$cama;
       $this->internetHabitacion=$internet;
       $this->aireAcondicionadoHabitacion=$ac;
       $this->cableHabitacion=$cable;
       $this->idHabitacion=$id;
       $this->cantidadCamasHabitacion=$cantidadCamasHabitacion;
       $this->ventiladorHabitacion=$ventiladorHabitacion;
       $this->vistaHabitacion=$vistaHabitacion;

       $this->cantidadPersonasHabitacion=$cantidadPersonasHabitacion;
       $this->cantidadCuartosHabitacion=$cantidadCuartosHabitacion;

       $this->banosHabitacion=$banosHabitacion;
       $this->accesibilidadHabitacion=$accesibilidadHabitacion;
       $this->idSitio=$idsitio;
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




   function  setCantidadCuartosHabitacion($id){
       $this->cantidadCuartosHabitacion=$id;
   }

   function getCantidadCuartosHabitacion(){
       return $this->cantidadCuartosHabitacion;
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

   function setIdSitio($id){
     $this->idSitio=$id;
   }

   function getIdSitio(){
     return $this->idSitio;
   }


}
