<?php 
session_start();


if($_SESSION['nameU']==null)
{
    header("Location: ../Util/logout.php");
}

$codU = $_SESSION['codeU'];


require_once '../../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$doc_title = $_POST["doc_title"];
$doc_isbn = $_POST["doc_isbn"];
$doc_pages = $_POST["doc_pages"];
$doc_publication_date = pg_escape_string($_POST["doc_publication_date"]);
$editorial_id = $_POST["editorial_id"];
$auth_num = $_POST["author_num"];

$cod_doc = $_POST["cod_doc"];


$i = 1;
$pila = array();
if($auth_num > 0){
    while($i <=$auth_num){
        $author_code = $_POST["selected_author".$i.""];
        if(strlen($author_code) > 0){
            array_push($pila, $author_code);
            
        }
        
        $i++;

    }
    if(arrayContainsDuplicate($pila)){
        alert("Los autores no pueden ser los mismos");
    }else{
        
        //insert doc
        $sql1 = "UPDATE documents SET editorial_code = ".$editorial_id.", pages = ".$doc_pages." WHERE cod_doc = ".$cod_doc."";
        $result = pg_query($conexion,$sql1);
        $insert_id = $cod_doc;
        // insert book
        // name of the uploaded file
        
        if($_FILES['doc_file']['name'] != null){
            $filename = $_FILES['doc_file']['name'];
            // destination of the file on the server
            $destination = '../../Documents/articles/article'.$insert_id.'.pdf';
            // get the file extension
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $file = $_FILES['doc_file']['tmp_name'];
            $size = $_FILES['doc_file']['size'];
    
            
            // move the uploaded (temporary) file to the specified destination
            move_uploaded_file($file, $destination);
            $sql2 = "UPDATE article SET title = '".$doc_title."', publication_date = '".$doc_publication_date."', dir = 'article".$insert_id."' WHERE cod_doc = ".$cod_doc."";
            pg_query($conexion,$sql2);
        }else{
            $sql2 = "UPDATE article SET title = '".$doc_title."', publication_date = '".$doc_publication_date."' WHERE cod_doc = ".$cod_doc."";
            pg_query($conexion,$sql2);
        }
        //DELETE PREVIOUS AUTHORS
        $sql3 = "delete from document_author where cod_doc = ".$insert_id.";";
        $r3 = pg_query($conexion,$sql3);

        foreach ($pila as $author_id) {
            //insert document_author
            $sql3 = "insert into document_author values (".$author_id." , ".$insert_id.");";
            pg_query($conexion,$sql3);
        }
        $fecha = new DateTime("now", new DateTimeZone('America/Bogota'));
        $fecha->setTimezone(new DateTimeZone('America/Bogota'));
        $fechaF = $fecha->format('Y-m-d H:i:s');
        //insert audit_doc
        $sql4 = "insert into audit_doc (audit_doc_code, cod_doc, user_code, actions, audit_date) VALUES (DEFAULT, '".$insert_id."', '".$codU."', 'U', '".$fechaF."');"; 
        pg_query($conexion,$sql4);
        alert("La actualizacion fue exitosa");
    }

}else{
    alert("Debe agregar por lo menos un autor");

}





function arrayContainsDuplicate($array)  
{  
      return count($array) != count(array_unique($array));    
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');
    history.go(-2);
    </script>";
}







    




    


?>