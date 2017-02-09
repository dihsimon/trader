<?php
/**
 * Entidade da tabela Clientes
 * @author Diego Simon
 */
class Clientes {
    private $codigo;
    private $dataCadastro;
    private $dataInicial;
    private $dataFinal;
    private $nome;
    private $sobrenome;
    private $cpf;
    private $endereco;
    private $bairro;
    private $cep;
    private $cidade;
    private $email;
    private $complemento;
    private $senha;
    private $nivel;
    
    function getSobrenome() {
        return $this->sobrenome;
    }

    function getEmail() {
        return $this->email;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

        

    function getCodigo() {
        return $this->codigo;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function getDataInicial() {
        return $this->dataInicial;
    }

    function getDataFinal() {
        return $this->dataFinal;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCep() {
        return $this->cep;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getCodigoPlano() {
        return $this->codigoPlano;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
    }

    function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setCodigoPlano($codigoPlano) {
        $this->codigoPlano = $codigoPlano;
    }
	
	function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

}
?>
