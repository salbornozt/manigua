<?php
session_start();

require_once '../librerias/dompdf/autoload.inc.php';
require_once '../librerias/dompdf/src/Dompdf.php';
require_once "../../Util/conexion.php";

$nomA = $_SESSION['nameA'];
$maiA = $_SESSION['mailA'];

$obj=new Conexion();
$conexion=$obj->conectarBD();

$sql="SELECT count(booking_code) as cantidad
      FROM booking, documents 
      WHERE booking.cod_doc = documents.cod_doc AND
      documents.t_doc_code = 1 AND
      EXTRACT(YEAR from booking.booking_date)=".$_POST['año']." AND
      EXTRACT(MONTH from booking.booking_date)=".$_POST['mes'].";";

$result=pg_query($conexion,$sql);

$mes = $_POST['mes'];

                          if ($mes == "0+1") 
                          {
                            $mes = '1';
                          }
                          elseif ($mes == "1+1") 
                          {
                            $mes = '2';
                          }
                          elseif ($mes == "2+1") 
                          {
                            $mes = '3';
                          }
                          elseif ($mes == "3+1") 
                          {
                            $mes = '4';
                          }
                          elseif ($mes == "4+1") 
                          {
                            $mes = '5';
                          }
                          elseif ($mes == "5+1") 
                          {
                            $mes = '6';
                          }
                          elseif ($mes == "6+1") 
                          {
                            $mes = '7';
                          }
                          elseif ($mes == "7+1") 
                          {
                            $mes = '8';
                          }
                          elseif ($mes == "8+1") 
                          {
                            $mes = '9';
                          }
                          elseif ($mes == "9+1") 
                          {
                            $mes = '10';
                          }
                          elseif ($mes == "10+1") 
                          {
                            $mes = '11';
                          }
                          elseif ($mes == "11+1") 
                          {
                            $mes = '12';
                          }

ob_start();
?>

<div align="center">
<br>
<img src="../../img/icon.png" height="120" width="120"/><br><br>
<img src="../../img/m.png" height="30" width="170"/>
<br><br>
<h2>INFORME <?php echo $mes.'-'.$_POST['año']; ?></h2>
<br><br>
<h3 align="left">DE: <?php echo $nomA; ?></h3>
<h3 align="left">ASUNTO: Reporte artículos por mes</h3>
<h3 align="left">FECHA: <?php $fecha = new DateTime("now", new DateTimeZone('America/Bogota')); $fecha->setTimezone(new DateTimeZone('America/Bogota')); echo $fecha->format('d-m-Y');?></h3>
<hr>
<h4 style="text-align: justify;">Cordial saludo señor administrador, por medio de la presente se hace entrega del informe detallado sobre el prestamo de artículos en el mes <?php echo $mes ?> del año <?php echo $_POST['año']; ?>.</h4>
<br>
<h2 align="center">Reporte artículos por mes <?php echo '('.$mes.'/'.$_POST['año'].')'; ?></h2>
<br>
  <table class="table table-hover table-condensed" id="iddatatable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>FECHA</td>
                      <td>CANTIDAD</td>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  while($mostrar=pg_fetch_row($result))
                  {
                  ?>
                  <tr>
                      <td>
                        <?php 
                          $mes = $_POST['mes'];

                          if ($mes == "0+1") 
                          {
                            echo "Enero / ".$_POST['año'];
                          }
                          elseif ($mes == "1+1") 
                          {
                            echo "Febrero / ".$_POST['año'];
                          }
                          elseif ($mes == "2+1") 
                          {
                            echo "Marzo / ".$_POST['año'];
                          }
                          elseif ($mes == "3+1") 
                          {
                            echo "Abril / ".$_POST['año'];
                          }
                          elseif ($mes == "4+1") 
                          {
                            echo "Mayo / ".$_POST['año'];
                          }
                          elseif ($mes == "5+1") 
                          {
                            echo "Junio / ".$_POST['año'];
                          }
                          elseif ($mes == "6+1") 
                          {
                            echo "Julio / ".$_POST['año'];
                          }
                          elseif ($mes == "7+1") 
                          {
                            echo "Agosto / ".$_POST['año'];
                          }
                          elseif ($mes == "8+1") 
                          {
                            echo "Septiembre / ".$_POST['año'];
                          }
                          elseif ($mes == "9+1") 
                          {
                            echo "Octubre / ".$_POST['año'];
                          }
                          elseif ($mes == "10+1") 
                          {
                            echo "Noviembre / ".$_POST['año'];
                          }
                          elseif ($mes == "11+1") 
                          {
                            echo "Diciembre / ".$_POST['año'];
                          }
                        ?>
                        </td>
                      <td><?php echo $mostrar[0] ?></td>
                  </tr>
                  <?php 
                    }
                  ?>
                  </tbody>
                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>FECHA</td>
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
  </div>
</div>

<?php
$mes = $_POST['mes'];

                          if ($mes == "0+1") 
                          {
                            $mes = '1';
                          }
                          elseif ($mes == "1+1") 
                          {
                            $mes = '2';
                          }
                          elseif ($mes == "2+1") 
                          {
                            $mes = '3';
                          }
                          elseif ($mes == "3+1") 
                          {
                            $mes = '4';
                          }
                          elseif ($mes == "4+1") 
                          {
                            $mes = '5';
                          }
                          elseif ($mes == "5+1") 
                          {
                            $mes = '6';
                          }
                          elseif ($mes == "6+1") 
                          {
                            $mes = '7';
                          }
                          elseif ($mes == "7+1") 
                          {
                            $mes = '8';
                          }
                          elseif ($mes == "8+1") 
                          {
                            $mes = '9';
                          }
                          elseif ($mes == "9+1") 
                          {
                            $mes = '10';
                          }
                          elseif ($mes == "10+1") 
                          {
                            $mes = '11';
                          }
                          elseif ($mes == "11+1") 
                          {
                            $mes = '12';
                          }

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml( ob_get_clean() );
$dompdf->render();
$dompdf->stream("ReporteArticulos(".$mes."_".$_POST['año'].").pdf");
?>