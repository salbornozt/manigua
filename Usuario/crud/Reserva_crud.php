<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();
if($_SESSION['nameU']==null)
{
    header("Location: ../Util/logout.php");
}

require_once '../../Util/conexion.php';

	class Reserva_crud
	{
		function reservarDocumento($pCodDocumento)
		{
			$codU = $_SESSION['codeU'];
			$nomU = $_SESSION['nameU'];
			$AddU = $_SESSION['addrU'];
			$celU = $_SESSION['celuU'];
			$maiU = $_SESSION['mailU'];
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota'));
			$fecha->setTimezone(new DateTimeZone('America/Bogota'));
			$fechaF = $fecha->format('Y-m-d');
			$sql1 = "INSERT into BOOKING (booking_code, user_code, cod_doc, booking_date, return_date) VALUES (DEFAULT, '".$codU."', ".$pCodDocumento.", '".$fechaF."', null)";
			$sql2 = "UPDATE DOCUMENTS set status_code = 2 where cod_doc = ".$pCodDocumento.";";		
			$r1 = pg_query($conexion1, $sql1);	
			$r2 = pg_query($conexion1, $sql2);
			$resultado=1;
			return $resultado;
		}

		function devolverDocumento($pCodBooking, $pCodDocumento)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota'));
			$fecha->setTimezone(new DateTimeZone('America/Bogota'));
			$fechaF = $fecha->format('Y-m-d');
			$sql = "UPDATE BOOKING set return_date = '".$fechaF."' where booking_code = ".$pCodBooking.";";
			$sql1 = "UPDATE DOCUMENTS set status_code = 1 where cod_doc = ".$pCodDocumento.";";
			$re = pg_query($conexion1, $sql);
			$re1 = pg_query($conexion1, $sql1);
			$r = 1;
	        return $r;
		}
	}
 ?>