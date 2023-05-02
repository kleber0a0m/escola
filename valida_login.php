<?php
session_start();
require_once("db/database.php");
if ((empty($_POST['usuario'])) OR (empty($_POST['senha']))){
    header("Location: index.php"); 
}
else{

	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
    $dados = verificarLogin($usuario,$senha);

	if($dados == "") {
		$_SESSION['mensagem'] = "Login não realizado";
	    header("Location:index.php");
	}
	else {
	    $_SESSION['id_usuario'] = $dados['id'];
		$_SESSION['usuario'] = $dados['usuario'];
	    header("Location:home.php");
	}
	die();
}
?>