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
$doc_pages = $_POST["doc_pages"];
$doc_congress = $_POST["doc_congress"];
$doc_publication_date = pg_escape_string($_POST["doc_publication_date"]);
$editorial_id = $_POST["editorial_id"];
$auth_num = $_POST["author_num"];
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
        $sql1 = "INSERT into documents (cod_doc, status_code, editorial_code, t_doc_code, status_review,pages) VALUES (DEFAULT, 1, ".$editorial_id.", 3, 0, ".$doc_pages.")  RETURNING cod_doc";
        $result = pg_query($conexion,$sql1);
        $insert_row = pg_fetch_row($result);
        $insert_id = $insert_row[0];
        // insert presentation
        // name of the uploaded file
        $filename = $_FILES['doc_file']['name'];
        // destination of the file on the server
        $destination = '../../Documents/presentations/presentation'.$insert_id.'.pdf';
        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file = $_FILES['doc_file']['tmp_name'];
        $size = $_FILES['doc_file']['size'];

        
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
                
            $sql2 = "INSERT into presentation (pres_id, title, congress_name, publication_date, dir,cod_doc) VALUES (DEFAULT, '".$doc_title."', '".$doc_congress."', '{$doc_publication_date}', 'presentation".$insert_id."', '".$insert_id."')";

            pg_query($conexion,$sql2);

        } else {
            $sql2 = "INSERT into presentation (pres_id, title, congress_name, publication_date, dir,cod_doc) VALUES (DEFAULT, '".$doc_title."', '".$doc_congress."', '{$doc_publication_date}', 'dir', '".$insert_id."')";
            pg_query($conexion,$sql2);
            echo "Failed to upload file.";
        }
        
        foreach ($pila as $author_id) {
            echo $author_id;
            //insert document_author
            $sql3 = "insert into document_author values (".$author_id." , ".$insert_id.");";
            pg_query($conexion,$sql3);
        }
        $fecha = new DateTime("now", new DateTimeZone('America/Bogota'));
        $fecha->setTimezone(new DateTimeZone('America/Bogota'));
        $fechaF = $fecha->format('Y-m-d H:i:s');
        //insert audit_doc
        $sql4 = "insert into audit_doc (audit_doc_code, cod_doc, user_code, actions, audit_date) VALUES (DEFAULT, '".$insert_id."', '".$codU."', 'I', '".$fechaF."');"; 
        pg_query($conexion,$sql4);
        alert("El registro fue exitoso");
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