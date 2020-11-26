<?php
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

require_once '../../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$sql1="SELECT * FROM booking";

$result1=pg_query($conexion,$sql1);
?>

			<div>
				<table class="table table-hover table-condensed" id="iddatatable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO</td>
                      <td>NOMBRES Y APELLIDOS</td>
                      <td>TIPO DE DOCUMENTO</td>
                      <td>FECHA DE RESERVA</td>
                      <td>FECHA DE DEVOLUCIÓN</td>
                    </tr>
                  </thead>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO</td>
                      <td>NOMBRES Y APELLIDOS</td>
                      <td>TIPO DE DOCUMENTO</td>
                      <td>FECHA DE RESERVA</td>
                      <td>FECHA DE DEVOLUCIÓN</td>
                    </tr>
                  </tfoot>

                  <tbody>
                  <?php 
                    while ($mostrar=pg_fetch_row($result1))
                    {
                  ?>
                    <tr>
                      <td><?php echo $mostrar[0] ?></td>
                      <td>
                        <?php
                          $sql="SELECT user_name FROM customer WHERE user_code ='".$mostrar[1]."';";
                          $result2=pg_query($conexion,$sql);

                          while ($mostrar1=pg_fetch_row($result2))
                          { 
                          echo $mostrar1[0];
                          }
                        ?>
                      </td>
                      <td>
                        <?php 
                          if ($mostrar[2] == 1) 
                          {
                            echo "Artículo científico";
                          }
                          else if ($mostrar[2] == 2) 
                          {
                            echo "Libro";
                          }
                          else if ($mostrar[2] == 3) 
                          {
                            echo "Ponencia";
                          } 
                        ?>
                      </td>
                      <td><?php echo $mostrar[3] ?></td>
                      <td>
                        <?php
                          if($mostrar[4] == null)
                          {
                            echo 'N/A';
                          }
                          else
                          {
                            echo $mostrar[4];
                          }
                        ?>
                      </td>
                    </tr>
                  <?php 
                    }
                  ?>
                  </tbody>
                </table>
			</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#iddatatable').DataTable();
  } );
</script>