<?php
header('Content-Type: text/html; charset=UTF-8');

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

require_once '../scripts.php';
require_once '../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$host= gethostname();
$ip = gethostbyname($host);
$fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
$fecha->setTimezone(new DateTimeZone('America/Bogota')); 
$fechaF = $fecha->format('Y-m-d H:i:s');

$sql1 = "insert into audit (user_name, user_type, email, actions, audit_table, audit_date, ip) 
values ('".$name."', 2,'".$mail."', 'Leer', 'Articulos', '".$fechaF."', '".$ip."');";
pg_query($conexion,$sql1);

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
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Busqueda" aria-describedby="basic-addon2">
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
                <span class="mr-2 d-none d-lg-inline text-gray-600">
                  <?php
                  $sql = "SELECT user_name FROM customer WHERE user_code = '".$cod."';";
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
              <h6 class="m-0 font-weight-bold text-success" align="center">Artículos científicos</h6>
            </div>
            <div class="card-body">
                <div id="tabladatatable">

                  

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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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

<script type="text/javascript">
  function habi_doc(pCod){
    alertify.confirm('Habilitar articulo', '¿Seguro desea habilitar este articulo?', 
          function(){ 
            var parametros = {
                "cod" : pCod
            };
            $.ajax({
            type:"POST",
            data:parametros,
            url:"R_acciones/Habilitar.php",
            success:function(r){
              if(r==1){
                alertify.success("Se habilito");
                $('#tabladatatable').load('Tablas/tabla_articulo.php');
              }else{
                alertify.error("No se pudo habilitar");
              } } }); },
          function(){ 
          });}
</script>


<script type="text/javascript">
  function desa_doc(pCod){
    alertify.confirm('Deshabilitar articulo', '¿Seguro desea deshabilitar este articulo?', 
          function(){ 
            var parametros = {
                "cod" : pCod
            };
            $.ajax({
            type:"POST",
            data:parametros,
            url:"R_acciones/Deshabilitar.php",
            success:function(r){
              if(r==1){
                alertify.success("Se deshabilito");
                $('#tabladatatable').load('Tablas/tabla_articulo.php');
              }else{
                alertify.error("No se pudo deshabilitar");
              } } }); },
          function(){ 
          });}
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tabladatatable').load('Tablas/tabla_articulo.php');
  });
</script>