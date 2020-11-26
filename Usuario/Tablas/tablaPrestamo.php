<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();
if($_SESSION['nameU']==null)
{
    header("Location: ../../Util/logout.php");
}

$codU = $_SESSION['codeU'];
$nomU = $_SESSION['nameU'];
$AddU = $_SESSION['addrU'];
$celU = $_SESSION['celuU'];
$maiU = $_SESSION['mailU'];
require_once '../../scripts.php';
require_once '../../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

/*
$host= gethostname();
$ip = gethostbyname($host);
$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
$fechaF = $fecha->format('Y-m-d H:i:s');


$sql = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
values ('".$nomA."', 3,'".$maiA."', 'Read', 'Usuarios', '".$fechaF."', '".$ip."');";
pg_query($conexion,$sql);
*/
$sql1="SELECT cod_doc,booking_code FROM booking WHERE user_code = '".$codU."' and return_date is null";
$result1=pg_query($conexion,$sql1);
?>
<div class="table-responsive">
                <table class="table table-hover table-condensed" id="iddatatable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>DOCUMENTO</td>
                      <td>AUTOR</td>                      
                      <td>INFORMACIÓN</td>
                      <td>LEER</td>
                      <td>DEVOLVER</td>
                    </tr>
                  </thead>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>DOCUMENTO</td>
                      <td>AUTOR</td>                      
                      <td>INFORMACIÓN</td>
                      <td>LEER</td>
                      <td>DEVOLVER</td>
                    </tr>
                  </tfoot>

                  <tbody>
                  <?php 
                    while ($mostrar=pg_fetch_row($result1))
                    {
                    ?>
                    <tr>
                      <td>
                        <center>
                        <?php 
                        $sql2="SELECT t_doc_code FROM documents WHERE  cod_doc= ".$mostrar[0].";";
                        $result2=pg_query($conexion,$sql2);
                        $mostrar1=pg_fetch_row($result2);
                        if($mostrar1[0]==1)
                        {
                          $sql3="SELECT title from article where cod_doc = ".$mostrar[0]."";
                          $result3=pg_query($conexion,$sql3);
                          $mostrar3=pg_fetch_row($result3);
                          echo $mostrar3[0];
                        }
                        else if($mostrar1[0]==2)
                        {
                          $sql3="SELECT title from book where cod_doc = ".$mostrar[0]."";
                          $result3=pg_query($conexion,$sql3);
                          $mostrar3=pg_fetch_row($result3);
                          echo $mostrar3[0];
                        }
                        else if($mostrar1[0]==3)
                        {
                          $sql3="SELECT title from presentation where cod_doc = ".$mostrar[0]."";
                          $result3=pg_query($conexion,$sql3);
                          $mostrar3=pg_fetch_row($result3);
                          echo $mostrar3[0];
                        } ?> 
                        <center>  
                      </td>
                      <td>
                        <center>
                        <?php
                          $sql4="SELECT author_name FROM author,document_author WHERE document_author.cod_doc= ".$mostrar[0]." and document_author.author_id = author.author_id;";
                          $result4=pg_query($conexion,$sql4);
                          $autor = "";
                          while($mostrar4=pg_fetch_row($result4))
                          {
                            $autor = $autor.$mostrar4[0];
                          }
                          echo $autor;
                        ?>
                      </center>
                      </td>
                      <!--MODAL-->
                      <td>
                        <div class="modal fade" id="info<?php echo $mostrar[0]; ?>">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Datos</h5></div>
                        <div class="modal-body"> 
                        <center><table>
                                  <?php
                                  if($mostrar1[0]==1)
                                  {
                                    $sql0="SELECT * FROM article WHERE cod_doc='".$mostrar[0]."'";
                                    $result00=pg_query($conexion,$sql0);
                                    $mostrar00=pg_fetch_row($result00);
                                    $sql2="SELECT editorial_name, email, phone, address FROM editorial, documents WHERE documents.cod_doc='".$mostrar[0]."' and documents.editorial_code = editorial.editorial_code";
                                    $result2=pg_query($conexion,$sql2);
                                    $mostrar2=pg_fetch_row($result2);
                                    $sql3="SELECT author_name, email, phone FROM author, document_author WHERE document_author.cod_doc='".$mostrar[0]."' and document_author.author_id = author.author_id";
                                    $result3=pg_query($conexion,$sql3);
                                    $mostrar3=pg_fetch_row($result3);

                                   ?>
                                    <tr><td>SSN: <?php echo $mostrar00[0] ?></td></tr>
                                    <tr><td>TÍTULO: <?php echo $mostrar00[1] ?></td></tr>
                                    <tr><td>FECHA: <?php echo $mostrar00[2] ?></td></tr>
                                    <tr><td>DATOS AUTOR: <?php echo $mostrar3[0].', '.$mostrar3[1].', '.$mostrar3[2] ?></td></tr>
                                    <tr><td>DATOS EDITORIAL : <?php echo $mostrar2[0].', '.$mostrar2[1].', '.$mostrar2[2].', '.$mostrar2[3] ?></td></tr>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if($mostrar1[0]==2)
                                  {
                                    $sql0="SELECT * FROM book WHERE cod_doc='".$mostrar[0]."'";
                                    $result00=pg_query($conexion,$sql0);
                                    $mostrar00=pg_fetch_row($result00);
                                    $sql2="SELECT editorial_name, email, phone, address FROM editorial, documents WHERE documents.cod_doc='".$mostrar[0]."' and documents.editorial_code = editorial.editorial_code";
                                    $result2=pg_query($conexion,$sql2);
                                    $mostrar2=pg_fetch_row($result2);
                                    $sql3="SELECT author_name, email, phone FROM author, document_author WHERE document_author.cod_doc='".$mostrar[0]."' and document_author.author_id = author.author_id";
                                    $result3=pg_query($conexion,$sql3);
                                    $mostrar3=pg_fetch_row($result3);

                                   ?>
                                    <tr><td>SSN: <?php echo $mostrar00[0] ?></td></tr>
                                    <tr><td>TÍTULO: <?php echo $mostrar00[1] ?></td></tr>
                                    <tr><td>FECHA: <?php echo $mostrar00[2] ?></td></tr>
                                    <tr><td>DATOS AUTOR: <?php echo $mostrar3[0].', '.$mostrar3[1].', '.$mostrar3[2] ?></td></tr>
                                    <tr><td>DATOS EDITORIAL : <?php echo $mostrar2[0].', '.$mostrar2[1].', '.$mostrar2[2].', '.$mostrar2[3] ?></td></tr>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if($mostrar1[0]==3)
                                  {
                                    $sql0="SELECT * FROM presentation WHERE cod_doc='".$mostrar[0]."'";
                                    $result00=pg_query($conexion,$sql0);
                                    $mostrar00=pg_fetch_row($result00);
                                    $sql2="SELECT editorial_name, email, phone, address FROM editorial, documents WHERE documents.cod_doc='".$mostrar[0]."' and documents.editorial_code = editorial.editorial_code";
                                    $result2=pg_query($conexion,$sql2);
                                    $mostrar2=pg_fetch_row($result2);
                                    $sql3="SELECT author_name, email, phone FROM author, document_author WHERE document_author.cod_doc='".$mostrar[0]."' and document_author.author_id = author.author_id";
                                    $result3=pg_query($conexion,$sql3);
                                    $mostrar3=pg_fetch_row($result3);

                                   ?>
                                    <tr><td>TÍTULO: <?php echo $mostrar00[1] ?></td></tr>
                                    <tr><td>CONGRESO: <?php echo $mostrar00[2] ?></td></tr>
                                    <tr><td>FECHA: <?php echo $mostrar00[3] ?></td></tr>
                                    <tr><td>DATOS AUTOR: <?php echo $mostrar3[0].', '.$mostrar3[1].', '.$mostrar3[2] ?></td></tr>
                                    <tr><td>DATOS EDITORIAL : <?php echo $mostrar2[0].', '.$mostrar2[1].', '.$mostrar2[2].', '.$mostrar2[3] ?></td></tr>
                                  <?php
                                  }
                                  ?>
                        
                        </table></center><br>
                        <div class="modal-footer"><button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button></div>
                        </div></div></div></div>
              
                      <center>
                      <span class="btn btn-info" data-toggle="modal" data-target="#info<?php echo $mostrar[0];?>"><i class="fas fa-info-circle"></i></span>
                      </center>
                      </td>
                      <!--fin MODAL-->
                      <td>
                        <center>                          
                        <?php 
                        if($mostrar1[0]==2)
                        {
                          $sql5="SELECT dir FROM book WHERE cod_doc= ".$mostrar[0].";";
                          $result5=pg_query($conexion,$sql5);
                          $mostrar5=pg_fetch_row($result5);
                        }
                        else if($mostrar1[0]==1)
                        {
                          $sql5="SELECT dir FROM article WHERE cod_doc= ".$mostrar[0].";";
                          $result5=pg_query($conexion,$sql5);
                          $mostrar5=pg_fetch_row($result5);
                        }
                        else if($mostrar1[0]==3)
                        {
                          $sql5="SELECT dir FROM presentation WHERE cod_doc= ".$mostrar[0].";";
                          $result5=pg_query($conexion,$sql5);
                          $mostrar5=pg_fetch_row($result5);
                        }
                        echo '<center><a href="../Documents/books/'.$mostrar5[0].'#toolbar=0" target="_blank"><span class="btn btn-warning btn-xs" onclick="deshabilitarLibro(<?php echo $mostrar[5] ?> )">
                            <span class="fas fa-eye"></span>
                          </span></a></center>'; 
                        ?>
                        </center>                          
                      </td>
                      <td>
                        <center>
                        <span class="btn btn-success btn-xs" onclick="dev_doc(<?php echo $mostrar[1].', '.$mostrar[0]?>)">
                        <span class="fas fa-check-square"></span></span>
                        </center>                          
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