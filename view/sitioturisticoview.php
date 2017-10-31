<?php
	require('../data/data2.php');
	$query="SELECT * from tbprovincia";
	$resultado=$mysqli->query($query);
 ?>
<html>
	<head>

		<script src="../js/jquery-3.2.1.js"></script>
<!--<script src="../js/validarCorreo.js" type="text/javascript"></script>-->
	<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>



		<script language="javascript">

		function dejarPasar(){
		  var validoCedula=document.getElementById('linkOk').innerHTML;
console.log(validoCedula);
		if(validoCedula=="valido"){

		          document.getElementById('guardarSitio').disabled=false;
		}else{
		    document.getElementById('guardarSitio').disabled=true;
		}

		}

		function validarLinkSitioTabla(input, contador){

		var campo = input.value;
		var vari="linkOk2";
		vari=vari.concat(contador);
		var valido = document.getElementById(vari);
     console.log(vari);

		emailRegex = /^(www)+\.[a-z0-9\.-]+\.[a-z]{2,4}/gi;
		    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
		    if (emailRegex.test(campo)) {
		      valido.innerText = "valido";

		    } else {
		      valido.innerText = "incorrecto";


		    }

		}

		function validarLinkSitio(){
		document.getElementById('sitioweb').addEventListener('input', function() {
		campo = event.target;
		valido = document.getElementById('linkOk');

		emailRegex = /^(www)+\.[a-z0-9\.-]+\.[a-z]{2,4}/gi;
		    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
		    if (emailRegex.test(campo.value)) {
		      valido.innerText = "valido";

		    } else {
		      valido.innerText = "incorrecto";


		    }
		});
		}

			$(document).ready(function(){
				$("#provincia").change(function () {

					$('#distrito').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

					$("#provincia option:selected").each(function () {
						idprovincia = $(this).val();
						$.post("../data/getCantones.php", { idprovincia: idprovincia }, function(data){
							$("#canton").html(data);
						});
					});
				})
			});

			$(document).ready(function(){
				$("#canton").change(function () {
					$("#canton option:selected").each(function () {
						idcanton = $(this).val();
						$.post("../data/getDistritos.php", { idcanton: idcanton }, function(data){
							$("#distrito").html(data);
						});
					});
				})
			});
			jQuery(document).ready(function(){

			 $("#telefono").mask("(+506) 9999-9999")



			});

			function validarTelefono(input,contador){
			var campo=input.value;
			var name="telefonoOk";
			name=name.concat(contador);
			var valido = document.getElementById(name);
			var emailRegex = "(+506) ";
			var signo="-"

			    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
			    if (campo.indexOf(emailRegex)>-1&&campo.indexOf(signo)>-1&&campo.length==16) {
			      valido.innerText = "valido";

			    } else {
			      valido.innerText = "incorrecto";



			    }

			}


			function dejarPasar2(button,contador){

				var telefono="telefonoOk";
				var link="linkOk2";

				telefono=telefono.concat(contador);
			  link=link.concat(contador);

				validarTelefono2=document.getElementById(telefono).innerHTML;
				validarLink=document.getElementById(link).innerHTML;

			if(validarTelefono2=="valido"&&validarLink=="valido"){

								button.type="submit";
			}else{

					button.type="button";
			}


			}

		</script>
	</head>
	<body>

	<h1>Ingresar Sitio Turistico</h1>

	<form method="POST" name="form1" id="form1" action="../business/sitioTuristicoBusinessAction.php">

		Nombre comercial:<br>
		<input type="text" name="nombrecomercial" onkeyup="dejarPasar()" placeholder="Ingrese el nombre del sitio" required /><br><br>
		Numero de telefono del sitio:<br>
		<input type="text" name="telefono" id="telefono" onkeyup="dejarPasar()" placeholder="Ingrese el numero de telefono del sitio" required /><br><br>
		Provincia del sitio:<br>
		<select id="provincia" name="provincia" required />
			<option value="0" selected disabled="true">Seleccione una provincia</option>
			<?php
				while ($fila=$resultado->fetch_assoc()) { ?>

					<option value="<?php echo $fila['idprovincia'] ?>" ><?php echo $fila['nombreprovincia'] ?></option>

				<?php
				}
				?>
		</select><br><br>
		Canton del sitio:<br>
		<select id="canton" name="canton"></select><br><br>
		Distrito del sitio:<br>
		<select id="distrito" name="distrito"></select><br><br>
		Direccion Exacta del sitio:<br>
		<textarea name="direccion" onkeyup="dejarPasar()" placeholder="Ingrese la direccion exacta del sitio"  required></textarea><br><br>
		Sitio web:<br>
		<input type="text" name="sitioweb" id="sitioweb" onkeyup="validarLinkSitio();dejarPasar();" placeholder="Ingrese el sitio web"><span id="linkOk"></span><br><br>
		  <input type="submit" value="Guardar" name="guardarSitio" id="guardarSitio" disabled="true" /><br><br>


	</form>

	<h2>Sitios Turisticos</h2>
	<table border="1">

		<tr>
			<th>Nombre del sitio</th>
			<th>Telefono</th>
			<th>Direccion Exacta</th>
			<th>Sitio Web</th>
			<th>Opcion 1</th>
			<th>Opcion 2</th>
		</tr>

		<?php

			include '../business/sitioTuristicoBusiness.php';
			$sitioTuristicoBusiness= new SitioTuristicoBusiness();
			$todosSitiosTuristicos=$sitioTuristicoBusiness->mostrarTodosSitiosTuristicos();
        $cont=1;
			foreach($todosSitiosTuristicos as $sitioturistico){

				 echo '<form method="post" enctype="multipart/form-data" action="../business/sitioTuristicoBusinessAction.php">';
                    echo '<input type="hidden" name="idsitio" value="' . $sitioturistico->getIdSitio().'">';

                    echo '<td><input type="text" name="nombrecomercial" value="' .$sitioturistico->getNombreComercial().'"/></td>';

										$telefono=$sitioturistico->getTelefonoSitio();
									$pre= substr($telefono,0,5);
									 $pre1= substr($telefono,5,7);
									$number="(+506)".$pre."-".$pre1;
									$sitioturistico->setTelefonoSitio($number);

                    echo '<td><input type="text" name="telefono" onkeyup="validarTelefono(this,'.$cont.')" value="' . $sitioturistico->getTelefonoSitio().'"/><span id="telefonoOk'.$cont.'"></span></td>';

                     echo '<td><input type="text" name="direccion"  value="' .$sitioturistico->getDireccionExacta().'"/></td>';
                     echo '<td><input type="text" name="sitioweb" value="' .$sitioturistico->getSitioWeb().'" onkeyup="validarLinkSitioTabla(this,'.$cont.')"/><span id="linkOk2'.$cont.'"></span></td>';
                    echo '<td><input type="button" value="Actualizar" name="update" id="update" onclick="dejarPasar2(this,'.$cont.')" /></td>';
                    echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';

                    echo '</tr>';
                    echo '</form>';
										$cont++;
			}
		?>

	</table>



            <?php

               if (isset($_GET['error']))
                {
                          if ($_GET['error'] == "dbError")
                          {
                              echo '<script language="javascript">alert("Error al procesar la transacción");</script>';
                          }
                          else if($_GET['error'] == "camposvacios")
                          {
                             echo '<script language="javascript">alert("Error al procesar la transacción hay campos vacios");</script>';

                          }
                          else if($_GET['error'] == "error")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se ingresaron datos");</script>';
                          }


                          else if($_GET['error'] == "agregadoFamilia")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se agregado Familia");</script>';
                          }
                          else if($_GET['error'] == "agregadoMicroEmpresa")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se agregado MicroEmpresa");</script>';
                          }
                          else if($_GET['error'] == "agregadoHospedaje")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se agregado Hospedaje");</script>';
                          }
                          else if($_GET['error'] == "agregadoTransporte")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se agregado Transporte");</script>';
                          }
                          else if($_GET['error'] == "agregadoAlimentacion")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se agregado Alimentacion");</script>';
                          }
                       	  else if($_GET['error'] == "agregadoTrabajoComunal")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se agregado TrabajoComunal");</script>';
                          }
                          else if($_GET['error'] == "agregadoActividad")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se agregado Actividad");</script>';
                          }




                      }
                      else if (isset($_GET['success']))
                      {
                          echo '<script language="javascript">alert("Transacción Realizada");</script>';
                      }
        ?>




	</body>
</html>
