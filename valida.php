<?php
session_start();
include_once("conexao.php");
$permissaofinal;
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["usuario"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
			}
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	//$senha = password_hash($senha, PASSWORD_DEFAULT);
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id_login, nome, usuario, senha, permissao FROM login WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($con, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			switch ((int)$row_usuario['permissao']){
			    case 1:
			        $permissaofinal = "Administração do Sistema";
			        break;
			    case 2:
			        $permissaofinal = "Gerenciamento";
			        break;
			    case 3:
			        $permissaofinal = "Administrativo";
			        break;
			    case 4:
			        $permissaofinal = "Gerenciamento de Produção";
			        break;
			    case 5:
			        $permissaofinal = "Produção";
			        break;
			    case 6:
			        $permissaofinal = "Envio";
			        break;
			    case 7:
			        $permissaofinal = "Vendas";
			        break;			        

			}
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id_login'] = $row_usuario['id_login'];
				$_SESSION['nome'] = utf8_encode($row_usuario['nome']);		
				$_SESSION['permissao'] = $permissaofinal;		
				$_SESSION['usuario'] = $row_usuario['usuario'];
				$_SESSION['senha'] = $row_usuario['senha'];
				header("Location: administrativo.php");

			}else{
				echo $senha;
				echo $row_usuario['senha'];
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: index.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: index.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: index.php");
}
