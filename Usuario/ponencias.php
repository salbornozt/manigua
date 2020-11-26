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

$sql = "select * from customer where user_code='$codU'";
require_once '../Util/conexion.php';
require_once '../scripts.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$result = pg_query($conexion, $sql);
while ($row = pg_fetch_row($result))
{
  $nombre=$row[1];
}
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
  <link href="css/documents.css" rel="stylesheet" type="text/css">
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
          <i class="fas fa-book"></i>
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
          <span>MIS RESERVAS</span>
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

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $nombre ?></span>
                <img class="img-profile rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnUIgT752RoB4mdWD7vPD_mmx7hT2pqQG_Ug&usqp=CAU">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="perfil_usuario.php">
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
              <div class="newspaper">
              <br> 
              <h6 class="m-0 font-weight-bold text-success" align="center">Ponencias</h6>
              <div class="text-right">
                <a href='registrar_ponencia.php' class='btn btn-outline-success' role='button'>Agregar</a>
              </div>
              
              </div>

              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-condensed" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <th>CÓDIGO</th>                      
                      <th>TÍTULO</th>
                      <th>PRESENTADO EN</th>
                      <th>FECHA DE PUBLICACIÓN</th>
                      <th>AUTOR</th>
                      <th>EDITORIAL</th>
                      <th>ESTADO</th>
                      <th>ACCIÓN</th>
                    </tr>
                  </thead>
                  <tfoot style="background-color: #74c14e;color: white; font-weight: bold;" align="center">
                    <tr>
                      <th>CÓDIGO</th>                      
                      <th>TÍTULO</th>
                      <th>PRESENTADO EN</th>
                      <th>FECHA DE PUBLICACIÓN</th>
                      <th>AUTOR</th>
                      <th>EDITORIAL</th>
                      <th>ESTADO</th>
                      <th>ACCIÓN</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $sql = "SELECT p.pres_id,p.title,p.congress_name,p.publication_date,p.cod_doc, e.editorial_name, p.cod_doc FROM presentation p
                      INNER JOIN DOCUMENTS d on
                      p.cod_doc = d.cod_doc
                      inner join editorial e 
                      on d.editorial_code = e.editorial_code					           
                      and
                      d.status_code = 1
                      and d.status_review = 1";
                      $result = pg_query($conexion, $sql);
                      while ($mostrar=pg_fetch_row($result))
                      {
                        $sql2="SELECT status_code from DOCUMENTS where documents.cod_doc = ".$mostrar[6].";";
                        $result2 = pg_query($conexion, $sql2); 
                        $mostrar2=pg_fetch_row($result2); 
                        echo "<tr>";
                        echo "<td>".$mostrar[0]."</td>";
                        echo "<td>".$mostrar[1]."</td>";
                        echo "<td>".$mostrar[2]."</td>";
                        echo "<td>".$mostrar[3]."</td>";
                        echo "<td>";
                        $sql66="SELECT author_name FROM author,document_author WHERE document_author.cod_doc= ".$mostrar[4]." and document_author.author_id = author.author_id;";
                        $result66=pg_query($conexion,$sql66);
                        $autor = "";
                        while($mostrar4=pg_fetch_row($result66))
                        {
                          //$autor = $autor.$mostrar4[0];
                          echo $mostrar4[0]."<br>";
                        }
                        //$mostrar[3]
                        echo "</td>";
                        //echo "<td>".$mostrar[4]."</td>";                        
                        echo "<td>".$mostrar[5]."</td>";
                        if($mostrar2[0]==1){
                          echo '<td>';
                          echo '<center>';
                          echo '<span class="btn btn-success btn-xs" onclick="res_doc('.$mostrar[6].')">';
                          echo '<span class="fas fa-check-square"></span></span>';
                          echo '</center>';
                          echo '</td>';
                        }
                        else if($mostrar2[0]!=1){
                          echo "<td> No Disponible </td>";
                        }
                        echo "<td align='center'>
                        <a href='actualizar_ponencia.php?cod_doc=".$mostrar[6]."' class='btn btn-success btn-xs' role='button'><span class='fas fa-edit'></span></a>
                        <a href='eliminar_ponencia.php?cod_doc=".$mostrar[6]."&src=n' class='btn btn-warning btn-xs' role='button'><span class='fas fa-trash-alt'></span></a>

                        </td>";
                        echo "</tr>";
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

  <script type="text/javascript">
    function res_doc(pCodDocumento){
      alertify.confirm('Reservar Documento', '¿Desea reservar este documento?', 
            function(){ 
              var parametros = {
                  "cod_doc" : pCodDocumento,
              };
              $.ajax({
              type:"POST",
              data:parametros,
              url:"Acciones/reservar.php",
              success:function(r){
                console.log(r);
                if(r==1){
                  alertify.success("Se ha reservado exitosamente");
                  location.reload();
                }else{
                  alertify.error("No se pudo reservar");
                } } }); },
            function(){ 
            });}
  </script>

</body>

</html>
