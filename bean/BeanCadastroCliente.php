<?php

$cliente = new Clientes();
$cliente->setNome($_POST['nome']);
$cliente->setDataCadastro(now());
$cliente->setDataInicial('2017-00-00');
$cliente->setDataFinal('2017-00-00');
$cliente->setCpf($_POST['cpf']);
$cliente->setEndereco($_POST['endereco']);
$cliente->setCep($_POST['cep']);
$cliente->setComplemento($_POST['complemento']);
$cliente->setCodigo_plano(0);

$dao = new ClienteDao();

$resultado = $dao->salvar($cliente);

if($resultado == 0){
	echo "<script>alert('Cadastrado com Sucesso.');</script>";
            echo ("<div class='divLoading' id='topo'>");
            echo ("<img src='../imagens/loading.gif' width='250' height='250'/> ");
            echo ("</div>");
            echo "<meta http-equiv='refresh' content='1;url=../painel/CadastroClientes.php'>";
}else{
	echo "<script>alert('Erro ao efetuar o cadastro.');</script>";
            echo ("<div class='divLoading' id='topo'>");
            echo ("<img src='../imagens/loading.gif' width='250' height='250'/> ");
            echo ("</div>");
            echo "<meta http-equiv='refresh' content='1;url=../painel/CadastroClientes.php'>";
			die();
} ?>


