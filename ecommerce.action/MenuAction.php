<?php

require_once "ecommerce.dao/MenuDao.php";

class MenuAction {
    
    public $menudao;
    
    public function __construct() {
        $this->menudao = new MenuDao();
    }
    
    public function recuperarCategoria(){
        return $this->menudao->recuperarCategorias();
    }
    
    
    public function recuperarMenuLateral(){
        return $this->menudao->recuperarMenuLateral();
    }
    
}

?>
