<?php 
    date_default_timezone_set('America/Sao_Paulo');
    if (!isset($_SESSION['logado'])){
        echo "<script> alert('Você precisa estar logado no sistema.');</script>";
        echo "<meta http-equiv='refresh' content='1;url=../login/index.php'";
    }else{
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once (__ROOT__.'/model/Usuarios.php');
        $cliente = new Clientes();
        $cliente = unserialize($_SESSION['logado']);
        if ($cliente->getNivel()==1 || $cliente->getNivel()==2){            
            require_once(__ROOT__.'/painel/Menu.php');   
        }else{
            echo "<meta http-equiv='refresh' content='1;url=../painel/index.php'";
            die();
        }
    }
?>