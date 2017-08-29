<?php
	require('../data/data2.php');
	$query="SELECT * from tbprovincia";
	$resultado=$mysqli->query($query);
 ?>
<html>
	<head>

		<script src="../js/jquery-3.2.1.js" type="text/javascript"></script>

		<script language="javascript">
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
		</script>
	</head>
	<body>
		<select id="provincia" name="provincia">
			<option value="0" selected disabled="true">Seleccione una provincia</option> 
			<?php
				while ($fila=$resultado->fetch_assoc()) { ?>   
				
					<option value="<?php echo $fila['idprovincia'] ?>" ><?php echo $fila['nombreprovincia'] ?></option>

				<?php 
				}
				?>     		
		</select>
		<select id="canton" name="canton"></select>
		<select id="distrito" name="distrito"></select>

	</body>
</html>