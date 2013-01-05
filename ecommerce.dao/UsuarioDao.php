<?php

include_once '../conn/configuracao.php';
include_once '../ecommerce.bean/UsuarioBean.php';

class UsuarioDao {
    
    public function __construct() {
    }
    
    
    public function gravarUsuario(UsuarioBean $usuario){
     
        $inserirUsuario = mysql_query("INSERT INTO usuario (nome_usuario, nome_completo, endereco, numero, complemento, bairro, cidade, estado, pais, info_referencia, identifica_endereco, cep, telefone, celular, email, senha, cpf, sexo, data_nascimento, data_cadastro) VALUES ('".$usuario->getNome_Usuario()."','".$usuario->getNome_Completo()."','".$usuario->getEndereco()."','".$usuario->getNumero()."','".$usuario->getComplemento()."','".$usuario->getBairro()."','".$usuario->getCidade()."','".$usuario->getEstado()."','".$usuario->getPais()."','".$usuario->getInfo_Referencia()."','".$usuario->getIdentifica_Endereco()."','".$usuario->getCep()."','".$usuario->getTelefone()."','".$usuario->getCelular()."','".$usuario->getEmail()."','".$usuario->getSenha()."','".$usuario->getCpf()."','".$usuario->getSexo()."','".$usuario->getData_Nascimento()."','".$usuario->getData_Cadastro()."')");
        
        header("Location:http://".$_SERVER['SERVER_NAME']."/ecommerce/index.php");
        
    }
    
}

?>
