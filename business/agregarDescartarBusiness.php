<?php
	
	include '../data/dataPaqueteActividad.php';
	
	class AgregarDescartarBusiness{

		private $dataPaqueteActividad=null;

		public function AgregarDescartarBusiness(){

			$this->dataPaqueteActividad = new DataPaqueteActividad();
		}

		public function agregarActividadPaquete(){
			include_once '../domain/paqueteActividad.php';
			$idpaquete=$_POST['idpaquete'];
			$idactividad=$_POST['idactividad'];
			return $this->dataPaqueteActividad->agregarActividadPaquete($idpaquete,$idactividad);
		}

		public function descartarActividadPaquete(){
			$idactividad=$_POST['idactividad'];
			$idpaquete=$_POST['idpaquete'];
			return $this->dataPaqueteActividad->descartarActividadPaquete($idpaquete,$idactividad);
		}		

	}
?>

<?php

	$op = $_POST['opcion'];
	$agregarDescartar = new AgregarDescartarBusiness;
	if($op == 1){
	 	$agregarDescartar->agregarActividadPaquete();
	}
	else if($op == 2){
	 	$agregarDescartar->descartarActividadPaquete();
	}
	
?>