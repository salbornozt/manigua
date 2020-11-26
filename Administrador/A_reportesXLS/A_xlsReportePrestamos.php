<?php 
header('Content-Type: text/html; charset=UTF-8');

require_once "../../Util/conexion.php";
  
$obj1=new Conexion();
$conexion=$obj1->conectarBD();

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

header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=ReportePrestamosAnuales(".$_POST['año'].").xls");
?>

<div align="center">
<br>
<h3>Reporte pr&eacute;stamos anuales</h3>
<br>
  <table class="table table-hover table-condensed" id="DataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>PR&Eacute;STAMOS</td>
                      <td>CANTIDAD</td>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  while($mostrar1=pg_fetch_row($result1))
                  {
                  ?>
                  <tr>
                      <td>Art&iacute;culos cient&iacute;ficos</td>
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
                      <td>PR&Eacute;STAMOS</td>
                      <td>CANTIDAD</td>
                    </tr>
                  </tfoot>
                </table>

	<br><br><p align="right"><?php $fecha = new DateTime("now", new DateTimeZone('America/Bogota')); $fecha->setTimezone(new DateTimeZone('America/Bogota')); echo $fecha->format('d-m-Y H:i:s');?></p>
</div>
</html>