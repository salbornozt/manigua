<?php
session_start();

require_once '../librerias/dompdf/autoload.inc.php';
require_once '../librerias/dompdf/src/Dompdf.php';
require_once "../../Util/conexion.php";

$nomA = $_SESSION['nameA'];
$maiA = $_SESSION['mailA'];

$obj=new Conexion();
$conexion=$obj->conectarBD();

$sql1="SELECT count(booking_code) as cantidad
                      FROM booking, documents 
                      WHERE booking.cod_doc = documents.cod_doc AND
                      documents.t_doc_code = 1 AND
                      EXTRACT(YEAR from booking.booking_date)=".$_POST['año'].";";
$result1=pg_query($conexion,$sql1);

$sql2="SELECT count(booking_code) as cantidad
                      FROM booking, documents 
                      WHERE booking.cod_doc = documents.cod_doc AND
                      documents.t_doc_code = 2 AND
                      EXTRACT(YEAR from booking.booking_date)=".$_POST['año'].";";
$result2=pg_query($conexion,$sql2);

$sql3="SELECT count(booking_code) as cantidad
                      FROM booking, documents 
                      WHERE booking.cod_doc = documents.cod_doc AND
                      documents.t_doc_code = 3 AND
                      EXTRACT(YEAR from booking.booking_date)=".$_POST['año'].";";
$result3=pg_query($conexion,$sql3);

ob_start();
?>

<div align="center">
<br>
<img src="../../img/icon.png" height="120" width="120"/><br><br>
<img src="../../img/m.png" height="30" width="170"/>
<br><br>
<h2>INFORME <?php echo $_POST['año']; ?></h2>
<br><br>
<h3 align="left">DE: <?php echo $nomA; ?></h3>
<h3 align="left">ASUNTO: Reporte prestamos anuales</h3>
<h3 align="left">FECHA: <?php $fecha = new DateTime("now", new DateTimeZone('America/Bogota')); $fecha->setTimezone(new DateTimeZone('America/Bogota')); echo $fecha->format('d-m-Y');?></h3>
<hr>
<h4 style="text-align: justify;">Cordial saludo señor administrador, por medio de la presente se hace entrega del informe detallado sobre el prestamo de documentos en el año <?php echo $_POST['año']; ?>.</h4>
<br>
<h3>Reporte prestamos anuales <?php echo '('.$_POST['año'].')'; ?></h3>
<br>
  <table class="table table-hover table-condensed" id="DataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>PRESTAMOS</td>
                      <td>CANTIDAD</td>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  while($mostrar1=pg_fetch_row($result1))
                  {
                  ?>
                  <tr>
                      <td>Artículos científicos</td>
                      <td><?php echo $mostrar1[0] ?></td>
                  </tr>
                  <?php 
                    }
                  ?>
                  <?php
                  while($mostrar2=pg_fetch_row($result2))
                  {
                  ?>
                  <tr>
                      <td>Libros</td>
                      <td><?php echo $mostrar2[0] ?></td>
                  </tr>
                  <?php 
                    }
                  ?>
                  <?php
                  while($mostrar3=pg_fetch_row($result3))
                  {
                  ?>
                  <tr>
                      <td>Ponencias</td>
                      <td><?php echo $mostrar3[0] ?></td>
                  </tr>
                  <?php 
                    }
                  ?>
                  </tbody>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>PRESTAMOS</td>
                      <td>CANTIDAD</td>
                    </tr>
                  </tfoot>
                </table>

  <div style="background-color: #74c14e; color: #fff; width:100%; float:left; position:absolute; bottom:0; z-index:999999; font-weight: bold;"><br>
  <table border="0" align="center" style="border-spacing: 30px 5px;">
    <tr>
      <td><?php $fecha = new DateTime("now", new DateTimeZone('America/Bogota')); $fecha->setTimezone(new DateTimeZone('America/Bogota')); echo $fecha->format('d-m-Y H:i:s');?></td>
      <td>POR INNOSOFT UEB</td>
      <td><?php echo $maiA; ?></td>
    </tr>
  </table><br>
  </div></div>
</html>

<?php
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml( ob_get_clean() );
$dompdf->render();
$dompdf->stream("ReportePrestamos(".$_POST['año'].").pdf");
?>