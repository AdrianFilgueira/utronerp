
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Sua Página</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">

  <link href="css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body>
  
  <table class="table table-fordered table-hover" id="minhaTabela" style="text-align: center;">
    <thead>
      <tr>
        <th>ID Pedido</th>
        <th>Cliente</th>
        <th>ID Vendedor</th>
        <th>Andamento</th>
      </tr>
    </thead>
    <tbody>
<?php
	include_once 'conexao.php';
	$saida = "";
	$query = "SELECT * FROM pedidos ORDER by id_pedido";
	$q = ;
	$query = "SELECT id_pedido, vendedores.nomeven, clientes.nomecli, andamento FROM pedidos, clientes, vendedores WHERE pedidos.id_cliente = clientes.id_cliente AND pedidos.id_vendedor = vendedores.id_vendedor AND (clientes.nomecli LIKE '%".$q."%' OR vendedores.nomeven LIKE '%".$q."%')";
  $resultado = $con->query($query);

	if ($resultado -> num_rows > 0) {
		while ($fila = $resultado->fetch_assoc()) {
			$saida.= "	    <tr>
						      <th scope=\"row\">".$fila['id_pedido']."</th>
						      <td>".$fila['nomecli']."</td>
						      <td>".$fila['nomeven']."</td>
						      <td>".$fila['andamento']."</td>
						    </tr>";
		}
		$saida.= "</tbody></table>";
	}
	else{
		$saida.= "Não há dados";
	}

	echo $saida;
	$con -> close();
?>
  
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

  <script>
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
  });
  </script>
  <?php
	//require_once 'cadfun.html';
  ?>
</body>
</html>