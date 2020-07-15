<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<link href="css/tema.css" rel="stylesheet">

 <!-- Adicionando Javascript -->
        <script
      type="text/javascript"
      src="js/consultas.js">
    </script>
		
	</head>
	<body style="padding: 10%; text-align: center;">
		<div class="container">
			<div class="form-signin-heading"align="center" style="max-width: 500px">
				<h2>Área restrita</h2>

<!--------------------------------------------------------------------------------------------------------------------------------->
				<h1><?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?></h1>
				<form method="POST" action="valida.php" class="row">
				 	<div class="form-row">
					    <div class="form-group col-md">
						<label>Usuário</label>
						<input type="text" name="usuario" placeholder="Digite seu login" class="form-control">	
				    	</div> 
						<div class="form-group col-md">
							<label>Senha</label>
							<input type="password" name="senha" placeholder="Digite a sua senha" class="form-control">
						</div>
					 	<div class="form-group col-md">
	<!--------------------------------------------------------------------------------------------------------------------------------->
							<input type="submit" name="btnLogin" value="Acessar" class="btn btn-success">
							<h4>Você ainda não possui uma conta?</h4>
							<a href="index.php">Crie grátis</a>				
						</div>
					</div>
				</form>				
			</div>
	</body>
</html>