<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<link href="css/tema.css" rel="stylesheet">

 <!-- Adicionando Javascript -->
        <script
      type="text/javascript"
      src="js/consultas.js">
    </script>
		
	</head>
	<body>
		<div class="container"">
			<div class="form-signin-heading">
				<h2>Cadastrar Usuário</h2>

<!--------------------------------------------------------------------------------------------------------------------------------->
				<h1><?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?></h1>
				<form method="POST" action="cadastrar.php" class="row">
				  <div class="form-row">
				    <div class="form-group col-md-6">
						<label>Nome</label>
						<input type="text" name="nome" placeholder="Digite o nome e sobrenome" class="form-control">
				    </div>
				    <div class="form-group col-md-5">
						<label>Usuário</label>
						<input type="text" name="usuario" placeholder="Digite seu login" class="form-control">	
				    </div>
				  </div>			    
				    <div class="form-group col-md-3">
						<label>Senha</label>
						<input type="password" name="senha" placeholder="Digite sua senha" class="form-control">
				    </div>			    
				    <div class="form-group col-md-3">
						<label>Confirmar Senha</label>
						<input type="password" name="senha2" placeholder="Repita sua senha" class="form-control">
				    </div> 
				    <div class="form-group col-md-1">
						<label>Permissão</label>
						<input type="text" name="permissao" placeholder="Digite o número de sua permissão" class="form-control">
				    </div>
				    <div class="form-group col-md-5">
			   			<!---->				    	
				    </div>
				 	<div class="form-group col-md-4">
<!--------------------------------------------------------------------------------------------------------------------------------->
						<input type="submit" name="btnCadLog" value="Cadastrar" class="btn btn-success"><br><br>
						Lembrou? <a href="login.php">Clique aqui</a> para logar					
					</div>	

				</form>				
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>