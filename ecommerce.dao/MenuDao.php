<?php

require_once "conn/configuracao.php";

class MenuDao {
    
    public function MenuDao(){}
    
    public function recuperarCategorias(){
        $lista = mysql_query("SELECT id, nome_categoria FROM categoria WHERE exibir='sim' AND destaque = 'sim' ORDER BY nome_categoria ASC");
           
        return $lista;
    }
  
    
    public function recuperarMenuLateral(){
        $lista = mysql_query("SELECT id, nome_categoria FROM categoria WHERE exibir='sim' ORDER BY nome_categoria ASC");
           
        return $lista;
    }
    
    
}

?>
