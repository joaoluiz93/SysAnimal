<?php 

 include_once '../classes/Usuario.class.php';
 include_once '../classes/Animal.class.php';

  if(!isset($_SESSION)){
      session_start();
 }

 Usuario::verificarPermissao();

 $usuario = Usuario::getUsuarioPorID($_SESSION['id_usuario_logado']);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SisAnimais - Inicio</title>
    <meta charset="utf-8">
    <link rel="icon" href="../imagens/icone.png">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/inicio.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
    <script type="text/javascript">
     window.addEventListener('load', function(){
        var botoes_logoff = document.querySelectorAll('.botao-logoff');

     for(var i = 0; i < botoes_logoff.length; i++){
        botoes_logoff[i].addEventListener('click', function(evento){
          if(!confirm("Tem certeza que deseja sair?")){
            evento.preventDefault();
          }
        });
     }
     });
    </script>
</head>
<body>
    <section class="menu-lateral">
    <div class="mascara">
    	<h1>SisAnimais</h1>
    	<ul>
    		<li><a href="?page=menu"><span class="fa fa-home"></span> Inicio</a></li>
    		<li><a href="?page=formulario-animal"><span class="fa fa-plus"></span> Cadastrar animal</a></li>
    		<li><a href="?page=buscar-animais"><span class="fa fa-search"></span> Buscar animais (<?php echo Animal::getQtdAnimaisCadastrados() ?>)</a></li>
    		<li><a href="../controles/controleLogoff.php" class="botao-logoff"><span class="fa fa-sign-out"></span> Sair</a></li>
    		<li><a href="?page=sobre"><span class="fa fa-question-circle"></span> Sobre o SisAnimais</a></li>
    	</ul>
    </div>
    </section>
    <section class="conteudo">
    <div class="cabecalho-site">
    	<h3><span class="fa fa-user"></span> Olá senhor(a): <?php echo $usuario['nome'].' '.$usuario['sobrenome'] ?></h3>
    </div>
     <?php 
         switch (isset($_GET['page']) ? $_GET['page'] : 'inicio') {
         	case 'buscar-animais':
         		include_once 'buscar-animais.php';
         		break;
         	case 'formulario-animal':
         		include_once 'formulario-animal.php';
         		break;
         	case 'menu':
                include_once 'menu-inicial.php';
                break;
            case 'sobre':
                include_once 'equipe.php';
                break;
         	default:
         		include_once 'menu-inicial.php';
         		break;
         }
      ?>
    </section>
</body>
</html>