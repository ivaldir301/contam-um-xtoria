
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


if(isset($_POST["sub_but"])):
    $erros = array();
    $nome = mysqli_real_escape_string($connect, $_POST['nome']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $login = mysqli_real_escape_string($connect, $_POST['login']);
    $senha = mysqli_real_escape_string($connect, $_POST['senha']);
    $conf_senha = mysqli_real_escape_string($connect, $_POST['conf_senha']);

    if(empty($nome) or empty($senha)):
        echo "Os campos nome e senha tem de ser preenxidos.<br>";
    else:
        if($senha == $conf_senha):
            echo "tudo certo ate aqui.";
            $sql = "INSERT INTO usuarios VALUES ('$nome', '$email', '$login', '$senha');";  // falta aplicar o sql statement correcto aqui para inserir usuario
            $resultado = mysql_query($connect, $sql);

            if(mysql_num_rows($resultado) < 0):
                echo "Cadastrado com sucesso.<br>";
            endif;    
        else:
            echo "Senhas introduzidas não coecidem.";    
        endif;    
    endif;    
endif;

mysqli_close($connect);

?>

    <h1>Pagina de cadastro</h1>
    <br>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        Nome <input type="text" name="nome"><br>
        Email <input type="email" name="email"><br>
        Login <input type="text" name="login"><br>
        Senha <input type="password" name="senha"><br>
        Confirmar senha <input type="password" name="conf_senha"><br><br>
        <input type="submit" name="sub_but" value="Cadastro">  
    </form>
</body>
</html>