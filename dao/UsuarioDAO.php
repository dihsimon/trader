<?php

class UsuarioDAO {
    function ValidaLogin(Usuarios $usuario) {
        include ("ConnectionFactory.php");
        $senhacript = md5($usuario->getSenha() . "Kuhaku" . $usuario->getSenha());
        $sql = mysql_query("Select * from usuarios where login='" . $usuario->getLogin()
                . "' and senha='" . $senhacript . "'");
        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    break;
                }
            case mysql_errno($db) == 0: {
                    $consulta = mysql_fetch_array($sql);
                    $usuario->setNivel($consulta[3]);
                    $usuario->setCodigo($consulta[0]);
                    break;
                }
        }
        return $usuario;
    }

    function inserir(Usuario $usuario) {
        include ("ConnectionFactory.php");
        $senhacript = md5($usuario->getSenha() . "Kuhaku" . $usuario->getSenha());

        $sql = mysql_query("insert into usuarios (login,
                                                senha,
                                                nivel)
                                                     values ('" . $usuario->getLogin() . "','" .
                $senhacript . "','" .
                $usuario->getNivel() . "')");

        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    $query = mysql_query("ROLLBACK");
                    return 1;
                    break;
                }
            case mysql_errno($db) == 0: {
                    $query = mysql_query("COMMIT");
                    return 0;
                    break;
                }
        }
        return 1;
    }

    function alterar(Usuario $usuario) {
        include ("ConnectionFactory.php");

        $senhacript = md5($usuario->getSenha() . "Kuhaku" . $usuario->getSenha());

        $sql = mysql_query("update usuarios set login='" . $usuario->getLogin() . "', 
                                                   senha='" . $senhacript . "', 
                                                   nivel=" . $usuario->getNivel() . "
                                                    where codigo=" . $usuario->getCodigo());

        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    $query = mysql_query("ROLLBACK");
                    return 1;
                    break;
                }
            case mysql_errno($db) == 0: {
                    $query = mysql_query("COMMIT");
                    return 0;
                    break;
                }
        }
        return 1;
    }

    function excluir(Usuario $usuario) {
        include ("ConnectionFactory.php");
        $sql = mysql_query("delete from usuarios where codigo=" . $usuario->getCodigo());

        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    $query = mysql_query("ROLLBACK");
                    return 1;
                    break;
                }
            case mysql_errno($db) == 0: {
                    $query = mysql_query("COMMIT");
                    return 0;
                    break;
                }
        }
        return 1;
    }

    function buscarPorCodigo(Usuario $usuario) {

        $sql = mysql_query("Select * from usuarios where codigo=" . $usuario->getCodigo());

        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    break;
                }
            case mysql_errno($db) == 0: {
                    $consulta = mysql_fetch_array($sql);
                    $usuario->setLogin($consulta[1]);
                    $usuario->setSenha($consulta[2]);
                    $usuario->setNivel($consulta[3]);
                    $usuario->setCodigo($consulta[0]);
                    break;
                }
        }
        return $usuario;
    }

    function buscarTodos() {
        include ("ConnectionFactory.php");
        $sql = mysql_query("select * from usuarios");

        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    break;
                }
            case mysql_errno($db) == 0: {
                    return $sql;
                    break;
                }
        }
        return 1;
    }

}
