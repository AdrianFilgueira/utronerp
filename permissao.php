<?php
session_start();
include_once("conexao.php");
$permissaofinal;
$result_usuario = "SELECT usuario, permissao FROM login WHERE usuario='$usuario' LIMIT 1";
$resultado_usuario = mysqli_query($con, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			switch ($row_usuario['permissao']){
			    case 0:
			        $permissaofinal = "Administração do Sistema";
			        break;
			    case 1:
			        $permissaofinal = "Gerenciamento";
			        break;
			    case 2:
			        $permissaofinal = "Administrativo";
			        break;
			    case 3:
			        $permissaofinal = "Gerenciamento de Producao";
			        break;
			    case 4:
			        $permissaofinal = "Producao";
			        break;
			    case 5:
			        $permissaofinal = "Envio";
			        break;
			    case 6:
			        $permissaofinal = "Vendas";
			        break;			        

			}
		}