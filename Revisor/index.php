<?php
session_start();
if($_SESSION['nameR']==null)
{
    header("Location: ../Util/logout.php");
}

$cod = $_SESSION['codeR'] ;
$name= $_SESSION['nameR'] ;
$add= $_SESSION['addrR'] ;
$celu = $_SESSION['celuR'] ;
$mail=  $_SESSION['mailR'] ;

$booksReviewed = 0;
$presentationReviewed = 0;
$articleReviewed = 0;

require_once '../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
$fechaF = $fecha->format('Y-m-d H:i:s');

$sql02 = "SELECT count(status_review) FROM documents WHERE  documents.status_review = 0;";
$result02 = pg_query($conexion, $sql02);
$result022 = pg_query($conexion, $sql02);
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

  <title>REVISOR</title>

  <!-- Custom fonts for this template-->
  <link href="../Config/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../Config/css/sb-admin-2.min.css" rel="stylesheet">
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

      <!-- MARK: - Side Bar -->

      <!-- MARK: Estadisticas -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-archive"></i>
          <span>REVISIÓN</span>
        </a>

        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-green py-2 collapse-inner rounded" aria-labelledby="headingTwo">
            <a class="collapse-item" href="revisionLibros.php">LIBROS</a>
            <a class="collapse-item" href="revisionPonencias.php">PONENCIAS</a>
            <a class="collapse-item" href="revisionArticulos.php">ARTÍCULOS CIENTÍFICOS</a>
          </div>
        </div>
      </li>

      <!-- MARK: Estadisticas -->
      <li class="nav-item">
        <a class="nav-link" href="estadisticas.php">
          <i class="fas fa-chart-pie"></i>
          <span>ESTADÍSTICAS</span>
        </a>
      </li>

     
     
      <!-- MARK: Auditoria -->
      <li class="nav-item">
        <a class="nav-link" href="r_auditoria.php">
          <i class="fas fa-file-alt"></i>
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
          <span class="mr-2 d-none d-lg-inline text-gray-600 ">REVISOR</span>

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

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->

                <?php while ($mostrar022=pg_fetch_row($result022)){?>
                    
                   <span class="badge badge-success badge-counter"><?php echo $mostrar022[0] ?></span>
                    
                     <?php } ?>
              
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $fechaF ?></div>
                    <?php while ($mostrar02=pg_fetch_row($result02)){?>
                    
                 
                    <span class="font-weight-bold"> Hay <?php echo $mostrar02[0] ?> documentos sin revisar !</span>
                     <?php } ?>
                  </div>
                </a>
                
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600">
                  <?php
                    $sql0 = "SELECT user_name FROM customer WHERE user_code ='".$cod."'";
                    $result0 = pg_query($conexion,$sql0);
                    while ($mostrar=pg_fetch_row($result0)) {
                      echo '<h6>'.$mostrar[0].'</h6>';
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

          <!-- MARK: - Box  -->

          

          

          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success" align="center">Bienvenido a la Librería Manigua</h6>
            </div>

            <div class="card-body">

              <div class="row">

                <!-- LIBROS -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Libros</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <!-- SQL: - Get books count -->
                            <?php
                              $booksReviewSQL = "SELECT count(cod_doc), t_doc_code
                                                  FROM documents
                                                  WHERE 
                                                    documents.t_doc_code = 2 AND
                                                    documents.status_review != 0
                                                    GROUP BY t_doc_code";
                              
                              $booksReviewResult = pg_query($conexion,$booksReviewSQL);
                              while ($mostrar=pg_fetch_row($booksReviewResult)) {
                                $booksReviewed = $mostrar[0];
                              };
                              echo  $booksReviewed;
                            ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- PPONENCIAS -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ponencias</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <!-- SQL: - Get presentation count -->
                            <?php
                              $presentationReviewSQL = "SELECT count(cod_doc), t_doc_code
                                                        FROM documents
                                                        WHERE 
                                                          documents.t_doc_code = 3 AND
                                                          documents.status_review != 0
                                                          GROUP BY t_doc_code";
                              
                              $presentationReviewResult = pg_query($conexion,$presentationReviewSQL);
                              while ($mostrar=pg_fetch_row($presentationReviewResult)) {
                                $presentationReviewed = $mostrar[0];
                              };
                              echo $presentationReviewed;
                            ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- ARTICULOS -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Artículos científicos</div>
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <!-- SQL: - Get articles count -->
                            <?php
                              $articleReviewSQL = "SELECT count(cod_doc), t_doc_code
                                                    FROM documents
                                                    WHERE 
                                                      documents.t_doc_code = 1 AND
                                                      documents.status_review != 0
                                                      GROUP BY t_doc_code";
                                  
                              $articleReviewResult = pg_query($conexion,$articleReviewSQL);
                              while ($mostrar=pg_fetch_row($articleReviewResult)) {
                                $articleReviewed = $mostrar[0];
                              };

                              echo $articleReviewed;
                            ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- TOTAL -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Revisados</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            
                            <!-- SQL: - Get total documents count -->
                            <?php
                              $docsSQL = "SELECT count(cod_doc)
                                          FROM documents";
                              
                              $docsResult = pg_query($conexion,$docsSQL);
                              while ($mostrar=pg_fetch_row($docsResult)) {
                                echo ($booksReviewed + $presentationReviewed + $articleReviewed);
                              }
                            ?>
                            
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>





              </div>

            </div>
          </div>

        </div>
          <br><br>
          <h6 style="text-align: center;">POR INNOSOFT UEB</h6>
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
  <script src="../Config/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../Config/js/demo/chart-area-demo.js"></script>
  <script src="../Config/js/demo/chart-pie-demo.js"></script>
</body>

</html>
