<?php session_start(); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../painel/bootstrap/css/default.css" />
        <title></title>
    </head>
    <body>
        <?php
        include ("../dao/ClienteDAO.php");
        include ("../model/Clientes.php");

        $cliente = new Clientes();
        $cliente->setEmail($_POST["email"]);
        $cliente->setSenha($_POST["password"]);

        $dao = new ClienteDAO();
        $cliente = $dao->validaLogin($cliente);
        if ($cliente->getNivel() > 0) {
            echo "<script>alert('Bem vindo ao sistema " . $cliente->getNome() . "');</script>";
            $_SESSION['logado'] = serialize($cliente);
            echo ("<div class='divLoading' id='topo'>");
            echo ("<img src='../imagens/carregando.gif' width='250' height='250'/> ");
            echo ("</div>");
            echo "<meta http-equiv='refresh' content='1;url=../painel/Principal.php'>";
        } else {
            $cliente = new Clientes();
            $_SESSION['logado'] = serialize($cliente);
            echo "<script>alert('Erro ao logar');</script>";
            echo ("<div class='divLoading' id='topo'>");
            echo ("<img src='../imagens/carregando.gif' width='250' height='250'/> ");
            echo ("</div>");
            echo "<meta http-equiv='refresh' content='1;url=../painel/index.php'>";
        }
        ?>
    </body>
</html>
