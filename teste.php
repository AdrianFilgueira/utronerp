<?php
$btnCadCli = filter_input(INPUT_POST, 'btnCadCli', FILTER_SANITIZE_STRING);
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
			$result_usuario = "INSERT INTO clientes(nome, fantasia, cep, estado, cidade, bairro, rua, numero, telefone, celular, email, pf, cpfcnpj, ierg, situacao, sexo, datanasc, obs, emailcob, limitecred) VALUES (
					'" .$dados['nome']. "',
					'" .$dados['fantasia']. "',
					" .$dados['cep']. ",
					'" .$dados['uf']. "',
					'" .$dados['cidade']. "',
					'" .$dados['bairro']. "',
					'" .$dados['rua']. "',
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
					'" .$dados['obs']. "',
					'" .$dados['emailcob']. "',
					" .$dados['limitecred']. "
					)";
					
			$resultado_usuario = mysqli_query($con, $result_usuario);
	echo "INSERT INTO clientes(nome, fantasia, cep, estado, cidade, bairro, rua, numero, telefone, celular, email, pf, cpfcnpj, ierg, situacao, sexo, datanasc, obs, emailcob, limitecred) VALUES (
					'" .$dados['nome']. "',
					'" .$dados['fantasia']. "',
					" .$dados['cep']. ",
					'" .$dados['uf']. "',
					'" .$dados['cidade']. "',
					'" .$dados['bairro']. "',
					'" .$dados['rua']. "',
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
					'" .$dados['obs']. "',
					'" .$dados['emailcob']. "',
					" .$dados['limitecred']. "
					)";
		}
	}
}
?>