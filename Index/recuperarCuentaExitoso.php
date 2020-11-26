<!DOCTYPE html>
<html lang="zxx">
    

<head>        
        
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
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

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
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#section-2">Quiénes somos</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#section-3">Lanzamientos</a>
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
        
        <!-- Start: Slider Section -->
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
        <!-- End: Slider Section -->
        
        <!-- Start: Search Section -->
        
        <!-- End: Search Section -->
        
        <!-- Start: Welcome Section -->
        <section class="welcome-section" id="section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-wrap">
                            <div class="welcome-text">
                                <center><h2 class="section-title">Bienvenido a Manigua</h2></center>
                                <span class="underline center"></span>
                                <p style="text-align: justify;">
                                La librería Manigua es una librería especializada y académica. Con el paso de los años, hemos ido trabajando con ponencias, artículos científicos y libros de bibliotecas y universidades de toda Colombia, para el servicio de libros colombianos y extranjeros. Por favor, pregúntenos por nuestra oferta general de servicios.
                                <br>
                                Tenemos un sistema de envío de novedades por correo electrónico, título a título y sin enviar catálogos completos con un archivo adjunto. Son, principalmente, alertas bibliográficas de las novedades más interesantes que pasan por nuestra librería tras consultar los catálogos de decenas de Editoriales españolas y extranjeras, entres las materias de nuestras especializaciones, y con obras de Referencia, bibliografías y herramientas para el trabajo de los profesionales de la información, bien sea en las bibliotecas, archivos y centros de Documentación.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-image"></div>
        </section>
        <!-- End: Welcome Section -->

        <!-- Start: Statistics Section -->
            <section class="welcome-section">
                <br>
                <br>
                <div class="container">
                    <div class="row-md-3">
                    <div class="facts-counter">
                        <div class="col-md-4">
                            <ul>
                                <li class="bg-yellow">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="ebook"></i>
                                        </div>
                                        <span>Libros<strong class="fact-counter">
                                        <?php
                                            $sql = "select count(isbn) from book, documents where book.cod_doc = documents.cod_doc and documents.status_code = 1 and documents.status_review = 1;";
                                            $result = pg_query($conexion,$sql);

                                            while ($mostrar=pg_fetch_row($result))
                                            {
                                                echo $mostrar[0];
                                            }
                                        ?>
                                        </strong></span>
                                    </div>
                                </li>
                            </ul>   
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li class="bg-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="eaudio"></i>
                                        </div>
                                        <span>Ponencias<strong class="fact-counter">
                                        <?php
                                            $sql1 = "select count(pres_id) from presentation, documents where presentation.cod_doc = documents.cod_doc and documents.status_code = 1 and documents.status_review = 1;";
                                            $result1 = pg_query($conexion,$sql1);

                                            while ($mostrar1=pg_fetch_row($result1))
                                            {
                                                echo $mostrar1[0];
                                            }
                                        ?>
                                        </strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li class="bg-red">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="magazine"></i>
                                        </div>
                                        <span>Articulos<strong class="fact-counter">
                                        <?php
                                            $sql2 = "select count(ssn) from article, documents where article.cod_doc = documents.cod_doc and documents.status_code = 1 and documents.status_review = 1;";
                                            $result2 = pg_query($conexion,$sql2);

                                            while ($mostrar2=pg_fetch_row($result2))
                                            {
                                                echo $mostrar2[0];
                                            }
                                        ?>
                                        </strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                        
                    </div>
                </div>
                <br>
                <br>
            </section>
        <!-- End: Statistics Section -->
        
        <!-- Start: Category Filter -->
        <section class="category-filter section-padding" id="section-3">
            <div class="container">
                <div class="center-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h2 class="section-title">Mira los nuevos lanzamientos</h2>
                            <span class="underline center"></span>
                            <p class="lead">A continuación encontraras los nuevos lanzamoentos que tenemos para ti.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="category-filter">
                <ul class="category-list">
                    <li class="category-item adults">
                        <figure>
                            <img src="images/category-filter/home-v1/category-filter-img-01.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>The sonic boom</h4>
                                    <span class="author"><strong>Autor:</strong> Joel Beckerman, Tyler Gray</span>
                                    <span class="author"><strong>ISBN:</strong> 9780544230361</span>
                                    <span class="author"><strong>Páginas:</strong> 208</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>El sonido y la música nos rodean constantemente queries los damos por sentado.</p>
                                    <br><a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item kids-teens">
                        <figure>
                            <img src="images/category-filter/home-v1/category-filter-img-02.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>The great gatsby</h4>
                                    <span class="author"><strong>Autor:</strong> F. Scott Fitzgerald</span>
                                    <span class="author"><strong>ISBN:</strong> 9781400114245</span>
                                    <span class="author"><strong>Páginas:</strong> 218</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>Su pasión quijotesca y la obsesión por la hermosa ex debutante Daisy Buchanan.</p>
                                    <br><a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item video">
                        <figure>
                            <img src="images/category-filter/home-v1/category-filter-img-03.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>The missing piece</h4>
                                    <span class="author"><strong>Autor:</strong> Shel Silverstein</span>
                                    <span class="author"><strong>ISBN:</strong> 9780060256715</span>
                                    <span class="author"><strong>Páginas:</strong> 98</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>Le faltaba una parte y no era feliz. Por eso decidio buscar la parte que le faltaba.</p>
                                    <br><a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item audio">
                        <figure>
                            <img src="images/category-filter/home-v1/category-filter-img-04.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Ciencia y tecnología</h4>
                                    <span class="author"><strong>Autor:</strong> Nemesio Espinoza Herrera</span>
                                    <span class="author"><strong>Presentado en:</strong> Congreso internacional sobre Culturas y Tecnologías</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>Trata sobre la evolución que ha venido adquiriendo la tecnología.</p>
                                    <br><a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item books">
                        <figure>
                            <img src="images/category-filter/home-v1/category-filter-img-05.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>El estudio de la historia del Reino Unido</h4>
                                    <span class="author"><strong>Author:</strong> Julio Macias</span>
                                    <span class="author"><strong>ISSN:</strong> 2077-2955</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>La existencia cada vez mayor de computadoras y tabletas en manos de la población universitaria.</p>
                                    <br><a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item magazines">
                        <figure>
                            <img src="images/category-filter/home-v1/category-filter-img-06.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Comercio y geografía económica</h4>
                                    <span class="author"><strong>Autor:</strong> Universidad de Antioquia</span>
                                    <span class="author"><strong>ISSN:</strong> 0120-2596</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>La contribución de Paul R. Krugman a la teoría económica, en especial los aportes de 1979.</p>
                                    <br><a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="category-item adults">
                        <figure>
                            <img src="images/category-filter/home-v1/category-filter-img-07.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Análisis de indicadores de tecnología</h4>
                                    <span class="author"><strong>Autor:</strong> Pardo Martínez, Clara Ines</span>
                                    <span class="author"><strong>Presentado en:</strong> Congreso internacional GFACCT</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>Pespectiva a partir de la gestión del conocimiento en ciencias y tecnología.</p>
                                    <br><a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item kids-teens">
                        <figure>
                            <img src="images/category-filter/home-v1/category-filter-img-08.jpg" alt="New Releaase" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>El principito</h4>
                                    <span class="author"><strong>Autor:</strong> Antoine de Saint-Exupéry</span>
                                    <span class="author"><strong>ISBN:</strong> 9781742679303</span>
                                    <span class="author"><strong>Páginas:</strong> 81</span>
                                    <div class="rating">
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                        <span>☆</span>
                                    </div>
                                    <p>Un piloto se encuentra perdido en el desierto del Sahara después de que su avión sufriera una avería</p>
                                    <br><a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
                <div class="center-content">
                    <a href="#section-4" class="btn btn-primary">Ver más</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- Start: Category Filter -->
        
        <!-- Start: Features -->
        <section class="features" id="section-4">
            <div class="container" align="center">
                        <div class="d-flex justify-content-center"><br>
                            <div class="bg-green">
                                <br><br><br>
                                    <h1 align="center" style="color: white">BIBLIOTECA MANIGUA</h1>
                                    <span class="underline center"></span>
                                <br><br>
                                
                                <?php
                                    $code = $_POST['cedula'];
                                    $email = $_POST['correo'];

                                    $sql0="SELECT user_name FROM customer WHERE user_code = '".$code."' and email ='".$email."';";
                                    $r=pg_query($conexion,$sql0);
                                    $nombre='';

                                    while ($mostrar=pg_fetch_row($r))
                                    {
                                        $nombre = $mostrar[0];
                                        echo '<center><h1 style="color: white">Restablecimiento exitoso '.$nombre.'!</h1></center><br><br>';
                                    }

                                    echo '<h4 style="color: white">Te enviamos tu nueva clave por medio del correo:<br> '.$email. '<br><br>';
                                    $fecha = new DateTime("now", new DateTimeZone('America/Bogota')); 
                                    $fecha->setTimezone(new DateTimeZone('America/Bogota')); 
                                    $fechaF = $fecha->format('Y-m-d H:i:s');
                                    echo 'Fecha actual: '.$fechaF.'</h4><br><br>';
                                    echo '<center><strong><a href="index.php#section-4"  id="show">Iniciar sesión</a></strong></center><br><br><br>';

                                    $patron= "([a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[a-zA-Z]{2,6})"; 
                                    if (preg_match($patron, $email)) 
                                    {
                                        $sql1 ="SELECT * FROM customer WHERE email ='$email'";
                                        $result = pg_query($conexion,$sql1);

                                        $sql2 ="SELECT * FROM customer WHERE user_code ='$code'";
                                        $result2 = pg_query($conexion,$sql2);

                                        if(pg_num_rows($result)!=1)
                                        {
                                          echo '<script language="javascript">alert("El correo no coincide con uno registrado");window.location.href="recuperarCuenta.php#section-4"</script>';
                                        }
                                        elseif (pg_num_rows($result2)!=1) 
                                        {
                                          echo '<script language="javascript">alert("El numero de identificación no coincide con uno registrado");window.location.href="recuperarCuenta.php#section-4"</script>';
                                        }
                                        else
                                        {
                                            $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                                            $longpalabra=8;
                                            for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) 
                                            {
                                                $x = rand(0,$n);
                                                $pass.= $caracteres[$x];
                                            }

                                            $clave = md5($pass);

                                            $imp = "
                                            <html>
                                            <div>
                                            <div style='background-color: #7bc142;'>
                                                <center><br><h1 style='color: #ffffff'>Librer&iacute;a Manigua</h1><br></center>
                                            </div>

                                            <div style='text-align: center;'>
                                            <h2><br>Hola ".$nombre.", has solicitado una nueva contrase&ntilde;a, la cual es ".$pass."
                                            <br>Que esperas para ingresar y consultar nuestros recursos!<br><br> </h2>
                                            </div>

                                            <div align='center' style='background-color: #7bc142; color: #ffffff'>
                                            <br> Universidad El Bosque <br>  (+57) 310 819 8041 
                                            <br> Av. Cra 9 No. 131 A - 02 | Edificio Fundadores | Bogotá D.C. | Colombia 
                                            <br>
                                            </div>
                                            </div>
                                            </html>";

                                            require 'PHPMailer/Exception.php';
                                            require 'PHPMailer/PHPMailer.php';
                                            require 'PHPMailer/SMTP.php';

                                            $mail = new PHPMailer(true);

                                            try 
                                            {
                                                //Server settings
                                                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                                                $mail->isSMTP();                                            // Send using SMTP
                                                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                                $mail->Username   = 'ferialaboral2020ueb@gmail.com';                     // SMTP username
                                                $mail->Password   = '098ueb123';                               // SMTP password
                                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                                                //Recipients
                                                $mail->setFrom('ferialaboral2020ueb@gmail.com', 'Libreria Manigua');
                                                $mail->addAddress($email, $nombre);

                                                // Attachments
                                                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                                                // Content
                                                $mail->isHTML(true);                                  // Set email format to HTML
                                                $mail->Subject = 'Libreria Manigua';
                                                $mail->Body    = $imp;
                                                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                                if($mail->send())
                                                {
                                                    $sql ="UPDATE customer SET pass = '".$clave."' WHERE user_code = '".$code."' and email = '".$email."';";
                                                    pg_query($conexion,$sql);
                                                }
                                            } 
                                            catch (Exception $e) 
                                            {
                                                echo '<script>alert("Error al enviar el formulario");window.location.href="recuperarCuenta.php#tm-section-6"</script>';
                                            }
                                        }
                                    } 
                                    else
                                    {
                                          echo '<script language="javascript">alert("Correo invalido - Usuario");window.location.href="recuperarCuenta.php#tm-section-6"</script>';
                                    }
                                ?>

                            </div>
                            <br><br>    
                        </div>
                </div>
        </section>
        <!-- End: Features -->
        
        <!-- Start: Newsletter -->
        
        <!-- End: Newsletter -->
        
        <!-- Start: Latest Blog -->
        
        <!-- End: Latest Blog -->
        
        <!-- Start: Our Community Section -->

        <!-- End: Our Community Section -->
        
        <!-- Start: News & Event -->
 
        <!-- End: News & Event -->
        
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
        
    </body>


</html>