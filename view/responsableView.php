<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		include '../business/responsableBusiness.php';
	?>
</head>
<body>

 		<header> 
        </header>

         <h1>Registrar Responsable</h1><br>
        	<form id="form" method="post" action="../business/responsableBusinessAction.php">                                
                    Cedula:
                    <input required type="text" name="cedulaResponsable" id="cedulaResponsable" />
                    <br>
                    <br>
                    <br>
                    Nombre:
                    <input required type="text" name="nombreResponsable" id="nombreResponsable" />
                    <br>
                    <br>
                    <br>
                    Primer Apellido:
                  <input required type="text" name="primerApellidoResponsable" id="primerApellidoResponsable" />
                    <br>
                    <br>
                    <br>
                    Segundo Apellido:
                <input required type="text" name="segundoApellidoResponsable" id="segundoApellidoResponsable" />
                    <br>
                    <br>
                    <br>
                    Telefono:
                    <input required type="text" name="telefonoResponsable" id="telefonoResponsable" />
                    <br>
                    <br>
                    <br>
                    Email:
                    <input required type="Email" name="emailResponsable" id="emailResponsable" />
                    <br>
                    <br>
                    <br>
                    
                    <input type="submit" value="Guardar" name="guardarResponsable" id="guardarResponsable"/><br><br>

    		</form>
        
        <h2>Responsable</h2>
    		<table border="1">
    		<tr>    				
            	<th>Cedula</th>
                <th>Nombre</th>
                <th>PrimerApellido</th>
                <th>SegundoApellido</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Opcion 1</th>
                <th>Opcion 2</th>
    		</tr>

    <?php

         $sesponsableBusiness = new ResponsableBusiness();
         $todosResponsable = $sesponsableBusiness->mostrarTodosResponsable();
        foreach ($todosResponsable as $responsable) 
            {

                echo '<form method="post" enctype="multipart/form-data" action="../business/responsableBusinessAction.php">';



                echo '<input type="hidden" name="idResponsable" id="idResponsable" value="' . $responsable->getIdResponsable() .'">';                
               

                echo '<td><input type="text" name="cedulaResponsable" id="cedulaResponsable" value="' . $responsable->getCedulaResponsable() . '"/></td>';

                echo '<td><input type="text" name="nombreResponsable" id="nombreResponsable" value="' . $responsable->getNombreResponsable() . '"/></td>';

                echo '<td><input type="text" name="primerapellidoResponsable" id="primerapellidoResponsable" value="' . $responsable->getPrimirapellidoResponsable() . '"/></td>';

                echo '<td><input type="text" name="segundoapellidoResponsable" id="segundoapellidoResponsable" value="' . $responsable->getSegundoapellidoResponsable() . '"/></td>';

                echo '<td><input type="text" name="telefonoResponsable" id="telefonoResponsable" value="' . $responsable->getTelefonoResponsable() . '"/></td>';

                 echo '<td><input type="text" name="emailResponsable" id="emailResponsable" value="' . $responsable->getEmailResponsable() . '"/></td>';




                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
             
                echo '</tr>';
                echo '</form>';
            }
          ?>






    			
    		</table>

</body>
</html>


