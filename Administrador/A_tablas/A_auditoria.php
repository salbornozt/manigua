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

$sql1="SELECT * FROM audit";

$result1=pg_query($conexion,$sql1);
?>

			<div>
				<table class="table table-hover table-condensed" id="iddatatable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO</td>
                      <td>NOMBRES Y APELLIDOS</td>
                      <td>CARGO</td>
                      <td>CORREO ELECTRÓNICO</td>
                      <td>ACCIÓN</td>
                      <td>TABLA MODIFICADA</td>
                      <td>FECHA DE MODIFICACIÓN</td>
                      <td>DIRECCIÓN IP</td>
                    </tr>
                  </thead>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO</td>
                      <td>NOMBRES Y APELLIDOS</td>
                      <td>CARGO</td>
                      <td>CORREO ELECTRÓNICO</td>
                      <td>ACCIÓN</td>
                      <td>TABLA MODIFICADA</td>
                      <td>FECHA DE MODIFICACIÓN</td>
                      <td>DIRECCIÓN IP</td>
                    </tr>
                  </tfoot>

                  <tbody>
                  <?php 
                    while ($mostrar=pg_fetch_row($result1))
                    {
                  ?>
                    <tr>
                      <td><?php echo $mostrar[0] ?></td>
                      <td><?php echo $mostrar[1] ?></td>
                      <td>
                        <?php 
                          if ($mostrar[2] == 1) 
                          {
                            echo "Usuario";
                          }
                          else if ($mostrar[2] == 2) 
                          {
                            echo "Revisor";
                          }
                          else if ($mostrar[2] == 3) 
                          {
                            echo "Administrador";
                          } 
                        ?>
                        </td>
                      <td><?php echo $mostrar[3] ?></td>
                      <td><?php echo $mostrar[4] ?></td>
                      <td><?php echo $mostrar[5] ?></td>
                      <td><?php echo $mostrar[6] ?></td>
                      <td><?php echo $mostrar[7] ?></td>
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