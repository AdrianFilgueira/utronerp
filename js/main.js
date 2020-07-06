$(buscapedidos())

function buscapedidos(consulta){
	$.ajax({
		url: 'buscar.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta:consulta},
	})
	.done(function(resposta){
		$("#pedidos").html(resposta);
	})
	.fail(function(){
		console.log("ERROR");
	})
}

$(document).on('keyup', '#btnpesquisapedidos', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscapedidos(valor);
	}
	else{
		buscapedidos();
	}
})