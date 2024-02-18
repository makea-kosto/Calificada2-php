<!DOCTYPE html>

<head>
    <title>Search Reserva</title>
    <style>
        h2 {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
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
    <h2>Ingrese su rut para acceder a la Reserva</h2>
    <form action="../Controller/ControllerSearchReserva.php" method="POST">
        <table align="center">
            <tr>
                <td>Rut: </td>
                <td><input type="text" name="r" id="r"></td>
                <td><input type="text" size="1" name="dv" id="dv"></td>
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