

<?php 

// Conecção
require_once 'db_connect.php';

// Sessão
session_start();

if(!isset($_SESSION['logado'])):
    header('location: login.php');
endif;    


$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado, MYSQLI_BOTH); 
mysqli_close($connect);


?>

<html>
<head>
    <title>Pagina interna</title>
    <meta charset="UTF-8">
</head>
<body>

<h1>Ola 


<?php 


if(isset($dados['login'])):
    echo $dados['login'];
    echo $_SESSION['id_usuario'];
    echo "<img src='uploads/profile".$id.".jpg'>";
else:
    echo "<br>Nenhum dado foi encontrado.";
endif;     

?>

</h1>
<a href="logout.php">Sair...</a>
<a href="profile.php">Meu perfil</a>
<a href="conteudos.php">Conteudos</a>
<a href="cadastro.php">Cadastro</a>


</body>
</html>  