<?php
session_start();
ob_start();
$btnCadCli = filter_input(INPUT_POST, 'btnCadCli', FILTER_SANITIZE_STRING);
$btnCadFor = filter_input(INPUT_POST, 'btnCadFor', FILTER_SANITIZE_STRING);
$btnCadFun = filter_input(INPUT_POST, 'btnCadFun', FILTER_SANITIZE_STRING);
$btnCadTran = filter_input(INPUT_POST, 'btnCadTran', FILTER_SANITIZE_STRING);
$btnCadVen = filter_input(INPUT_POST, 'btnCadVen', FILTER_SANITIZE_STRING);
$btnCadLog = filter_input(INPUT_POST, 'btnCadLog', FILTER_SANITIZE_STRING);

/*
Verifica a existência do cadastro levando em consideração o CPF ou CNPJ
*/
if($btnCadCli){
	include_once 'conexao.php';
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	print_r($dados_rc);
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
	
	/*
	Se não nouver nenhum erro ou cadastro já feito faz o cadastro
	*/
	
	//var_dump($dados);
	if(!$erro){
		//var_dump($dados);
		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		/*
INSERT INTO clientes(nome, fantasia, cep, estado, cidade, bairro, rua, numero, telefone, celular, email, pfpj, cpfcnpj, ierg, situacao, sexo, datanasc, obs, emailcob, limitecred, datacad) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21])


INSERT INTO fornecedores(nome, fantasia, cep, estado, cidade, bairro, rua, numero, telefone, celular, email, pfpj, cpfcnpj, ierg, situacao, site, obs, emailcob, limitecred, datacad) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20])


INSERT INTO produtos(descricao, unidade, ncm, origem, precoc, precov, ipi, situacao, estoquemin, estoquemax, fornecedor, bloco, upcean, peso, medidas, obs, material, tipo, datacad) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19])
*/	
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


if ($btnCadLog) {
	include_once("conexao.php");
	/*$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	print_r($dados_rc);*/
	$erro = false;
/*
	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);

	if(in_array('',$dados)){*/
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$senha2 = filter_input(INPUT_POST, 'senha2', FILTER_SANITIZE_STRING);
	$permissao = filter_input(INPUT_POST, 'permissao', FILTER_SANITIZE_STRING);
	$permissao = (int)$permissao;

	if ($senha != $senha2) {
		$erro = true;
		$_SESSION['msg'] = "Senhas não conferem";
		header("Location: index.php");
	}

	if (!$erro) {
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
	}
}



?>