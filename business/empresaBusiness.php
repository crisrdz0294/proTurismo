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


	}
  ?>
