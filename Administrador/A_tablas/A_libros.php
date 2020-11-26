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

$sql1="SELECT * FROM book, documents where book.cod_doc = documents.cod_doc and documents.status_review = 1;";

$result1=pg_query($conexion,$sql1);
?>
			<div>
				<table class="table table-hover table-condensed" id="iddatatable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO ISBN</td>
                      <td>TÍTULO</td>
                      <td>N° DE PÁGINAS</td>
                      <td>FECHA DE PUBLICACIÓN</td>
                      <td>ESTADO</td>
                      <td>ACCIÓN</td>
                    </tr>
                  </thead>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO ISBN</td>
                      <td>TÍTULO</td>
                      <td>N° DE PÁGINAS</td>
                      <td>FECHA DE PUBLICACIÓN</td>
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
                      <td><?php echo $mostrar[10] ?></td>
                      <td><?php echo $mostrar[2] ?></td>
                      <td>
                          <?php 
                            if ($mostrar[6] == 1) 
                            {
                              echo "Disponible";
                            }
                            if ($mostrar[6] == 2) 
                            {
                              echo "Prestado";
                            }
                            if ($mostrar[6] == 3) 
                            {
                              echo "Deshabilitado";
                            }
                          ?>
                      </td>
                      <td>
                        
                        <?php if( $mostrar[6] == 1){ ?>
                          <center><span class="btn btn-warning btn-xs" onclick="deshabilitarLibro(<?php echo $mostrar[5] ?> )">
                            <span class="fas fa-user-alt-slash"></span>
                          </span></center>
                        <?php  } else if ($mostrar[6] == 3) { ?>
                          <center><span class="btn btn-success btn-xs" onclick="habilitarLibro(<?php echo $mostrar[5] ?> )">
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