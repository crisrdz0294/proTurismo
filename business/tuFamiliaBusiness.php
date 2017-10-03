<?php

include_once '../data/tuFamiliaData.php';


class TuFamiliaBusiness {

    private $familia;

    public function TuFamiliaBusiness(){
        $this->familia= new TuFamiliaData();

    }
		public function insertarFamilias($tuFamilia){
			return $this->familia->insertarFamilia($tuFamilia );
		}

		public function mostrarFamilias(){
			return $this->familia->mostrarTodosFamilias();
		}


		public function mostrarTodosResponsable()
		{return $this->familia->mostrarTodosResponsable();}


		public function mostrarTodosSitiosTuristicos(){
			return $this->familia->mostrarTodosSitiosTuristicos();
		}


		public function actualizarFamilias($tuFamilia){
			return $this->familia->actualizarFamilia($tuFamilia);
		}

		public function eliminarFamilias($idFamilia){
			return $this->familia->eliminarFamilia($idFamilia);
		}

    public function obtenerResponsablesDisponibles(){

      $listaResponsables= $this->familia->mostrarTodosResponsable();
      $listaMicro=$this->familia->mostrarEmpresas();
      $listaFamilia=$this->familia->mostrarTodosFamilias();

      $disponibles=array();
      $ocupadoMicro=false;
      $ocupadoFamilia=false;

      for($i=0;$i<count($listaResponsables);$i++){


        for($j=0;$j<count($listaMicro);$j++){


          if($listaMicro[$j]->getIdResponsableEmpresa()==$listaResponsables[$i]->getIdResponsable()){
               $ocupadoMicro=true;

          }
        }
        for($s=0;$s<count($listaFamilia);$s++){

          if($listaFamilia[$s]->getIdResponsable()==$listaResponsables[$i]->getIdResponsable()){
               $ocupadoFamilia=true;

          }
        }

        if( $ocupadoMicro==false&&$ocupadoFamilia==false){
           array_push($disponibles,$listaResponsables[$i]);
        }

       $ocupadoMicro=false;
      $ocupadoFamilia=false;

      }

      return $disponibles;

    }

    public function obtenerResponsablesDisponiblesMasActual($id){

      $listaResponsables= $this->familia->mostrarTodosResponsable();
      $listaMicro=$this->familia->mostrarEmpresas();
      $listaFamilia=$this->familia->mostrarTodosFamilias();

      $disponibles=array();
      $ocupadoMicro=false;
      $ocupadoFamilia=false;

      for($i=0;$i<count($listaResponsables);$i++){


        for($j=0;$j<count($listaMicro);$j++){


          if($listaMicro[$j]->getIdResponsableEmpresa()==$listaResponsables[$i]->getIdResponsable()){
               $ocupadoMicro=true;

          }
        }
        for($s=0;$s<count($listaFamilia);$s++){

          if($listaFamilia[$s]->getIdResponsable()==$listaResponsables[$i]->getIdResponsable()){
            if($listaFamilia[$s]->getIdResponsable()==$id){
              array_push($disponibles,$listaResponsables[$i]);
            }
               $ocupadoFamilia=true;

          }
        }

        if( $ocupadoMicro==false&&$ocupadoFamilia==false){
           array_push($disponibles,$listaResponsables[$i]);
        }

       $ocupadoMicro=false;
      $ocupadoFamilia=false;

      }

      return $disponibles;

    }

	}



 ?>
