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

		public function obtenerServiciosAlimentacionAgregados(){

			$listaAlimentacion=$this->dataAlimentacion->mostrarTodosServicioAlimentacion();
			$listaIdServicios=$this->dataServicios->obtenerIdServiciosAlimentacion();

			$idPaquete=$_POST['idpaquete'];
			$agregados=array();
			$agregado=false;
			$respuestaFinal = array();

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
					$valores=array("idalimentacion"=>$listaAlimentacion[$i]->getIdServicioAlimentacion(),"tiempocomidas"=>$listaAlimentacion[$i]->getTiempoComidasServicioAlimentacion(),"descripcioncomidas"=>$listaAlimentacion[$i]->getDescripcionAlimentacionServicioAlimentacion(),"precio"=>$listaAlimentacion[$i]->getPrecioServicioAlimentacion(),"estadoagregada"=>0);
            		
				}else{
					$valores=array("idalimentacion"=>$listaAlimentacion[$i]->getIdServicioAlimentacion(),"tiempocomidas"=>$listaAlimentacion[$i]->getTiempoComidasServicioAlimentacion(),"descripcioncomidas"=>$listaAlimentacion[$i]->getDescripcionAlimentacionServicioAlimentacion(),"precio"=>$listaAlimentacion[$i]->getPrecioServicioAlimentacion(),"estadoagregada"=>1);
					$agregado=false;	
				}

				array_push($respuestaFinal, $valores);
			}

			echo "".json_encode($respuestaFinal).""; 
		}

		public function obtenerServiciosTransporteAgregados(){

			$listaTransportes=$this->dataTransporte->mostrarTodosServicioTransporte();
			$listaIdServicios=$this->dataServicios->obtenerIdServiciosTransporte();

			$idPaquete=$_POST['idpaquete'];
			$agregados=array();
			$agregado=false;
			$respuestaFinal = array();

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
					$valores=array("idtransporte"=>$listaTransportes[$i]->getIdServicioTransporte(),"origen"=>$listaTransportes[$i]->getOrigenServicioTransporte(),"destino"=>$listaTransportes[$i]->getDestinoServicioTransporte(),"kilometros"=>$listaTransportes[$i]->getKilometrosServicioTransporte(),"precio"=>$listaTransportes[$i]->getPrecioServicioTransporte(),"estadoagregada"=>0);
            		
				}else{
					$valores=array("idtransporte"=>$listaTransportes[$i]->getIdServicioTransporte(),"origen"=>$listaTransportes[$i]->getOrigenServicioTransporte(),"destino"=>$listaTransportes[$i]->getDestinoServicioTransporte(),"kilometros"=>$listaTransportes[$i]->getKilometrosServicioTransporte(),"precio"=>$listaTransportes[$i]->getPrecioServicioTransporte(),"estadoagregada"=>1);
					$agregado=false;	
				}
				
				array_push($respuestaFinal, $valores);

			}

			echo "".json_encode($respuestaFinal).""; 
		}

		public function obtenerServiciosHospedajeAgregados(){

			$listaHospedaje=$this->dataHabitacion->mostrarHabitaciones();
			$listaIdServicios=$this->dataServicios->obtenerIdServiciosHospedaje();

			$idPaquete=$_POST['idpaquete'];
			$agregados=array();
			$agregado=false;
			$respuestaFinal = array();

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
					$valores=array("idhospedaje"=>$listaHospedaje[$i]->getIdHabitacion(),"estilocama"=>$listaHospedaje[$i]->getCamaHabitacion(),"numerocamas"=>$listaHospedaje[$i]->getCantidadCamasHabitacion(),"numeropersonas"=>$listaHospedaje[$i]->getCantidadPersonasHabitacion(),"numerocuartos"=>$listaHospedaje[$i]->getCantidadCuartosHabitacion(),"precio"=>$listaHospedaje[$i]->getPrecioServicioHabitacion(),"estadoagregada"=>0);
            		
				}else{
					$valores=array("idhospedaje"=>$listaHospedaje[$i]->getIdHabitacion(),"estilocama"=>$listaHospedaje[$i]->getCamaHabitacion(),"numerocamas"=>$listaHospedaje[$i]->getCantidadCamasHabitacion(),"numeropersonas"=>$listaHospedaje[$i]->getCantidadPersonasHabitacion(),"numerocuartos"=>$listaHospedaje[$i]->getCantidadCuartosHabitacion(),"precio"=>$listaHospedaje[$i]->getPrecioServicioHabitacion(),"estadoagregada"=>1);
					$agregado=false;	
				}
				
				array_push($respuestaFinal, $valores);				

			}

			echo "".json_encode($respuestaFinal).""; 

		}
	}
?>

<?php

	$op = $_POST['opcion'];
	$mostrarServicios = new MostrarServiciosBusiness;
	if($op == 1){
	 	$mostrarServicios->obtenerServiciosAlimentacionAgregados();
	}else if($op == 2){
		$mostrarServicios->obtenerServiciosTransporteAgregados();
	}else if($op == 3){
		$mostrarServicios->obtenerServiciosHospedajeAgregados();
	}
	
?>