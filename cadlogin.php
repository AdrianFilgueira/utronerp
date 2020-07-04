<?php
session_start();
include_once("conexao.php");

$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO login (usuario, senha, datacad) VALUES ('$usuario', '$senha', NOW())";
$resultado_usuario = mysqli_query($con, $result_usuario);

if(mysqli_insert_id($con)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: index.php");
}
