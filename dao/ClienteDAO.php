<?php

class ClienteDAO {

    function inserirClientes(Clientes $cliente) {
        include ("ConnectionFactory.php");
        $senhacript = md5($cliente->getSenha() . "Kuhaku" . $cliente->getSenha());
        $sql = mysql_query("insert into clientes (data_cadastro,
                                                        data_inicial,
                                                        data_final,
                                                        nome,
                                                        apelido,
                                                        email,
                                                        interesses,
                                                        area_atuacao,
                                                        tempo_trader,
                                                        telefone,
                                                        celular,
                                                        facebook,
                                                        senha,
                                                        nivel)
                                                        values (" . $cliente->getDataCadastro() . ",'" .
                $cliente->getDataInicial() . "','" .
                $cliente->getDataFinal() . "','" .
                $cliente->getNome() . "','" .
                $cliente->getApelido() . "','" .
                $cliente->getEmail() . "','" .
                $cliente->getInteresses() . "','" .
                $cliente->getAreaAtuacao() . "','" .
                $cliente->getTempoTrader() . "','" .
                $cliente->getTelefone() . "','" .
                $cliente->getCelular() . "','" .
                $cliente->getFacebook() . "','" .
                $senhacript . "'," .
                $cliente->getNivel() . ")");

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

    function validaLogin(Clientes $cliente) {
        include ("ConnectionFactory.php");
        $senhacript = md5($cliente->getSenha() . "Kuhaku" . $cliente->getSenha());
        $sql = mysql_query("Select * from clientes where email='" . $cliente->getEmail()
                . "' and senha='" . $senhacript . "'");
        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    break;
                }
            case mysql_errno($db) == 0: {
                    $consulta = mysql_fetch_object($sql);
                    $cliente->setNome($consulta->nome);
                    $cliente->setApelido($consulta->apelido);
                    $cliente->setDataCadastro($consulta->dt_cadastro);
                    $cliente->setDataInicial($consulta->dt_inicial);
                    $cliente->setDataFinal($consulta->dt_final);
                    $cliente->setEmail($consulta->email);
                    $cliente->setInteresses($consulta->interesses);
                    $cliente->setAreaAtuacao($consulta->area_atuacao);
                    $cliente->setTempoTrader($consulta->tempo_trader);
                    $cliente->setTelefone($consulta->telefone);
                    $cliente->setCelular($consulta->celular);
                    $cliente->setFacebook($consulta->facebook);
                    $cliente->setNivel($consulta->nivel); // 1 administrador - 2 usuário
                    break;
                }
        }
        return $cliente;
    }

    function buscarPoCodigo($codigo) {
        include ("ConnectionFactory.php");
        $sql = mysql_query("select * from clientes where codigo = '$codigo';");

        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    break;
                }
            case mysql_errno($db) == 0: {
                    $cliente = new Clientes();
                    $consulta = mysql_fetch_object($sql);
                    $cliente->setNome($consulta->nome);
                    $cliente->setDataCadastro($consulta->dt_cadastro);
                    $cliente->setDataInicial($consulta->dt_inicial);
                    $cliente->setDataFinal($consulta->dt_final);
                    $cliente->setCpf($consulta->cpf);
                    $cliente->setEndereco($consulta->endereco);
                    $cliente->setCep($consulta->cep);
                    $cliente->setComplemento($consulta->complemento);
                    $cliente->setCidade($consulta->cidade);
                    $cliente->setEmail($consulta->email);
                    $cliente->setNivel($consulta->nivel); // 1 administrador - 2 usuário
                    $cliente->setCodigo($consulta->codigo); // 1 administrador - 2 usuário
                    break;
                }
        }
        return $cliente;
    }

    function validarCPF($cpf) {
        include ("ConnectionFactory.php");
        $sql = mysql_query("select * from clientes where cpf = '$cpf';");

        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    break;
                }
            case mysql_errno($db) == 0: {
                    $consulta = mysql_fetch_array($sql);
                    return $consulta[0];
                    break;
                }
        }
        return 1;
    }

    function validaEmail($email) {
        include ("ConnectionFactory.php");
        $sql = mysql_query("select * from clientes where email = '$email';");

        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    break;
                }
            case mysql_errno($db) == 0: {
                    $consulta = mysql_fetch_array($sql);
                    return $consulta[0];
                    break;
                }
        }
        return 1;
    }

    function buscarPorC(Cliente $cliente) {
        include ("Conexao.php");

        $sql = mysql_query("Select * from cliente where codigo=" . $cliente->getCodigo());

        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    break;
                }
            case mysql_errno($db) == 0: {
                    $consulta = mysql_fetch_array($sql);
                    $cliente->setNome($consulta[1]);
                    $cliente->setTelefone($consulta[2]);
                    $cliente->setCelular($consulta[3]);
                    $cliente->setEmail($consulta[4]);
                    $cliente->setObservacao($consulta[5]);
                    $cliente->setLogradouro($consulta[6]);
                    $cliente->setNumero($consulta[7]);
                    $cliente->setBairro($consulta[8]);
                    $cliente->setCidade($consulta[9]);
                    $cliente->setEstado($consulta[10]);
                    $cliente->setRg($consulta[11]);
                    $cliente->setCpf($consulta[12]);
                    $cliente->setPorcentagem($consulta[13]);
                    $cliente->setCodigo($consulta[0]);

                    break;
                }
        }
        return $cliente;
    }

    function alterar(Clientes $cliente) {
        include ("ConnectionFactory.php");
        $senhacript = md5($cliente->getSenha() . "Kuhaku" . $cliente->getSenha());
        $sql = mysql_query("update cliente set nome='" . $cliente->getNome() . "',
                                               apelido='" . $cliente->getApelido() . "',
                                               email='" . $cliente->getEmail() . "',
                                               interesses='" . $cliente->getInteresses() . "',
                                               area_atuacao='" . $cliente->getAreaAtuacao() . "',
                                               tempo_trader='" . $cliente->getTempoTrader() . "',
                                               telefone='" . $cliente->getTelefone() . "',
                                               celular='" . $cliente->getCelular() . "',
                                               facebook='" . $cliente->getFacebook() . "',
                                               senha='" . $senhacript . "'
                                               where codigo=" . $cliente->getCodigo());

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

    function excluir(Cliente $cliente) {
        include ("Conexao.php");

        $sql = mysql_query("delete from cliente where codigo=" . $cliente->getCodigo());

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

}
