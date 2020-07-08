<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	</head>
	<body>
		<div class="container">
			<div class="form-signin" align="center" >
				<h2>Consulta de vendas</h2>
				<br>
				<h3><?php
					session_start();
					if(!empty($_SESSION['nome'])){
						echo "Olá <b>".$_SESSION['nome']." </b>do setor de <b>".$_SESSION['permissao']."</b>, Seja bem vindo <br>";
					}else{
						$_SESSION['msg'] = "Área restrita";
						header("Location: login.php");	
					}
				?></h3>

				<div>
					  <?php
					  echo "<br>";
					  echo "<br>";
						require_once 'buscar.php';
						echo "<br>";
						echo "<a href='sair.php'>Sair</a>";
  						?>

				</div>	
			</div>
		</div>

	</body>
</html>