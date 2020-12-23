<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['send'])):
    $file = $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpname = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];   
    
    $nome = mysqli_real_escape_string($connect, $_POST['nome']);
    $descricao = mysqli_real_escape_string($connect, $_POST['descrição']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    $tipo = "imagem";   
    
    $fileExtension = explode('.', $fileName);
    $fileActualExtension = strtolower(end($fileExtension));    

    $allowed = array('jpg', 'jpeg', 'png');

    $randomnum = uniqid('', true);
    $id = $_SESSION['id_usuario'];

    if(in_array($fileActualExtension, $allowed)):
        if($fileError === 0):
            if($fileSize < 5000000):
                $fileNewName = "conteudo".$id.$randomnum.".".$fileActualExtension;
                $fileDestination = 'cont/'.$fileNewName;

                //$nomeFicheiro = 'cont/cont'.$tipo.'.jpg';
                //$nomeFicheiro = 'uploads/profile'.$id.'.jpg';
                // unlink($nomeFicheiro);
                
                //move_uploaded_file($fileTmpname, $fileDestination);
                //$sql = "INSERT INTO conteudos(nome, id, status, descrição, tipo) VALUES('$fileNewName', '$id', '$status', '$descricao', '$tipo');";
                //$resultado = mysqli_query($connect, $sql);
                $status = "ativo";
                if(empty($nome) || empty($descricao)):
                    header("Location: conteudos.php?upload=vazio");
                else:
                    //$stmt = mysqli_stmt_init($connect);
                    $sql = "INSERT INTO conteudos (nome, id, status, descrição, tipo, caminho) VALUES ('{$nome}', '{$id}', '{$status}', '{$descricao}', '{$tipo}', '{$fileDestination}')";
                    $resultado = mysqli_query($connect, $sql);
                    
                                            
                    if($resultado == 1):
                        if($resultado || mysqli_num_rows($resultado) === TRUE):
                            move_uploaded_file($fileTmpname, $fileDestination);
                            echo "O upload do ficheiro foi um sucesso!<br>"; 
                        endif;
                    else:
                        echo "ocorreu um erro.Verifique seu sql statement!<br>";    
                    endif;

                    /*if(!mysqli_stmt_prepare($stmt, $sql)):
                        echo "erro no comando sql<br>";
                    else:

                    endif;*/
                endif;    
                
                

                /*
                if($resultado == 1):
                    if($resultado || mysqli_num_rows($resultado) === TRUE):
                        echo "O upload do ficheiro foi um sucesso!<br>"; 
                    endif;
                else:
                    echo "ocorreu um erro<br>";    
                endif;*/

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
