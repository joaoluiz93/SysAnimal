<?php
 
 include_once '../classes/Usuario.class.php';

 $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
 $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
 $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
 $confsenha = filter_input(INPUT_POST, 'confsenha', FILTER_SANITIZE_SPECIAL_CHARS);

 if(empty($nome)){
 	echo "<script>alert('O campo nome e obrigatório')</script>";
 }else if(empty($sobrenome)){
 	echo "<script>alert('O campo sobrenome e obrigatório')</script>";
 }else if(empty($email)){
 	echo "<script>alert('O campo email e obrigatório')</script>";
 }else if(Usuario::isExistenteEmail($email)){
    echo "<script>alert('Já existe um usuário com este Email')</script>";
 }else if(empty($senha)){
 	echo "<script>alert('O campo senha e obrigatório')</script>";
 }else if($senha != $confsenha){
    echo "<script>alert('As senhas não coincidem')</script>";
 }else{
 	$usuario = new Usuario($nome, $sobrenome, $email, md5($senha));
 	$usuario->cadastrar();
 	Usuario::logar($email, md5($senha));
    echo "<script>window.location='../paginas/inicio.php'</script>";
 }

 echo "<script>window.location='../index.php'</script>";

