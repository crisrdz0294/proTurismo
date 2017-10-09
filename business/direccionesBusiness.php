<?php

	include '../data/direccionesData.php';

	class DireccionesBusiness{

		private $direccionesData=null;
		

		public function DireccionesBusiness(){
			$this->direccionesData = new DireccionesData();
		}

		public function mostrarProvincias(){
			return $this->direccionesData->obtenerProvincias();
		}

	}
  ?>

  <?php

	$op = $_POST['opcion'];
	$direccionesBusiness = new DireccionesBusiness;
	if($op == 1){
	 	$direccionesBusiness->mostrarProvincias();
	}

?>