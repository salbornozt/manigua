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

$sql1="SELECT * FROM customer WHERE t_user_code = 2";

$result1=pg_query($conexion,$sql1);
?>
              <div>
                <table class="table table-hover table-condensed" id="iddatatable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO</td>
                      <td>NOMBRES Y APELLIDOS</td>
                      <td>DIRECCIÓN</td>
                      <td>CELULAR</td>
                      <td>CORREO ELECTRÓNICO</td>
                      <td>ESTADO</td>
                      <td>ACCIÓN</td>
                    </tr>
                  </thead>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO</td>
                      <td>NOMBRES Y APELLIDOS</td>
                      <td>DIRECCIÓN</td>
                      <td>CELULAR</td>
                      <td>CORREO ELECTRÓNICO</td>
                      <td>ESTADO</td>
                      <td>ACCIÓN</td>
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
                      <td><?php echo $mostrar[2] ?></td>
                      <td><?php echo $mostrar[3] ?></td>
                      <td><?php echo $mostrar[4] ?></td>
                      <td>
                        <?php 
                          if($mostrar[7] == 'A')
                          {
                            echo 'Activo';
                          }
                          elseif ($mostrar[7] == 'I') 
                          {
                            echo 'Inactivo';
                          }
                        ?>
                      </td>
                      <td>
                        <?php if( $mostrar[7] == 'A'){ ?>
                          <center><span class="btn btn-warning btn-xs" onclick="deshabilitarRevisor(<?php echo $mostrar[0] ?> )">
                            <span class="fas fa-user-alt-slash"></span>
                          </span></center>
                        <?php  } else if ($mostrar[7] == 'I') { ?>
                          <center><span class="btn btn-success btn-xs" onclick="habilitarRevisor(<?php echo $mostrar[0] ?> )">
                            <span class="fas fa-user-check"></span>
                          </span></center>
                        <?php } ?>
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