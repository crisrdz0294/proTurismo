<?php
	include 'data.php';
	include '../domain/sitioTuristico.php';


	class DataSitioTuristico{

		public function DataSitioTuristico(){}


        function uploadImagen($imagenes,$id){
            
            $flag = false;
            $con =new Data();
            $conexion=$con->conect();
            $archivos="";
            $cont = 1;
            foreach ($imagenes as $imagen) 
            {
                 $target_path = "../imagenes/";
                 $name = $imagen['name'];
                $extension = end(explode(".", $name));
                $target_path = $target_path .$cont."-".$id.".".$extension;
                if(move_uploaded_file($imagen['tmp_name'], $target_path)) 
                {
                    $flag = true;
                    $archivos=$archivos.$target_path.";";
                    
                }
                $cont++;
            }
            $update ="UPDATE tbsitioturistico SET imagenes = '$archivos' WHERE idsitioturistico='$id'";
            mysqli_query($conexion,$update);
            return $flag;
        }

		public function insertarSitioTuristico($sitioTuristico,$imagenes){
			$con =new Data();
			$conexion=$con->conect();

			$nombrecomercial=$sitioTuristico->getNombreComercial();
		 	$telefonositio=$sitioTuristico->getTelefonoSitio();
			$idprovincia=$sitioTuristico->getIdProvincia();
		 	$idcanton=$sitioTuristico->getIdCanton();
		 	$iddistrito=$sitioTuristico->getIdDistrito();
		 	$direccionexacta=$sitioTuristico->getDireccionExacta();
		 	$sitioWeb=$sitioTuristico->getSitioWeb();

		 	$consultaUltimoId ="SELECT MAX(idsitioturistico) AS idsitioturistico FROM tbsitioturistico";
			$maximoId=mysqli_query($conexion,$consultaUltimoId);
			$idSiguiente=1;

			if ($row = mysqli_fetch_row($maximoId)) {
            	$idSiguiente = trim($row[0]) + 1;
        	}

        	$consultaInsertar="INSERT INTO tbsitioturistico(idsitioturistico,nombrecomercialsitioturistico,telefonositioturistico,idprovinciasitioturistico,idcantonsitioturistico,iddistritositioturistico,   direccionexactasitioturistico,sitiowebsitioturistico) VALUES (".$idSiguiente.",'".$nombrecomercial."','".$telefonositio."',".$idprovincia.",".$idcanton.",".$iddistrito.",'".$direccionexacta."','".$sitioWeb."');";


            
            $result = mysqli_query($conexion, $consultaInsertar);
            $this->uploadImagen($imagenes,$idSiguiente);
        	mysqli_close($conexion);
        	return $result;

		}

		public function mostrarTodosSitiosTuristicos(){

			$con = new Data();
			$conexion = $con->conect();
			$consultaMostrar = "SELECT * FROM tbsitioturistico;";
			$result = mysqli_query($conexion, $consultaMostrar);
			mysqli_close($conexion);
        	$sitiosTuristicos = [];
        	while ($row = mysqli_fetch_array($result)) {
            	$sitioTuristicoTemporal = new SitioTuristico($row['idsitioturistico'],$row['nombrecomercialsitioturistico'],$row['telefonositioturistico'],$row['idprovinciasitioturistico'],$row['idcantonsitioturistico'],$row['iddistritositioturistico'],$row['direccionexactasitioturistico'],$row['sitiowebsitioturistico']);
            	array_push($sitiosTuristicos, $sitioTuristicoTemporal);
        	}
        	return $sitiosTuristicos;
		}

		public function actualizarSitioTuristico($sitioturistico){

			$con =new Data();
			$conexion=$con->conect();
			$retorno;

			$nombrecomercial=$sitioturistico->getNombreComercial();
		 	$telefonositio=$sitioturistico->getTelefonoSitio();
		 	$direccionexacta=$sitioturistico->getDireccionExacta();
		 	$idsitio=$sitioturistico->getIdSitio();
		 	$sitioWeb=$sitioturistico->getSitioWeb();
		 	$idTemporal=0;

		 	$consultaFamilia ="SELECT idsitioturistico FROM tbfamilia where idsitioturistico=".$idsitio."";
			$idFamilia=mysqli_query($conexion,$consultaFamilia);

			if ($row = mysqli_fetch_row($idFamilia)) {
            	$idTemporal = trim($row[0]);
        	}

        	if($idTemporal==$idsitio){
        		$retorno=1;
        	}else{

        		$consultaEmpresa ="SELECT idsitioturistico FROM tbmicroempresa where idsitioturistico=".$idsitio."";
				$idEmpresa=mysqli_query($conexion,$consultaEmpresa);
		
				if ($row = mysqli_fetch_row($idEmpresa)) {
            		$idTemporal = trim($row[0]);
        		}

        		if($idTemporal==$idsitio){
        			$retorno=2;
        		}else{

        			$consultaHospedaje ="SELECT idsitioturistico FROM tbserviciohospedaje where idsitioturistico=".$idsitio."";
					$idHospedaje=mysqli_query($conexion,$consultaHospedaje);
		
					if ($row = mysqli_fetch_row($idHospedaje)) {
            			$idTemporal = trim($row[0]);
        			}

        			if($idTemporal==$idsitio){
        				$retorno=3;
        			}else{

        				$consultaTransporte ="SELECT idsitioturistico FROM tbserviciotransporte where idsitioturistico=".$idsitio."";
						$idTransporte=mysqli_query($conexion,$consultaTransporte);
		
						if ($row = mysqli_fetch_row($idTransporte)) {
            				$idTemporal = trim($row[0]);
        				}

        				if($idTemporal==$idsitio){
        					$retorno=4;
        				}else{

        					$consultaAlimentacion ="SELECT idsitioturistico FROM tbservicioalimentacion where idsitioturistico=".$idsitio."";
							$idAlimentacion=mysqli_query($conexion,$consultaAlimentacion);
		
							if ($row = mysqli_fetch_row($idAlimentacion)) {
            					$idTemporal = trim($row[0]);
        					}

        					if($idTemporal==$idsitio){
        						$retorno=5;
        					}else{
        						
        						$consultaTrabajoComunal ="SELECT idsitioturistico FROM tbtrabajocomunal where idsitioturistico=".$idsitio."";
								$idTrabajoComunal=mysqli_query($conexion,$consultaTrabajoComunal);
		
								if ($row = mysqli_fetch_row($idTrabajoComunal)) {
            						$idTemporal = trim($row[0]);
        						}

        						if($idTemporal==$idsitio){
        							$retorno=6;
        						}else{

        							$consultaActividad ="SELECT idsitioturistico FROM tbactividad where idsitioturistico=".$idsitio."";
									$idActividad=mysqli_query($conexion,$consultaActividad);
		
									if ($row = mysqli_fetch_row($idActividad)) {
            							$idTemporal = trim($row[0]);
        							}

        							if($idTemporal==$idsitio){
        								$retorno=7;
        							}else{
        								$consultaActualizar="UPDATE tbsitioturistico SET nombrecomercialsitioturistico='".$nombrecomercial."',telefonositioturistico='".$telefonositio."',direccionexactasitioturistico='".$direccionexacta."', sitiowebsitioturistico='".$sitioWeb."' WHERE idsitioturistico=".$idsitio.";";

		 								$result = mysqli_query($conexion, $consultaActualizar);
        								mysqli_close($conexion);
        							}
        							
        						}

        					
        					}
        				}
        			}

        		}

       		}	

       		return $retorno;

		}

		public function eliminarSitioTuristico($idsitioturistico){

			$con =new Data();
			$conexion=$con->conect();
			$retorno;

			$idTemporal=0;

		 	$consultaFamilia ="SELECT idsitioturistico FROM tbfamilia where idsitioturistico=".$idsitioturistico."";
			$idFamilia=mysqli_query($conexion,$consultaFamilia);

			if ($row = mysqli_fetch_row($idFamilia)) {
            	$idTemporal = trim($row[0]);
        	}

        	if($idTemporal==$idsitioturistico){
        		$retorno=1;
        	}else{

        		$consultaEmpresa ="SELECT idsitioturistico FROM tbmicroempresa where idsitioturistico=".$idsitioturistico."";
				$idEmpresa=mysqli_query($conexion,$consultaEmpresa);
		
				if ($row = mysqli_fetch_row($idEmpresa)) {
            		$idTemporal = trim($row[0]);
        		}

        		if($idTemporal==$idsitioturistico){
        			$retorno=2;
        		}else{

        			$consultaHospedaje ="SELECT idsitioturistico FROM tbserviciohospedaje where idsitioturistico=".$idsitioturistico."";
					$idHospedaje=mysqli_query($conexion,$consultaHospedaje);
		
					if ($row = mysqli_fetch_row($idHospedaje)) {
            			$idTemporal = trim($row[0]);
        			}

        			if($idTemporal==$idsitioturistico){
        				$retorno=3;
        			}else{

        				$consultaTransporte ="SELECT idsitioturistico FROM tbserviciotransporte where idsitioturistico=".$idsitioturistico."";
						$idTransporte=mysqli_query($conexion,$consultaTransporte);
		
						if ($row = mysqli_fetch_row($idTransporte)) {
            				$idTemporal = trim($row[0]);
        				}

        				if($idTemporal==$idsitioturistico){
        					$retorno=4;
        				}else{

        					$consultaAlimentacion ="SELECT idsitioturistico FROM tbservicioalimentacion where idsitioturistico=".$idsitioturistico."";
							$idAlimentacion=mysqli_query($conexion,$consultaAlimentacion);
		
							if ($row = mysqli_fetch_row($idAlimentacion)) {
            					$idTemporal = trim($row[0]);
        					}

        					if($idTemporal==$idsitioturistico){
        						$retorno=5;
        					}else{
        						
        						$consultaTrabajoComunal ="SELECT idsitioturistico FROM tbtrabajocomunal where idsitioturistico=".$idsitioturistico."";
								$idTrabajoComunal=mysqli_query($conexion,$consultaTrabajoComunal);
		
								if ($row = mysqli_fetch_row($idTrabajoComunal)) {
            						$idTemporal = trim($row[0]);
        						}

        						if($idTemporal==$idsitioturistico){
        							$retorno=6;
        						}else{

        							$consultaActividad ="SELECT idsitioturistico FROM tbactividad where idsitioturistico=".$idsitioturistico."";
									$idActividad=mysqli_query($conexion,$consultaActividad);
		
									if ($row = mysqli_fetch_row($idActividad)) {
            							$idTemporal = trim($row[0]);
        							}

        							if($idTemporal==$idsitioturistico){
        								$retorno=7;
        							}else{
        								$consultaEliminar="DELETE FROM tbsitioturistico WHERE idsitioturistico=".$idsitioturistico.";";

										$result = mysqli_query($conexion, $consultaEliminar);
        								mysqli_close($conexion);
        							}
        						
        					
        						}

        					
        					}
        				}
        			}

        		}

       		}	

       		return $retorno;
		}


	}
?>