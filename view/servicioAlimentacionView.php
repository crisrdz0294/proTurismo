<!DOCTYPE html>
<html>
<head>

    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
   <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/jsDinero.js"></script>
    <script src="../js/jsSitioTuristico.js"></script>

    <?php 
         include '../business/servicioAlimentacionBusiness.php';

         $servicioalimentacionBusiness = new ServicioAlimentacionBusiness();
         $todosServicioalimentacion = $servicioalimentacionBusiness->mostrarTodosServicioAlimentacion();

         $listaSitios = $servicioalimentacionBusiness->mostrarTodosSitiosTuristicos();

         if(empty($listaSitios)){
            echo "<h3>No se pueden crear servicios de alimentacion porque no hay sitios turisticos ingresados en el sistema</h3>";
          ?>
          <br><a href="../view/sitioturisticoview.php">Crear Sitio Turistico</a>
          <?php  
          }else{
     ?>


     

</head>

<body>

    <header> 
        </header>
    
             <h1>SERVICIO ALIMENTACION</h1>
             <br>
                <form id="form" method="post" action="javascript:Guardar2();" enctype="multipart/form-data">
                  
                    
                    Tiempo de Comidas:
                    <input type="checkbox" name="tiempoComidasServicioAlimentacionD" id="tiempoComidasServicioAlimentacionD" value="Desayuno" onclick="t1()">Desayuno
                    <input type="checkbox" name="tiempoComidasServicioAlimentacionA" id="tiempoComidasServicioAlimentacionA" value="Almuerzo" onclick="t2()">Almuerzo
                    <input type="checkbox" name="tiempoComidasServicioAlimentacionC" id="tiempoComidasServicioAlimentacionC" value="Cena" onclick="t3()">Cena
                    <br>
                    <br>
                    <br>
                    Descripcion Desayuno:&emsp;&emsp;&emsp;Descripcion Almuerzo:&emsp;&emsp;&emsp;Descripcion Cena:<br>
                    <textarea required name="descripcionAlimentacionServicioAlimentacionD" id="descripcionAlimentacionServicioAlimentacionD" cols="30" rows="5" placeholder="Describa la alimentacion" disabled = true></textarea>
                    <textarea required name="descripcionAlimentacionServicioAlimentacionA" id="descripcionAlimentacionServicioAlimentacionA" cols="30" rows="5" placeholder="Describa la alimentacion" disabled = true></textarea>
                    <textarea required name="descripcionAlimentacionServicioAlimentacionC" id="descripcionAlimentacionServicioAlimentacionC" cols="30" rows="5" placeholder="Describa la alimentacion" disabled = true></textarea>
                    <br>
                    <br>
                    <br>
                    Precio Desayuno:
                    <input required type="text" name="precioServicioAlimentacionD" id="precioServicioAlimentacionD" disabled = true onkeyup="format(this)">
                    Precio Almuerzo:
                    <input required type="text" name="precioServicioAlimentacionA" id="precioServicioAlimentacionA" disabled = true onkeyup="format(this)">
                    Precio Cena:
                     <input required type="text" name="precioServicioAlimentacionC" id="precioServicioAlimentacionC" disabled = true onkeyup="format(this)">
                    <br>
                    <br>
                    <br>
                    Adicionales:<br>
                    <textarea required name="AdicionalesServicioAlimentacion" id="AdicionalesServicioAlimentacion" cols="30" rows="5" placeholder="Describa los adicionnales"></textarea>
                    <br>
                    <br>
                    <br>
                    Alimentacion para Llevar:
                    <select name="alimentacionLlevarServicioAlimentacion" id="alimentacionLlevarServicioAlimentacion">                
                          <option selected value="1">Si</option>
                          <option value="0">No</option>
                    </select>
                    <br>
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
                    <br>
                  <input type="file" multiple="true" id="archivos" name="archivos" />
            <br>
            <br>
                    
                    
                    <input type="submit" value="Guardar" name="guardarServicioAlimentacion" id="guardarServicioAlimentacion"/><br><br>

    </form>


    <h2>Alimentacion</h2>
    <table border="1">
        <tr>
            <th>TiempoComidas</th>
            <th>DescripcionAlimentacion</th>
            <th>Precio</th>
            <th>Adicionales</th>
            <th>AlimentacionLlevar</th>
            <th>Sitio Turistico</th>
            <th>Opcion 1</th>
            <th>Opcion 2</th>
        </tr>





        <?php

            foreach ($todosServicioalimentacion as $servicioAlimentacion) 
            {

                echo '<form method="post" enctype="multipart/form-data" action="../business/servicioAlimentacionBusinessAction.php">';

                echo '<input type="hidden" name="idServicioAlimentacion" id="idServicioAlimentacion" value="' . $servicioAlimentacion->getIdServicioAlimentacion() .'">';                
                           




              if($servicioAlimentacion->getTiempoComidasServicioAlimentacion()=="Desayuno")
                {
                  echo '<td>
                  <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">                
                          <option selected value="Desayuno">Desayuno</option>
                        </select>
                    </td>';
                }
                else if($servicioAlimentacion->getTiempoComidasServicioAlimentacion()=="Almuerzo")
                {
                   echo '<td>
                  <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">                
                          <option selected value="Almuerzo">Almuerzo</option>
                        </select>
                    </td>';
                }
                else if($servicioAlimentacion->getTiempoComidasServicioAlimentacion()=="Cena")
                {
                   echo '<td>
                  <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">                
                          <option selected value="Cena">Cena</option>
                        </select>
                    </td>';
                }
                else if($servicioAlimentacion->getTiempoComidasServicioAlimentacion()=="Desayuno,Almuerzo")
                {
                     echo '<td>
                  <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">                
                          <option selected value="Desayuno">Desayuno</option>
                          <option selected value="Almuerzo">Almuerzo</option>
                        </select>
                    </td>';
                }
                else if($servicioAlimentacion->getTiempoComidasServicioAlimentacion()=="Desayuno,Cena")
                {
                     echo '<td>
                  <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">                
                          <option selected value="Desayuno">Desayuno</option>
                          <option selected value="Cena">Cena</option>
                        </select>
                    </td>';
                }
                else if($servicioAlimentacion->getTiempoComidasServicioAlimentacion()=="Almuerzo,Cena")
                {
                     echo '<td>
                  <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">                
                          <option selected value="Almuerzo">Almuerzo</option>
                          <option selected value="Cena">Cena</option>
                        </select>
                    </td>';
                }
                else if($servicioAlimentacion->getTiempoComidasServicioAlimentacion()=="Desayuno,Almuerzo,Cena")
                {
                     echo '<td>
                  <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">                
                          <option selected value="Desayuno">Desayuno</option>
                          <option selected value="Almuerzo">Almuerzo</option>
                          <option selected value="Cena">Cena</option>
                        </select>
                    </td>';
                }












                
                echo '<td><input type="text" name="descripcionAlimentacionServicioAlimentacion" id="descripcionAlimentacionServicioAlimentacion" value="' . $servicioAlimentacion->getDescripcionAlimentacionServicioAlimentacion() . '"/></td>';


                echo '<td><input type="text" name="precioServicioAlimentacion" id="precioServicioAlimentacion" value="'."₡". $servicioAlimentacion->getPrecioServicioAlimentacion() . '" onchange="numerosTabla()"/></td>';


                echo '<td><input type="text" name="AdicionalesServicioAlimentacion" id="AdicionalesServicioAlimentacion" value="' . $servicioAlimentacion->getAdicionalesServicioAlimentacion() . '"/></td>';



                if($servicioAlimentacion->getAlimentacionllevarServicioAlimentacion()=="1")
                {
                    echo '<td> 
                    <select name="alimentacionLlevarServicioAlimentacion" id="alimentacionLlevarServicioAlimentacion">                
                          <option selected value="1">Si</option>
                          <option value="0">No</option>
                    </select>
                     </td>';
                }
                else
                {
                    echo '<td> 
                    <select name="alimentacionLlevarServicioAlimentacion" id="alimentacionLlevarServicioAlimentacion">                
                          <option value="1">Si</option>
                          <option selected  value="0">No</option>
                    </select>
                     </td>';
                }


                echo '</select>';
                echo '</td>'; 

                 echo '<td><select name="idsitio" id="idsitio"> '?>
                        <?php
                          foreach ($listaSitios as $sitio){
                        ?>
                          <?php
                            if($sitio->getIdSitio() == $servicioAlimentacion->getSitioTuristico()){  ?>

                               <option selected value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php }else{?>

                                 <option value="<?php echo $sitio->getIdSitio();?>"><?php echo $sitio->getNombreComercial();?></option>;
                              <?php  } ?>
                          
                         
                        <?php 
                           } 
                        ?>
                <?php  



                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
             
                echo '</tr>';
                echo '</form>';
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
                          else if($_GET['error'] == "emptyField")
                          {
                             echo '<script language="javascript">alert("Error al procesar la transacción hay campos vacios");</script>'; 
                          
                          }
                          else if($_GET['error'] == "error")
                          {
                              echo '<script language="javascript">alert("Error: Error al procesar la transacción No se ingresaron datos");</script>'; 
                          }
                      }
                      else if (isset($_GET['success'])) 
                      {
                          echo '<script language="javascript">alert("Transacción Realizada");</script>'; 
                      }
        ?>


    


    


<script>

            function t1()
            {
                if(document.getElementById("tiempoComidasServicioAlimentacionD").checked)
                {
                    document.getElementById("descripcionAlimentacionServicioAlimentacionD").disabled = false;
                    document.getElementById("precioServicioAlimentacionD").disabled = false;
                }
                else
                {
                    document.getElementById("descripcionAlimentacionServicioAlimentacionD").disabled = true;
                    document.getElementById("descripcionAlimentacionServicioAlimentacionD").value='';  

                    document.getElementById("precioServicioAlimentacionD").disabled = true;
                    document.getElementById("precioServicioAlimentacionD").value='';   
                }
            }

            function t2()
            {     
    
                if(document.getElementById("tiempoComidasServicioAlimentacionA").checked)
                {
                    document.getElementById("descripcionAlimentacionServicioAlimentacionA").disabled = false;
                    document.getElementById("precioServicioAlimentacionA").disabled = false;
                }
                else
                {
                    document.getElementById("descripcionAlimentacionServicioAlimentacionA").disabled = true;
                    document.getElementById("descripcionAlimentacionServicioAlimentacionA").value='';

                    document.getElementById("precioServicioAlimentacionA").disabled = true;
                    document.getElementById("precioServicioAlimentacionA").value='';
                }
            }

            function t3()
            {     
    
                if(document.getElementById("tiempoComidasServicioAlimentacionC").checked)
                {
                    document.getElementById("descripcionAlimentacionServicioAlimentacionC").disabled = false;
                    document.getElementById("precioServicioAlimentacionC").disabled = false;
             
                }
                else
                {
                    document.getElementById("descripcionAlimentacionServicioAlimentacionC").disabled = true;
                    document.getElementById("descripcionAlimentacionServicioAlimentacionC").value='';

                    document.getElementById("precioServicioAlimentacionC").disabled = true;
                    document.getElementById("precioServicioAlimentacionC").value='';
                }
            }
</script>







</body>

    <?php  
  }
?>


</html>
