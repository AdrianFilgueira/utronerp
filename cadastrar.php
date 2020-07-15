<?php
session_start();
ob_start();
$btnCadCli = filter_input(INPUT_POST, 'btnCadCli', FILTER_SANITIZE_STRING);
$btnCadVen = filter_input(INPUT_POST, 'btnCadVen', FILTER_SANITIZE_STRING);
$btnCadTra = filter_input(INPUT_POST, 'btnCadTra', FILTER_SANITIZE_STRING);
$btnCadFor = filter_input(INPUT_POST, 'btnCadFor', FILTER_SANITIZE_STRING);
$btnCadFun = filter_input(INPUT_POST, 'btnCadFun', FILTER_SANITIZE_STRING);
$btnCadLog = filter_input(INPUT_POST, 'btnCadLog', FILTER_SANITIZE_STRING);

$btnCadPed = filter_input(INPUT_POST, 'btnCadPed', FILTER_SANITIZE_STRING);


if ($btnCadCli) {
	include_once("conexao.php");
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	if ($dados['tipopessoa'] = "Pessoa Física")
		$dados['tipopessoa'] = '1';
	else	
		$dados['tipopessoa'] = '0';
	if ($dados['situacao'] = "Ativo")
		$dados['situacao'] = '1';
	else	
		$dados['situacao'] = '0';
	if ($dados['sexo'] = "Masculino")
		$dados['sexo'] = '1';
	else	
		$dados['sexo'] = '0';
	if (!$erro) {
		$senha = password_hash($senha, PASSWORD_DEFAULT);
		$result_usuario = "INSERT INTO clientes(nomecli, fantasiacli, cepcli, ufcli, cidadecli, bairrocli, ruacli, numerocli, complementocli, telefonecli, celularcli, emailcli, pfcli, cpfcnpjcli, iergcli, situacaocli, sexocli, datanasccli, obscli, emailcobcli, limitecredcli) VALUES (
				'" .utf8_decode($dados['nome']). "',
				'" .utf8_decode($dados['fantasia']). "',
				" .str_replace('-', '', $dados['cep']). ",
				'" .$dados['uf']. "',
				'" .utf8_decode($dados['cidade']). "',
				'" .utf8_decode($dados['bairro']). "',
				'" .utf8_decode($dados['rua']). "',
				" .$dados['numero']. ",
				'" .utf8_decode($dados['complemento']). "',
				" .str_replace('-', '', str_replace(' ', '', $dados['telefone'])). ",
				" .str_replace('-', '', str_replace(' ', '', $dados['celular'])). ",
				'" .$dados['email']. "',
				" .$dados['tipopessoa']. ",
				" .str_replace('-', '', str_replace('.', '', str_replace('/', '', $dados['cpfcnpj']))). ",
				'" .str_replace('-', '', str_replace('.', '', $dados['ierg'])). "',
				" .$dados['situacao']. ",
				" .$dados['sexo']. ",
				'" .$dados['datanasc']. "',
				'" .utf8_decode($dados['obs']). "',
				'" .$dados['emailcob']. "',
				" .$dados['limitecred']. "
				)";
				
		$resultado_usuario = mysqli_query($con, $result_usuario);

		if(mysqli_insert_id($con)){
			$_SESSION['msg'] = "<p style='color:green;'>Cliente cadastrado com sucesso</p>";
			header("Location: cadcli.php");
		}else{
			//$_SESSION['msg'] = $result_usuario;
			$_SESSION['msg'] = "<p style='color:red;'>Cliente não foi cadastrado com sucesso</p>";
			header("Location: cadcli.php");
		}	
	}
}

