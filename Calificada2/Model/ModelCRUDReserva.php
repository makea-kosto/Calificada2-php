<?php
include('Conexion.php');

class ModelCRUDReserva
{
    function validarRut($rut)
    {

        $stringconnection = Conexion::conectar();
        $query = "SELECT * FROM tbl_reserva WHERE RUT_SOLICITANTE = '$rut'";
        $result = mysqli_query($stringconnection, $query);

        if ($result->num_rows > 0) {
            return false;
        } else {
            mysqli_close($stringconnection);
            return true;
        }
    }

    public function validaCabaña($tipo, $personas)
    {
        $peque = 4;
        $medio = 8;
        $grande = 12;
        if ($tipo == "Pequena" && $personas > $peque) {
            return true;
        } elseif ($tipo == "Mediana" && $personas > $medio) {
            return true;
        } elseif ($tipo == "Grande" && $personas > $grande) {
            return true;
        }
        return false;
    }
    public function ValidaFecha($fecha, $dia, $tipo)
    {
        $stringconnection = Conexion::conectar();

        $fechaFin = date('Y-m-d', strtotime($fecha . ' + ' . ($dia - 1) . ' days'));

        $query = "SELECT * FROM tbl_reserva  
        WHERE VCH_CABAÑA_SOLICITANTE = '$tipo' 
        AND ('$fecha' BETWEEN DATE_FECHA_INICIO_SOLICITANTE AND DATE_ADD(DATE_FECHA_INICIO_SOLICITANTE, INTERVAL INT_CAT_DIAS_SOLICITANTE -1 DAY) OR 
             '$fechaFin' BETWEEN DATE_FECHA_INICIO_SOLICITANTE AND DATE_ADD(DATE_FECHA_INICIO_SOLICITANTE, INTERVAL INT_CAT_DIAS_SOLICITANTE -1 DAY))";
        $result = mysqli_query($stringconnection, $query);
        mysqli_close($stringconnection);
        return $result;
    }
    public function ValidaFechaEdit($fecha, $dia, $tipo, $rut)
    {
        $stringconnection = Conexion::conectar();

        $fechaFin = date('Y-m-d', strtotime($fecha . ' + ' . ($dia - 1) . ' days'));

        $query = "SELECT * FROM tbl_reserva  
    WHERE VCH_CABAÑA_SOLICITANTE = '$tipo' 
    AND RUT_SOLICITANTE <> '$rut' 
    AND (
        (DATE_FECHA_INICIO_SOLICITANTE BETWEEN '$fecha' AND '$fechaFin')
        OR (DATE_ADD(DATE_FECHA_INICIO_SOLICITANTE, INTERVAL INT_CAT_DIAS_SOLICITANTE - 1 DAY) BETWEEN '$fecha' AND '$fechaFin')
        OR ('$fecha' BETWEEN DATE_FECHA_INICIO_SOLICITANTE AND DATE_ADD(DATE_FECHA_INICIO_SOLICITANTE, INTERVAL INT_CAT_DIAS_SOLICITANTE - 1 DAY))
    )";

        $result = mysqli_query($stringconnection, $query);
        mysqli_close($stringconnection);
        return $result;
    }
    public function InsertReserva($rut, $dv, $nom, $ap, $cant, $dia, $fecha, $tipo)
    {
        $query = "INSERT INTO tbl_reserva(RUT_SOLICITANTE, VCH_DV_SOLICITANTE, VCH_NOMBRES_SOLICITANTE, VCH_APELLIDOS_SOLICITANTE, INT_CAT_ACOM_SOLICITANTE, 
        INT_CAT_DIAS_SOLICITANTE, DATE_FECHA_INICIO_SOLICITANTE, VCH_CABAÑA_SOLICITANTE) VALUES ('$rut','$dv','$nom','$ap','$cant',
        '$dia','$fecha','$tipo')";
        $stringconnection = Conexion::conectar();
        if (mysqli_query($stringconnection, $query)) {
            $f = mysqli_affected_rows($stringconnection);
            if ($f == 1) {
                $men = "Reserva ingresada con éxito";
            } else {
                $men = "Reserva no se pudo ingresar";
            }
        } else {
            $men = "Conexion fallida";
        }
        mysqli_close($stringconnection);
        return $men;
    }

    public function BuscarReserva($rut)
    {
        $query = "SELECT * FROM tbl_reserva WHERE RUT_SOLICITANTE= '$rut'";
        $stringconnection = Conexion::conectar();
        $result = mysqli_query($stringconnection, $query);
        mysqli_close($stringconnection);
        return $result;

    }

    public function SearchReserva($rut, $dv)
    {
        $query = "SELECT * FROM tbl_reserva WHERE RUT_SOLICITANTE = '$rut' AND VCH_DV_SOLICITANTE = '$dv'";
        $stringconnection = Conexion::conectar();
        $result = mysqli_query($stringconnection, $query);
        mysqli_close($stringconnection);
        return $result;
    }
    public function ListadoReserva($tipo)
    {
        $query = "SELECT * FROM TBL_RESERVA WHERE VCH_CABAÑA_SOLICITANTE LIKE '$tipo'";
        $stringconnection = Conexion::conectar();
        $result = mysqli_query($stringconnection, $query);
        mysqli_close($stringconnection);
        return $result;
    }
    public function DeleteReserva($rut, $dv)
    {
        $query = "DELETE FROM tbl_reserva WHERE RUT_SOLICITANTE = '$rut' AND VCH_DV_SOLICITANTE = '$dv'";
        $stringconnection = Conexion::conectar();
        if (mysqli_query($stringconnection, $query)) {
            $f = mysqli_affected_rows($stringconnection);
            if ($f == 1) {
                $men = "Registro Eliminado";
            } else {
                $men = "Registro No Eliminado";
            }
        } else {
            $men = "Error en la Conexion";
        }
        return $men;
    }
    public function UpdateReserva($rut, $nom, $ap, $cant, $dia, $tipo)
    {
        $query = "UPDATE tbl_reserva SET VCH_NOMBRES_SOLICITANTE ='$nom', VCH_APELLIDOS_SOLICITANTE='$ap', INT_CAT_ACOM_SOLICITANTE ='$cant',
        INT_CAT_DIAS_SOLICITANTE ='$dia', VCH_CABAÑA_SOLICITANTE='$tipo' WHERE RUT_SOLICITANTE = '$rut'";

        $stringconnection = Conexion::conectar();

        if (mysqli_query($stringconnection, $query)) {
            $f = mysqli_affected_rows($stringconnection);
            if ($f == 1) {
                $men = "Registro Actualizado";
            } else {
                $men = "Registro No Actualizado";
            }
        } else {
            $men = "Error en la consulta: " . mysqli_error($stringconnection);
        }

        return $men;
    }
}

