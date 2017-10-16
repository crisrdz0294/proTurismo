<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Turismo Rural</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <script src="../js/jquery-3.2.1.js"></script>
    <?php  
         include '../business/tipoActividadTuristicaBusiness.php';
    ?>


</head>


<body>

        <header>
        </header>

         <h1>Registrar Tipo Actividad Turistica</h1><br>

            <form id="form" method="post" action="../business/tipoActividadTuristicaAction.php">
                    Nombre:
                    <input type="text" name="nombretipoactividadturistica" id="nombretipoactividadturistica" required />
                    <br>
                    <br>
                    <br>
                    Descripcion:
                    <input type="text" name="descripciontipoactividadturistica" id="descripciontipoactividadturistica" required />
                    <br>
                    <br>
                    <br>
                    Estado:
                    <select name="estadotipoactividadturistica">
                      <option value="0">NO DISPONIBLE</option>
                      <option value="1">DISPONIBLE</option>
                    </select>
                    <br>
                    <br>

                    <input type="submit" value="Guardar" name="guardarTipoActividadTuristica" id="guardarTipoActividadTuristica"/><br><br>

            </form>

        <h2>Responsable</h2>
            <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Opcion 1</th>
            </tr>


    <?php

       

         $tipoactividadTuristicaBusiness = new TipoActividadTuristicaBusiness();
         $todosTipoActividadTuristica = $tipoactividadTuristicaBusiness->mostrarTodasTipoActividadTuristica();
         
        foreach ($todosTipoActividadTuristica as $tipoActividadTuristica)
            {

                echo '<form method="post" enctype="multipart/form-data" action="../business/tipoActividadTuristicaAction.php">';



                echo '<input type="hidden" name="idtipoactividadturistica" id="idtipoactividadturistica" value="' . $tipoActividadTuristica->getIdtipoactividadturistica() .'">';


                echo '<td><input type="text" name="nombretipoactividadturistica" id="nombretipoactividadturistica" value="' . $tipoActividadTuristica->getNombretipoactividadturistica() . '"/></td>';


                echo '<td><input type="text" name="descripciontipoactividadturistica" id="descripciontipoactividadturistica" value="' . $tipoActividadTuristica->getDescripciontipoactividadturistica() . '"/></td>';



                        if($tipoActividadTuristica->getEstadotipoactividadturistica()==0)
                        {
                            echo '<td>
                                <select name="estadotipoactividadturistica" id="estadotipoactividadturistica">
                                    <option selected value="0">NO DISPONIBLE</option>
                                    <option  value="1">DISPONIBLE</option>
                                </select>
                            </td>';
                        }
                        else 
                        {
                            echo '<td>
                                <select name="estadotipoactividadturistica" id="estadotipoactividadturistica">
                                    <option value="0">NO DISPONIBLE</option>
                                    <option selected  value="1">DISPONIBLE</option>
                                </select>
                            </td>';
                        }


                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
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


</body>
</html>
