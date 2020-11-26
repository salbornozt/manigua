<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();
if($_SESSION['nameA']==null)
{
    header("Location: ../Util/logout.php");
}

$codA = $_SESSION['codeA'];
$nomA = $_SESSION['nameA'];
$AddA = $_SESSION['addrA'];
$celA = $_SESSION['celuA'];
$maiA = $_SESSION['mailA'];

require_once '../scripts.php';
require_once '../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="../img/icon.png">

  <title>ADMINISTRADOR</title>

  <!-- Custom fonts for this template -->
  <link href="../Config/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../Config/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../Config/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <br><a href="index.php" style="align-content: center;">
        <center>
          <img src="../img/l.png" height="120" width="200" align="center"/>
        </center>
      </a><br>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-archive"></i>
          <span>DOCUMENTOS</span>
        </a>

        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-green py-2 collapse-inner rounded">
            <a class="collapse-item" href="libros.php">LIBROS</a>
            <a class="collapse-item" href="ponencias.php">PONENCIAS</a>
            <a class="collapse-item" href="articulos.php">ARTÍCULOS CIENTÍFICOS</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="prestamos.php">
          <i class="fas fa-fw fa-cog"></i>
          <span>GESTIÓN</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="usuarios.php">
          <i class="fas fa-user-friends"></i>
          <span>USUARIOS</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="revisores.php">
          <i class="fas fa-check-circle"></i>
          <span>REVISORES</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="estadisticas.php">
          <i class="fas fa-chart-pie"></i>
          <span>ESTADÍSTICAS</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="reportes.php">
          <i class="fas fa-clipboard"></i>
          <span>REPORTES</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="auditoria.php">
          <i class="fas fa-bell"></i>
          <span>AUDITORÍA</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <span class="mr-2 d-none d-lg-inline text-gray-600 ">ADMINISTRADOR</span>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600">
                  <?php
                  $sql = "SELECT user_name FROM customer WHERE user_code = '".$codA."';";
                  $result = pg_query($conexion, $sql);
                  while ($mostrar=pg_fetch_row($result))
                  {
                    echo $mostrar[0];
                  }
                  ?>
                </span>
                <img class="img-profile rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnUIgT752RoB4mdWD7vPD_mmx7hT2pqQG_Ug&usqp=CAU">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="perfil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="../Util/logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success" align="center">Reporte artículos por mes</h6><br>
              <center>
              <button type="button" class='btn btn-outline-success' data-toggle="modal" data-target="#reporteLibros">
                Libros por mes
              </button>

              <button type="button" class='btn btn-outline-success' data-toggle="modal" data-target="#reportePonencias">
                Ponencias por mes
              </button>

              <button type="button" class='btn btn-outline-success' data-toggle="modal" data-target="#reporteArticulos">
                Artículos por mes
              </button>

              <button type="button" class='btn btn-outline-success' data-toggle="modal" data-target="#reportePrestamos">
                Préstamos anuales
              </button>
              </center>
              
        <script type="text/javascript">
        document.cookie = 'same-site-cookie=foo; SameSite=Lax'; 
        document.cookie = 'cross-site-cookie=bar; SameSite=None; Secure';
        </script>
            </div>

            <div class="card-body">
              <div id="DataTable">
                <?php
                $sql="SELECT count(booking_code) as cantidad
                      FROM booking, documents 
                      WHERE booking.cod_doc = documents.cod_doc AND
                            documents.t_doc_code = 1 AND
                            EXTRACT(YEAR from booking.booking_date)=".$_POST['año']." AND
                            EXTRACT(MONTH from booking.booking_date)=".$_POST['mes'].";";
                $result=pg_query($conexion,$sql);
                ?><br>
                <table class="table table-hover table-condensed" id="DataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>FECHA</td>
                      <td>CANTIDAD</td>
                    </tr>
                  </thead>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>FECHA</td>
                      <td>CANTIDAD</td>
                    </tr>
                  </tfoot>

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
                </table>

                <br>
                <div align="right">
                <form id="data" name="data" action="A_reportesPDF/A_pdfReporteArticulos.php?t=pdf" method="POST">
                  <input type="hidden" id='año' name='año' value='<?php echo $_POST['año']?>' >
                  <input type="hidden" id='mes' name='mes' value='<?php echo $_POST['mes'] ?>' >
                </form>

                <form id="data1" name="data1" action="A_reportesXLS/A_xlsReporteArticulos.php?t=xls" method="POST">
                  <input type="hidden" id='año' name='año' value='<?php echo $_POST['año']?>' >
                  <input type="hidden" id='mes' name='mes' value='<?php echo $_POST['mes'] ?>' >
                </form>

                <button type="submit" class="btn btn-warning" onclick="javascript:document.data.submit()"><i class="far fa-file-pdf fa-lg"></i> PDF</button>
                <button type="submit" class="btn btn-success" onclick="javascript:document.data1.submit()"><i class="far fa-file-excel fa-lg"></i> Excel</button>
                <br><br>

              </div>
            </div>
          </div>

        </div>
        <br>
          <h6 style="text-align: center;">POR INNOSOFT UEB</h6><br>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="../Config/vendor/jquery/jquery.min.js"></script>
  <script src="../Config/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../Config/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../Config/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../Config/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../Config/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../Config/js/demo/datatables-demo.js"></script>

  <!-- Modal Libros-->
  <div class="modal fade" id="reporteLibros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Libros por mes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
              <form action="reporteLibros.php" method="post" id="form1">

                <table align="center">

                  <tr>
                    <td><label>Año</label></td>

                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      

                    <td><label>Mes</label></td>
                    
                  </tr>

                  <tr>

                    <td>
                      <select name="año" id="año" class="form-control">
                   
                    <?php                      
                      $años = array();

                      for($i = date("Y")-5; $i <= date("Y")+5; $i++){

                        echo "<option value=$i>$i</option>";                         
                      }

                    ?>

                    </select>
                    
                    </td>
                      
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                    
                    <td>
                      <select name="mes" id="mes" class="form-control">
                   
                      <?php
                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                        for($i = 0; $i < count($meses); $i++){

                          echo "<option value=$i+1>$meses[$i]</option>";                         
                        }

                      ?>
                    </td>

                  </tr>


                </table>
              </form>

              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" form="form1" value="Submit">Ir</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Ponencias-->
  <div class="modal fade" id="reportePonencias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ponencias por mes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
              <form action="reportePonencias.php" method="post" id="form2">

                <table align="center">

                  <tr>
                    <td><label>Año</label></td>

                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      

                    <td><label>Mes</label></td>
                    
                  </tr>

                  <tr>

                    <td>
                      <select name="año" id="año" class="form-control">
                   
                    <?php                      
                      $años = array();

                      for($i = date("Y")-5; $i <= date("Y")+5; $i++){

                        echo "<option value=$i>$i</option>";                         
                      }

                    ?>

                    </select>
                    
                    </td>
                      
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                    
                    <td>
                      <select name="mes" id="mes" class="form-control">
                   
                      <?php
                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                        for($i = 0; $i < count($meses); $i++){

                          echo "<option value=$i+1>$meses[$i]</option>";                         
                        }

                      ?>
                    </td>

                  </tr>


                </table>
              </form>

              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" form="form2" value="Submit">Ir</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Artilculos-->
  <div class="modal fade" id="reporteArticulos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Artículos por mes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
              <form action="reporteArticulos.php" method="post" id="form3">

                <table align="center">

                  <tr>
                    <td><label>Año</label></td>

                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      

                    <td><label>Mes</label></td>
                    
                  </tr>

                  <tr>

                    <td>
                      <select name="año" id="año" class="form-control">
                   
                    <?php                      
                      $años = array();

                      for($i = date("Y")-5; $i <= date("Y")+5; $i++){

                        echo "<option value=$i>$i</option>";                         
                      }

                    ?>

                    </select>
                    
                    </td>
                      
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                    
                    <td>
                      <select name="mes" id="mes" class="form-control">
                   
                      <?php
                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                        for($i = 0; $i < count($meses); $i++){

                          echo "<option value=$i+1>$meses[$i]</option>";                         
                        }

                      ?>
                    </td>

                  </tr>


                </table>
              </form>

              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" form="form3" value="Submit">Ir</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Ventas-->
         <div class="modal fade" id="reportePrestamos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Préstamos anuales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
              <form action="reportePrestamos.php" method="post" id="form4">

                <center><table>

                  <tr>
                    <td><center><label>Año</label></center></td>
                  </tr>

                  <tr>

                    <td>
                      <select name="año" id="año" class="form-control">
                   
                    <?php                      
                      $años = array();

                      for($i = date("Y")-5; $i <= date("Y")+5; $i++){

                        echo "<option value=$i>$i</option>";                         
                      }

                    ?>

                    </select>
                  </td>

                  </tr>


                  </center></table>
              </form>

              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" form="form4" value="Submit">Ir</button>
              </div>
            </div>
          </div>
        </div>

</body>

</html>

