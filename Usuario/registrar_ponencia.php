<?php
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

$obj=new Conexion();
$conexion=$obj->conectarBD();
$result = pg_query($conexion, $sql);
while ($row = pg_fetch_row($result))
{
  $nomUsuario=$row[1];
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
                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $nomUsuario?></span>
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
          <form action="crud/register_presentation.php" method="post" enctype="multipart/form-data">
          <div class="card-header py-3">
              <div class="newspaper">
              <br> 
              <h6 class="m-0 font-weight-bold text-success" align="center">Ponencias</h6>
              <div class="text-right">
                <!--<a href='registrar_libro.php' class='btn btn-outline-success' role='button' type="submit">Agregar</a>-->
                <button type="submit"  class='btn btn-outline-success'>Agregar</button>

              </div>
              
              </div>

              
            </div>
            <div class="card-body">

            

	              <div class="form-group"> 
	              	<label for="full_name_id" class="font-weight-bold" >Título</label>
	              	<input type="text" class="form-control" id="doc_title" name="doc_title" required>
	              </div>	


                <div class="form-group"> <!-- Street 1 -->
	              	<label for="street1_id" class="font-weight-bold" >Nombre del congreso en donde se presentó</label>
	              	<input type="text" class="form-control" id="doc_congress" name="doc_congress" required> 
	              </div>					

	              	
                <div class="newspaper">
                  <div class="form-group"> <!-- Street 2 -->
	                	<label for="street2_id" class="font-weight-bold" >Fecha de publicación</label>
	                	<input type="date" class="form-control" id="doc_publication_date" name="doc_publication_date" required>
                  </div> 
                  <div class="form-group"> <!-- Street 2 -->
	                	<label for="street2_id" class="font-weight-bold" >Número de páginas</label>
	                	<input type="nuumber" class="form-control" id="doc_pages" name="doc_pages" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                  </div>
                  <div class="form-group"> <!-- Street 2 -->
	              	  <label for="street2_id" class="font-weight-bold">Archivo</label>
	              	  <input type="file" class="form-control" id="doc_file" name="doc_file" accept=".pdf">
                </div>
                </div>
                
                <br>
                <hr>
                <br>
                <div class="form-group"> 
                <div class="newspaper">
                    <br> 
                    <h6 class="m-0 font-weight-bold text-success" align="center">Autores</h6>
                    <div class="text-right">
                      <button type="button" onClick="createDiv()" class='btn btn-outline-success'>Agregar</button>
                      <a class="btn btn-outline-success"  href="#" data-toggle="modal" data-target="#authorModal">Registrar</a>
                    </div>
              
                  
                  </div>
                </div>
                <div id="author_space" class="form-group">
                <input type="text" id="author_num" name="author_num" style = "display:none" >

                  	
                  
                </div>	
                <br>
                <br>     
                  
                <div class="form-group">
                  <div class="newspaper">
                    <br> 
                    <h6 class="m-0 font-weight-bold text-success" align="center">Editorial</h6>
                    <div class="text-right">
                      <a class="btn btn-outline-success"  href="#" data-toggle="modal" data-target="#editorialModal">Registrar</a>
                      <!--<button type="button" onClick="test()" class='btn btn-outline-success'>Registrar</button>-->
                    </div>
              
                  
                  </div>

                  <div class="form-group"> 
	              	    <label for="street1_id" class="font-weight-bold">Editorial</label>
	              	    <select  class="form-control" id="editorial_id" name="editorial_id" required>
                        <option value="" selected disabled hidden>Seleccione</option>
                        <?php
                          $sql = "SELECT * from editorial";
                          $result = pg_query($conexion, $sql);
                          while ($mostrar=pg_fetch_row($result))
                          {
                            echo "<option value=".$mostrar[0].">".$mostrar[1]."</option>";
                          }
                        ?>
                      </select>
	                </div>	

                  
                </div>	

                

	              
	
 
	
           
            </div>
            </form>	
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

    <!-- author Modal-->
    <div class="modal fade" id="authorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar autor</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
          <div class="modal-body">
            <form action="crud/register_author.php" method="post">
              <table>
                <tr>
                  <td><label>Nombres y apellidos:</label></td>
                  <td><input type="text"  name="auth_name" required ></td>
                </tr>
                <tr>
                  <td><label>Número de Identificación:</label></td>
                  <td><input type="text"  name="auth_id" required ></td>
                </tr>

                <tr>
                  <td><label>Correo:</label></td>
                  <td><input type="email" name="auth_mail" required ></td>
                </tr>
                <tr>
                  <td><label>Celular:</label></td>
                  <td><input type="number" id="auth_phone" min="1111111" max="9999999999" name="auth_phone" required></td>
                </tr>
                <tr>
                  <td><label>Dirección:</label></td>
                  <td><input type="text" name="auth_address" required ></td>
                </tr>
              </table>  
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
              <button type="submit" id="btnAgregarNuevo" class="btn btn-success">Agregar</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- editorial Modal-->
  <div class="modal fade" id="editorialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar editorial</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
          <div class="modal-body">
            <form action="crud/register_editorial.php" method="post">
              <table>
                <tr>
                  <td><label>Nombre:</label></td>
                  <td><input type="text"  name="edit_name" required ></td>
                </tr>

                <tr>
                  <td><label>Correo:</label></td>
                  <td><input type="email" name="edit_mail" required ></td>
                </tr>
                <tr>
                  <td><label>Celular:</label></td>
                  <td><input type="number" min="1111111" max="9999999999" name="edit_phone" required></td>
                </tr>
                <tr>
                  <td><label>Dirección:</label></td>
                  <td><input type="text" name="edit_address" required ></td>
                </tr>
              </table>  
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
              <button type="submit" id="btnAgregarNuevo" class="btn btn-success">Agregar</button>
          </div>
        </form>

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

  <div id = "author_form" class="form-group" style = "display:none">
    <div class="newspaper">	
      <div class="form-group"> 
        <label for="street1_id" class="font-weight-bold">Nombre</label>
        <input type="text" class="form-control" id="street1_id2" name="street1" placeholder="<script> getChildNum();</script>">
      </div>	
      <div class="form-group"> 
        <label for="street1_id" class="font-weight-bold">Correo</label>
        <input type="text" class="form-control" id="street1_id" name="street1">
      </div>	
      <div class="form-group"> 
        <label for="street1_id" class="font-weight-bold">Celular</label>
        <input type="text" class="form-control" id="street1_id" name="street1">
      </div>	
    </div>
    <div class="form-group"> 
        <label for="street1_id" class="font-weight-bold">Dirección</label>
        <input type="text" class="form-control" id="street1_id" name="street1">
    </div>
    <hr>
  </div>
</body>
<script type="text/JavaScript">

  function createDiv() {
    var div = document.createElement('div');
    div.innerHTML = '<div id = "author_form" class="form-group">\n' +
    
    '<div class="form-group"> \n' +
        '<label for="street1_id" class="font-weight-bold">Autor '+getChildNum()+'</label>\n' +
        '<select name="selected_author'+getChildNum()+'" class="form-control">\n' +
          '<option value="" selected disabled hidden>Seleccione</option>\n' +
          <?php
            $sql = "SELECT * from author";
            $result = pg_query($conexion, $sql);
            while ($mostrar=pg_fetch_row($result))
            {
              ?>'<option value="<?php echo $mostrar[0];?>" ><?php echo $mostrar[1].' '.$mostrar[0];?></option>\n' +<?php
              
            }
          ?>
        '</select>\n' +
    '</div>\n' +
    '<hr>\n' +
  '</div>\n' ;
    document.getElementById("author_space").appendChild(div);
    document.getElementById("author_num").value = getChildNum() - 1;
  }
  function createDiv2() {
    var div = document.createElement('div');
    //document.getElementById('author_form').getElementById("street1_id2").value = 'hola';
    div.innerHTML = document.getElementById('author_form').innerHTML;
    document.getElementById("author_space").appendChild(div);
  }
  function test(){
    alert(getChildNum());
  }
  function getChildNum(){
    var x = document.getElementById("author_space").childElementCount;
    return x;
  }
</script>

</html>
