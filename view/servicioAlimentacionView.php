<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Turismo Rural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
                   
                    Tipo de Alimentacion:<br>
                    <textarea required name="tipoAlimentacionServicioAlimentacion" id="tipoAlimentacionServicioAlimentacion" cols="30" rows="5" placeholder="Describa el tipo de alimentacion"></textarea>
                    <br> 
                    <br>
                    Tiempo de Comidas:
                    <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">               
                            <option selected value="1">1 tiempo</option>
                            <option value="2">2 tiempo</option>
                            <option value="3">3 tiempo</option>
                        </select>
                    <br>
                    <br>
                    Descripcion Alimentacion:<br>
                    <textarea required name="descripcionAlimentacionServicioAlimentacion" id="descripcionAlimentacionServicioAlimentacion" cols="30" rows="5" placeholder="Describa la alimentacion"></textarea>
                    <br>
                    <br>
                    
                    
                    <input type="submit" value="Guardar" name="guardarServicioAlimentacion" id="guardarServicioAlimentacion"/><br><br>

    </form>
 
    <table>
        <tr>
            <th>TipodeAlimentacion  </th>
            <th>TiempoComidas </th>
            <th>DescripcionAlimentacion</th>
        </tr>

         <?php
            $servicioalimentacionBusiness = new ServicioAlimentacionBusiness();
            $todosServicioalimentacion = $servicioalimentacionBusiness->mostrarTodosServicioAlimentacion();
             foreach ($todosServicioalimentacion as $servicioAlimentacion) {

                echo '<form method="post" enctype="multipart/form-data" action="../business/servicioAlimentacionBusinessAction.php">';
                echo '<input type="hidden" name="idServicioAlimentacion" id="idServicioAlimentacion" value="' . $servicioAlimentacion->getIdServicioAlimentacion() .'">';
                echo '<tr>';

                echo '<td><input type="text" name="tipoAlimentacionServicioAlimentacion" id="tipoAlimentacionServicioAlimentacion" value="' . $servicioAlimentacion->getTipoAlimentacionServicioAlimentacion() . '"/></td>';


                if($servicioAlimentacion->getTiempoComidasServicioAlimentacion()==1){
                       echo '<td> 
                       <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">               
                            <option selected value="1">1 tiempo</option>
                            <option value="2">2 tiempo</option>
                            <option value="3">3 tiempo</option>
                        </select> 
                       </td>';
                }
                else if($servicioAlimentacion->getTiempoComidasServicioAlimentacion()==1){
                       echo '<td> 
                       <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">               
                            <option value="1">1 tiempo</option>
                            <option selected value="2">2 tiempo</option>
                            <option value="3">3 tiempo</option>
                        </select> 
                       </td>';
                }
                else{
                       echo '<td> 
                       <select required name="tiempoComidasServicioAlimentacion" id="tiempoComidasServicioAlimentacion">               
                            <option value="1">1 tiempo</option>
                            <option selected value="2">2 tiempo</option>
                            <option value="3">3 tiempo</option>
                        </select> 
                       </td>';
                }
                
                
                echo '<td><input type="text" name="descripcionAlimentacionServicioAlimentacion" id="descripcionAlimentacionServicioAlimentacion" value="' . $servicioAlimentacion->getDescripcionAlimentacionServicioAlimentacion() . '"/></td>';


                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
             
                echo '</tr>';
                echo '</form>';
            }
          ?>

        
    </table>

    <footer>
    </footer>

</body>
</html>
</html>