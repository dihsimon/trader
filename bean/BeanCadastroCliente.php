<?php session_start(); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../painel/bootstrap/css/default.css" />
    </head>
    <body>
        <?php
        require_once ("../dao/ClienteDAO.php");
        require_once ("../model/Clientes.php");
        $cliente = new Clientes();
        $dao = new ClienteDAO();
        $cliente->setNome($_POST['nome']);
        $cliente->setSobrenome($_POST['sobrenome']);
        $cliente->setDataCadastro('now()');
        $cliente->setDataInicial('2017-00-00');
        $cliente->setDataFinal('2017-00-00');
        $cliente->setCpf($_POST['cpf']);
        $cliente->setEndereco($_POST['endereco']);
        $cliente->setBairro($_POST['bairro']);
        $cliente->setCep($_POST['cep']);
        $cliente->setCidade($_POST['cidade']);
        $cliente->setEmail($_POST['email']);
        $cliente->setComplemento($_POST['complemento']);
        $cliente->setSenha($_POST['password']);
        $cliente->setNivel(2);

        $resultado = $dao->inserirClientes($cliente);

        if ($resultado == 0) {
            echo "<script>alert('Cadastrado com Sucesso.');</script>";
            echo ("<div class='divLoading' id='topo'>");
            echo ("<img src='../imagens/carregando.gif' width='250' height='250'/> ");
            echo ("</div>");
            echo "<meta http-equiv='refresh' content='1;url=../painel/index.php'>";
        } else {
            echo "<script>alert('Erro ao efetuar o cadastro.');</script>";
            echo ("<div class='divLoading' id='topo'>");
            echo ("<img src='../imagens/carregando.gif' width='250' height='250'/> ");
            echo ("</div>");
            echo "<meta http-equiv='refresh' content='1;url=../cadastro/index.html'>";
            die();
        }
        ?>
    </body>
</html>