if ($btnCadVen) {
	include_once("conexao.php");
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	if ($dados['tipopessoa'] = "Pessoa Física")
		$dados['tipopessoa'] = '1';
	else	
		$dados['tipopessoa'] = '0';
	if ($dados['situacao'] = "Ativo")
		$dados['situacao'] = '1';
	else	
		$dados['situacao'] = '0';
	if ($dados['sexo'] = "Masculino")
		$dados['sexo'] = '1';
	else	
		$dados['sexo'] = '0';
	if (!$erro) {
		$result_usuario = "INSERT INTO vendedores(nomeven, fantasiaven, cepven, ufven, cidadeven, bairroven, ruaven, numeroven, complementoven, telefoneven, celularven, emailven, pfven, cpfcnpjven, iergven, situacaoven, sexoven, datanascven, obsven, emailcobven, limitecredven) VALUES (
				'" .utf8_decode($dados['nome']). "',
				'" .utf8_decode($dados['fantasia']). "',
				" .str_replace('-', '', $dados['cep']). ",
				'" .$dados['uf']. "',
				'" .utf8_decode($dados['cidade']). "',
				'" .utf8_decode($dados['bairro']). "',
				'" .utf8_decode($dados['rua']). "',
				" .$dados['numero']. ",
				'" .utf8_decode($dados['complemento']). "',
				" .str_replace('-', '', str_replace(' ', '', $dados['telefone'])). ",
				" .str_replace('-', '', str_replace(' ', '', $dados['celular'])). ",
				'" .$dados['email']. "',
				" .$dados['tipopessoa']. ",
				" .str_replace('-', '', str_replace('.', '', str_replace('/', '', $dados['cpfcnpj']))). ",
				'" .str_replace('-', '', str_replace('.', '', $dados['ierg'])). "',
				" .$dados['situacao']. ",
				" .$dados['sexo']. ",
				'" .$dados['datanasc']. "',
				'" .utf8_decode($dados['obs']). "',
				'" .$dados['emailcob']. "',
				" .$dados['limitecred']. "
				)";
				
		$resultado_usuario = mysqli_query($con, $result_usuario);

		if(mysqli_insert_id($con)){
			$_SESSION['msg'] = "<p style='color:green;'>Vendedor cadastrado com sucesso</p>";
			header("Location: cadven.php");
		}else{
			//$_SESSION['msg'] = $result_usuario;
			$_SESSION['msg'] = "<p style='color:red;'>Vendedor não foi cadastrado com sucesso</p>";
			header("Location: cadven.php");
		}	
	}
}

if ($btnCadTra) {
	include_once("conexao.php");
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	if ($dados['tipopessoa'] = "Pessoa Física")
		$dados['tipopessoa'] = '1';
	else	
		$dados['tipopessoa'] = '0';
	if ($dados['situacao'] = "Ativo")
		$dados['situacao'] = '1';

	if (!$erro) {
		//INSERT INTO transportadoras(nometra, fantasiatra, ceptra, uftra, cidadetra, bairrotra, ruatra, numerotra, complementotra, telefonetra, celulartra, emailtra, pftra, cpfcnpjtra, iergtra, situacaotra, obstra, emailcobtra, limitecredtra) VALUES (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19)
		$result_usuario = "INSERT INTO transportadoras(nometra, fantasiatra, ceptra, uftra, cidadetra, bairrotra, ruatra, numerotra, complementotra, telefonetra, celulartra, emailtra, pftra, cpfcnpjtra, iergtra, situacaotra, obstra, emailcobtra, limitecredtra) VALUES (
				'" .utf8_decode($dados['nome']). "',
				'" .utf8_decode($dados['fantasia']). "',
				" .str_replace('-', '', $dados['cep']). ",
				'" .$dados['uf']. "',
				'" .utf8_decode($dados['cidade']). "',
				'" .utf8_decode($dados['bairro']). "',
				'" .utf8_decode($dados['rua']). "',
				" .$dados['numero']. ",
				'" .utf8_decode($dados['complemento']). "',
				" .str_replace('-', '', str_replace(' ', '', $dados['telefone'])). ",
				" .str_replace('-', '', str_replace(' ', '', $dados['celular'])). ",
				'" .$dados['email']. "',
				" .$dados['tipopessoa']. ",
				" .str_replace('-', '', str_replace('.', '', str_replace('/', '', $dados['cpfcnpj']))). ",
				'" .str_replace('-', '', str_replace('.', '', $dados['ierg'])). "',
				" .$dados['situacao']. ",
				'" .utf8_decode($dados['obs']). "',
				'" .$dados['emailcob']. "',
				" .$dados['limitecred']. "
				)";
				
		$resultado_usuario = mysqli_query($con, $result_usuario);

		if(mysqli_insert_id($con)){
			$_SESSION['msg'] = "<p style='color:green;'>Transportadora cadastrada com sucesso</p>";
			header("Location: cadtran.php");
		}else{
			//$_SESSION['msg'] = $result_usuario;
			$_SESSION['msg'] = "<p style='color:red;'>Transportadora não foi cadastrada com sucesso</p>";
			header("Location: cadtran.php");
		}	
	}
}

