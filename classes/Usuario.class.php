<?php
 
 include_once '../conexao/conexao.php';
 
 if(!isset($_SESSION)){
      session_start();
 }

 class Usuario{
 	private $nome;
 	private $sobrenome;
 	private $email;
 	private $senha;

 	function __construct($nome, $sobrenome, $email, $senha){
       $this->nome = $nome;
       $this->sobrenome = $sobrenome;
       $this->email = $email;
       $this->senha = $senha;
 	}

 	public function cadastrar(){
      $sql = "insert into usuario(nome,sobrenome,email,senha)values(':nome',':sobrenome',':email',':senha')";
      $array = array(':nome',':sobrenome',':email',':senha');
      $array2 = array($this->nome, $this->sobrenome, $this->email, $this->senha);
      $sql = str_replace($array, $array2, $sql);

      $conexao = new Conexao();
      $conexao->query($sql);
 	}

      public static function logar($email, $senha){
            $sql = "select * from usuario where email=':email' and senha=':senha' limit 1";
            $array1 = array(':email',':senha');
            $array2 = array($email, $senha);
            $sql = str_replace($array1, $array2, $sql);

            $resultados = new Conexao();
            $resultados = $resultados->query($sql);

            if(mysqli_num_rows($resultados)==1){
              $usuario = $resultados->fetch_array();
              $_SESSION['id_usuario_logado'] = $usuario['id_usuario'];
            }else{
                  echo "<script>alert('Usuário ou senha incorretos')</script>";
            }
      }

      public static function getUsuarioPorID($id){
            $sql = "select * from usuario where id_usuario=':id'";

            $sql = str_replace(':id', $id, $sql);

            $conexao = new Conexao();
            $usuario = $conexao->query($sql)->fetch_array();

            return $usuario;
      }

      public static function isExistenteEmail($email){
            $sql = "select * from usuario where email=':email'";

            $sql = str_replace(':email', $email, $sql);

            $conexao = new Conexao();
            $usuario = $conexao->query($sql);

            return mysqli_num_rows($usuario)==1;
      }

      public static function verificarPermissao(){
        if(!isset($_SESSION['id_usuario_logado'])){
            header('Location: ../index.php');
            exit();
        }
      }

      public static function fazerLogoff(){
        if(isset($_SESSION)){
            session_destroy();
            header('Location: ../index.php');
        }
      }
 }
