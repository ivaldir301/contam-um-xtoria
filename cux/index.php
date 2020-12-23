<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php

//header('location: login.php');
if ('POST' === $_SERVER['REQUEST_METHOD']):
    if (!isset($_POST['required_data'])):
        http_send_status(400);
        header('location: login.php');
    else:
        echo "<script>alert('porra')</script>";
        exit;
    endif;
    header('location: login.php');
    echo 'OK';
endif;

if(isset($_POST['mandar'])):
    //echo "ola mundo";
    header('location: login.php');
    
endif;

?>


        <!-- LOGIN -->
        <div class="login">
            <div class="wrap">
                <!-- BOTÃO -->
                <div id="toggle-wrap">
                    <div id="toggle-terms">
                        <div id="cross">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <!-- TERMOS -->
                <div class="terms">
                    <h2>Política Privacidade</h2>
                    <p>A sua privacidade é importante para nós. É política do Contam um stória respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site Contam um stória, e outros sites que possuímos e operamos</p>
                    <p>Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado</p>
                    <p>Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados</p>
                    <p>Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei</p>
                    <p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade</p>
                    <p>Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados</p>
                    <p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, entre em contacto connosco</p>
                    <h3>Compromisso do Usuário</h3>
                    <p>O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o Contam um stória oferece no site e com caráter enunciativo, mas não limitativo:</p>
                    <p>A) Não se envolver em atividades que sejam ilegais ou contrárias à boa fé a à ordem pública;</p>
                    <p>B) Não divulgar conteúdo ou propaganda de natureza racista, xenofóbica, casas de apostas, pornografia ilegal, de apologia ao terrorismo ou contra os direitos humanos;</p>
                    <p>C) Não causar danos aos sistemas físicos (hardwares) e lógicos (softwares) do Contam um stória, de seus fornecedores ou terceiros, para introduzir ou disseminar vírus informáticos ou quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos anteriormente mencionados</p>
                    <h2>Mais informações</h2>
                    <p>Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não tem certeza se precisa ou não, geralmente é mais seguro deixar os cookies ativados, caso interaja com um dos recursos que você usa em nosso site</p>         
                </div>

                <!-- REPOSIÇÃO PASSWORD -->
                <div class="recovery">
                    <h2>Repôr password</h2>
                    <p>Introduza <strong>endereço de email</strong> ou o <strong>nome de utilizador</strong> e <strong>faça um click</strong></p>
                    <p>Enviaremos instruções em como repôr o password.</p>
                    <form class="recovery-form" action="" method="post">
                        <input type="text" class="input" id="user_recover" placeholder="Escreva seu email ou palavra passe">
                        <input type="submit" name="enviar" class="button" value="Submit">
                    </form>
                    <p class="mssg">Foi-lhe enviado um email com as instruções.</p>
                </div>

                <!-- SLIDER -->
                <div class="content">
                    <!-- LOGO -->
                    <div class="logo">
                        <a href="#"><img src="img/logo1.png" alt=""></a>
                    </div>
                    <!-- SLIDESHOW -->
                    <div id="slideshow">
                        <div class="um">
                            <h2><span>BEM VINDO</span></h2>
                            <p>Inscreva-se para ter acesso completo.</p>
                        </div>
                        <div class="dois">
                            <h2><span>STÓRIAS</span></h2>
                            <p>Stória partilhados por membros.</p>
                        </div>
                        <div class="tres">
                            <h2><span>GRUPOS</span></h2>
                            <p>Cria ou faça parte de um clube.</p>
                        </div>
                        <div class="quatro">
                            <h2><span>PARTILHA</span></h2>
                            <p>Partilha o que lhe foi partilhado pelas gerações passadas</p>
                        </div>
                    </div>
                </div>
                <!-- JANELA LOGIN -->
                <div class="user">
                    <!-- ACTIONS
                    <div class="actions">
                        <a class="help" href="#signup-tab-content">Sign Up</a><a class="faq" href="#login-tab-content">Login</a>
                    </div>
                    -->
                    <div class="form-wrap">
                        <!-- ABAS -->
                    	<div class="tabs">
                            <h3 class="login-tab"><a class="log-in active" href="#login-tab-content"><span>Entrar<span></a></h3>
                    	</div>
                        <!-- CONTEUDO ABA -->
                    	<div class="tabs-content">
                            <!-- CONTEUDO ABA LOGIN -->
                    		<div id="login-tab-content" class="active">
                    			<form class="login-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    				<input type="text" class="input" name="login" id="user_login" autocomplete="off" placeholder="Email ou nome de utilizador">
                    				<input type="password" name="senha" class="input" id="user_pass" autocomplete="off" placeholder="Palavra passe">
                    				<input type="submit" name="mandar" class="button" value="Entrar">
                                        
                    			</form>
                    			<div class="help-action">
                    				<p><i class="fa fa-arrow-left" aria-hidden="true"></i><a class="forgot" href="#">Esqueçeu a palavra passe?</a></p>
                    			</div>
                    		</div>
                           

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="script/script.js"></script>
</body>
</html>