if ($btnCadFor) {
	include_once("conexao.php");
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	if ($dados['tipopessoa'] = "Pessoa Física")
		$dados['tipopessoa'] = '1';
	else	
		$dados['tipopessoa'] = '0';
	if ($dados['situacao'] = "Ativo")
		$dados['situacao'] = '1';
	else	
		$dados['situacao'] = '0';
	if (!$erro) {
		//INSERT INTO fornecedores(nomefor, fantasiafor, cepfor, uffor, cidadefor, bairrofor, ruafor, numerofor, complementofor, telefonefor, celularfor, emailfor, pffor, cpfcnpjfor, iergfor, situacaofor, sitefor, obsfor, emailcobfor, limitecredfor) VALUES (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20)
		$result_usuario = "INSERT INTO fornecedores(nomefor, fantasiafor, cepfor, uffor, cidadefor, bairrofor, ruafor, numerofor, complementofor, telefonefor, celularfor, emailfor, pffor, cpfcnpjfor, iergfor, situacaofor, sitefor, obsfor, emailcobfor, limitecredfor) VALUES (
				'" .utf8_decode($dados['nome']). "',
				'" .utf8_decode($dados['fantasia']). "',
				" .str_replace('-', '', $dados['cep']). ",
				'" .$dados['uf']. "',
				'" .utf8_decode($dados['cidade']). "',
				'" .utf8_decode($dados['bairro']). "',
				'" .utf8_decode($dados['rua']). "',
				" .$dados['numero']. ",
				'" .utf8_decode($dados['complemento']). "',
				" .str_replace('-', '', str_replace(' ', '', $dados['telefone'])). ",
				" .str_replace('-', '', str_replace(' ', '', $dados['celular'])). ",
				'" .$dados['email']. "',
				" .$dados['tipopessoa']. ",
				" .str_replace('-', '', str_replace('.', '', str_replace('/', '', $dados['cpfcnpj']))). ",
				'" .str_replace('-', '', str_replace('.', '', $dados['ierg'])). "',
				" .$dados['situacao']. ",
				'" .$dados['site']. "',
				'" .utf8_decode($dados['obs']). "',
				'" .$dados['emailcob']. "',
				" .$dados['limitecred']. "
				)";
				
		$resultado_usuario = mysqli_query($con, $result_usuario);

		if(mysqli_insert_id($con)){
			$_SESSION['msg'] = "<p style='color:green;'>Fornecedor cadastrado com sucesso</p>";
			header("Location: cadfor.php");
		}else{
			//$_SESSION['msg'] = $result_usuario;
			$_SESSION['msg'] = "<p style='color:red;'>Fornecedor não foi cadastrado com sucesso</p>";
			header("Location: cadfor.php");
		}	
	}
}

if ($btnCadFun) {
	include_once("conexao.php");
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	if ($dados['tipopessoa'] = "Pessoa Física")
		$dados['tipopessoa'] = '1';
	else	
		$dados['tipopessoa'] = '0';
	if ($dados['situacao'] = "Ativo")
		$dados['situacao'] = '1';
	else	
		$dados['situacao'] = '0';
	if ($dados['sexo'] = "Masculino")
		$dados['sexo'] = '1';
	else	
		$dados['sexo'] = '0';
	if (!$erro) {
		//INSERT INTO funcionarios(nomefun, cepfun, uffun, cidadefun, bairrofun, ruafun, numerofun, complementofun, telefonefun, celularfun, emailfun, pffun, cpfcnpjfun, iergfun, situacaofun, sexofun, datanascfun, obsfun, contabancofun, salariofun) VALUES (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20)

		$result_usuario = "INSERT INTO funcionarios(nomefun, cepfun, uffun, cidadefun, bairrofun, ruafun, numerofun, complementofun, telefonefun, celularfun, emailfun, pffun, cpfcnpjfun, iergfun, situacaofun, sexofun, datanascfun, obsfun, contabancofun, salariofun) VALUES (
				'" .utf8_decode($dados['nome']). "',
				" .str_replace('-', '', $dados['cep']). ",
				'" .$dados['uf']. "',
				'" .utf8_decode($dados['cidade']). "',
				'" .utf8_decode($dados['bairro']). "',
				'" .utf8_decode($dados['rua']). "',
				" .$dados['numero']. ",
				'" .utf8_decode($dados['complemento']). "',
				" .str_replace('-', '', str_replace(' ', '', $dados['telefone'])). ",
				" .str_replace('-', '', str_replace(' ', '', $dados['celular'])). ",
				'" .$dados['email']. "',
				" .$dados['tipopessoa']. ",
				" .str_replace('-', '', str_replace('.', '', str_replace('/', '', $dados['cpfcnpj']))). ",
				'" .str_replace('-', '', str_replace('.', '', $dados['ierg'])). "',
				" .$dados['situacao']. ",
				" .$dados['sexo']. ",
				'" .$dados['datanasc']. "',
				'" .utf8_decode($dados['obs']). "',
				'" .$dados['contab']. "',
				" .$dados['salario']. "
				)";
				
		$resultado_usuario = mysqli_query($con, $result_usuario);

		if(mysqli_insert_id($con)){
			$_SESSION['msg'] = "<p style='color:green;'>Funcionário cadastrado com sucesso</p>";
			header("Location: cadfun.php");
		}else{
			$_SESSION['msg'] = $result_usuario;
			//$_SESSION['msg'] = "<p style='color:red;'>Funcionário não foi cadastrado com sucesso</p>";
			header("Location: cadfun.php");
		}	
	}
}

