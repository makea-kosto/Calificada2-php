<?php
include('../Model/ModelCRUDReserva.php');
$rut = $_POST['rut'];
$dv = $_POST['dv'];
$nom = $_POST['nom'];
$ap = $_POST['ap'];
$cant = $_POST['cant'];
$dias = $_POST['dias'];
$fecha = $_POST['fecha'];
$tipo = $_POST['tipo'];
$objReserva = new ModelCRUDReserva();
$Resp = $objReserva->BuscarReserva($rut);
?>

<!DOCTYPE html>

<head>
    <title>Update reserva</title>
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
    <h2>Editar Reserva</h2>
    <form action="../Controller/ControllerUpdateReserva.php" method="POST">
        <?php
        foreach ($Resp as $value) {
            ?>
            <table align="center">
                <tr>
                    <td>Rut</td>
                    <td><input type="text" name="r" id="r" value="<?php echo $value['RUT_SOLICITANTE']; ?>" disabled></td>
                </tr>
                <tr>
                    <td>DV</td>
                    <td><input type="text" name="digi" id="digi" value="<?php echo $value['VCH_DV_SOLICITANTE']; ?>"
                            disabled></td>
                </tr>
                <tr>
                    <td>Nombres</td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $value['VCH_NOMBRES_SOLICITANTE']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Apellidos</td>
                    <td><input type="text" name="ap" id="ap" value="<?php echo $value['VCH_APELLIDOS_SOLICITANTE']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Acompañantes</td>
                    <td><input type="text" name="cant" id="cant" value="<?php echo $value['INT_CAT_ACOM_SOLICITANTE']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Dias</td>
                    <td><input type="text" name="dias" id="dias" value="<?php echo $value['INT_CAT_DIAS_SOLICITANTE']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td><input type="text" name="f" id="f" value="<?php echo $value['DATE_FECHA_INICIO_SOLICITANTE']; ?>"
                            disabled></td>
                </tr>
                <tr>
                    <td>Cabaña</td>
                    <td><select name="tipo" id="tipo">
                            <option selected value="<?php echo $value['VCH_CABAÑA_SOLICITANTE']; ?>">Seleccionar</option>
                            <option value="Pequena">Pequeña(4 personas)</option>
                            <option value="Mediana">Mediana(8 personas)</option>
                            <option value="Grande">Grande(12 personas)</option>
                        </select></td>
                </tr>

                <input type="hidden" name="rut" id="rut" value="<?php echo $value['RUT_SOLICITANTE']; ?>"><br>
                <input type="hidden" name="fecha" id="fecha"
                    value="<?php echo $value['DATE_FECHA_INICIO_SOLICITANTE']; ?>"><br>

            <?php } ?>
            <tr></tr>
            <tr></tr>
            <td></td>
            <td><input class="btn" type="submit" value="Actualizar">
            <td>
        </table>
    </form>
</body>

</html>