<?php session_start();?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include ("../dao/ClienteDAO.php");
            include ("../model/Clientes.php");
            
            $cliente = new Clientes();
            $cliente->setLogin($_POST["login"]);
            $cliente->setSenha($_POST["password"]);
            
            $dao = new ClienteDAO();
            $cliente = $dao->validaLogin($cliente);
            if ($cliente->getNivel()>0){
                echo "<script>alert('Bem vindo ao sistema ".$cliente->getLogin()."');</script>";
                $_SESSION['logado'] = serialize($usuario);
                echo "<meta http-equiv='refresh' content='1;url=../painel/Principal.php'>";
            }else{
                $cliente = new Clientes();
                $_SESSION['logado'] = serialize($cliente);
                echo "<script>alert('Erro ao logar');</script>";
                echo "<meta http-equiv='refresh' content='1;url=../painel/index.php'>";
            }
        ?>
    </body>
</html>
