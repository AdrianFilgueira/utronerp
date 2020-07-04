<?php
session_start();
if(!empty($_SESSION['nome'])){
	echo "Olá ".$_SESSION['nome']." do setor de ".$_SESSION['permissao'].", Seja bem vindo <br>";
	echo "<a href='sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
