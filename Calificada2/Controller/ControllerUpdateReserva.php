<?php
include('../Model/ModelCRUDReserva.php');
$rut = $_POST['rut'];
$nom = $_POST['nom'];
$ap = $_POST['ap'];
$cant = $_POST['cant'];
$dias = $_POST['dias'];
$tipo = $_POST['tipo'];
$fecha = $_POST['fecha'];
$personas = $cant + 1;
$objReserva = new ModelCRUDReserva();
if ($objReserva->validaCabaña($tipo, $personas)) {
    echo "Deberia cambiar de Cabaña o Eliminar gente <br>";
} else {
    $validaReserva = $objReserva->ValidaFechaEdit($fecha, $dias, $tipo, $rut);
    $resultado = mysqli_fetch_assoc($validaReserva);

    if ($resultado != null) {
        echo "La fecha de reserva está ocupada. Por favor, elija otra fecha o duración.";
    } else {

        $Resp = $objReserva->UpdateReserva($rut, $nom, $ap, $cant, $dias, $tipo);
        echo $Resp;
    }
}
?>