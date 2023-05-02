<?php
require_once("conecta_db.php");
function verificarLogin($usuario, $senha){
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = $conexao->prepare("select * from usuarios where usuario = ? and senha = ?");
    $query->bindParam(1,$usuario);
    $query->bindParam(2,$senhaMd5);
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}

function listarAlunos(){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM alunos");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}

function listarDisciplinas(){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM disciplinas");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}

function listarTurmas(){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM turmas");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}

?>