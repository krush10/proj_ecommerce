<?php

require_once "ecommerce.dao/HeaderDao.php";

class HeaderAction {
        
    public $headerdao;
    
    public function __construct(){ 
        $this->headerdao = new HeaderDao();
    }
    
    public function recuperarTitle(){
        return $this->headerdao->recuperarLojaNome();
        
    }
    
    public function recuperarLogo(){
        return $this->headerdao->recuperarLogo();
    }
    
    public function recuperarDadosLoja(){
        return $this->headerdao->recuperarDadosLoja();
    }
    
    
}

?>
