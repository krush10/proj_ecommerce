<?php
require_once "conn/configuracao.php";

class HeaderDao {
    
    public function HeaderDao(){}
    
    
    public function recuperarLojaNome(){
        $query = mysql_query("SELECT loja_nome FROM loja_nome");
        $array = @mysql_fetch_array($query);
        $loja_nome = $array['loja_nome'];
        return $loja_nome;
    }
    
    public function recuperarLogo(){
        $query = mysql_query("SELECT loja_logo FROM loja_logo");
        $array = @mysql_fetch_array($query);
        $loja_logo = $array['loja_logo'];
        return $loja_logo;
    }
    
    public function recuperarDadosLoja(){
        $lista = mysql_query("SELECT loja_email, loja_telefone FROM loja_dados");
           
        return $lista;
    }
    
    
}

?>
