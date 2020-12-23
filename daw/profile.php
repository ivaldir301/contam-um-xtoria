<?php



    include 'db_connect.php';
    session_start();
    echo $_SESSION['id_usuario'];
    
    echo "<head><style>img{width: 50px; height: 50px;}</style></head>";
    echo "<h1>Upload de foto de ficheiro</h1><br><form action='script_forprofile.php' method='POST' enctype='multipart/form-data' >
    <input type='file' name='file'><br><br>
    <button type='submit' name='send'>UPLOAD</button>
    </form>";


    $id = $_SESSION['id_usuario'];
        
    $nomeFicheiro = 'uploads/profile'.$id.'.jpg';
        
    if(file_exists($nomeFicheiro)):
    echo "<br><br>Ficheiro existe<br>";
    echo "<img style='width: 500px; height: 500px;'= src='$nomeFicheiro'><br><br>";
    else:
    echo "Ficheiro não existe";
    endif;    
            /*$dados = mysqli_fetch_array($resultado, MYSQLI_BOTH); 
            if ($dados['id'] ==  $_SESSION['id_usuario']):
                echo "dd";
            endif;   */ 
    
            
    //Codigo podera ser usado para saber o numero de rows em qualquer tabela da bd    
    //Esse em especifico devera ser dos conteudos (mudanca a ser feita)

    $sql = 'SELECT COUNT(*) FROM usuarios';
    $resultado = mysqli_query($connect, $sql);
    echo "<a href='index.php'>Página principal</a>";

    if(mysqli_num_rows($resultado) == 1):
        $resul = mysqli_fetch_array($resultado);
        echo "<br>Numero de users presentes no sistema<br>";
        echo $resul[0];
    endif;
 
