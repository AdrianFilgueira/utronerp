<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$permissao = filter_input(INPUT_POST, 'permissao', FILTER_SANITIZE_STRING);
$permissao = (int)$permissao;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$result_usuario = "INSERT INTO login (nome, usuario, senha, permissao, datacad) VALUES ('$nome', '$usuario', '$senha', $permissao , NOW())";
$resultado_usuario = mysqli_query($con, $result_usuario);

if(mysqli_insert_id($con)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: login.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: index.php");
}