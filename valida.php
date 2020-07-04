<?php
session_start();
include_once("conexao.php");
include_once("permissao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	//$senha = password_hash($senha, PASSWORD_DEFAULT);
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id_login, nome, usuario, senha FROM login WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($con, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id_login'] = $row_usuario['id_login'];
				$_SESSION['nome'] = $row_usuario['nome'];		
				$_SESSION['permissao'] = $permissaofinal;		
				$_SESSION['usuario'] = $row_usuario['usuario'];
				$_SESSION['senha'] = $row_usuario['senha'];
				header("Location: administrativo.php");

			}else{
				echo $senha;
				echo $row_usuario['senha'];
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: login.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: login.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: login.php");
}
