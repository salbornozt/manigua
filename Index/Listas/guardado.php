while ($mostrar=pg_fetch_row($result))
                                        {
                                            echo 'while general ';
                                            
                                                if($mostrar[4]==1)
                                                {
                                                    echo $mostL[0].'mosta';
                                                    
                                                        echo $mostLib[0].'mosta2';
                                                        echo $mostrar[0].'mostacod_doc';
                                                        echo'while libros';
                                                        if($mostrar[3]==2)
                                                        {
                                                            $buscaLib="SELECT cod_doc FROM book WHERE UPPER(title) LIKE UPPER('%".$busqueda."%')";
                                                            $resLib=pg_query($conexion,$buscaLib);       
                                                            $mostrarLib=pg_fetch_row($resLib);
                                                            if()                                                    
                                                        }
                                                    
                                                    
                                                        echo'while arti';
                                                        if($mostrar[3]==1 && $mostrar[0]==$mostArt[0])
                                                        {
                                                        
                                                        echo '<li class="articulos">';                                            
                                                        echo '<div class="book-list-icon red-icon"></div>';
                                                        echo '<figure>';
                                                        echo '<a href="#section-4"><img src="images/books-media/layout-3/articulo.png" alt="Book"></a>';
                                                        $sql1="SELECT ssn, title,publication_date from article where cod_doc = ".$mostrar[0].";";
                                                        echo '<figcaption>';
                                                        echo '<header>';                                      
                                                        $result1=pg_query($conexion,$sql1);
                                                        $mostrar1=pg_fetch_row($result1);
                                                        $autorn="";
                                                        $contador=0;
                                                        $sql2="SELECT author.author_name from author, document_author where document_author.cod_doc = ".$mostrar[0]." and document_author.author_id = author.author_id;";
                                                        $result2=pg_query($conexion,$sql2);

                                                        while($mostrar2=pg_fetch_row($result2))
                                                        {
                                                            $contador=$contador+1;
                                                            $autorn= $mostrar2[0]." ";
                                                        }
                                                        echo '<h4><a href="#section-4">  '.$mostrar1[1].'</a></h4>';
                                                        if($contador > 1)
                                                        {
                                                            echo '<p><strong>Autores:</strong>  '.$autorn.'</p>';
                                                        }
                                                        else
                                                        {
                                                            echo '<p><strong>Autor:</strong>  '.$autorn.'</p>';
                                                        }
                                                        echo '<p><strong>SSN: </strong>  '.$mostrar1[0].'</p>';
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
                                                    
                                                    
                                                    
                                                        echo'while prese';
                                                        if($mostrar[3]==3 && $mostrar[0]==$mostPre[0])
                                                        {
                                                        
                                                        echo '<li class="ponencias">';  
                                                        echo '<div class="book-list-icon green-icon"></div>';
                                                        echo '<figure>';
                                                        echo '<a href="#section-4"><img src="images/books-media/layout-3/ponencia.png" alt="Book"></a>';
                                                        $sql1="SELECT congress_name, title,publication_date from presentation where cod_doc = ".$mostrar[0].";";
                                                        echo '<figcaption>';
                                                        echo '<header>';                                      
                                                        $result1=pg_query($conexion,$sql1);
                                                        $mostrar1=pg_fetch_row($result1);
                                                        $autorn="";
                                                        $contador=0;
                                                        $sql2="SELECT author.author_name from author, document_author where document_author.cod_doc = ".$mostrar[0]." and document_author.author_id = author.author_id;";
                                                        $result2=pg_query($conexion,$sql2);
                                                        while($mostrar2=pg_fetch_row($result2))
                                                        {
                                                            $contador=$contador+1;
                                                            $autorn= $mostrar2[0]." ";
                                                        }
                                                        echo '<h4><a href="#section-4">  '.$mostrar1[1].'</a></h4>';
                                                        if($contador > 1)
                                                        {
                                                            echo '<p><strong>Autores:</strong>  '.$autorn.'</p>';
                                                        }
                                                        else
                                                        {
                                                            echo '<p><strong>Autor:</strong>  '.$autorn.'</p>';
                                                        }
                                                        echo '<p><strong>Congreso: </strong>  '.$mostrar1[0].'</p>';
                                                        $sql4="SELECT editorial_name from editorial, documents where documents.cod_doc = ".$mostrar[0]." and documents.editorial_code = editorial.editorial_code;";
                                                        $result4=pg_query($conexion,$sql4);
                                                        $mostrar4=pg_fetch_row($result4);
                                                        echo '</header>';
                                                        echo '<p><strong>Editorial:</strong> '.$mostrar4[0].'</p>';
                                                        
                                                        echo '<div class="actions">';
                                                        echo '<ul>';
                                                        echo '<a href="#section-4">Leer más <i class="fa fa-long-arrow-right"></i></a>';
                                                        echo '<li>';
                                                        echo '</li>';
                                                        echo '</ul>';
                                                        echo '</div>';
                                                        echo '</figcaption>';
                                                        echo '</figure>';
                                                        echo '</li>'; 
                                                                                                                                              
                                                        }   
                                                                                            
                                                                                   
                                                }
                                            
                                        }