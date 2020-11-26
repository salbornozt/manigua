<?php
session_start();
if($_SESSION['nameR']==null)
{
    header("Location: ../../Util/logout.php");
}

require_once '../../Util/conexion.php';

	class R_crud          
	{

		function habilitar($pCodDoc)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();
			$sql = "UPDATE documents SET status_review = 1 WHERE cod_doc=".$pCodDoc;
			$r = pg_query($conexion1, $sql);			
			$r = 1;

			$nom = $_SESSION['codeR'];
			$name= $_SESSION['nameR'];
			$mail=  $_SESSION['mailR'];
			
			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');

			$sql2 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$name."', 2,'".$mail."', 'Actualizar', 'Documentos', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql2)

			$sql1 = "INSERT INTO audit_doc(cod_doc,user_code,actions,audit_date) VALUES ('".$pCodDoc."','".$nom."','U','".$fechaF."' ) ";
			$r1 = pg_query($conexion1, $sql1);	

			return $r;
		}

		function deshabilitar($pCodDoc)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();
			$sql = "UPDATE documents SET status_review = 2 WHERE cod_doc=".$pCodDoc;
			$r = pg_query($conexion1, $sql);			
			$r = 1;

			$nom = $_SESSION['codeR'];
			$name= $_SESSION['nameR'];
			$mail=  $_SESSION['mailR'];

			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');

			$sql2 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$name."', 2,'".$mail."', 'Eliminar', 'Documentos', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql2);

			$sql1 = "INSERT INTO audit_doc(cod_doc,user_code,actions,audit_date) VALUES ('".$pCodDoc."','".$nom."','D','".$fechaF."' ) ";
			$r1 = pg_query($conexion1, $sql1);
			return $r;

				
		}

		
	}
?>