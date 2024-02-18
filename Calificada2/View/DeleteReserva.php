<?php
$rut = $_POST['rut'];
$dv = $_POST['dv'];
$nom = $_POST['nom'];
$ap = $_POST['ap'];
$cant = $_POST['cant'];
$dias = $_POST['dias'];
$fecha = $_POST['fecha'];
$tipo = $_POST['tipo'];
?>

<!DOCTYPE html>

<head>
    <title>Delete</title>
    <style>
        h2 {
            text-align: center;
            margin-top: 30px;
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
</head>

<body>
    <h2>Está seguro que quiere eliminar la Reserva?</h2>
    <form action="../Controller/ControllerDeleteReserva.php" method="POST">
        <table align="center">
            <tr>
                <td>Rut</td>
                <td><input type="text" name="r" id="r" value="<?php echo $rut; ?>" disabled></td>
            </tr>
            <tr>
                <td>DV</td>
                <td><input type="text" name="digi" id="digi" value="<?php echo $dv; ?>" disabled></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" disabled></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type="text" name="ap" id="ap" value="<?php echo $ap; ?>" disabled></td>
            </tr>
            <tr>
                <td>Acompañantes</td>
                <td><input type="text" name="cant" id="cant" value="<?php echo $cant; ?>" disabled></td>
            </tr>
            <tr>
                <td>Dias</td>
                <td><input type="text" name="dias" id="dias" value="<?php echo $dias; ?>" disabled></td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td><input type="text" name="fecha" id="fecha" value="<?php echo $fecha; ?>" disabled></td>
            </tr>
            <tr>
                <td>Cabaña</td>
                <td><input type="text" name="tipo" id="tipo" value="<?php echo $tipo; ?>" disabled></td>
            </tr>

            <input type="hidden" name="rut" id="rut" value="<?php echo $rut; ?>"><br>
            <input type="hidden" name="dv" id="dv" value="<?php echo $dv; ?>"><br>

            <td></td>
            <td><input class="btn" type="submit" value="Eliminar">
            <td>
        </table>
    </form>
</body>

</html>