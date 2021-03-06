<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Adrian">
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon"/>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script type="text/javascript"src="js/consultas.js"></script>
    <script type="text/javascript"src="js/mascaras.js"></script>
    <!--
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
  -->
    <script type="text/javascript" src="js/javascriptpersonalizado.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>ERP - <?php echo $titulo ?></title>
  </head>

  <body class="text-center">
    <div class="container">
          
<?php
session_start();
if(!empty($_SESSION['nome'])){
            echo "
    <nav class=\"navbar navbar-expand-md navbar-dark fixed-top bg-dark\"style=\"padding-top: = 5%;\">
      <a class=\"navbar-brand\" href=\"index.php\">
        <img src=\"images/icon.ico\" width=\"30\" height=\"30\" alt=\"\">
      </a>
      <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
        <ul class=\"navbar-nav mr-auto\">
          <li class=\"nav-item active\">
            <a class=\"nav-link\" href=\"index.php\">Home <span class=\"sr-only\">(current)</span></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"administrativo.php\">Consulta pedido</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link disabled\" href=\"#\">Disabled</a>
          </li>
            <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"http://example.com\" id=\"dropdown03\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Cadastros</a>
            <div class=\"dropdown-menu\" aria-labelledby=\"dropdown03\">
              <a class=\"dropdown-item\" href=\"http://localhost/utronerp/cadcli.php\">Clientes</a>
              <a class=\"dropdown-item\" href=\"http://localhost/utronerp/cadven.php\">Vendedores</a>
              <a class=\"dropdown-item\" href=\"http://localhost/utronerp/cadtran.php\">Transportadoras</a>
              <a class=\"dropdown-item\" href=\"http://localhost/utronerp/cadfor.php\">Fornecedores</a>
              <a class=\"dropdown-item\" href=\"http://localhost/utronerp/cadfun.php\">Funcionários</a>
              <a class=\"dropdown-item\" href=\"http://localhost/utronerp/cadlogin.php\">Login</a>
            </div>
          </li>
        </ul>
        <font color=\"white\" > ".$_SESSION['nome']."&nbsp|&nbsp".$_SESSION['permissao']."&nbsp&nbsp</font>
        <form class=\"form-inline mt-2 mt-md-0\" action=\"logoff.php\">
          <button class=\"btn btn-outline-danger my-2 my-sm-0\" type=\"submit\">Sair</button>
        </form>
      </div>
    </nav>";
          }
  
?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>