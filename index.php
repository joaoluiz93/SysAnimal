<?php
  if(!isset($_SESSION)){
    session_start();
  }

  if(isset($_SESSION['id_usuario_logado'])){
    header('Location: paginas/inicio.php');    
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>SisAnimais - Entre ou cadastre-se</title>
    <meta charset="utf-8">
    <link rel="icon" href="imagens/icone.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
    <section class="lado-um">
    	<div class="container-formulario-login">
    	 <h3>Login</h3>
    		<form method="post" action="controles/controleLoginUsuario.php">
    			<div class="row form-group">
    				<div class="col-md-12">
    				<label>Digite o Email</label>
    				   <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="email" type="text" class="form-control" placeholder="Informe o Email">
                       </div>
    				</div>
    			</div>
    			<div class="row form-group">
    				<div class="col-md-12">
    				<label>Digite a senha</label>
    				    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input name="senha" type="password" class="form-control" placeholder="Informe a senha">
                       </div>
    				</div>
    			</div>
    			<div class="row form-group">
    				<div class="col-md-12">
    				    <button class="btn btn-primary center-block">Entrar</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </section>
    <section class="lado-dois">
    	<div class="container-formulario-cadastro">
    	    <h3>Cadastre-se no SisAnimais</h3>
    			<form method="post" action="controles/controleCadastroUsuario.php">
    				<div class="row">
    					<div class="col-md-12 form-group">
    						<label>Nome</label>
    				        <input class="form-control" type="text" name="nome" placeholder="Informe o nome">
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-md-6 form-group">
    						<label>Sobrenome</label>
    				        <input class="form-control" type="text" name="sobrenome" placeholder="Informe o Sobrenome">
    					</div>
    					<div class="col-md-6 form-group">
    						<label>Email</label>
    				        <input class="form-control" type="text" name="email" placeholder="Informe o Email">
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-md-6 form-group">
    						<label>Senha</label>
    				        <input class="form-control" type="password" name="senha" placeholder="Informe uma senha">
    					</div>
    					<div class="col-md-6 form-group">
    						<label>Confirme sua senha</label>
    				        <input class="form-control" type="password" name="confsenha" placeholder="Confirme a senha">
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-md-12">
    						<button class="btn btn-primary center-block">Concluir</button>
    					</div>
    				</div>
    			</form>
    	</div>
    </section>
</body>
</html>
 