if ($btnCadLog) {
	include_once("conexao.php");
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	if ($dados['tipopessoa'] = "Pessoa Física")
		$dados['tipopessoa'] = '1';
	else	
		$dados['tipopessoa'] = '0';
	if ($dados['situacao'] = "Ativo")
		$dados['situacao'] = '1';
	else	
		$dados['situacao'] = '0';
	if ($dados['sexo'] = "Masculino")
		$dados['sexo'] = '1';
	else	
		$dados['sexo'] = '0';
	if (!$erro) {
		//INSERT INTO login(nome, usuario, senha, permissao) VALUES (1,2,3,4)
		$result_usuario = "INSERT INTO login(nome, usuario, senha, permissao) VALUES (
				'" .utf8_decode($dados['nome']). "',
				" .str_replace('-', '', $dados['cep']). ",
				'" .$dados['uf']. "',
				'" .utf8_decode($dados['cidade']). "',
				'" .utf8_decode($dados['bairro']). "',
				'" .utf8_decode($dados['rua']). "',
				" .$dados['numero']. ",
				'" .utf8_decode($dados['complemento']). "',
				" .str_replace('-', '', str_replace(' ', '', $dados['telefone'])). ",
				" .str_replace('-', '', str_replace(' ', '', $dados['celular'])). ",
				'" .$dados['email']. "',
				" .$dados['tipopessoa']. ",
				" .str_replace('-', '', str_replace('.', '', str_replace('/', '', $dados['cpfcnpj']))). ",
				'" .str_replace('-', '', str_replace('.', '', $dados['ierg'])). "',
				" .$dados['situacao']. ",
				" .$dados['sexo']. ",
				'" .$dados['datanasc']. "',
				'" .utf8_decode($dados['obs']). "',
				'" .$dados['contab']. "',
				" .$dados['salario']. "
				)";
				
		$resultado_usuario = mysqli_query($con, $result_usuario);

		if(mysqli_insert_id($con)){
			$_SESSION['msg'] = "<p style='color:green;'>Funcionário cadastrado com sucesso</p>";
			header("Location: cadfun.php");
		}else{
			//_SESSION['msg'] = $result_usuario;
			$_SESSION['msg'] = "<p style='color:red;'>Funcionário não foi cadastrado com sucesso</p>";
			header("Location: cadfun.php");
		}	
	}
}

if($btnCadLog){
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
		$result_usuario = "SELECT id_login FROM login WHERE usuario='". $dados['usuario'] ."'";
		$resultado_usuario = mysqli_query($con, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "Este usuário já está sendo utilizado";
		}
		
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "Este e-mail já está cadastrado";
		}
	}
	if ($erro) {
		header("Location: cadlogin.php");
	}
	
	//Se não nouver nenhum erro ou cadastro já feito faz o cadastro
	
	//var_dump($dados);
	if(!$erro){
		//var_dump($dados);
		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
				switch ($dados['permissao']){
				    case "Administração do Sistema":
				        $dados['permissao'] = 1;
				        break;
				    case "Gerenciamento":
				        $dados['permissao'] = 2;
				        break;
				    case "Administrativo":
				        $permissaofinal = 3;
				        break;
				    case "Gerenciamento de Produção":
				        $dados['permissao'] = 4;
				        break;
				    case "Produção":
				        $dados['permissao'] = 5;
				        break;
				    case "Envio":
				        $dados['permissao'] = 6;
				        break;
				    case "Vendas":
				        $dados['permissao'] = 7;
				        break;
				    }
		$result_usuario = "INSERT INTO login(nome, usuario, senha, permissao) VALUES (
						'" .$dados['nome']. "',
						'" .$dados['usuario']. "',
						'" .$dados['senha']. "',
						" .$dados['permissao']. "
						)";
		$resultado_usario = mysqli_query($con, $result_usuario);
		if(mysqli_insert_id($con)){
			$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
			header("Location: logoff.php");
		}else{
			$_SESSION['msg'] = $result_usuario;
			//$_SESSION['msg'] = "Erro ao cadastrar o usuário";
			header("Location: cadlogin.php");

		}
	}
}


?>