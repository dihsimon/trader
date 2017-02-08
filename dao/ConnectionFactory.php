<?php
    global $db;
    global $banco;
    $SERVIDOR="localhost";
    $USUARIO="root";
    $SENHA="3506";
    $NOMEDABASE="trader";    
    $err_level = error_reporting(0);  
    $db= mysql_connect($SERVIDOR,$USUARIO,$SENHA) or die ("Erro ao conectar ao banco.");  
    $banco=mysql_select_db($NOMEDABASE,$db) or die ("Problemas ao escolher a base de dados");
?>