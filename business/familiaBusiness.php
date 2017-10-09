<?php

include_once '../data/familiaData.php';


class FamiliaBusiness {

    private $familia;

    public function FamiliaBusiness(){
        $this->familia= new FamiliaData();

    }
		public function insertarFamilias($familia){
			return $this->familia->insertarFamilia($familia );
		}

		public function mostrarFamilias(){
			return $this->familia->mostrarTodosFamilias();
		}


		public function mostrarTodosResponsable()
		{return $this->familia->mostrarTodosResponsable();}


		public function mostrarTodosSitiosTuristicos(){
			return $this->familia->mostrarTodosSitiosTuristicos();
		}


		public function actualizarFamilias($familia){
			return $this->familia->actualizarFamilia($familia);
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
