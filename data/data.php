<?php  
	
	class Data{

		var $conexion; 
			
		function getConexion(){
			return $this->conexion;
		}

		function conect() {
		    $con = mysqli_connect("localhost","root","","bdturismo");
		   
			if($con->connect_errno){
				echo "Falló la conexión a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
			}		    
			$this->conexion = $con;
			return $this->conexion;
		}

		function crearConexionPDO() {
		    try {
			  $this->conexion = new PDO('mysql:host=localhost;dbname=bdturismo', 'root', '');
			} catch (Exception $e) {
			  return false;
			}
			return $this->conexion;
		}

	}
 ?>