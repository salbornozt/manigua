<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();
if($_SESSION['nameR']==null)
{
    header("Location: ../../Util/logout.php");
}

$cod = $_SESSION['codeR'] ;
$name= $_SESSION['nameR'] ;
$add= $_SESSION['addrR'] ;
$celu = $_SESSION['celuR'] ;
$mail=  $_SESSION['mailR'] ;

require_once '../../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$sql0="SELECT * FROM audit_doc";
$result0=pg_query($conexion,$sql0);

?>
<div>

                <table class="table table-hover table-condensed" id="iddatatable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO</td>
                      <td>DOCUMENTO</td>
                      <td>USUARIO</td>
                      <td>ACCIÓN</td>
                      <td>FECHA</td>
                    </tr>
                  </thead>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>CÓDIGO</td>
                      <td>DOCUMENTO</td>
                      <td>USUARIO</td>
                      <td>ACCIÓN</td>
                      <td>FECHA</td>
                    </tr>
                  </tfoot>

                  <tbody>
                  <?php 
                
                    while ($mostrar=pg_fetch_row($result0))
                    {
                  
                  ?>
                    <tr>
                      <td><?php echo $mostrar[0] ?></td>


                      <td><center>
                      <?php 
                        
                        $sql11="SELECT t_doc_code FROM documents WHERE cod_doc='".$mostrar[1]."'";
                        $result11=pg_query($conexion, $sql11);
                        $TEST = "N/A";
                        
                        while ($fila11= pg_fetch_row($result11)) 
                          {                     
                            if ($fila11[0] == 1) {
                            
                            $sql12="SELECT title FROM article WHERE cod_doc='".$mostrar[1]."'";
                            $result12=pg_query($conexion, $sql12);
                            while ($fila12= pg_fetch_row($result12)) {
                              $TEST = $fila12[0];
                            }
                          }else if ($fila11[0] == 2) {
                            
                            $sql12="SELECT title FROM book WHERE cod_doc='".$mostrar[1]."'";
                            $result12=pg_query($conexion, $sql12);
                            while ($fila12= pg_fetch_row($result12)) {
                              $TEST = $fila12[0];
                            }
                          }else if ($fila11[0] == 3) {
                            
                            $sql12="SELECT title FROM presentation WHERE cod_doc='".$mostrar[1]."'";
                            $result12=pg_query($conexion, $sql12);
                            while ($fila12= pg_fetch_row($result12)) {
                              $TEST = $fila12[0];
                            }
                          } 
                        }

                        echo $TEST;

                        ?>
                        </center></td>

                      <td><center>
                      <?php 
                        $sql12="SELECT user_name FROM customer WHERE user_code = '".$mostrar[2]."'";
                        $result12=pg_query($conexion, $sql12);
                        while ($fila111= pg_fetch_row($result12)) 
                          {
                            echo $fila111[0];
                        } ?>
                        </center></td>


                      <td><center> <?php                           
                            if ($mostrar[3] == 'I') {
                              echo "Insertar";
                            }
                            else if ($mostrar[3] == 'U') {
                            echo "Actualizar";
                            
                            }else if($mostrar[3] == 'D') {
                            echo "Eliminar";
                            } 
                        ?></center></td>
                      <td><center><?php echo $mostrar[4] ?></center></td>
                      
                    </tr>
                  <?php  }   ?>
                  </tbody>
                </table>
              


</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#iddatatable').DataTable();
  } );
</script>

