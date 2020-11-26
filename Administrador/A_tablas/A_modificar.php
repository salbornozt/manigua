<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: text/html; charset=UTF-8');

session_start();
if($_SESSION['nameA']==null)
{
    header("Location: ../../Util/logout.php");
}

$codA = $_SESSION['codeA'];
$nomA = $_SESSION['nameA'];
$AddA = $_SESSION['addrA'];
$celA = $_SESSION['celuA'];
$maiA = $_SESSION['mailA'];

require_once '../../util/Conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$sql="SELECT user_name, pass FROM customer WHERE user_code ='".$codA."';";
$result=pg_query($conexion,$sql);

while ($mostrar=pg_fetch_row($result))
{
?>

<html class="no-js" lang="">
<body>
<div>
  <br>
  <br>
  <br>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="form-horizontal">
      <div class="row form-group">
            <div class="col col-md-4" align="right"><label for="text-input" class=" form-control-label">Contraseña antigua</label></div>
            <div class="col-12 col-md-6" align="center"><input type="password" minlength="5" maxlength="8" id="passA" name="passA"  placeholder="CONTRASEÑA ANTIGUA" required="true" class="form-control"></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-4" align="right"><label for="text-input" class=" form-control-label">Contraseña nueva</label></div>
        <div class="col-12 col-md-6" align="center"><input type="password" minlength="5" maxlength="8" id="passN" name="passN"  placeholder="CONTRASEÑA NUEVA" required="true" class="form-control"></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-4" align="right"><label for="text-input" class=" form-control-label">Confirmar contraseña nueva</label></div>
        <div class="col-12 col-md-6" align="center"><input type="password" minlength="5" maxlength="8" id="passCN" name="passCN"  placeholder="CONFIRMACIÓN CONTRASEÑA NUEVA" required="true" class="form-control"></div>
      </div>
        <br>
      <center><p>Solo se permiten letras mayúsculas, minúsculas y números respectivamente</p></center>
        <br>                                
       <div class="form-actions form-group">
        <center>
          <button type="submit" class="btn btn-success" name="submit">
          <i class="fa fa-floppy-o"></i> Guardar cambios
          </button>
          <button type="submit" class="btn btn-warning" onclick="location.href='perfil.php'">
          <i class="fa fa-floppy-o"></i> Volver
          </button>
      </center>
      </div>
        <br>
        <br>
        <br>
  </form>                                      
</div>

<?php
$pAA = $mostrar[1];
}
if (isset($_POST['submit'])) 
{
  $obj1=new Conexion();
  $conexion1=$obj1->conectarBD();
      
  $pA= $_POST['passA'];
  $pN=$_POST['passN'];
  $pCN=$_POST['passCN'];

  $pcAN=md5($pA);
  $pcN=md5($pN);
  $pcCN=md5($pCN);

  if ($pcAN == $pAA) 
  {
      $patron = "((.*[A-Z])(.*[a-z])(.*\d))";
      if (preg_match($patron, $pN))
      {
        if ($pcN == $pcCN) 
        {
          $sql1="SELECT user_name, email FROM customer WHERE user_code='".$codA."';";
          $r1=pg_query($conexion1,$sql1);

          while ($mostrar=pg_fetch_row($r1))
          {

            $imp = "
            <html>
            <div>
            <div style='background-color: #7bc142;'>
                <center><br><h1 style='color: #ffffff'>Libreria Manigua</h1><br></center>
            </div>

            <div style='text-align: center;'>
            <h2><br>Hola ".$mostrar[0].", haz cambiado tu contrase&ntilde;a. Ahora es: ".$pCN.", ser&aacute; tu contrase&ntilde;a hasta que la cambies nuevamente.
            <br>Que esperas para ingresar y realizar la revisi&oacute;n de los diversos recursos!<br><br> </h2>
            </div>

            <div align='center' style='background-color: #7bc142; color: #ffffff'>
            <br> Universidad El Bosque <br>  (+57) 310 819 8041 
            <br> Av. Cra 9 No. 131 A - 02 | Edificio Fundadores | Bogotá D.C. | Colombia 
            <br>
            </div>
            </div>
            </html>";

            require '../Crud/PHPMailer/Exception.php';
            require '../Crud/PHPMailer/PHPMailer.php';
            require '../Crud/PHPMailer/SMTP.php';

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
              $mail->addAddress($mostrar[1], $mostrar[0]);

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
                $sql="UPDATE customer SET pass='$pcCN' WHERE user_code='".$codA."';";
                pg_query($conexion1,$sql);

                header("Location: ../../Util/logout.php");
              }
            } 
            catch (Exception $e) 
            {
              header("Location: ../modificar.php");
            }
          }
        }
        else 
        {
          header("Location: ../modificar.php");
        }
      }
      else
      {  
        header("Location: ../modificar.php");
      }
  }
  else
  {
    header("Location: ../modificar.php");
  }
}
?>

</body>
</html>

</script>

<script type="text/javascript">
	$(document).ready(function() 
  {
		$('#iddatatable').DataTable();
	} );

</script>