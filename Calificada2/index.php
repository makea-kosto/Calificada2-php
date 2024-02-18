<!DOCTYPE html>

<head>
    <title>Index</title>
    <style>
        h2 {
            text-align: center;
            margin-top: 30px;
        }

        div {
            text-align: center;
        }

        a {
            font-size: 20px;
        }

        img {
            width: 200px;
            height: 200px;
            opacity: 0;
            transition: opacity 2s ease-in-out;
            display: block;
            margin: 0 auto;
        }


        body:hover img {
            opacity: 1;
        }

        body {
            animation: showImage 2s 5s forwards;
        }

        .div {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h2>Reserva</h2>
    <div class="div">
        <a href="View/Reserva.php">Registro Reserva</a><br>
        <a href="View/SearchReserva.php">Eliminar o Editar</a><br>
        <a href="View/ListadoReserva.php">Listado Reservas</a>

    </div>
    <img src="asd.jpg" alt="Imagen de prueba">
</body>

</html>