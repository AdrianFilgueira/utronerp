<?php
	$titulo = "Gerenciamento";
	require_once 'header.php';
?>
				<h2>Cadastrar e consultar produtos</h2>
				<br>
				<h3><?php
					if(!empty($_SESSION['nome'])){
						echo "Olá <b>".$_SESSION['nome']." </b>do setor de <b>".$_SESSION['permissao']."</b>, Seja bem vindo <br>";
					}else{
						$_SESSION['msg'] = "Área restrita";
						header("Location: index.php");	
					}
				?></h3>


				</div>	
<?php 
  include_once('footer.php');
?> 