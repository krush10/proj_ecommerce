<?php
require_once "conn/configuracao.php";

class HomeDao {
   
    public function HomeDao(){}
       
    
    
    public function recuperarBannerLoja(){
        $lista = mysql_query("SELECT loja_banner FROM loja_banner");
        return $lista;
    }
    
    
}

?>
