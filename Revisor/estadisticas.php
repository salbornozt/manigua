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
$totalDocs = 0;

require_once '../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
$fechaF = $fecha->format('Y-m-d H:i:s');

$sql02 = "SELECT count(status_review) FROM documents WHERE  documents.status_review = 0;";
$result02 = pg_query($conexion, $sql02);
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
                                                    documents.status_review = 0
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
                                                          documents.status_review = 0
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
                                                      documents.status_review = 0
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
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total pendientes</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            
                            <!-- SQL: - Get total documents count -->
                            <?php
                              $docsSQL = "SELECT count(cod_doc)
                                          FROM documents";
                              
                              $docsResult = pg_query($conexion,$docsSQL);
                              while ($mostrar=pg_fetch_row($docsResult)) {
                                $totalDocs = $mostrar[0];
                                echo ($booksReviewed + $presentationReviewed + $articleReviewed).' / '.$totalDocs;
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




                <!-- MARK: - Documentos Pendentes -->
                <div class="col-xl-6 col-lg-5">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-success">Documentos pendientes</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                      </div>
                      <div class="mt-4 text-center small">
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #07689f;"></i> Libros
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #ffc93c;"></i> Artículos
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #40a8c4;"></i> Ponencias
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                
                <!-- MARK: - Libros Aprobados -->
                <div class="col-xl-6 col-lg-5">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-success">Resumen de libros</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="chart-pie pt-4 pb-2">
                        <canvas id="approvedBooksPieChart"></canvas>
                      </div>
                      <div class="mt-4 text-center small">
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #f9813a;"></i> Pendiente
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #af2d2d;"></i> Aprobados
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #214252;"></i> Denegados
                        </span>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- MARK: - Artículos Aprobados -->
                <div class="col-xl-6 col-lg-5">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-success">Resumen de artículos</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="chart-pie pt-4 pb-2">
                        <canvas id="approvedArticlesPieChart"></canvas>
                      </div>
                      <div class="mt-4 text-center small">
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #f6416c;"></i> Pendiente
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #311d3f;"></i> Aprobados
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #48466d;"></i> Denegados
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- MARK: - Ponencias Aprobadas -->
                <div class="col-xl-6 col-lg-5">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-success">Resumen de ponencias</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="chart-pie pt-4 pb-2">
                        <canvas id="approvedPresentationPieChart"></canvas>
                      </div>
                      <div class="mt-4 text-center small">
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #1fab89;"></i> Pendiente
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #e84a5f;"></i> Aprobados
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle" style="color: #d72323;"></i> Denegados
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          <br>
          <h6 style="text-align: center;">POR INNOSOFT UEB</h6>
          <br>
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
  
  
  <script>    

    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart - Documentos Pendientes
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {

      type: 'doughnut',
      data: {
        labels: ["Libros", "Artículos", "Ponencias"],
        datasets: [{
          data: [
            <?php echo $booksReviewed; ?>, 
            <?php echo $articleReviewed; ?>, 
            <?php echo $presentationReviewed; ?>
          ],
          backgroundColor: ['#07689f', '#ffc93c', '#40a8c4'],
          hoverBackgroundColor: ['#52de97', '#52de97', '#52de97'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });

    // Pie Chart - Libros Aprobados
    <?php
      $approvedBooks = 0;
      $deniedBooks = 0;

      $booksApprovedSQL = "SELECT count(cod_doc), t_doc_code
                          FROM documents
                          WHERE 
                            documents.t_doc_code = 1 AND
                            documents.status_review = 1
                            GROUP BY t_doc_code"
                          ;
      
      $resultA = pg_query($conexion,$booksApprovedSQL);
      while ($mostrar=pg_fetch_row($resultA)) {
        $approvedBooks = $mostrar[0];
      }

      $booksDeniedSQL = "SELECT count(cod_doc), t_doc_code
                        FROM documents
                        WHERE 
                          documents.t_doc_code = 1 AND
                          documents.status_review = 2
                          GROUP BY t_doc_code";
      
      $resultA = pg_query($conexion,$booksDeniedSQL);
      while ($mostrar=pg_fetch_row($resultA)) {
        $deniedBooks = $mostrar[0];
      }
    ?>

    var ctx = document.getElementById("approvedBooksPieChart");
    var myPieChart = new Chart(ctx, {

      type: 'doughnut',
      data: {
        labels: ["Pendientes", "Aprobados", "Denegados"],
        datasets: [{
          data: [
            <?php echo $booksReviewed; ?>, 
            <?php echo $approvedBooks; ?>, 
            <?php echo $deniedBooks; ?>, 
          ],
          backgroundColor: ['#f9813a', '#af2d2d', '#214252'],
          hoverBackgroundColor: ['#52de97', '#52de97', '#52de97'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });


    // Pie Chart - Artículos Aprobados
    <?php
      $approvedArticles = 0;
      $deniedArticles = 0;

      $articlesApprovedSQL = "SELECT count(cod_doc), t_doc_code
                              FROM documents
                              WHERE 
                                documents.t_doc_code = 2 AND
                                documents.status_review = 1
                                GROUP BY t_doc_code"
                              ;
      
      $resultA = pg_query($conexion,$articlesApprovedSQL);
      while ($mostrar=pg_fetch_row($resultA)) {
        $approvedArticles = $mostrar[0];
      }

      $articlesDeniedSQL = "SELECT count(cod_doc), t_doc_code
                        FROM documents
                        WHERE 
                          documents.t_doc_code = 1 AND
                          documents.status_review = 2
                          GROUP BY t_doc_code";
      
      $resultA = pg_query($conexion,$articlesDeniedSQL);
      while ($mostrar=pg_fetch_row($resultA)) {
        $deniedArticles = $mostrar[0];
      }
    ?>

    var ctx = document.getElementById("approvedArticlesPieChart");
    var myPieChart = new Chart(ctx, {

      type: 'doughnut',
      data: {
        labels: ["Pendientes", "Aprobados", "Denegados"],
        datasets: [{
          data: [
            <?php echo $articleReviewed; ?>, 
            <?php echo $approvedArticles; ?>, 
            <?php echo $deniedArticles; ?>
          ],
          backgroundColor: ['#f6416c', '#311d3f', '#48466d', '#293462'],
          hoverBackgroundColor: ['#52de97', '#52de97', '#52de97'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });


    // Pie Chart - Ponencias Aprobados
    <?php
      $approvedPresentations = 0;
      $deniedPresentations = 0;

      $presentationsApprovedSQL = "SELECT count(cod_doc), t_doc_code
                              FROM documents
                              WHERE 
                                documents.t_doc_code = 3 AND
                                documents.status_review = 1
                                GROUP BY t_doc_code"
                              ;
      
      $resultA = pg_query($conexion,$presentationsApprovedSQL);
      while ($mostrar=pg_fetch_row($resultA)) {
        $approvedPresentations = $mostrar[0];
      }

      $presentationsDeniedSQL = "SELECT count(cod_doc), t_doc_code
                        FROM documents
                        WHERE 
                          documents.t_doc_code = 1 AND
                          documents.status_review = 2
                          GROUP BY t_doc_code";
      
      $resultA = pg_query($conexion,$presentationsDeniedSQL);
      while ($mostrar=pg_fetch_row($resultA)) {
        $deniedArticles = $mostrar[0];
      }
    ?>

    var ctx = document.getElementById("approvedPresentationPieChart");
    var myPieChart = new Chart(ctx, {

      type: 'doughnut',
      data: {
        labels: ["Pendientes", "Aprobados", "Denegados"],
        datasets: [{
          data: [
            <?php echo $presentationReviewed; ?>, 
            <?php echo $approvedPresentations; ?>, 
            <?php echo $deniedPresentations; ?>
          ],
          backgroundColor: ['#1fab89', '#e84a5f', '#d72323', '#293462'],
          hoverBackgroundColor: ['#52de97', '#52de97', '#52de97'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });



  </script>


</body>

</html>
