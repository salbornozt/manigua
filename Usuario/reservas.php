<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();
if($_SESSION['nameU']==null)
{
    header("Location: ../Util/logout.php");
}

$codU = $_SESSION['codeU'];
$nomU = $_SESSION['nameU'];
$AddU = $_SESSION['addrU'];
$celU = $_SESSION['celuU'];
$maiU = $_SESSION['mailU'];

require_once '../Util/conexion.php';

$sql = "select * from customer where user_code='$codU'";

$obj=new Conexion();
$conexion=$obj->conectarBD();
$result = pg_query($conexion, $sql);
while ($row = pg_fetch_row($result))
{
  $nomUsuario=$row[1];
}

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

  <title>USUARIO</title>

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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-archive"></i>
          <span>MIS DOCUMENTOS</span>
        </a>

        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-green py-2 collapse-inner rounded">
            <a class="collapse-item" href="libros_usuario.php">LIBROS</a>
            <a class="collapse-item" href="ponencias_usuario.php">PONENCIAS</a>
            <a class="collapse-item" href="articulos_usuario.php">ARTÍCULOS CIENTÍFICOS</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-book-reader"></i>
          <span>DOCUMENTOS RESERVADOS</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-green py-2 collapse-inner rounded">
            <a class="collapse-item" href="reservas.php">HISTORICO</a>
            <a class="collapse-item" href="prestamos.php">RESERVAS ACTIVAS</a>
          </div>
        </div>
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
          <span class="mr-2 d-none d-lg-inline text-gray-600 ">USUARIO</span>

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
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $nomUsuario?></span>
                <img class="img-profile rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnUIgT752RoB4mdWD7vPD_mmx7hT2pqQG_Ug&usqp=CAU">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="../Util/logout.php" data-toggle="#logoutModal">
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
              <h6 class="m-0 font-weight-bold text-success" align="center">Reservas</h6>
            </div>

            <?php
              $sql1="SELECT cod_doc, booking_date, return_date FROM booking WHERE user_code = '".$codU."'";
              $result1=pg_query($conexion,$sql1);
            ?>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-condensed" id="dataTable" width="100%" cellspacing="0">
                  <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>DOCUMENTO</td>
                      <td>ESTADO</td>                      
                      <td>FECHA DE RESERVA</td>
                      <td>FECHA DE RETORNO</td>
                    </tr>
                  </thead>

                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <td>DOCUMENTO</td>
                      <td>ESTATUS</td>
                      <td>FECHA DE RESERVA</td>
                      <td>FECHA DE RETORNO</td>
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
                        $sql4="SELECT t_doc_code FROM documents WHERE  cod_doc= ".$mostrar[0].";";
                        $result4=pg_query($conexion,$sql4);
                        $mostrar1=pg_fetch_row($result4);
                        if($mostrar1[0]==1)
                        {
                          $sql5="SELECT title from article where cod_doc = ".$mostrar[0]."";
                          $result5=pg_query($conexion,$sql5);
                          $mostrar5=pg_fetch_row($result5);
                          echo $mostrar5[0];
                        }
                        else if($mostrar1[0]==2)
                        {
                          $sql5="SELECT title from book where cod_doc = ".$mostrar[0]."";
                          $result5=pg_query($conexion,$sql5);
                          $mostrar5=pg_fetch_row($result5);
                          echo $mostrar5[0];
                        }
                        else if($mostrar1[0]==3)
                        {
                          $sql5="SELECT title from presentation where cod_doc = ".$mostrar[0]."";
                          $result5=pg_query($conexion,$sql5);
                          $mostrar5=pg_fetch_row($result5);
                          echo $mostrar5[0];
                        } ?> 
                        <center>  
                      </td>
                      <td>
                        <center>
                        <?php
                          if($mostrar[2] == null)
                          {
                            echo 'Sin devolver';
                          }
                          else
                          {
                            echo 'Devuelto';
                          }
                        ?>
                      </center>
                      </td>
                      <td>
                        <center>
                        <?php echo $mostrar[1] ?>
                        </center>                          
                      </td>
                      <td>
                        <center>
                        <?php
                          if($mostrar[2] == null)
                          {
                            echo 'N/A';
                          }
                          else
                          {
                            echo $mostrar[2];
                          }
                        ?>
                      </center>
                      </td>
                     
                    </tr>
                  <?php 
                    }
                  ?>
                  </tbody>
                </table>
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

</body>

</html>
