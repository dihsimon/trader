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
    private $apelido;
    private $email;
    private $interesses;
    private $areaAtuacao;
    private $tempoTrader;
    private $Telefone;
    private $celular;
    private $senha;
    private $facebook;
    private $nivel;
    
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

    function getApelido() {
        return $this->apelido;
    }

    function getEmail() {
        return $this->email;
    }

    function getInteresses() {
        return $this->interesses;
    }

    function getAreaAtuacao() {
        return $this->areaAtuacao;
    }

    function getTempoTrader() {
        return $this->tempoTrader;
    }

    function getTelefone() {
        return $this->Telefone;
    }

    function getCelular() {
        return $this->celular;
    }

    function getSenha() {
        return $this->senha;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function getNivel() {
        return $this->nivel;
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

    function setApelido($apelido) {
        $this->apelido = $apelido;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setInteresses($interesses) {
        $this->interesses = $interesses;
    }

    function setAreaAtuacao($areaAtuacao) {
        $this->areaAtuacao = $areaAtuacao;
    }

    function setTempoTrader($tempoTrader) {
        $this->tempoTrader = $tempoTrader;
    }

    function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }


}
?>
