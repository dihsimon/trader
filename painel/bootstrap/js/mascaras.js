function mascaraCpf(objeto) {
    var cpf = objeto.value;
    var numero, retorno = "";
    var caracteres = /\D/g;
    numero = cpf.replace(caracteres, "");

    var parte = numero.substr(0, 3);
    if (parte.length > 0) {
        retorno = parte;
    }
    parte = numero.substr(3, 3);
    if (parte.length > 0) {
        retorno += "." + parte;
    }
    parte = numero.substr(6, 3);
    if (parte.length > 0) {
        retorno += "." + parte;
    }
    parte = numero.substr(9, 2);
    if (parte.length > 0) {
        retorno += "-" + parte;
    }
    objeto.value = retorno;
}
function mascaraCnpj(objeto) {
    var cnpj = objeto.value;
    var numero, retorno = "";
    var caracteres = /\D/g;
    numero = cnpj.replace(caracteres, "");

    var parte = numero.substr(0, 2);
    if (parte.length > 0) {
        retorno = parte;
    }
    parte = numero.substr(2, 3);
    if (parte.length > 0) {
        retorno += "." + parte;
    }
    parte = numero.substr(5, 3);
    if (parte.length > 0) {
        retorno += "." + parte;
    }
    parte = numero.substr(8, 4);
    if (parte.length > 0) {
        retorno += "/" + parte;
    }
    parte = numero.substr(12, 2);
    if (parte.length > 0) {
        retorno += "-" + parte;
    }
    objeto.value = retorno;
}
function mascaraTelefone(objeto) {
    var tel = objeto.value;
    var numero, retorno = "";
    var caracteres = /\D/g;
    numero = tel.replace(caracteres, "");

    var parte = numero.substr(0, 2);
    if (parte.length > 0) {
        retorno = "(" + parte + ") ";
    }
    parte = numero.substr(2, 4);
    if (parte.length > 0) {
        retorno += parte + "-";
    }
    parte = numero.substr(6, 4);
    if (parte.length > 0) {
        retorno += parte;
    }
    objeto.value = retorno;
}
function mascaraCelular(objeto) {
    var cel = objeto.value;
    var numero, retorno = "";
    var caracteres = /\D/g;
    numero = cel.replace(caracteres, "");

    var parte = numero.substr(0, 2);
    if (parte.length > 0) {
        retorno = "(" + parte + ") ";
    }
    if (numero.length === 10) {
        parte = numero.substr(2, 4);
        if (parte.length > 0) {
            retorno += parte + "-";
        }
        parte = numero.substr(6, 4);
        if (parte.length > 0) {
            retorno += parte;
        }
    } else {
        parte = numero.substr(2, 5);
        if (parte.length > 0) {
            retorno += parte + "-";
        }
        parte = numero.substr(7, 4);
        if (parte.length > 0) {
            retorno += parte;
        }
    }

    objeto.value = retorno;
}
function mascaraCep(objeto) {
    var cep = objeto.value;
    var numero, retorno = "";
    var caracteres = /\D/g;
    numero = cep.replace(caracteres, "");

    var parte = numero.substr(0, 2);
    if (parte.length > 0) {
        retorno = parte;
    }
    parte = numero.substr(2, 3);
    if (parte.length > 0) {
        retorno += "." + parte;
    }
    parte = numero.substr(4, 3);
    if (parte.length > 0) {
        retorno += "-" + parte;
    }
    objeto.value = retorno;
}
function mascaraPontoFlut(valor) {
    var valorV = valor.value;
    valorV = valorV.replace(',', '.');

    valor.value = valorV;
}
function validarExcluir() {
    var r = confirm("Tem Certeza eu deseja Excluir ?");
    if (r == true) {
        document.forms['formulario'].submit();

    } else {
        return;
    }
}
function mascaraData(objeto) {
    var data = objeto.value;
    var numero, retorno = "";
    var caracteres = /\D/g;
    numero = data.replace(caracteres, "");

    var parte = numero.substr(0, 2);
    if (parte.length > 0) {
        retorno = parte;
    }
    parte = numero.substr(2, 2);
    if (parte.length > 0) {
        retorno += "/" + parte;
    }
    parte = numero.substr(4, 4);
    if (parte.length > 0) {
        retorno += "/" + parte;
    }
    objeto.value = retorno;
}
