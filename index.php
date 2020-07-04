<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Cadastrar</title>		
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
			<label>Login: </label>
			<input type="text" name="usuario" placeholder="Digite seu login"><br><br>
			
			<label>Senha: </label>
			<input type="password" name="senha" placeholder="Digite sua senha"><br><br>
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>