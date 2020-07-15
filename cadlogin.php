<?php
	$titulo = "Cadastro de Login";
	require_once 'header.php';
?>

<h2>Cadastrar Login</h2>
<!--------------------------------------------------------------------------------------------------------------------------------->
				<h1><?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?></h1>
				<form method="POST" action="cadastrar.php" class="needs-validation" novalidate>
					<center>
				  <div class="form-col">



				  	
				    <div class="form-group col-md-4">
						<label>Usuário</label>
						<input type="text" name="usuario" placeholder="Digite o Usuário" class="form-control" required>
			                <div class="invalid-feedback">
			                  É necessário preencher o Usuário.
			                </div>
				    </div>
				    <div class="form-group col-md-4">
						<label>Senha</label>
						<input type="password" name="senha" placeholder="Senha" class="form-control"  readonly onfocus="this.removeAttribute('readonly');this.select();" required>
			                <div class="invalid-feedback">
			                  Preencha a senha.
			                </div>
				    </div>
				    <div class="form-group col-md-4">
						<label>Confirmação de senha</label>
						<input type="password" name="senha2" placeholder="Confirme a senha" class="form-control" readonly onfocus="this.removeAttribute('readonly');this.select();" required>
			                <div class="invalid-feedback">
			                  Confirme a senha.
			                </div>
				    </div>
				    <div class="form-group col-md-4">
					    <label>Permissão</label>
					    <select type="text" name="permissao" class="custom-select d-block w-100" required>
					      <option>Administração do Sistema</option>
					      <option>Gerenciamento</option>
					      <option>Administrativo</option>
					      <option>Gerenciamento de Produção</option>
					      <option>Produção</option>
					      <option>Envio</option>
					      <option>Vendas</option>
					    </select>
				    </div>
					</center>
				 	<div class="center">
			<!--------------------------------------------------------------------------------------------------------------------------------->
						<input type="submit" name="btnCadLog" value="Cadastrar" class="btn btn-success"><br><br>				
					</div>	
				</form>		
				</div>	
				
<?php 
  include_once('footer.php');
?> 