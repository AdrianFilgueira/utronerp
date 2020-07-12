<?php

session_start();
unset($_SESSION['id_login'], $_SESSION['nome'], $_SESSION['usuario'], $_SESSION['permissao']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: index.php");