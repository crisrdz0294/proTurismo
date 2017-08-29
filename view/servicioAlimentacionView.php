<!DOCTYPE html>
<html>
<head>

    <title></title>

    <?php 
         include '../business/servicioAlimentacionBusiness.php';
     ?>


     

</head>

<body>

    <header> 
        </header>
    
             <h1>SERVICIO ALIMENTACION</h1>
             <br>
                <form id="form" method="post" action="../business/servicioAlimentacionBusinessAction.php">
                  
                    
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
                    <label>$<input required type="number" name="precioServicioAlimentacionD" id="precioServicioAlimentacionD" disabled = true/></label>
                    Precio Almuerzo:
                    <label>$<input required type="number" name="precioServicioAlimentacionA" id="precioServicioAlimentacionA" disabled = true/></label>
                    Precio Cena:
                    <label>$<input required type="number" name="precioServicioAlimentacionC" id="precioServicioAlimentacionC" disabled = true/></label>
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
                          <option selected value="Si">Si</option>
                          <option value="No">No</option>
                    </select>
                    <br>
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
            <th>Opcion 1</th>
            <th>Opcion 2</th>
        </tr>





        <?php

         $servicioalimentacionBusiness = new ServicioAlimentacionBusiness();
         $todosServicioalimentacion = $servicioalimentacionBusiness->mostrarTodosServicioAlimentacion();
            foreach ($todosServicioalimentacion as $servicioAlimentacion) 
            {

                echo '<form method="post" enctype="multipart/form-data" action="../business/servicioAlimentacionBusinessAction.php">';

                echo '<input type="hidden" name="idServicioAlimentacion" id="idServicioAlimentacion" value="' . $servicioAlimentacion->getIdServicioAlimentacion() .'">';                
                

                echo ' <td><input type="text" name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion" value="'
                . $servicioAlimentacion->getTiempoComidasServicioAlimentacion(). '"/></td>';


                
                echo '<td><input type="text" name="descripcionAlimentacionServicioAlimentacion" id="descripcionAlimentacionServicioAlimentacion" value="' . $servicioAlimentacion->getDescripcionAlimentacionServicioAlimentacion() . '"/></td>';


                echo '<td><input type="text" name="precioServicioAlimentacion" id="precioServicioAlimentacion" value="' . $servicioAlimentacion->getPrecioServicioAlimentacion() . '"/></td>';


                echo '<td><input type="text" name="AdicionalesServicioAlimentacion" id="AdicionalesServicioAlimentacion" value="' . $servicioAlimentacion->getAdicionalesServicioAlimentacion() . '"/></td>';



                if($servicioAlimentacion->getAlimentacionllevarServicioAlimentacion()=="Si")
                {
                    echo '<td> 
                    <select name="alimentacionLlevarServicioAlimentacion" id="alimentacionLlevarServicioAlimentacion">                
                          <option selected value="Si">Si</option>
                          <option value="No">No</option>
                    </select>
                     </td>';
                }
                else
                {
                    echo '<td> 
                    <select name="alimentacionLlevarServicioAlimentacion" id="alimentacionLlevarServicioAlimentacion">                
                          <option value="Si">Si</option>
                          <option selected  value="No">No</option>
                    </select>
                     </td>';
                }






                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
             
                echo '</tr>';
                echo '</form>';
            }
          ?>





    </table>


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


</html>
