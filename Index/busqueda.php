<!DOCTYPE html>
<html lang="zxx">
    

<head>        
        <style>
            span {
                cursor: pointer;
            }
        </style>
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
        
        <!-- Title -->
        <title> MANIGUA </title>
        
        <!-- Favicon -->
        <link href="../img/icon.png" rel="icon" type="image/x-icon" />
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="css/mmenu.positioning.css" rel="stylesheet" type="text/css" />
        
        <!-- Stylesheet -->
        <link href="style.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

        <?php
        require_once '../Util/conexion.php';

        $obj=new Conexion();
        $conexion=$obj->conectarBD();
        ?>
    </head>

    <body>
        
        <!-- Start: Header Section -->
        <header id="header-v1" class="navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="navbar-header">
                                    <h1>
                                            <a href="index.php">
                                                <img src="images/MANIGUA.png" height="170" width="250"/>
                                            </a>
                                        </h1>
                                    <div class="navbar-brand">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Header Topbar -->
                                <div class="header-topbar hidden-sm hidden-xs">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="topbar-info">
                                                <a href="tel:+57-310-819-8041"><i class="fa fa-phone"></i>(+57) 310 819 8041</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="topbar-links">
                                                <a href="mailto:manigua_soporte@gmail.com"><i class="fa fa-envelope"></i>MANIGUA_SOPORTE@GMAIL.COM</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-collapse hidden-sm hidden-xs">
                                    <ul class="nav navbar-nav" style="margin-left: 25px">
                                        <li class="dropdown active">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="index.php">Inicio</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="busqueda.php">Búsqueda</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="index.php#section-2">Quiénes somos</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="index.php#section-3">Lanzamientos</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#section-5">Información</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#section-4">Login</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                            <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
                                    <li class="mobile-title">
                                        <h4>Navigation</h4>
                                        <a href="#" class="close"></a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">Home</a>
                                        <ul>
                                            <li><a href="index-2.html">Home V1</a></li>
                                            <li><a href="home-v2.html">Home V2</a></li>
                                            <li><a href="home-v3.html">Home V3</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="books-media-list-view.html">Books &amp; Media</a>
                                        <ul>
                                            <li><a href="books-media-list-view.html">Books &amp; Media List View</a></li>
                                            <li><a href="books-media-gird-view-v1.html">Books &amp; Media Grid View V1</a></li>
                                            <li><a href="books-media-gird-view-v2.html">Books &amp; Media Grid View V2</a></li>
                                            <li><a href="books-media-detail-v1.html">Books &amp; Media Detail V1</a></li>
                                            <li><a href="books-media-detail-v2.html">Books &amp; Media Detail V2</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="news-events-list-view.html">News &amp; Events</a>
                                        <ul>
                                            <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>
                                            <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="signin.html">Signin/Register</a></li>
                                            <li><a href="404.html">404/Error</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog.html">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog Grid View</a></li>
                                            <li><a href="blog-detail.html">Blog Detail</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->

        <!-- Start: Page Banner -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
            
            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure>
                        <img alt="Home Slide" src="images/header-slider/home-v1/header-slide.jpg" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption"><br><br><br><br><br><br><br><br>
                            <h3>Documentos y libros online, donde estés</h3>
                            <h2>"Las bibliotecas son puertas a otras vidas"</h2><br>
                            <p>La libreria Manigua ofrece una gran colección de libros, articulos cientificos y ponencias.</p>
                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="#section-4" class="btn btn-primary">Empieza a leer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Page Banner -->

        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-full-width">
                        <div class="container">
                            <!-- Start: Search Section -->
                            <section class="search-filters">
                                <div class="filter-box" align="center">
                                    <h3>¿Qué estás buscando?</h3>

                                        <div class="col-md-1 col-sm-6">
                                        </div> 
                                        <div class="col-md-8 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Ingrese el título del documento" id="keywords" name="keywords" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <button onclick="busqueda()">Buscar</button>
                                            </div>
                                        </div>  
                                        <div class="col-md-12 col-sm-6">
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <button onclick="mostrarLibros()">Libros</button>
                                            </div>
                                        </div>  
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <button onclick="mostrarArticulos()">Artículos</button>
                                            </div>
                                        </div>  
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <button onclick="mostrarPonencias()">Ponencias</button>
                                            </div>
                                        </div> 
                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <button onclick="mostrarTodo()">Todo</button>
                                            </div>
                                        </div>
                                </div>
                            </section><br><br><br>
                            <!-- End: Search Section -->
                            <section ><br><br><br><br>
                            <div class="booksmedia-fullwidth" align="center">
                                <ul id="mostrar">
                                 
                                </ul>
                                <center><h4><span>Leer Más</span></h4></center>
                            </div> 
                            </section>                                                     
                            
                        </div>
                        <!-- Start: Staff Picks -->
                        <br><br><br>
                        <!-- End: Staff Picks -->
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Products Section -->

        <section class="features" id="section-4">
            <div class="container" align="center">
                        <div class="d-flex justify-content-center"><br>
                            <div class="bg-green">
                                <br><br><br>
                                    <h1 align="center" style="color: white">BIBLIOTECA MANIGUA</h1>
                                    <span class="underline center"></span>
                                <br><br>
                                <center><h2>Inicio de sesión</h2></center><br><br>
                                <form action="../signin_validar.php" method="post" class="contact-form" id="emp">
                                    <div class="form-group" style="margin-left: 120px; margin-right: 120px;">
                                        <input type="text" id="correo" name="correo" class="form-control pl-3" placeholder="Correo electrónico" required/>
                                    </div>
                                    <div class="form-group" style="margin-left: 120px; margin-right: 120px;">
                                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required/>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary tm-btn-primary">INGRESAR</button><br><br>
                                    <center><strong><a href="recuperarCuenta.php#tm-section-6"  id="show">Olvidé la clave</a> | <a href="registrarCuenta.php#tm-section-6" id="hide">Registrarse</a></strong></center><br><br>
                                </form>
                            </div>
                            <br><br>    
                        </div>
                </div>
        </section>

        <!-- Start: Social Network -->
        <section class="social-network category-filter section-padding banner" id="section-5">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">Siguenos</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <ul>
                    <li>
                        <a class="facebook" href="#" target="_blank">
                            <span>
                                <i class="fa fa-facebook-f"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#" target="_blank">
                            <span>
                                <i class="fa fa-twitter"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="google" href="#" target="_blank">
                            <span>
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="rss" href="#" target="_blank">
                            <span>
                                <i class="fa fa-rss"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="linkedin" href="#" target="_blank">
                            <span>
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="youtube" href="#" target="_blank">
                            <span>
                                <i class="fa fa-youtube"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End: Social Network -->
        
        <!-- Start: Footer -->
        <footer class="site-footer">
            <div class="container">
                <div id="footer-widgets">
                    <div class="row" align="center">
                        <div class="col-md-6 col-sm-6 widget-container">
                            <div id="text-2" class="widget widget_text">
                                <h3 class="footer-widget-title">Sobre Manigua</h3>
                                <span class="underline center"></span>
                                <address>
                                    <div class="info">
                                        <i class="fa fa-location-arrow"></i>
                                        <span>Universidad El Bosque, Bogot&aacute;, Colombia</span>
                                    </div>
                                    <div class="info">
                                        <i class="fa fa-envelope"></i>
                                        <span><a href="manigua_soporte@gmail.com">Manigua_soporte@gmail.com</a></span>
                                    </div>
                                    <div class="info">
                                        <i class="fa fa-phone"></i>
                                        <span><a href="tel:+57-310-819-8041">(+57) 310 819 8041 </a></span>
                                    </div>
                                </address>
                            </div>
                        </div>
                        
                        <div class="clearfix hidden-lg hidden-md hidden-xs tablet-margin-bottom"></div>
                        <div class="col-md-6 col-sm-6 widget-container">
                            <div id="text-4" class="widget widget_text">
                                <h3 class="footer-widget-title">Horarios de Atención</h3>
                                <span class="underline center"></span>
                                <div class="timming-text-widget">
                                    <time datetime="2017-02-13">Lun - Vie: 9 a.m - 5 p.m</time>
                                    <time datetime="2017-02-13">Sab - Dom: 10 a.m - 3 p.m</time>
                                </div>
                            </div>          
                        </div>
                    </div>
                </div>                
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                            <h5 style="text-align: center;">POR INNOSOFT UEB</h5>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End: Footer -->

        <!-- jQuery Latest Version 1.x -->
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        
        <!-- jQuery UI -->
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        
        <!-- jQuery Easing -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <!-- Mobile Menu -->
        <script type="text/javascript" src="js/mmenu.min.js"></script>
        
        <!-- Harvey - State manager for media queries -->
        <script type="text/javascript" src="js/harvey.min.js"></script>
        
        <!-- Waypoints - Load Elements on View -->
        <script type="text/javascript" src="js/waypoints.min.js"></script>

        <!-- Facts Counter -->
        <script type="text/javascript" src="js/facts.counter.min.js"></script>

        <!-- MixItUp - Category Filter -->
        <script type="text/javascript" src="js/mixitup.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        
        <!-- Accordion -->
        <script type="text/javascript" src="js/accordion.min.js"></script>
        
        <!-- Responsive Tabs -->
        <script type="text/javascript" src="js/responsive.tabs.min.js"></script>
        
        <!-- Responsive Table -->
        <script type="text/javascript" src="js/responsive.table.min.js"></script>
        
        <!-- Masonry -->
        <script type="text/javascript" src="js/masonry.min.js"></script>
        
        <!-- Carousel Swipe -->
        <script type="text/javascript" src="js/carousel.swipe.min.js"></script>
        
        <!-- bxSlider -->
        <script type="text/javascript" src="js/bxslider.min.js"></script>
        
        <!-- Custom Scripts -->
        <script type="text/javascript" src="js/main.js"></script>

        <script>
            function mostrarTodo() {
                $('#mostrar').load('Listas/todo.php');
            }
        </script>

        <script>
            function mostrarLibros() {
                $('#mostrar').load('Listas/libros.php');
            }
        </script>

        <script>
            function mostrarArticulos() {
                $('#mostrar').load('Listas/articulos.php');
            }
        </script>

        <script>
            function mostrarPonencias() {
                $('#mostrar').load('Listas/ponencias.php');
            }
        </script>

        <script>
            function busqueda() {
            var texto=document.getElementById("keywords").value;
            var queryString = "?busqueda=" + texto;
            $('#mostrar').load('Listas/busquedaDocumentos.php' + queryString);
            }
        </script> 

        <script type="text/javascript">
            $(document).ready(function(){
            $('#mostrar').load('Listas/todo.php');
            });
        </script>

        <script>
            $(function () {
                $('span').click(function () {
                    $('#mostrar li:hidden').slice(0,6).css("display", "inline-block");                    
                    if ($('#mostrar li').length == $('#mostrar li:visible').length) {
                        $('span ').hide();
                    }
                });
            });
        </script>

    </body>


</html>