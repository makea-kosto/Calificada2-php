<?php
include('../Model/ModelCRUDReserva.php');
$tipo = $_POST['c'];

$objReserva = new ModelCRUDReserva();
$resp = $objReserva->ListadoReserva($tipo);
if (mysqli_num_rows($resp) === 0) {
    echo "No se encontraron resultados";
} else {
    ?>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
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
        $i = 0;
        foreach ($resp as $value) {
            $rut = $value['RUT_SOLICITANTE'];
            $dv = $value['VCH_DV_SOLICITANTE'];
            $nom = $value['VCH_NOMBRES_SOLICITANTE'];
            $ap = $value['VCH_APELLIDOS_SOLICITANTE'];
            $cant = $value['INT_CAT_ACOM_SOLICITANTE'];
            $dias = $value['INT_CAT_DIAS_SOLICITANTE'];
            $fecha = $value['DATE_FECHA_INICIO_SOLICITANTE'];
            $tipo = $value['VCH_CABAÑA_SOLICITANTE'];

            echo '<tr><td>' . $rut . '</td><td>' . $dv . '</td><td>' . $nom . '</td><td>' . $ap . '</td><td>' . $cant . '</td><td>' . $dias . '</td><td>' . $fecha . '</td><td>' . $tipo . '</td></tr>';
            $i++;
            '</table>';
        }
}


