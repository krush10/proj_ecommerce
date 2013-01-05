<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioBean
 *
 * @author win
 */
class UsuarioBean {
    
    private $nome_usuario;
    private $nome_completo;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $pais;
    private $info_referencia;
    private $identifica_endereco;
    private $cep;
    private $telefone;
    private $celular;
    private $email;
    //private $usuario;
    private $senha;
    private $cpf;
    private $sexo;
    private $data_nascimento;
    private $data_cadastro;
    
    
    
    public function __construct() {
    }
    
    
    public function getNome_Usuario(){
        return $this->nome_usuario;
    }
    public function setNome_Usuario($nome_usuario){
        $this->nome_usuario = $nome_usuario;
    }
    
    public function getNome_Completo(){
        return $this->nome_completo;
    }
    public function setNome_Completo($nome_completo){
        $this->nome_completo = $nome_completo;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    
    public function getComplemento(){
        return $this->complemento;
    }
    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }
    
    public function getBairro(){
        return $this->bairro;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    
    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    public function getPais(){
        return $this->pais;
    }
    public function setPais($pais){
        $this->pais = $pais;
    }
    
    public function getInfo_Referencia(){
        return $this->info_referencia;
    }
    public function setInfo_Referencia($info_referencia){
        $this->info_referencia = $info_referencia;
    }
    
    public function getIdentifica_Endereco(){
        return $this->identifica_endereco;
    }
    public function setIdentifica_Endereco($identifica_endereco){
        $this->identifica_endereco = $identifica_endereco;
    }
    
    public function getCep(){
        return $this->cep;
    }
    public function setCep($cep){
        $this->cep = $cep;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    
    public function getCelular(){
        return $this->celular;
    }
    public function setCelular($celular){
        $this->celular = $celular;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    
    /*public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }*/
    
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    
    public function getSexo(){
        return $this->sexo;
    }
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    
    public function getData_Nascimento(){
        return $this->data_nascimento;
    }
    public function setData_Nascimento($data_nascimento){
        $this->data_nascimento = $data_nascimento;
    }
    
    public function getData_Cadastro(){
        return $this->data_cadastro;
    }
    public function setData_Cadastro($data_cadastro){
        $this->data_cadastro = $data_cadastro;
    }
    
}

?>
