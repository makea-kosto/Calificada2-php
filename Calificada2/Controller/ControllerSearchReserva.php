<?php
include('../Model/ModelCRUDReserva.php');
$rut = $_POST['r'];
$dv = $_POST['dv'];
$objReserva = new ModelCRUDReserva();
$resp = $objReserva->SearchReserva($rut, $dv);
if (mysqli_num_rows($resp) === 0) {
    echo "No se encontraron resultados";
} else {
    ?>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 50px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .eliminar-container {
            text-align: center;
        }

        .btn {
            background-color: #833CA5;
            color: #ffffff;
            border: 1px solid #000000;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 10px;
            cursor: pointer;

        }
    </style>
    <table>
        <tr>
            <th>Rut</th>
            <th>DV</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Acompañantes</th>
            <th>Dias</th>
            <th>Fecha inicio</th>
            <th>Cabaña</th>
        </tr>
        <?php
        foreach ($resp as $value) {
            $rut = $value['RUT_SOLICITANTE'];
            $dv = $value['VCH_DV_SOLICITANTE'];
            $nom = $value['VCH_NOMBRES_SOLICITANTE'];
            $ap = $value['VCH_APELLIDOS_SOLICITANTE'];
            $cant = $value['INT_CAT_ACOM_SOLICITANTE'];
            $dias = $value['INT_CAT_DIAS_SOLICITANTE'];
            $fecha = $value['DATE_FECHA_INICIO_SOLICITANTE'];
            $tipo = $value['VCH_CABAÑA_SOLICITANTE'];

            echo '<tr><td>' . $rut . '</td><td>' . $dv . '</td><td>' . $nom . '</td><td>' . $ap . '</td><td>' . $cant . '</td><td>' . $dias . '</td><td>' . $fecha . '</td><td>' . $tipo . '</td></tr>
        </table>
        <div class="eliminar-container">
                <form action="../VIEW/DeleteReserva.php" method="POST">'
                . '<input type="hidden" name="rut"  value="' . $rut . '">'
                . '<input type="hidden" name="dv"  value="' . $dv . '">'
                . '<input type="hidden" name="nom"  value="' . $nom . '">'
                . '<input type="hidden" name="ap"  value="' . $ap . '">'
                . '<input type="hidden" name="cant"  value="' . $cant . '">'
                . '<input type="hidden" name="dias"  value="' . $dias . '">'
                . '<input type="hidden" name="fecha"  value="' . $fecha . '">'
                . '<input type="hidden" name="tipo" value="' . $tipo . '">  
                  
                <input class="btn" type="submit" value="ELIMINAR">
                </form>
            </td>
            <td>
            <form action="../VIEW/UpdateReserva.php" method="POST">'
                . '<input type="hidden" name="rut"  value="' . $rut . '"> '
                . '<input type="hidden" name="dv"  value="' . $dv . '">'
                . '<input type="hidden" name="nom"  value="' . $nom . '">'
                . '<input type="hidden" name="ap"  value="' . $ap . '">'
                . '<input type="hidden" name="cant"  value="' . $cant . '">'
                . '<input type="hidden" name="dias"  value="' . $dias . '">'
                . '<input type="hidden" name="fecha"  value="' . $fecha . '">'
                . '<input type="hidden" name="tipo" value="' . $tipo . '">  
                     
                <input class="btn" type="submit" value="ACTUALIZAR">
                </form>
            </td></div>';

        }
}