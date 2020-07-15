<?php
session_start();
ob_start();
$btnCadCli = filter_input(INPUT_POST, 'btnCadCli', FILTER_SANITIZE_STRING);
$btnCadFor = filter_input(INPUT_POST, 'btnCadFor', FILTER_SANITIZE_STRING);
$btnCadFun = filter_input(INPUT_POST, 'btnCadFun', FILTER_SANITIZE_STRING);
$btnCadTra = filter_input(INPUT_POST, 'btnCadTra', FILTER_SANITIZE_STRING);
$btnCadVen = filter_input(INPUT_POST, 'btnCadVen', FILTER_SANITIZE_STRING);
$btnCadLog = filter_input(INPUT_POST, 'btnCadLog', FILTER_SANITIZE_STRING);
$btnCadPed = filter_input(INPUT_POST, 'btnCadPed', FILTER_SANITIZE_STRING);

/*
Verifica a existência do cadastro levando em consideração o CPF ou CNPJ
*/
if($btnTest){
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


if ($btnCadCli) {
	include_once("conexao.php");
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	print_r($dados_rc);
	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	if ($dados['tipopessoa'] = "Pessoa Física")
		$dados['tipopessoa'] = '1';
	if ($dados['situacao'] = "Ativo")
		$dados['situacao'] = '1';
	if ($dados['sexo'] = "Masculino")
		$dados['sexo'] = '1';
	if(in_array('',$dados)){
		if (!$erro) {
			$senha = password_hash($senha, PASSWORD_DEFAULT);
			$result_usuario = "INSERT INTO clientes(nomecli, fantasiacli, cepcli, estadocli, cidadecli, bairrocli, ruacli, numerocli, telefonecli, celularcli, emailcli, pfcli, cpfcnpjcli, iergcli, situacaocli, sexocli, datanasccli, obscli, emailcobcli, limitecredcli) VALUES (
					'" .utf8_decode($dados['nome']). "',
					'" .utf8_decode($dados['fantasia']). "',
					" .$dados['cep']. ",
					'" .$dados['uf']. "',
					'" .utf8_decode($dados['cidade']). "',
					'" .utf8_decode($dados['bairro']). "',
					'" .utf8_decode($dados['rua']). "',
					" .$dados['numero']. ",
					" .$dados['telefone']. ",
					" .$dados['celular']. ",
					'" .$dados['email']. "',
					" .$dados['tipopessoa']. ",
					'" .$dados['cpfcnpj']. "',
					'" .$dados['ierg']. "',
					" .$dados['situacao']. ",
					" .$dados['sexo']. ",
					'" .$dados['datanasc']. "',
					'" .utf8_decode($dados['obs']). "',
					'" .$dados['emailcob']. "',
					" .$dados['limitecred']. "
					)";
					
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
}



if ($btnCadVen) {
	include_once("conexao.php");
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	print_r($dados_rc);
	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	if ($dados['tipopessoa'] = "Pessoa Física")
		$dados['tipopessoa'] = '1';
	if ($dados['situacao'] = "Ativo")
		$dados['situacao'] = '1';
	if ($dados['sexo'] = "Masculino")
		$dados['sexo'] = '1';
	if(in_array('',$dados)){
		if (!$erro) {
			$senha = password_hash($senha, PASSWORD_DEFAULT);
			$result_usuario = "INSERT INTO vendedores(nomeven, fantasiaven, cepven, estadoven, cidadeven, bairroven, ruaven, numeroven, telefoneven, celularven, emailven, pfven, cpfcnpjven, iergven, situacaoven, sexoven, datanascven, obsven, emailcobven, limitecredven) VALUES (
					'" .utf8_decode($dados['nome']). "',
					'" .utf8_decode($dados['fantasia']). "',
					" .$dados['cep']. ",
					'" .$dados['uf']. "',
					'" .utf8_decode($dados['cidade']). "',
					'" .utf8_decode($dados['bairro']). "',
					'" .utf8_decode($dados['rua']). "',
					" .$dados['numero']. ",
					" .$dados['telefone']. ",
					" .$dados['celular']. ",
					'" .$dados['email']. "',
					" .$dados['tipopessoa']. ",
					'" .$dados['cpfcnpj']. "',
					'" .$dados['ierg']. "',
					" .$dados['situacao']. ",
					" .$dados['sexo']. ",
					'" .$dados['datanasc']. "',
					'" .utf8_decode($dados['obs']). "',
					'" .$dados['emailcob']. "',
					" .$dados['limitecred']. "
					)";
					
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
}


/*
if($btnCadClii){
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
	/*if(!$erro){
		//var_dump($dados);
		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		/*
			INSERT INTO clientes(nome, fantasia, cep, estado, cidade, bairro, rua, numero, telefone, celular, email, pfpj, cpfcnpj, ierg, situacao, sexo, datanasc, obs, emailcob, limitecred, datacad) VALUES ('', '', , '', '', '', '', , , , '', , , '', , , data, '', '', );


			INSERT INTO fornecedores(nome, fantasia, cep, estado, cidade, bairro, rua, numero, telefone, celular, email, pfpj, cpfcnpj, ierg, situacao, site, obs, emailcob, limitecred, datacad) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20])


			INSERT INTO produtos(descricao, unidade, ncm, origem, precoc, precov, ipi, situacao, estoquemin, estoquemax, fornecedor, bloco, upcean, peso, medidas, obs, material, tipo, datacad) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19])
		*/	
		/*$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
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

*/

?>