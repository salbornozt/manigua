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

$sql0="SELECT * FROM article";
$result0=pg_query($conexion,$sql0);

?>
<div>

                <table class="table table-hover table-condensed" id="iddatatable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>TÍTULO</td>
                     
                      <td>FECHA DE CREACIÓN</td>
                      <td>INFORMACIÓN</td>
                      <td>ESTADO</td>
                      <td>CAMBIAR ESTADO</td>
                    </tr>
                  </thead>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                    <td>TÍTULO</td>
                     
                     <td>FECHA DE CREACIÓN</td>
                     <td>INFORMACIÓN</td>
                     <td>ESTADO</td>
                     <td>CAMBIAR ESTADO</td>
                    </tr>
                  </tfoot>

                  <tbody>
                  <?php 
                
                    while ($mostrar=pg_fetch_row($result0))
                    {
                  
                  ?>
                    <tr>
                      <td><?php echo $mostrar[1] ?></td>
                      <td><center><?php echo $mostrar[2] ?></center></td>
                      
                      <!--MODAL-->
                      <td>
                        <div class="modal fade" id="info<?php echo $mostrar[4]; ?>">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Datos</h5></div>
                        <div class="modal-body"> 
                        <center><table>
                        <?php
                                  $sql0="SELECT * FROM article WHERE cod_doc='".$mostrar[4]."'";
                                  $sql1=" SELECT author_name FROM article,documents,document_author,author
                                  WHERE article.cod_doc=2 AND
                                  article.cod_doc=documents.cod_doc AND 
                                  documents.cod_doc=document_author.cod_doc AND
                                  document_author.author_id=author.author_id;";
                                  $result00=pg_query($conexion,$sql0); 
                                  while ($mostrar00=pg_fetch_row($result00))
                                  {  ?>
                                    <tr><td>Código: <?php echo $mostrar[4] ?></td></tr>
                                    <tr><td>ISBN : <?php echo $mostrar00[0] ?></td></tr>
                                    <tr><td>Título : <?php echo $mostrar00[1] ?></td></tr>
                                    <tr><td>Fecha : <?php echo $mostrar00[2] ?></td></tr>
                                    <tr><td>Directorio : <?php echo $mostrar00[3] ?></td></tr>
                                  <?php
                                  $sql01=" SELECT author_name FROM article,documents,document_author,author
                                  WHERE article.cod_doc='".$mostrar[4]."' AND
                                  article.cod_doc=documents.cod_doc AND 
                                  documents.cod_doc=document_author.cod_doc AND
                                  document_author.author_id=author.author_id;";
                                  $result01=pg_query($conexion,$sql01); 
                                  while ($mostrar01=pg_fetch_row($result01))
                                  {  ?>
                                    <tr><td>Autor: <?php echo $mostrar01[0] ?></td></tr>
                                  <?php  } ?>
                                  <?php
                                  $sql02=" SELECT editorial_name FROM article,documents,editorial
                                  WHERE article.cod_doc='".$mostrar[4]."' AND
                                  article.cod_doc=documents.cod_doc AND 
                                  documents.editorial_code = editorial.editorial_code";
                                  $result02=pg_query($conexion,$sql02); 
                                  while ($mostrar02=pg_fetch_row($result02))
                                  {  ?>
                                    <tr><td>Editorial: <?php echo $mostrar02[0] ?></td></tr>
                                  <?php  } ?>
                                  <?php
                                  $sql03=" SELECT pages FROM article,documents
                                  WHERE article.cod_doc='".$mostrar[4]."' AND
                                  article.cod_doc=documents.cod_doc ";
                                  $result03=pg_query($conexion,$sql03); 
                                  while ($mostrar03=pg_fetch_row($result03))
                                  {  ?>
                                    <tr><td>Páginas: <?php echo $mostrar03[0] ?></td></tr>
                                  <?php  } ?>


                                  <?php  } ?>
                        </table></center><br>
                        <div class="modal-footer"><button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button></div>
                        </div></div></div></div>
              
                      <center>
                      <span class="btn btn-info" data-toggle="modal" data-target="#info<?php echo $mostrar[4];?>"><i class="fas fa-eye"></i></span>
                      </center>
                      </td>
                      <!--fin MODAL-->

                      <td>
                        <center>
                        <?php 
                        $sql11="SELECT status_review FROM article,documents WHERE '".$mostrar[4]."'= article.cod_doc  AND article.cod_doc = documents.cod_doc";
                        $result11=pg_query($conexion, $sql11);
                        while ($fila11= pg_fetch_row($result11)) 
                           {if ($fila11[0] == 0) {
                            echo "Pendiente";
                          }else if ($fila11[0] == 1) {
                            echo "Revisado";
                          }else if ($fila11[0] == 2) {
                            echo "Denegado";
                          } }
                        ?></center>
                      </td>
                      <td>
                        <?php 
                        $sql12="SELECT status_review FROM article,documents WHERE '".$mostrar[4]."'= article.cod_doc  AND article.cod_doc = documents.cod_doc";
                        $result12=pg_query($conexion, $sql12);
                        while ($fila12= pg_fetch_array($result12)) 
                          {
                        if( $fila12[0] == 0){ ?>  
                          <center>
                          <span class="btn btn-success btn-xs" onclick="habi_doc(<?php echo $mostrar[4]?>)">
                          <span class="fas fa-check-square"></span></span>
                          <span class="btn btn-warning btn-xs" onclick="desa_doc(<?php echo $mostrar[4]?>)">
                          <span class="fas fa-window-close"></span></span> 
                          </center>                  
                        <?php  } else if ($fila12[0] == 1 ) { ?>
                          <center>
                          <span class="btn btn-success btn-xs" onclick="">
                          <span class="fas fa-smile-beam"></span></span>
                          </center>
                        <?php  } else if ($fila12[0] == 2) { ?>
                          <center>
                          <span class="btn btn-warning btn-xs" onclick="">
                          <span class="fas fa-sad-tear"></span></span>
                          </center>
                          <?php } } ?> 
                      </td>
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