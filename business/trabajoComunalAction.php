<?php

	include './trabajoComunalBusiness.php';

	if (isset($_POST['guardarTrabajoComunal'])) {

		if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['actividades']) && isset($_POST['requisitos']) && isset($_POST['direccion']) ) {

			$nombre=$_POST['nombre'];
			$descripcion=$_POST['descripcion'];
			$actividades=$_POST['actividades'];
			$requisitos=$_POST['requisitos'];
			$direccion=$_POST['direccion'];
			$idSitio=$_POST['sitioturistico'];

			if(strlen($nombre)>0 && strlen($descripcion)>0 && strlen($actividades)>0 && strlen($requisitos)>0 && strlen($direccion)>0){

					$trabajoComunal= new TrabajoComunal(0,$nombre,$descripcion,$actividades,$requisitos,$direccion,$idSitio);
					$trabajoComunalBusiness= new TrabajoComunalBusiness();

					$resultado=$trabajoComunalBusiness->insertarTrabajoComunal($trabajoComunal);

					if ($resultado==1) {
						header("location: ../view/GUITrabajoComunal.php?sucess=inserted");
					}else{
						header("location: ../view/GUITrabajoComunal.php?error=dbError");
					}
			}else{
				header("location: ../view/GUITrabajoComunal.php?error=emptyField");
			}
		}else{
			header("location: ../view/GUITrabajoComunal.php?error=error");
		}
		
	}else if (isset($_POST['update'])) {

		if (isset($_POST['nombreTrabajoComunal']) && isset($_POST['descripcionTrabajoComunal']) && isset($_POST['actividadesTrabajoComunal']) && isset($_POST['requisitosTrabajoComunal']) && isset($_POST['direccionTrabajoComunal']) && isset($_POST['idTrabajoComunal'])) {

			$nombre=$_POST['nombreTrabajoComunal'];
			$descripcion=$_POST['descripcionTrabajoComunal'];
			$actividades=$_POST['actividadesTrabajoComunal'];
			$requisitos=$_POST['requisitosTrabajoComunal'];
			$direccion=$_POST['direccionTrabajoComunal'];
			$id=$_POST['idTrabajoComunal'];
			$idSitio=$_POST['idsitio'];

			$trabajoComunal= new TrabajoComunal($id,$nombre,$descripcion,$actividades,$requisitos,$direccion,$idSitio);
			$trabajoComunalBusiness= new TrabajoComunalBusiness();
			$resultado=$trabajoComunalBusiness->actualizarTrabajoComunal($trabajoComunal);

			if ($resultado==1) {
				header("location: ../view/GUITrabajoComunal.php?sucess=update");
			}else{
				header("location: ../view/GUITrabajoComunal.php?error=dbError");
			}

			
		}else{
			header("location: ../view/GUITrabajoComunal.php?error=error");
		}
	}else if (isset($_POST['delete'])) {
		if (isset($_POST['idTrabajoComunal'])) {

			$id=$_POST['idTrabajoComunal'];

			$trabajoComunalBusiness= new TrabajoComunalBusiness();
			$resultado=$trabajoComunalBusiness->eliminarTrabajoComunal($id);

			if ($resultado==1) {
				header("location: ../view/GUITrabajoComunal.php?sucess=delete");
			}else{
				header("location: ../view/GUITrabajoComunal.php?error=dbError");
			}

		}else{
			header("location: ../view/GUITrabajoComunal.php?error=error");
		}
	}
  ?>