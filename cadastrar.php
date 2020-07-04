<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao.php';
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	
	$erro = false;
	
	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	
	if(in_array('',$dados)){
		$erro = true;
		$_SESSION['msg'] = "Necessário preencher todos os campos";
	}elseif((strlen($dados['senha'])) < 6){
		$erro = true;
		$_SESSION['msg'] = "A senha deve ter no minímo 6 caracteres";
	}elseif(stristr($dados['senha'], "'")) {
		$erro = true;
		$_SESSION['msg'] = "Caracter ( ' ) utilizado na senha é inválido";
	}else{
		$result_usuario = "SELECT id FROM usuarios WHERE usuario='". $dados['usuario'] ."'";
		$resultado_usuario = mysqli_query($con, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "Este usuário já está sendo utilizado";
		}
		
		$result_usuario = "SELECT id FROM usuarios WHERE email='". $dados['email'] ."'";
		$resultado_usuario = mysqli_query($con, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "Este e-mail já está cadastrado";
		}
	}
	
	
	//var_dump($dados);
	if(!$erro){
		//var_dump($dados);
		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		
		$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
						'" .$dados['nome']. "',
						'" .$dados['email']. "',
						'" .$dados['usuario']. "',
						'" .$dados['senha']. "'
						)";
		$resultado_usario = mysqli_query($con, $result_usuario);
		if(mysqli_insert_id($con)){
			$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
			header("Location: login.php");
		}else{
			$_SESSION['msg'] = "Erro ao cadastrar o usuário";
		}
	}
	
}
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastrar</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<link href="css/tema.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="form-signin">
				<h2>Cadastrar Usuário</h2>
				<h1><?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?></h1>
				<form method="POST" action="">
			<!--
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputEmail4">Email</label>
				      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputPassword4">Senha</label>
				      <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputAddress">Endereço</label>
				    <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
				  </div>
				  <div class="form-group">
				    <label for="inputAddress2">Endereço 2</label>
				    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputCity">Cidade</label>
				      <input type="text" class="form-control" id="inputCity">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputEstado">Estado</label>
				      <select id="inputEstado" class="form-control">
				        <option selected>Escolher...</option>
				        <option>...</option>
				      </select>
				    </div>
				    <div class="form-group col-md-2">
				      <label for="inputCEP">CEP</label>
				      <input type="text" class="form-control" id="inputCEP">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="form-check">
				      <input class="form-check-input" type="checkbox" id="gridCheck">
				      <label class="form-check-label" for="gridCheck">
				        Clique em mim
				      </label>
				    </div>
				  </div>
				  <button type="submit" class="btn btn-primary">Entrar</button>
				</form>

-->
					<div>
						<label>Nome</label>
						<input type="text" name="nome" placeholder="Digite o nome e sobrenome" class="form-control">
					</div>
					
					<div>
						<label>Fantasia</label>
						<input type="text" name="fantasia" placeholder="Digite o nome fantasia" class="form-control">
					</div>
					
					<div>
						<label>CEP</label>
						<input type="text" name="cep" placeholder="Digite o CEP" class="form-control">
					</div>
					
					<div>
						<label>Estado</label>
						<input type="text" name="estado" placeholder="Digite o estado" class="form-control">
					</div>
					
					<div>
						<label>Cidade</label>
						<input type="text" name="cidade" placeholder="Digite a cidade" class="form-control">
					</div>

					<div>
						<label>Bairro</label>
						<input type="text" name="bairro" placeholder="Digite o bairro" class="form-control">
					</div>
					
					<div>
						<label>Rua</label>
						<input type="text" name="rua" placeholder="Digite a rua" class="form-control">
					</div>
					
					<div>
						<label>Número</label>
						<input type="text" name="numero" placeholder="Digite o número" class="form-control">
					</div>
					
					<div>
						<label>Telefone</label>
						<input type="text" name="telefone" placeholder="Digite o telefone" class="form-control">
					</div>
					
					<div>
						<label>Celular</label>
						<input type="text" name="celular" placeholder="Digite o celular" class="form-control">
					</div>
					
					<div>
						<label>E-Mail</label>
						<input type="email" name="email" placeholder="Digite o E-Mail" class="form-control">
					</div>
					
					<div class="form-group">
					    <label>Selecione o tipo de pessoa</label>
					    <select type="text" name="tipopessoa" class="form-control">
					      <option>Pessoa Física</option>
					      <option>Pessoa Jurídica</option>
					    </select>
					  </div>

					<div>
						<label>CPF ou CNPJ</label>
						<input type="text" name="cpfcnpj" placeholder="Digite o CPF ou CNPJ" class="form-control">
					</div>
					
					<div>
						<label>IE ou RG</label>
						<input type="text" name="ierg" placeholder="Digite o RG ou IE" class="form-control">
					</div>

					<div class="form-group">
					    <label>Situação</label>
					    <select type="text" name="sitacao" class="form-control">
					      <option>Ativo</option>
					      <option>Inativo</option>
					    </select>
			  		</div>

					<div class="form-group">
					    <label>Sexo</label>
					    <select type="text" name="sexo" class="form-control">
					      <option>Masculino</option>
					      <option>Feminino</option>
					    </select>
			  		</div>

					<div>
						<label>Data de Nascimento</label>
						<input type="date" name="datanasc" placeholder="Digite a data de nascimento" class="form-control">
					</div>
					
					<div>
						<label>E-Mail de cobrança</label>
						<input type="email" name="emailcob" placeholder="Digite o E-Mail de cobrança" class="form-control">
					</div>

					<div>
						<label>Limite de crédito</label>
						<input type="text" name="limitecred" placeholder="Digite o limite de crédito" class="form-control">
					</div>					
					
					<div class="form-group">
				    <label for="exampleFormControlTextarea1">Obs</label>
				    <textarea type="text" name="obs" placeholder="Digite observação sobre o cadastro" class="form-control" rows="4"></textarea>
 					 </div>	


					<input type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-success"><br><br>
					
					<div class="row text-center" style="margin-top: 10%;"> 						
						Lembrou? <a href="login.php">Clique aqui</a> para logar
					</div>
				</form>				
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>