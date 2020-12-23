<?php 

// Conexão com banco de dados

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "sistema_login";

$connect = mysqli_connect($server_name, $user_name, $password, $db_name)  or die ($connect);

if(mysqli_connect_error()):
    echo "Ocorreu um erro na conecção com a base de dados!"."<br>".mysqli_connect_error()."<br>";
else:
    echo "Conecção feita com sucesso!<br>";
endif;    


