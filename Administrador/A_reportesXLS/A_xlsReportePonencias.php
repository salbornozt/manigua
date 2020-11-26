<?php 
header('Content-Type: text/html; charset=UTF-8');

require_once "../../Util/conexion.php";
  
$obj1=new Conexion();
$conexion=$obj1->conectarBD();

$sql="SELECT count(booking_code) as cantidad
      FROM booking, documents 
      WHERE booking.cod_doc = documents.cod_doc AND
      documents.t_doc_code = 3 AND
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

header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=ReportePoenciasPorMes(".$mes."_".$_POST['año'].").xls");
?>

<div align="center">
<br>
<h3>Reporte ponencias por mes</h3>
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

	<br><br><p align="right"><?php $fecha = new DateTime("now", new DateTimeZone('America/Bogota')); $fecha->setTimezone(new DateTimeZone('America/Bogota')); echo $fecha->format('d-m-Y H:i:s');?></p>
</div>
</html>