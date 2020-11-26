<?php
    require_once '../../Util/conexion.php';

    $obj=new Conexion();
    $conexion=$obj->conectarBD();
?>
<ul id="mostrar">
    <?php
    $busqueda=$_GET['busqueda'];
    $buscaLib="SELECT isbn, title, publication_date, cod_doc FROM book WHERE UPPER(title) LIKE UPPER('%".$busqueda."%')";
    $resLib=pg_query($conexion,$buscaLib);
    $buscaArt="SELECT ssn, title, publication_date, cod_doc FROM article WHERE UPPER(title) LIKE UPPER('%".$busqueda."%')";
    $resArt=pg_query($conexion,$buscaArt);
    $buscaPres="SELECT congress_name, title, publication_date, cod_doc FROM presentation WHERE UPPER(title) LIKE UPPER('%".$busqueda."%')";
    $resPres=pg_query($conexion,$buscaPres);
    $mostL=pg_fetch_row($resLib);
    $mostA=pg_fetch_row($resArt);
    $mostP=pg_fetch_row($resPres);
    if($mostL == null && $mostA == null && $mostP == null)
    {
        echo '<center><h4>No hay resultados</h4></center>';
    }
    else
    {
        $resulLib=pg_query($conexion,$buscaLib);
        while($mostrarLib=pg_fetch_row($resulLib))
        {
            $sql="SELECT cod_doc, status_code,editorial_code, t_doc_code, status_review from documents where cod_doc=".$mostrarLib[3].";";
            $result=pg_query($conexion,$sql);
            $mostrar=pg_fetch_row($result);
            if($mostrar[4]==1)
            {
                echo '<li class="libros">';                                 
                echo '<div class="book-list-icon yellow-icon"></div>';
                echo '<figure>';
                echo '<a href="#section-4"><img src="images/books-media/layout-3/libro.png" alt="Book"></a>';
                echo '<figcaption>';
                echo '<header>';                                     
                $contador=0;
                $sql2="SELECT author.author_name from author, document_author where document_author.cod_doc = ".$mostrar[0]." and document_author.author_id = author.author_id;";
                $result2=pg_query($conexion,$sql2);
                $autorn='';
                while($mostrar2=pg_fetch_row($result2))
                {
                    $contador=$contador+1;
                    $autorn= $mostrar2[0]." ";
                }
                echo '<h4><a href="#section-4">'.$mostrarLib[1].'</a></h4>';
                if($contador > 1)
                {
                    echo '<p><strong>Autores:</strong>  '.$autorn.'</p>';
                }
                else
                {
                    echo '<p><strong>Autor:</strong>  '.$autorn.'</p>';
                }
                echo '<p><strong>ISBN: </strong>  '.$mostrarLib[0].'</p>';
                $sql4="SELECT editorial_name from editorial, documents where documents.cod_doc = ".$mostrar[0]." and documents.editorial_code = editorial.editorial_code;";
                $result4=pg_query($conexion,$sql4);
                $mostrar4=pg_fetch_row($result4);
                echo '</header>';
                echo '<p><strong>Editorial:</strong> '.$mostrar4[0].'</p>';                            
                echo '<div class="actions">';
                echo '<ul>';
                echo '<li>';
                echo '<a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>';
                echo '</li>';
                echo '</ul>';
                echo '</div>';
                echo '</figcaption>';
                echo '</figure>';
                echo '</li>';
            }

        }
        $resulArt=pg_query($conexion,$buscaArt);
        while($mostrarArt=pg_fetch_row($resulArt))
        {
            $sql="SELECT cod_doc, status_code,editorial_code, t_doc_code, status_review from documents where cod_doc=".$mostrarArt[3].";";
            $result=pg_query($conexion,$sql);
            $mostrar=pg_fetch_row($result);
            if($mostrar[4]==1)
            {
                echo '<li class="articulos">';                                 
                echo '<div class="book-list-icon red-icon"></div>';
                echo '<figure>';
                echo '<a href="#section-4"><img src="images/books-media/layout-3/articulo.png" alt="Book"></a>';
                echo '<figcaption>';
                echo '<header>';                                     
                $contador=0;
                $sql2="SELECT author.author_name from author, document_author where document_author.cod_doc = ".$mostrar[0]." and document_author.author_id = author.author_id;";
                $result2=pg_query($conexion,$sql2);
                $autorn='';
                while($mostrar2=pg_fetch_row($result2))
                {
                    $contador=$contador+1;
                    $autorn= $mostrar2[0]." ";
                }
                echo '<h4><a href="#section-4">'.$mostrarArt[1].'</a></h4>';
                if($contador > 1)
                {
                    echo '<p><strong>Autores:</strong>  '.$autorn.'</p>';
                }
                else
                {
                    echo '<p><strong>Autor:</strong>  '.$autorn.'</p>';
                }
                echo '<p><strong>SSN: </strong>  '.$mostrarArt[0].'</p>';
                $sql4="SELECT editorial_name from editorial, documents where documents.cod_doc = ".$mostrar[0]." and documents.editorial_code = editorial.editorial_code;";
                $result4=pg_query($conexion,$sql4);
                $mostrar4=pg_fetch_row($result4);
                echo '</header>';
                echo '<p><strong>Editorial:</strong> '.$mostrar4[0].'</p>';                            
                echo '<div class="actions">';
                echo '<ul>';
                echo '<li>';
                echo '<a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>';
                echo '</li>';
                echo '</ul>';
                echo '</div>';
                echo '</figcaption>';
                echo '</figure>';
                echo '</li>';
            }
        }
        $resulPres=pg_query($conexion,$buscaPres);
        while($mostrarPres=pg_fetch_row($resulPres))
        {
            $sql="SELECT cod_doc, status_code,editorial_code, t_doc_code, status_review from documents where cod_doc=".$mostrarPres[3].";";
            $result=pg_query($conexion,$sql);
            $mostrar=pg_fetch_row($result);
            if($mostrar[4]==1)
            {
                echo '<li class="ponencias">';                                 
                echo '<div class="book-list-icon green-icon"></div>';
                echo '<figure>';
                echo '<a href="#section-4"><img src="images/books-media/layout-3/ponencia.png" alt="Book"></a>';
                echo '<figcaption>';
                echo '<header>';                                     
                $contador=0;
                $sql2="SELECT author.author_name from author, document_author where document_author.cod_doc = ".$mostrar[0]." and document_author.author_id = author.author_id;";
                $result2=pg_query($conexion,$sql2);
                $autorn='';
                while($mostrar2=pg_fetch_row($result2))
                {
                    $contador=$contador+1;
                    $autorn= $mostrar2[0]." ";
                }
                echo '<h4><a href="#section-4">'.$mostrarPres[1].'</a></h4>';
                if($contador > 1)
                {
                    echo '<p><strong>Autores:</strong>  '.$autorn.'</p>';
                }
                else
                {
                    echo '<p><strong>Autor:</strong>  '.$autorn.'</p>';
                }
                echo '<p><strong>Congreso: </strong>  '.$mostrarPres[0].'</p>';
                $sql4="SELECT editorial_name from editorial, documents where documents.cod_doc = ".$mostrar[0]." and documents.editorial_code = editorial.editorial_code;";
                $result4=pg_query($conexion,$sql4);
                $mostrar4=pg_fetch_row($result4);
                echo '</header>';
                echo '<p><strong>Editorial:</strong> '.$mostrar4[0].'</p>';                            
                echo '<div class="actions">';
                echo '<ul>';
                echo '<li>';
                echo '<a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>';
                echo '</li>';
                echo '</ul>';
                echo '</div>';
                echo '</figcaption>';
                echo '</figure>';
                echo '</li>';
            }
        }
    }
?>
</ul>