<!DOCTYPE html>

<?php


          include '../business/tuFamiliaBusiness.php';    
 

                $tuFamiliaBusiness = new TuFamiliaBusiness();
                $todasFamilias= $tuFamiliaBusiness->mostrarFamilias();

                $listaResponsables = $tuFamiliaBusiness->mostrarTodosResponsable();

                $listaSitios = $tuFamiliaBusiness->mostrarTodosSitiosTuristicos();
?>





<head>
    <meta charset="UTF-8">
    <title>Manipular</title>

</head>
<body>
    <h1>Registrar Familia</h1>
    <form id="formulario" method="post" action="../business/tuFamiliaAction.php">
            
            Cantidad de adultos mayores:
            <input type="number" id="cantidadadultosmayores" name="cantidadadultosmayores">
            <br>
            <br>
            Cantidad adultos:
            <input type="number" id="cantidadadultos" name="cantidadadultos">
            <br>
            <br>
          Cantidad de Adolecentes:
            <input type="number" id="cantidadadolecentes" name="cantidadadolecentes">
            <br>
            <br>
            Cantidad de niños:
            <input type="number" id="cantidadninos" name="cantidadninos">
            <br>
            <br>          
            Responsable:
            <select id="idresponsable" name="idresponsable">
                <?php
                    foreach ($listaResponsables as $Responsable){
                ?>
                <option value="<?php echo $Responsable->getIdResponsable();?>"><?php echo $Responsable->getNombreResponsable();?></option>;
                <?php 
                   } 
                ?>
                      
            </select>
            <br>
            <br>  
            Sitio Turistico:
            <select id="sitioturistico" name="sitioturistico">
                <?php
                    foreach ($listaSitios as $SitioTuristico){
                ?>
                <option value="<?php echo $SitioTuristico->getIdSitio();?>"><?php echo $SitioTuristico->getNombreComercial();?></option>;
                <?php 
                   } 
                ?>
                      
            </select>
            <br>
            <br>

             <input type="submit" id="guardadarfamilia" name="guardarfamilia" value="ENVIAR">

    </form>
    <h2>Familias Registradas</h2>
     <table border="1">
            <tr>

                <th>Adultos Mayores</th>
                <th>Adultos</th>
                <th>Adolecentes</th>
                <th>Niños</th>
                <th>Responsable</th>
                <th>Sitio Turistico</th>
                <th>Opcion 1</th>
                <th>Opcion 2 </th>

            </tr>

            <?php
                


                foreach ($todasFamilias as $tuFamilia) {


                    echo '<form method="post" enctype="multipart/form-data" action="../business/tuFamiliaAction.php">';
                    echo '<input type="hidden" name="idfamilia" id="idfamilia" value="' . $tuFamilia->getIdFamilia().'">';

                    echo '<td><input type="number" name="cantidadadultosmayores" id="cantidadadultosmayores" value="' . $tuFamilia->getAdultoMayorFamilia().'"/></td>';

                    echo '<td><input type="number" name="adultosfamilia" id="adultosfamilia" value="' . $tuFamilia->getAdultoFamilia().'"/></td>';
                    echo '<td><input type="number" name="cantidadadolecentes" id="cantidadadolecentes" value="' . $tuFamilia->getAdolecenteFamilia().'">';
                    echo '<td><input type="number" name="cantidadninos" id="cantidadninos" value="' . $tuFamilia->getNinoFamilia().'">';

             ?>






             <?php  

                echo '</select>';
                echo '</td>'; 

                 echo '<td><select name="idresponsable" id="idresponsable"> '?>
                        <?php
                          foreach ($listaResponsables as $Responsable){
                        ?>
                          <?php
                            if($Responsable->getIdResponsable()==$tuFamilia->getIdResponsable()){  ?>

                               <option selected value="<?php echo $Responsable->getIdResponsable();?>"><?php echo $Responsable->getNombreResponsable();?></option>;
                              <?php }else{?>

                                 <option value="<?php echo $Responsable->getIdResponsable();?>"><?php echo $Responsable->getNombreResponsable();?></option>;
                              <?php  } ?>
                          
                         
                        <?php 
                           } 
                        ?>
                <?php  



                

                echo '</select>';
                echo '</td>'; 

                 echo '<td><select name="idsitio" id="idsitio"> '?>
                        <?php
                          foreach ($listaSitios as $sitio){
                        ?>
                          <?php
                            if($sitio->getIdSitio() == $tuFamilia->getSitioTuristico()){  ?>

                               <option selected value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php }else{?>

                                 <option value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php  } ?>
                          
                         
                        <?php 
                           } 
                        ?>
                <?php  


                echo '</select>';
                echo '</td>'; 






                    echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                    echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';

                    echo '</tr>';
                    echo '</form>';
                }
            ?>
    </table>
</body>
</html>
