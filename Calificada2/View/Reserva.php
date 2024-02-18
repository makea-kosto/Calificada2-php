<!DOCTYPE html>
<html>

<head>
    <title>Reserva</title>
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
    <br>
    <h2>Reserva de Cabaña</h2><br><br>
    <form action="../Controller/ControllerReserva.php" method="POST" onsubmit="return valida()">
        <table align="center">
            <tr>
                <td>Rut</td>
                <td><input type="text" name="r" id="r"></td>
                <td><input type="text" size="1" name="dv" id="dv"></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><input type="text" name="n" id="n"></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type="text" name="a" id="a"></td>
            </tr>
            <tr>
                <td>Cantidad Acompañantes</td>
                <td><input type="text" name="c" id="c"></td>
            </tr>
            <tr>
                <td>Cantidad dias</td>
                <td><input type="text" name="d" id="d"></td>
            </tr>
            <tr>
                <td>Fecha de inicio</td>
                <td><input type="date" name="f" id="f"></td>
            </tr>
            <tr>
                <td>Tipo Cabaña</td>
                <td>
                    <select name="t" id="t">
                        <!-- Aunque ponga en value la ñ, en la base de datos no lo guarda asi que la deje como Pequena -->
                        <option selected value="">Seleccionar</option>
                        <option value="Pequena">Pequeña(4 personas)</option>
                        <option value="Mediana">Mediana(8 personas)</option>
                        <option value="Grande">Grande(12 personas)</option>
                    </select>
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td><input class="btn" type="submit" value="Reservar"></td>
            </tr>
        </table>
    </form>
</body>

</html>