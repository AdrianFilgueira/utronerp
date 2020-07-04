<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar</title>		
	</head>
	<body>
		<h1>Cadastrar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="cadlogin.php">
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite seu nome"><br><br>
			
			<label>Login: </label>
			<input type="text" name="usuario" placeholder="Digite seu usuário"><br><br>
						
			<label>Senha: </label>
			<input type="password" name="senha" placeholder="Digite sua senha"><br><br>

			<label>Permissão: </label>
			<input type="text" name="permissao" placeholder="Digite o número de sua permissão"><br><br>
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>