<?php

if (
    empty($_POST['r']) || empty($_POST['dv']) || empty($_POST['n']) || empty($_POST['a']) || empty($_POST['c']) || empty($_POST['d']) || empty($_POST['f'])
    || empty($_POST['t'])
) {
    echo "Faltan campos por ingresar";
} else {
    include('../Model/ModelCRUDReserva.php');
    $objreserva = new ModelCRUDReserva();
    $fecha = $_POST['f'];


    $rut = $_POST['r'];
    $dv = $_POST['dv'];
    $nom = $_POST['n'];
    $ap = $_POST['a'];
    $cant = $_POST['c'];
    $dia = $_POST['d'];

    $peque = 4;
    $medio = 8;
    $grande = 12;
    $personas = $cant + 1;
    $tipo = $_POST['t'];

    if(!$objreserva->validarRut($rut)){
        echo "El rut ya está reservado.";
    }else{

    if ($objreserva->validaCabaña($tipo, $personas)) {
        echo "No debe exceder el límite de la cabaña seleccionada<br>";
    } else {
        $validaReserva = $objreserva->ValidaFecha($fecha, $dia, $tipo);
        $filas = $validaReserva->num_rows;

        if ($filas >= 1) {
            echo "La fecha de reserva está ocupada. Elija otra fecha o duración.";
        } else {
            $respuesta = $objreserva->InsertReserva($rut, $dv, $nom, $ap, $cant, $dia, $fecha, $tipo);
            echo $respuesta;
        }
    }
}
}

