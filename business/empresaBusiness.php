<?php

	include '../data/empresaData.php';

	class EmpresaBusiness{

		private $empresaData=null;


		public function EmpresaBusiness(){
			$this->empresaData = new EmpresaData();
		}

		public function mostrarEmpresas(){
			return $this->empresaData->mostrarEmpresas();
		}

    public function insertarEmpresas($empresa){
      return $this->empresaData->insertarEmpresa($empresa);
    }
   public function eliminarEmpresas($idEmpresa){
     return $this->empresaData->eliminarEmpresas($idEmpresa);
   }
 public function actualizarEmpresa($empresa){
   return $this->empresaData->actualizarEmpresa($empresa);
 }

 public function mostrarSitios(){
	 return $this->empresaData->mostrarSitiosTuristicos();
 }
public function mostrarTodosResponsables(){
	return $this->empresaData->mostrarResponsables();
}

public function obtenerResponsablesDisponibles(){

	$listaResponsables= $this->empresaData->mostrarResponsables();
	$listaMicro=$this->empresaData->mostrarEmpresas();
	$listaFamilia=$this->empresaData->mostrarTodosFamilias();

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


	$listaResponsables= $this->empresaData->mostrarResponsables();
	$listaMicro=$this->empresaData->mostrarEmpresas();
	$listaFamilia=$this->empresaData->mostrarTodosFamilias();

	$disponibles=array();
	$ocupadoMicro=false;
	$ocupadoFamilia=false;

	for($i=0;$i<count($listaResponsables);$i++){


		for($j=0;$j<count($listaMicro);$j++){


			if($listaMicro[$j]->getIdResponsableEmpresa()==$listaResponsables[$i]->getIdResponsable()){
				if($listaMicro[$j]->getIdResponsableEmpresa()==$id){
					array_push($disponibles,$listaResponsables[$i]);
				}
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
}
  ?>
