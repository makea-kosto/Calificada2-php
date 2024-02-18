<?php
include('../Model/ModelCRUDReserva.php');
$rut = $_POST['rut'];
$dv = $_POST['dv'];
$objReserva = new ModelCRUDReserva();
$Resp = $objReserva->DeleteReserva($rut, $dv);
echo $Resp;

?>