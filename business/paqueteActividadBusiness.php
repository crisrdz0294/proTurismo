<?php
	
	include_once '../data/dataActividad.php';
	include_once '../data/dataPaqueteActividad.php';
	
	class PaqueteActividadBusiness{

		private $dataPaqueteActividad=null;
		private $dataActividad=null;

		public function PaqueteActividadBusiness(){

			$this->dataActividad = new DataActividad();
			$this->dataPaqueteActividad = new DataPaqueteActividad();
		}

		public function obtenerActividadesAgregadas($idPaquete){

			$listaActividades= $this->dataActividad->mostrarTodasActividades();
			$listaIdActividades=$this->dataPaqueteActividad->obtenerIdActividadesPaquete();

			$agregados=array();
			$agregado=false;

			for($i=0;$i<count($listaActividades);$i++){

				for($j=0;$j<count($listaIdActividades);$j++){
					$temporalActividadAgregada=$listaIdActividades[$j];

					if($listaActividades[$i]->getIdActividad()==$temporalActividadAgregada['idactividad']&&$temporalActividadAgregada['idpaquete']==$idPaquete){

						array_push($agregados,$listaActividades[$i]);
						$j=count($listaIdActividades);
					}
				}
			}

			for($i=0;$i<count($listaActividades);$i++){
				
				for($j=0;$j<count($agregados);$j++){

					if($listaActividades[$i]->getIdActividad()==$agregados[$j]->getIdActividad()){
						$agregado=true;	
					}
				}

				if($agregado==false){
					$listaActividades[$i]->setEstadoAgregado(0);
				}else{
					$listaActividades[$i]->setEstadoAgregado(1);
					$agregado=false;	
				}

			}

			if (!$listaActividades) {
				return false;
			} else {
				return $listaActividades;
			}

		}

			

	}
?>

