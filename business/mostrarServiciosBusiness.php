<?php 
	include_once '../data/servicioAlimentacionData.php';
	include_once '../data/servicioHabitacionData.php';
	include_once '../data/servicioTransporteData.php';
	include_once '../data/dataServicios.php';

	class MostrarServiciosBusiness{
		private $dataAlimentacion=null;
		private $dataHabitacion=null;
		private $dataTransporte=null;
		private $dataServicios=null;

		public function MostrarServiciosBusiness(){

			$this->dataAlimentacion = new ServicioAlimentacionData();
			$this->dataHabitacion = new ServicioHabitacionData();
			$this->dataTransporte = new ServicioTransporteData();
			$this->dataServicios = new DataServicios();
		}

		public function obtenerServiciosAlimentacionAgregados($idPaquete){

			$listaAlimentacion=$this->dataAlimentacion->mostrarTodosServicioAlimentacion();
			$listaIdServicios=$this->dataServicios->obtenerIdServiciosAlimentacion();

			$agregados=array();
			$agregado=false;

			for($i=0;$i<count($listaAlimentacion);$i++){

				for($j=0;$j<count($listaIdServicios);$j++){
					$temporalServicioAgregado=$listaIdServicios[$j];

					if($listaAlimentacion[$i]->getIdServicioAlimentacion()==$temporalServicioAgregado['idServicioAlimentacion']&&$temporalServicioAgregado['idpaquete']==$idPaquete){

						array_push($agregados,$listaAlimentacion[$i]);
						$j=count($listaIdServicios);
					}
				}
			}

			for($i=0;$i<count($listaAlimentacion);$i++){
				
				for($j=0;$j<count($agregados);$j++){

					if($listaAlimentacion[$i]->getIdServicioAlimentacion()==$agregados[$j]->getIdServicioAlimentacion()){
						$agregado=true;	
					}
				}

				if($agregado==false){
					$listaAlimentacion[$i]->setEstadoAgregado(0);
				}else{
					$listaAlimentacion[$i]->setEstadoAgregado(1);
					$agregado=false;	
				}

			}

			if (!$listaAlimentacion) {
				return false;
			} else {
				return $listaAlimentacion;
			}
		}
		public function obtenerServiciosTransporteAgregados($idPaquete){

			$listaTransportes=$this->dataTransporte->mostrarTodosServicioTransporte();
			$listaIdServicios=$this->dataServicios->obtenerIdServiciosTransporte();

			$agregados=array();
			$agregado=false;

			for($i=0;$i<count($listaTransportes);$i++){

				for($j=0;$j<count($listaIdServicios);$j++){
					$temporalServicioAgregado=$listaIdServicios[$j];

					if($listaTransportes[$i]->getIdServicioTransporte()==$temporalServicioAgregado['idServicioTransporte']&&$temporalServicioAgregado['idpaquete']==$idPaquete){

						array_push($agregados,$listaTransportes[$i]);
						$j=count($listaIdServicios);
					}
				}
			}

			for($i=0;$i<count($listaTransportes);$i++){
				
				for($j=0;$j<count($agregados);$j++){

					if($listaTransportes[$i]->getIdServicioTransporte()==$agregados[$j]->getIdServicioTransporte()){
						$agregado=true;	
					}
				}

				if($agregado==false){
					$listaTransportes[$i]->setEstadoAgregado(0);
				}else{
					$listaTransportes[$i]->setEstadoAgregado(1);
					$agregado=false;	
				}

			}

			if (!$listaTransportes) {
				return false;
			} else {
				return $listaTransportes;
			}

		}
		public function obtenerServiciosHospedajeAgregados($idPaquete){

			$listaHospedaje=$this->dataHabitacion->mostrarHabitaciones();
			$listaIdServicios=$this->dataServicios->obtenerIdServiciosHospedaje();

			$agregados=array();
			$agregado=false;

			for($i=0;$i<count($listaHospedaje);$i++){

				for($j=0;$j<count($listaIdServicios);$j++){
					$temporalServicioAgregado=$listaIdServicios[$j];

					if($listaHospedaje[$i]->getIdHabitacion()==$temporalServicioAgregado['idServicioHospedaje']&&$temporalServicioAgregado['idpaquete']==$idPaquete){

						array_push($agregados,$listaHospedaje[$i]);
						$j=count($listaIdServicios);
					}
				}
			}

			for($i=0;$i<count($listaHospedaje);$i++){
				
				for($j=0;$j<count($agregados);$j++){

					if($listaHospedaje[$i]->getIdHabitacion()==$agregados[$j]->getIdHabitacion()){
						$agregado=true;	
					}
				}

				if($agregado==false){
					$listaHospedaje[$i]->setEstadoAgregado(0);
				}else{
					$listaHospedaje[$i]->setEstadoAgregado(1);
					$agregado=false;	
				}

			}

			if (!$listaHospedaje) {
				return false;
			} else {
				return $listaHospedaje;
			}

		}
	}
?>