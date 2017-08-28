<!DOCTYPE html>
<? php

include '../business/tuFamiliaBusiness.php';

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
            Cantidad:
              <input type="number" id="cantidadadultos" name="cantidadadultos">
            <br>
          Cantidad de Adolecentes:
            <input type="number" id="cantidadadolecentes" name="cantidadadolecentes">

            <br>
            Cantidad de niños:
                <input type="number" id="cantidadninos" name="cantidadninos">
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

            </tr>

            <?php

                $TuFamiliaBusiness = new TuFamiliaBusiness();
                $todasFamilias= $TuFamiliaBusiness->mostrarFamilias();
                foreach ($todasFamilias as $tuFamilia) {


                    echo '<form method="post" enctype="multipart/form-data" action="../business/tuFamiliaAction.php">';
                    echo '<input type="hidden" name="idfamilia" id="idfamilia" value="' . $tuFamilia->getIdFamilia().'">';

                    echo '<td><input type="number" name="cantidadadultosmayores" id="cantidadadultosmayores value="' . $tuFamilia->getAdulltoMayorFamilia().'">';

                    echo '<td><input type="number" name="adultosfamilia" id="adultosfamilia" value="' . $tuFamilia->getAdulltoFamilia().'">';
                    echo '<td><input type="number" name="cantidadadolecentes" id="cantidadadolecentes" value="' . $tuFamilia->getAdolecenteFamilia().'">';
                    echo '<td><input type="number" name="cantidadninos" id="cantidadninos" value="' . $tuFamilia->getNinos().'">';

                    echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                    echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';

                    echo '</tr>';
                    echo '</form>';
                }
            ?>
    </table>
</body>
</html>
