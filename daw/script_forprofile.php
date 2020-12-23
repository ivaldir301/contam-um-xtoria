<?php

session_start();

require_once 'db_connect-forfileupload.php';

if(isset($_POST['send'])):
    $file = $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpname = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];   
    
   
    
    $fileExtension = explode('.', $fileName);
    $fileActualExtension = strtolower(end($fileExtension));    

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    $id = $_SESSION['id_usuario'];

    if(in_array($fileActualExtension, $allowed)):
        if($fileError === 0):
            if($fileSize < 500000):
                $fileNewName = "profile".$id.".".$fileActualExtension;
                $fileDestination = 'uploads/'.$fileNewName;

                //$nomeFicheiro = 'cont/cont'.$tipo.'.jpg';
                $nomeFicheiro = 'uploads/profile'.$id.'.jpg';
                
                unlink($nomeFicheiro);
                
                move_uploaded_file($fileTmpname, $fileDestination);
                $sql = "INSERT INTO conteudos VALUES() WHERE userid='$id';";
                $resultado = mysqli_query($connect, $sql);
                echo "O upload do ficheiro foi um sucesso!<br>"; 
            
            else:
                echo "O tamanho do seu ficheiro é grande demais.";    
            endif;    
        else:
            echo "Houve um erro no upload do ficheiro!";    
        endif;    
    else:
        echo "Não podes enviar ficheiros desse tipo!";
    endif;    

endif;    
