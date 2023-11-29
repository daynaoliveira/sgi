function CepMascara(cep) {
    if (cep.value.length == 5) {
        cep.value = cep.value + '-';
    }
}

function CpfMascara(cpf) {
    if (cpf.value.length == 3) {
        cpf.value = cpf.value + '.';
    }
    if (cpf.value.length == 7) {
        cpf.value = cpf.value + '.';
    }
    if (cpf.value.length == 11) {
        cpf.value = cpf.value + '-';
    }
}

function CnpjMascara(cnpj) {
    if (cnpj.value.length == 2) {
        cnpj.value = cnpj.value + '.';
    }
    if (cnpj.value.length == 6) {
        cnpj.value = cnpj.value + '.';
    }
    if (cnpj.value.length == 10) {
        cnpj.value = cnpj.value + '/';
    }
    if (cnpj.value.length == 15) {
        cnpj.value = cnpj.value + '-';
    }
}

function TelMascara(tel) {
    if (tel.value.length == 0) {
        tel.value = tel.value + '(';
    }
    if (tel.value.length == 3) {
        tel.value = tel.value + ')';
    }
    if (tel.value.length == 8) {
        tel.value = tel.value + '-';
    }
}

function CelMascara(tel) {
    if (tel.value.length == 0) {
        tel.value = tel.value + '(';
    }
    if (tel.value.length == 3) {
        tel.value = tel.value + ')9';
    }
    if (tel.value.length == 9) {
        tel.value = tel.value + '-';
    }
}

function Cep(cep){
    $(cep).on('blur', function(){
        const value = cep.value.replace(/[^0-9]+/, '');
        const url = `https://viacep.com.br/ws/${value}/json/`;

        fetch(url)
        .then( response => response.json())
        .then( json => {
            if( json.logradouro ) {
                $('#rua').val(json.logradouro);
                $('#bairro').val(json.bairro);
                $('#cidade').val(json.localidade);
                $('#estado').val(json.uf);


                console.log(json)
            }
        });
    });
}
