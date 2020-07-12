function formatar_mascara(src, mascara) {
 var campo = src.value.length;
 var saida = mascara.substring(0,1);
 var texto = mascara.substring(campo);
	if(texto.substring(0,1) != saida) {
		src.value += texto.substring(0,1);
	}
}

function verifica_mascaracpfcnpj(src, combobox) {
 var comb = combobox.value;
	if (comb == "Pessoa Física") {
		formatar_mascara(src, "###.###.###-##");
	}
	else if(comb == "Pessoa Jurídica"){
		formatar_mascara(src, "##.###.###/####-##");
	}
}

function verifica_mascaraierg(src, combobox) {
 var comb = combobox.value;
	if (comb == "Pessoa Física") {
		formatar_mascara(src, "##.###.###-#");
	}
	else if(comb == "Pessoa Jurídica"){
		formatar_mascara(src, "##.###.####-#");
	}
}

function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf);
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}