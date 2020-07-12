<?php
	$titulo = "Cadastro de Vendedores";
	require_once 'header.php';
?>

<h2>Cadastrar Vendedores</h2>
<!--------------------------------------------------------------------------------------------------------------------------------->
				<h1><?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?></h1>
				<form method="POST" action="cadastrar.php" class="needs-validation" novalidate>
				  <div class="form-row">
				    <div class="form-group col-md-6">
						<label>Nome</label>
						<input type="text" name="nome" placeholder="Digite o nome e sobrenome" class="form-control" required>
			                <div class="invalid-feedback">
			                  É necessário preencher o Nome.
			                </div>
				    </div>
				    <div class="form-group col-md-4">
						<label>Fantasia</label>
						<input type="text" name="fantasia" placeholder="Digite o nome fantasia" class="form-control">	
				    </div>
<!---------------------------------------------------------------------------------------------->			  	
				    <div class="form-group col-md-2">
						<label>CEP</label>
				        <input name="cep" type="text" id="cep" onblur="pesquisacep(this.value);" placeholder="Digite o CEP" class="form-control" onkeypress="formatar_mascara(this,'#####-###')" required>
			                <div class="invalid-feedback">
			                  É necessário preencher o CEP.
			                </div>
				    </div>
				    <div class="form-group col-md-1">
  						<label>Estado</label>       
				        <input name="uf" type="text" id="uf" placeholder="UF" class="form-control">
				    </div>
				    <div class="form-group col-md-2">
						<label>Cidade</label>
				        <input name="cidade" type="text" id="cidade" placeholder="Digite a cidade" class="form-control">
				    </div> 
				    <div class="form-group col-md-2">
						<label>Bairro</label>
				        <input name="bairro" type="text" id="bairro" placeholder="Digite o bairro" class="form-control">
				    </div> 
				    <div class="form-group col-md-3">
						<label>Rua</label>
				        <input name="rua" type="text" id="rua" placeholder="Digite a rua" class="form-control">
				    </div> 
<!---------------------------------------------------------------------------------------------->
				    <div class="form-group col-md-1">
						<label>Número</label>
						<input type="text" name="numero" placeholder="Nº" class="form-control"required>
			                <div class="invalid-feedback">
			                  Preencha o Número.
			                </div>
				    </div> 
				  	<div class="form-group col-md-3">
						<label>Complemento</label>
				        <input name="complemento" type="text" id="complemento" placeholder="Ex.: Casa, Apto, etc" class="form-control">
				    </div> 
				    <div class="form-group col-md-2">
						<label>Telefone</label>
						<input type="text" name="telefone" placeholder="Digite o telefone" class="form-control" onkeypress="formatar_mascara(this,'## ####-####')" >
				    </div>
				    <div class="form-group col-md-2">
						<label>Celular</label>
						<input type="text" name="celular" placeholder="Digite o celular" class="form-control" onkeypress="formatar_mascara(this,'## # ####-####')" required>
			                <div class="invalid-feedback">
			                  É necessário preencher o Celular.
			                </div>
				    </div>
				    <div class="form-group col-md-2">
					    <label>Tipo de pessoa</label>
					    <select type="text" name="tipopessoa" class="custom-select d-block w-100" onmouseleave="document.getElementById('cpfcnpj').value='';document.getElementById('ierg').value='';" required>
					      <option>Pessoa Física</option>
					      <option>Pessoa Jurídica</option>
					    </select>
				    </div>
				    <div class="form-group col-md-2">
					    <label>Situação</label>
					    <select type="text" name="sitacao" class="custom-select d-block w-100" required>
					      <option>Ativo</option>
					      <option>Inativo</option>
					    </select>
				    </div>
				    <div class="form-group col-md-2">
						<label>CPF ou CNPJ</label>
						<input type="text" id="cpfcnpj" name="cpfcnpj" placeholder="Digite o CPF ou CNPJ" class="form-control" onkeypress="verifica_mascaracpfcnpj(this, tipopessoa)" required>
			                <div class="invalid-feedback">
			                  É necessário preencher o CPF ou CNPJ.
			                </div>
				    </div>
				    <div class="form-group col-md-2">
						<label>IE ou RG</label>
						<input type="text" id="ierg" name="ierg" placeholder="Digite o RG ou IE" class="form-control" onkeypress="verifica_mascaraierg(this, tipopessoa)">
				    </div>
				    <div class="form-group col-md-2">
					    <label>Sexo</label>
					    <select type="text" name="sexo" class="custom-select d-block w-100">
					      <option>Masculino</option>
					      <option>Feminino</option>
					    </select>
				    </div>
				    <div class="form-group col-md-2">
						<label>Data de Nascimento</label>
						<input type="date" name="datanasc" placeholder="Digite a data de nascimento" class="form-control">
				    </div>
				    <div class="form-group col-md-3">
						<label>E-Mail</label>
						<input type="email" name="email" placeholder="Digite o E-Mail" class="form-control"required>
			                <div class="invalid-feedback">
			                  É necessário preencher o E-Mail.
			                </div>
				    </div>
				    <div class="form-group col-md-3">
						<label>E-Mail de cobrança</label>
						<input type="email" name="emailcob" placeholder="Em branco se for igual o E-Mail" class="form-control">
				    </div>
				    <div class="form-group col-md-2">
						<label>Limite de crédito</label>
						<input type=number step=0.01 name="limitecred" placeholder="Limite de crédito" class="form-control">
				    </div>
					</div>
					<center>
				    <div class="form-group col-md-10">
					    <label>Obs</label>
					    <textarea type="text" name="obs" placeholder="Digite observação sobre o cadastro" class="form-control" rows="4"></textarea>
				    </div>
					</center>
				 	<div class="center">
<!--------------------------------------------------------------------------------------------------------------------------------->
						<input type="submit" name="btnCadVen" value="Cadastrar" class="btn btn-success"><br><br>				
					</div>	
				</form>		
				</div>	
				
<?php 
  include_once('footer.php');
?> 