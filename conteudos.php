<html>
<head>

<link rel="stylesheet" href="css/estcont.css">

</head>
<body>

 <header>
        <a href="#" class="logo">Home<span>.</span></a>
        <ul class="navigation">
            <li><a href="Sobrenos.html">Sobre Nós</a></li>
            <li><a href="login.php">Login</a></li>            
            <li><a href="contactos.html">Contactos</a></li>          
        </ul>
    </header>

<h1>Upload de conteudos</h1>

<?php 

include_once 'db_connect-forconteudoupload.php';
session_start();

echo $_SESSION['id_usuario'];

if(isset($_SESSION['logado'])):
    
    echo "<div class='formcont'><h1>Upload de imagens</h1><br><form action='script_forcontimg.php' method='POST' enctype='multipart/form-data' >
    <input type='file' name='file'><br><br>
    Nome <input type='nome' name='nome'><br><br>
    Descrição <input type='descrição' name='descrição'><br><br>
    Status <input type='status' name='status'><br><br>
    <button type='submit' name='send'>UPLOAD</button>
    </form></div>";

    //Parte que carega os conteudos na base de dados e apresenta na pagina  
    //Nessa mesma vai carregar os conteudos de imagem

    $id = $_SESSION['id_usuario'];
    $nomeFicheiro = 'cont/cont'.$id.'.jpg';

    $sql = 'SELECT COUNT(*) FROM usuarios';
    $resultado = mysqli_query($connect, $sql);

    
    if(mysqli_num_rows($resultado) == 1):
        $resul = mysqli_fetch_array($resultado);    
    endif;

    $num = $resul[0];
    $sql = 'SELECT * FROM conteudos WHERE id = {$id}';
    $resultado = mysqli_query($connect, $sql);

    if(mysqli_num_rows($resultado) > 0):
        $dados = mysqli_fetch_array($resultado);

        for($i = 0; $i < $num; $i++):
            $nomee = $dados['nome'];      


        endfor;

    endif;    

endif;    

?>

<div class="gallery">
  <a target="_blank" href="img.jpg">
    <img src="img.jpg" alt="Cinque Terre" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<script type="text/javascript">
        window.addEventListener('scroll', function(){
            const header = document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0);
        });
</script>

<br><br>

<!--
<div class="gallery">
  <a target="_blank" href="img.jpg">
    <img src="img.jpg" alt="Cinque Terre" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>


<div class="gallery">
  <a target="_blank" href="img.jpg">
    <img src="img.jpg" alt="Forest" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here kfjsdl dsfj sdljf d kdsj fsdk fksdj fkjsdklfjsdkjflsdkjf skdjfsd fdsj fsd fj </div>
</div>

<div class="gallery">
  <a target="_blank" href="img.jpg">
    <img src="img.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
  <a target="_blank" href="img.jpg">
    <img src="img.jpg" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
    <a target="_blank" href="img.jpg">
        <img src="img.jpg" alt="Mountains" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
    <a target="_blank" href="img.jpg">
        <img src="img.jpg" alt="Mountains" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
    <a target="_blank" href="img.jpg">
        <img src="img.jpg" alt="Mountains" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
</div>

-->

</body>
</html>