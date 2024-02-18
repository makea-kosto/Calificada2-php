<!DOCTYPE html>

<head>
    <title>Listado Reserva</title>
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
    <h2>Ingrese el tipo de cabaña</h2>
    <form action="../Controller/ControllerListadoReserva.php" method="POST">
        <table align="center">
            <tr>
                <td>Cabaña:</td>
                <td><input type="text" name="c" id="c"></td>
            </tr>
            <tr></tr>
            <tr>
                <td></td>
                <td> <button class="btn" type="submit">Buscar</button></td>
            </tr>
        </table>
    </form>
</body>

</html>