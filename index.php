<?php 
include_once('header.php');
?>

  <form method="POST" action="valida.php" class="form-signin" >
    <img class="mb-4" src="images/logophpml.png" alt="" width="72" height="72">
    <h1><?php
        if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
        ?></h1>
        
    <h1 class="h3 mb-3 font-weight-normal">ERP - Login</h1>
    <input type="text" name="usuario" class="form-control" placeholder="Login" style="text-align: center;" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required autofocus>
    <br>
    <input type="password" name="senha" class="form-control" placeholder="Senha" style="text-align: center;" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember" value="Lembre-me" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>> Lembre-me
      </label>
    </div>
     <input type="submit" name="btnLogin" value="Acessar" class="btn btn-lg btn-primary btn-block"></input>

  </form>
      <?php 
      include_once('footer.php');
    ?> 
