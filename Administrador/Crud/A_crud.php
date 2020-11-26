<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
if($_SESSION['nameA']==null)
{
    header("Location: ../../Util/logout.php");
}

require_once '../../Util/conexion.php';

	class A_crud
	{
		function deshabilitarRevisor($pCodRevisor)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();

			$sql = "UPDATE customer SET status = 'I' WHERE user_code='".$pCodRevisor."';";
			$r = pg_query($conexion1, $sql);

			$r = 1;

			$nomA = $_SESSION['nameA'];
			$maiA = $_SESSION['mailA'];
			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');
			
			$sql1 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$nomA."', 3,'".$maiA."', 'Eliminar', 'Revisores', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql1);

			return $r;
		}

		function habilitarRevisor($pCodRevisor)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();

			$sql = "UPDATE customer SET status = 'A' WHERE user_code='".$pCodRevisor."';";
			$r = pg_query($conexion1, $sql);

			$r = 1;			

			$nomA = $_SESSION['nameA'];
			$maiA = $_SESSION['mailA'];
			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');

			$sql1 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$nomA."', 3,'".$maiA."', 'Actualizar', 'Revisores', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql1);
		
			return $r;
		}

		function deshabilitarLibro($pCodLibro)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();

			$sql = "UPDATE documents SET status_code = 3 WHERE cod_doc=".$pCodLibro.";";
			$r = pg_query($conexion1, $sql);

			$r = 1;

			$nomA = $_SESSION['nameA'];
			$maiA = $_SESSION['mailA'];
			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');

			$sql1 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$nomA."', 3,'".$maiA."', 'Eliminar', 'Libros', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql1);

			return $r;
		}

		function habilitarLibro($pCodLibro)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();

			$sql = "UPDATE documents SET status_code = 1 WHERE cod_doc=".$pCodLibro.";";
			$r = pg_query($conexion1, $sql);

			$r = 1;

			$nomA = $_SESSION['nameA'];
			$maiA = $_SESSION['mailA'];
			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');

			$sql1 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$nomA."', 3,'".$maiA."', 'Actualizar', 'Libros', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql1);

			return $r;
		}

		function deshabilitarPonencia($pCodPonencia)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();

			$sql = "UPDATE documents SET status_code = 3 WHERE cod_doc=".$pCodPonencia.";";
			$r = pg_query($conexion1, $sql);

			$r = 1;

			$nomA = $_SESSION['nameA'];
			$maiA = $_SESSION['mailA'];
			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');

			$sql1 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$nomA."', 3,'".$maiA."', 'Eliminar', 'Ponencias', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql1);

			return $r;
		}

		function habilitarPonencia($pCodPonencia)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();

			$sql = "UPDATE documents SET status_code = 1 WHERE cod_doc=".$pCodPonencia.";";
			$r = pg_query($conexion1, $sql);

			$r = 1;

			$nomA = $_SESSION['nameA'];
			$maiA = $_SESSION['mailA'];
			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');

			$sql1 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$nomA."', 3,'".$maiA."', 'Actualizar', 'Ponencias', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql1);

			return $r;
		}

		function deshabilitarArticulo($pCodArticulo)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();

			$sql = "UPDATE documents SET status_code = 3 WHERE cod_doc=".$pCodArticulo.";";
			$r = pg_query($conexion1, $sql);

			$r = 1;

			$nomA = $_SESSION['nameA'];
			$maiA = $_SESSION['mailA'];
			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');

			$sql1 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$nomA."', 3,'".$maiA."', 'Eliminar', 'Articulos', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql1);

			return $r;
		}

		function habilitarArticulo($pCodArticulo)
		{
			$obj1 = new Conexion();
			$conexion1=$obj1->conectarBD();

			$sql = "UPDATE documents SET status_code = 1 WHERE cod_doc=".$pCodArticulo.";";
			$r = pg_query($conexion1, $sql);

			$r = 1;

			$nomA = $_SESSION['nameA'];
			$maiA = $_SESSION['mailA'];
			$host= gethostname();
			$ip = gethostbyname($host);
			$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
			$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
			$fechaF = $fecha->format('Y-m-d H:i:s');

			$sql1 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
			values ('".$nomA."', 3,'".$maiA."', 'Actualizar', 'Articulos', '".$fechaF."', '".$ip."');";
			pg_query($conexion1,$sql1);

			return $r;
		}

		function agregarRevisor($datos){

			$obj=new Conexion();
			$conexion=$obj->conectarBD();

			$sql1 ="SELECT * FROM customer WHERE email ='".$datos[4]."';";
            $result = pg_query($conexion,$sql1);

            $sql2 ="SELECT * FROM customer WHERE user_code ='".$datos[1]."';";
            $result2 = pg_query($conexion,$sql2);

            $r = 0;

            if($r=pg_num_rows($result)!=0)
            {
            	$r = 3;
            }
            elseif ($r=pg_num_rows($result2)!=0) 
            {
            	$r = 4;
            }
            else
            {
				$caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	            $longpalabra=8;
	            for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) 
	            {
	                $x = rand(0,$n);
	                $pass.= $caracteres[$x];
	            }

	            $clave = md5($pass);

	            $imp = "
	            <html>
	            <div>
	            <div style='background-color: #7bc142;'>
	                <center><br><h1 style='color: #ffffff'>Librer&iacute;a Manigua</h1><br></center>
	            </div>

	            <div style='text-align: center;'>
	            <h2><br>Hola ".$datos[0].", bienvenido a la librer&iacute;a Manigua, es un gusto trabajar a tu lado, para iniciar sesi&oacute;n debes ingresar tu correo electr&oacute;nico, el cual es ".$datos[4]." y como contrase&ntilde;a ".$pass."
	            <br>Que esperas para ingresar y realizar la revisi&oacute;n de los diversos recursos!<br><br> </h2>
	            </div>

	            <div align='center' style='background-color: #7bc142; color: #ffffff'>
	            <br> Universidad El Bosque <br>  (+57) 310 819 8041 
	            <br> Av. Cra 9 No. 131 A - 02 | Edificio Fundadores | Bogotá D.C. | Colombia 
	            <br>
	            </div>
	            </div>
	            </html>";

	            require 'PHPMailer/Exception.php';
	            require 'PHPMailer/PHPMailer.php';
	            require 'PHPMailer/SMTP.php';

	            $mail = new PHPMailer(true);

	            try 
	            {
		            //Server settings
		            $mail->SMTPDebug = 0;                      // Enable verbose debug output
		            $mail->isSMTP();                                            // Send using SMTP
		            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
		            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		            $mail->Username   = 'ferialaboral2020ueb@gmail.com';        // SMTP username
		            $mail->Password   = '098ueb123';                            // SMTP password
		            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		            //Recipients
		            $mail->setFrom('ferialaboral2020ueb@gmail.com', 'Libreria Manigua');
		            $mail->addAddress($datos[4], $datos[0]);

		            // Attachments
		            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		            // Content
		            $mail->isHTML(true);                                  // Set email format to HTML
		            $mail->Subject = 'Libreria Manigua';
		            $mail->Body    = $imp;
		            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		            if($mail->send())
		            {
		                $sql = "INSERT INTO customer VALUES('".$datos[1]."', '".$datos[0]."', '".$datos[3]."', '".$datos[2]."', '".$datos[4]."', '".$clave."', 2, 'A')";
						$r = pg_query($conexion, $sql);

						$r = 1;
						
						$nomA = $_SESSION['nameA'];
						$maiA = $_SESSION['mailA'];
						$host= gethostname();
						$ip = gethostbyname($host);
						$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
						$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
						$fechaF = $fecha->format('Y-m-d H:i:s');

						$sql3 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
						values ('".$nomA."', 3,'".$maiA."', 'Insertar', 'Revisores', '".$fechaF."', '".$ip."');";
						pg_query($conexion,$sql3);
		            }
	            } 
	            catch (Exception $e) 
	            {
	                $r = 5;
	            }
			}
			return $r;
		}
	}
 ?>