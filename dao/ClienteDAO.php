<?php

class ClienteDAO {

    function inserirClientes(Clientes $cliente) {
        include ("ConnectionFactory.php");
        $sql = mysql_query("insert into clientes (dt_cadastro,
                                                        data_inicial,
                                                        data_final,
                                                        nome,
                                                        sobrenome,
                                                        cpf,
                                                        endereco,
                                                        bairro,
                                                        cep,
                                                        cidade,
                                                        email,
                                                        complemento,
                                                        senha,
                                                        nivel)
                                                        values (" . $cliente->getDataCadastro() . ",'" .
                $cliente->getDataInicial() . "','" .
                $cliente->getDataFinal() . "','" .
                $cliente->getNome() . "','" .
                $cliente->getSobrenome() . "','" .
                $cliente->getCpf() . "','" .
                $cliente->getEndereco() . "','" .
                $cliente->getBairro() . "','" .
                $cliente->getCep() . "','" .
                $cliente->getCidade() . "','" .
                $cliente->getEmail() . "','" .
		$cliente->getComplemento() . "','" .
                $senha . "'," .
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
        $sql = mysql_query("Select * from clientes where login='" . $cliente->getLogin()
                . "' and senha='" . $senhacript . "'");
        switch (true) {
            case mysql_errno($db) > 0: {
                    echo "Erro: " . mysql_errno() . "-" . mysql_error($db);
                    break;
                }
            case mysql_errno($db) == 0: {
                    $consulta = mysql_fetch_object($sql);
					$cliente->setNome($consulta->nome);
					$cliente->setDataCadastro($consulta->dt_cadastro);
					$cliente->setDataInicial($consulta->dt_inicial);
					$cliente->setDataFinal($consulta->dt_final);
					$cliente->setCpf($consulta->cpf);
					$cliente->setEndereco($consulta->endereco);
					$cliente->setCep($consulta->cep);
					$cliente->setComplemento($consulta->complemento);
					$cliente->setCodigo_plano($consulta->codigo_plano);
					$cliente->setLogin($consulta->login);
					$cliente->setCidade($consulta->cidade);
					$cliente->setNivel($consulta->nivel);// 1 administrador - 2 usuário
					
                    break;
                }
        }
        return $cliente;
    }
	

    function buscarTodos() {
        include ("Conexao.php");

        $sql = mysql_query("select * from cliente");

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

    function buscarPorCodigo(Cliente $cliente) {
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

    function alterar(Cliente $cliente) {
        include ("Conexao.php");
        $sql = mysql_query("update cliente set nome='" . $cliente->getNome() . "',
                                               telefone='" . $cliente->getTelefone() . "',
                                               celular='" . $cliente->getCelular() . "',
                                               email='" . $cliente->getEmail() . "',
                                               observacao='" . $cliente->getObservacao() . "',
                                               logradouro='" . $cliente->getLogradouro() . "',
                                               numero='" . $cliente->getNumero() . "',
                                               bairro='" . $cliente->getBairro() . "',
                                               cidade='" . $cliente->getCidade() . "',
                                               estado='" . $cliente->getEstado() . "',
                                               cpf='" . $cliente->getCpf() . "', 
                                               celular='" . $cliente->getCelular() . "',
                                               porcentagem=" . $cliente->getPorcentagem() . "
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
    
    function excluir(Cliente $cliente){
            include ("Conexao.php");
            
            $sql = mysql_query("delete from cliente where codigo=".$cliente->getCodigo());

            switch(true){
                case mysql_errno($db)>0:{
                    echo "Erro: ".mysql_errno()."-".mysql_error($db);
                    $query = mysql_query("ROLLBACK");
                    return 1;
                    break;
                }
                case mysql_errno($db)==0:{
                    $query = mysql_query("COMMIT");
                    return 0;
                    break;
                }
            }
            return 1;
        }

}

