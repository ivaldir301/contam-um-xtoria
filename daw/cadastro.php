
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>

<?php 

// Conecção
require_once 'db_connect.php';

// Sessão
session_start();

if(isset($_SESSION['logado'])):
    if(isset($_POST["sub_but"])):
        $erros = array();
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $login = mysqli_real_escape_string($connect, $_POST['login']);
        $senha = mysqli_real_escape_string($connect, $_POST['senha']);
        $conf_senha = mysqli_real_escape_string($connect, $_POST['conf_senha']);
        $privi_user = mysqli_real_escape_string($connect, $_POST['privilegios']);;

        if(empty($nome) or empty($senha)):
            echo "Os campos nome e senha tem de ser preenxidos.<br>";
        else:
            if($senha == $conf_senha):
                echo "tudo certo ate aqui.";
                $sql = "INSERT INTO usuarios (nome, email, login, privilegios, senha) VALUES ('{$nome}', '{$email}', '{$login}', '{$privi_user}', '{$senha}');";  // para inserir informações sobre o novo usuario a ser cadastrado 
                $resultado = mysqli_query($connect, $sql);
                $status = 1;
                if($resultado || mysqli_num_rows($resultado) > 0):              
                $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
                $resultado = mysqli_query($connect, $sql);    

                if(mysqli_num_rows($resultado) ==  1):
                    //echo "Login efectuado.<br>";  
                    $dados = mysqli_fetch_array($resultado);
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    $id = $_SESSION['id_usuario'];
                    
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
    endif;

    mysqli_close($connect);
else:
    header('location: login.php');    
endif;

?>

    <h1>Pagina de cadastro</h1>
    <br>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        Nome <input type="text" name="nome"><br>
        Email <input type="email" name="email"><br>
        Login <input type="text" name="login"><br>
        privilegios <input type="text" name="privilegios"><br>
        Senha <input type="password" name="senha"><br>
        Confirmar senha <input type="password" name="conf_senha"><br><br>
        <input type="submit" name="sub_but" value="Cadastro">  
    </form>
</body>
</html>