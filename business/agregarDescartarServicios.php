<?php
	
	include '../data/dataPaqueteServicios.php';
	
	class AgregarDescartarServiciosBusiness{

		private $dataPaqueteServicios=null;
	
		public function AgregarDescartarServiciosBusiness(){

			$this->dataPaqueteServicios = new DataPaqueteServicios();
		}

		public function agregarServicioAlimentacion(){
			
			$idpaquete=$_POST['idpaquete'];
			$idservicio=$_POST['idservicio'];
			$precio=$_POST['precio'];
			return $this->dataPaqueteServicios->agregarServicioAlimentacion($idpaquete,$idservicio,$precio);
		}

		public function agregarServicioTransporte(){
			
			$idpaquete=$_POST['idpaquete'];
			$idservicio=$_POST['idservicio'];
			$precio=$_POST['precio'];
			return $this->dataPaqueteServicios->agregarServicioTransporte($idpaquete,$idservicio,$precio);
		}

		public function agregarServicioHospedaje(){
			
			$idpaquete=$_POST['idpaquete'];
			$idservicio=$_POST['idservicio'];
			$precio=$_POST['precio'];
			return $this->dataPaqueteServicios->agregarServicioHospedaje($idpaquete,$idservicio,$precio);
		}

		public function descartarServicioAlimentacion(){
			$idpaquete=$_POST['idpaquete'];
			$idservicio=$_POST['idservicio'];
			$precio=$_POST['precio'];
			return $this->dataPaqueteServicios->descartarServicioAlimentacion($idpaquete,$idservicio,$precio);
		}

		public function descartarServicioTransporte(){
			$idpaquete=$_POST['idpaquete'];
			$idservicio=$_POST['idservicio'];
			$precio=$_POST['precio'];
			return $this->dataPaqueteServicios->descartarServicioTransporte($idpaquete,$idservicio,$precio);
		}

		public function descartarServicioHospedaje(){
			$idpaquete=$_POST['idpaquete'];
			$idservicio=$_POST['idservicio'];
			$precio=$_POST['precio'];
			return $this->dataPaqueteServicios->descartarServicioHospedaje($idpaquete,$idservicio,$precio);
		}		

	}
?>

<?php

	$op = $_POST['opcion'];
	$agregarDescartar = new AgregarDescartarServiciosBusiness;
	if($op == 1){
	 	$agregarDescartar->agregarServicioAlimentacion();
	}else if($op == 2){
	 	$agregarDescartar->descartarServicioAlimentacion();
	}else if($op == 3){
	 	$agregarDescartar->agregarServicioHospedaje();
	}else if($op == 4){
	 	$agregarDescartar->descartarServicioHospedaje();
	}else if($op == 5){
	 	$agregarDescartar->agregarServicioTransporte();
	}else if($op == 6){
	 	$agregarDescartar->descartarServicioTransporte();
	}
	
?>