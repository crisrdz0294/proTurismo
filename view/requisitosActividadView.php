<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Turismo Rural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="../js/jquery-3.2.1.js"></script>
<?php 
  session_start();

    
     if(isset($_SESSION['administrador'])){

     }else{
      header("Location: ../index.php");
     }

 ?>
    <?php
    include '../business/requisitosActividadBusiness.php';
    $requisitos = new requisitosActividadBusiness();
    $mostrarAct=$requisitos->mostrarActividades();

    if(empty($mostrarAct)){
            echo "<h3>No se pueden crear requisitos porque no hay actividades ingresadas en el sistema</h3>";
          ?>
          <br><a href="../view/actividadesView.php">Crear Actividades</a>
          <?php  
          }
          else{

     ?>

</head>

<body>

    <header>
        </header>

             <h1>REQUISITOS DE ACTIVIDAD</h1>
             <br>
             <form id="form" method="post" action="../business/requisitosActividadAction.php">
                    Edad:
                  <select name="edadRequisitosActividad" id="edadRequisitosActividad">
                      
                        <option value="8 - 15">8 - 15 años</option>
                        <option value="16 - 25">16 - 25 años</option>
                        <option value="26 - 35">26 - 35 años</option>
                        <option value="36 - 50">36 - 50 años</option>
                        <option value="51 o mas">51 o mas años</option>
                    
                  </select>

                    <br>
                    <br>
                    Conocimiento:<br>
                    <textarea required name="conocimientoRequisitosActividad" id="conocimientoRequisitosActividad" cols="30" rows="5" placeholder="Describa los conocimientos"></textarea>
                    <br>
                    <br>
                    Estado Fisico:<br>
                    <textarea required name="estadoFisicoRequisitosActividad" id="estadoFisicoRequisitosActividad"cols="30" rows="5" placeholder="Describa su estado fisico"></textarea>

                    <br>
                    <br>
                    Equipo Necesario:<br>
                    <textarea required name="equipoNecesarioRequisitosActividad" id="equipoNecesarioRequisitosActividad" cols="30" rows="5" placeholder="Describa el equiponecesario"></textarea>
                    <br>
                    <br>
                    Aptitudes:<br>
                    <textarea required name="aptitudesRequisitosActividad" id="aptitudesRequisitosActividad" cols="30" rows="5" placeholder="Describa las aptitudes"></textarea>
                    <br>
                    <br>

                    Actividad:
                    <?php
                    echo '
                    <select id="idActividad" name="idActividad">';


                   			 foreach ($mostrarAct as $Actividad){

                   			 echo '<option value="'.$Actividad->getIdActividad().'">'.$Actividad->getNombreActividad().'</option>;';

                   				}

                    echo ' </select><br><br>';
                   ?>

                    <input type="submit" value="Guardar" name="guardarRequisitosActividad" id="guardarRequisitosActividad"/><br><br>

    </form>

    <table border="1">
        <tr>
            <th>Edad  </th>
            <th>Conocimiento </th>
            <th>Estado fisico </th>
            <th>Equipo necesario </th>
            <th>Aptitudes </th>
            <th>Actividad</th>
            <th>Opcion 1</th>
            <th>Opcion 2</th>
        </tr>

         <?php
            $requisitosActividadBusiness = new requisitosActividadBusiness();
            $mostrarAct=$requisitos->mostrarActividades();
            $todosRequisitosActividad = $requisitosActividadBusiness->mostrarTodosRequisitosActividad();
             

             foreach ($todosRequisitosActividad as $requisitosActividad) 
             {
                echo '<form method="post" enctype="multipart/form-data" action="../business/requisitosActividadAction.php">';
               


                echo '<input type="hidden" name="idRequisitosActividad" id="idRequisitosActividad" value="' . $requisitosActividad->getIdRequisitosActividad() .'">';
               

                echo '<tr>';
               

                switch ($requisitosActividad->getEdadRequisitosActividad()) 
                   {
                            case '8 - 15':
                                echo '<td>
                                <select name="edadRequisitosActividad" id="edadRequisitosActividad">                      
                                        <option selected  value="8 - 15">8 - 15 años</option>
                                        <option value="16 - 25">16 - 25 años</option>
                                        <option value="26 - 35">26 - 35 años</option>
                                        <option value="36 - 50">36 - 50 años</option>
                                        <option value="51 o mas">51 o mas años</option>                    
                                  </select>
                                </td>';
                            break;

                            case '16 - 25':
                                echo '<td>
                                <select name="edadRequisitosActividad" id="edadRequisitosActividad">                      
                                        <option value="8 - 15">8 - 15 años</option>
                                        <option selected value="16 - 25">16 - 25 años</option>
                                        <option value="26 - 35">26 - 35 años</option>
                                        <option value="36 - 50">36 - 50 años</option>
                                        <option value="51 o mas">51 o mas años</option>                    
                                  </select>
                                </td>';
                            break;

                            case '26 - 35':
                                echo '<td>
                                <select name="edadRequisitosActividad" id="edadRequisitosActividad">                      
                                        <option value="8 - 15">8 - 15 años</option>
                                        <option value="16 - 25">16 - 25 años</option>
                                        <option selected value="26 - 35">26 - 35 años</option>
                                        <option value="36 - 50">36 - 50 años</option>
                                        <option value="51 o mas">51 o mas años</option>                    
                                  </select>
                                </td>';
                            break;

                            case '36 - 50':
                                echo '<td>
                                <select name="edadRequisitosActividad" id="edadRequisitosActividad">                      
                                        <option value="8 - 15">8 - 15 años</option>
                                        <option value="16 - 25">16 - 25 años</option>
                                        <option value="26 - 35">26 - 35 años</option>
                                        <option selected value="36 - 50">36 - 50 años</option>
                                        <option value="51 o mas">51 o mas años</option>                    
                                  </select>
                                </td>';
                            break;

                            case '51 o mas':
                                echo '<td>
                                <select name="edadRequisitosActividad" id="edadRequisitosActividad">                      
                                        <option value="8 - 15">8 - 15 años</option>
                                        <option value="16 - 25">16 - 25 años</option>
                                        <option value="26 - 35">26 - 35 años</option>
                                        <option value="36 - 50">36 - 50 años</option>
                                        <option selected value="51 o mas">51 o mas años</option>                    
                                  </select>
                                </td>';
                            break;

                            default:
                                # code...
                                break;
                        }

               


                echo '<td><textarea name="conocimientoRequisitosActividad" id="conocimientoRequisitosActividad">'.$requisitosActividad->getConocimientoRequisitosActividad().'</textarea></td>';
                
                  echo '<td><textarea name="estadoFisicoRequisitosActividad" id="estadoFisicoRequisitosActividad">'.$requisitosActividad->getEstadoFisicoRequisitosActividad().'</textarea></td>';
                 echo '<td><textarea  name="equipoNecesarioRequisitosActividad" id="equipoNecesarioRequisitosActividad">'. $requisitosActividad->getEquipoNecesarioRequisitosActividad().'</textarea></td>';
                echo '<td><textarea name="aptitudesRequisitosActividad" id="aptitudesRequisitosActividad">'.$requisitosActividad->getAptitudesRequisitosActividad().'</textarea></td>';


                echo '<td>
               <select id="idActividad" name="idActividad">';


                     foreach ($mostrarAct as $Actividad){

                     echo '<option value="'.$Actividad->getIdActividad().'">'.$Actividad->getNombreActividad().'</option>;';

                      }


               echo ' </select><br><br></td>';


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




    <footer>
    </footer>

</body>

<?php  
  }
?>
</html>
