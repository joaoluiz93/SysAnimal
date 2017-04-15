<?php
 
include_once '../conexao/conexao.php';

class Animal{

 private $especie;
 private $raca;
 private $cor;
 private $peso;
 private $nome_dono; 

 function __construct($especie, $raca, $cor, $peso, $nome_dono){
   $this->especie = $especie;
   $this->raca = $raca;
   $this->cor = $cor;
   $this->peso = $peso;
   $this->nome_dono = $nome_dono;
 }

 public function cadastrar(){
   $sql = "insert into animal(especie, raca, cor, peso, nome_dono) values (':especie', ':raca', ':cor', ':peso', ':nome_dono')";
   $array1 = array(':especie', ':raca', ':cor', ':peso', ':nome_dono');
   $array2 = array($this->especie, $this->raca, $this->cor, $this->peso, $this->nome_dono);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
   echo "<script>alert('Animal cadastrado com sucesso!!')</script>";
}

public function alterar($id){
  $sql = "update animal set especie=':especie', raca=':raca', cor=':cor', peso=':peso', nome_dono=':nome_dono' where id_animal=:id_animal";
   $array1 = array(':especie', ':raca', ':cor', ':peso', ':nome_dono', ':id_animal');
   $array2 = array($this->especie, $this->raca, $this->cor, $this->peso, $this->nome_dono, $id);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
   echo "<script>alert('Animal alterado com sucesso!!')</script>";
}

public static function buscar($tipo_busca, $termo){
    $sql = "select * from animal where :tipo_busca like '%:termo_busca%'";
    $array1 = array(':tipo_busca', ':termo_busca');
    $array2 = array($tipo_busca, $termo);
    $sql = str_replace($array1, $array2, $sql);
    
    $resultados = new Conexao();
    $resultados = $resultados->query($sql);
    return mysqli_fetch_all($resultados, MYSQLI_ASSOC);
 }

 public static function excluir($id){
    $sql = "delete from animal where id_animal=':id_animal'";
    $sql = str_replace(':id_animal', $id, $sql);
    
    $resultados = new Conexao();
    $resultados = $resultados->query($sql);
 }

 public static function getAnimalPorId($id){
    $sql = "select * from animal where id_animal=':id_animal'";
    $sql = str_replace(':id_animal', $id, $sql);

    $resultados = new Conexao();
    $resultados = $resultados->query($sql);
    return $resultados->fetch_array();
 }

 public static function getQtdAnimaisCadastrados(){
   $sql = 'select * from animal';
   $conexao = new Conexao();
   $resultados = $conexao->query($sql);

   return mysqli_num_rows($resultados);
 }
}
