<html>
<body>


<?php 

// Conecção
require_once 'db_connect.php';

// Sessão
session_start();

if(isset($_POST['enviar'])):
    $erros = array();
    $login = mysqli_real_escape_string($connect, $_POST['login']);
    $senha = mysqli_real_escape_string($connect, $_POST['senha']);

    if(empty($login) or empty($senha)):
        $erros[] = "<li>O campo login e o campo senha não podem ficar vazios.</li>";
    else:
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);
            
            if(mysqli_num_rows($resultado) ==  1):
               //echo "Login efectuado.<br>";  
               $dados = mysqli_fetch_array($resultado);
               $_SESSION['logado'] = true;
               $_SESSION['id_usuario'] = $dados['id'];
                             
               if($dados['privilegios'] == 'admin'):
                   header('location: index.php');
               elseif($dados['privilegios'] == 'cgi'):
                    echo "its a cgi user...";    
               elseif($dados['privilegios'] == 'user'):
                    echo "just a user...";     
               endif; 
                 
            else:
                $erros[] =  "<li>O campo de campo de senha esta incorrecto.</li>";
            endif;           
        else:
            echo "O usuario é inexistente.<br>";
        endif;

    endif;
        
endif;    

mysqli_close($connect);

?>

<h1>Login</h1>

<?php
if(!empty($erros)):
    foreach($erros as $erro):
        echo $erro."<br>"; 
    endforeach;    
endif;
?>

<hr>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    Login:  <br><input type="text" name="login"><br>
    Password:  <br><input type="password" name="senha"><br><br>
    <input type="submit" name="enviar"> 
</form>    

</body>

</html>  