<?php
	//Incluir a conexão com banco de dados
	include_once('conexao.php');
	
	//Recuperar o valor da palavra
	$nome = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$nome = "SELECT * FROM login WHERE nome LIKE '%$nome%'";
	$resultado_cursos = mysqli_query($con, $nome);
	
	if(mysqli_num_rows($resultado_cursos) <= 0){
		echo "Nenhum curso encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_cursos)){
			echo "<li>".utf8_encode($rows['nome'])."</li>";
		}
	}
?>