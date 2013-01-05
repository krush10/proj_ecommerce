<?php

require_once "ecommerce.dao/ProdutoDao.php";

class ProdutoAction {
    
    public $produtoDao;
    public $id_produto;
    
    public function __construct() {
        $this->produtoDao = new ProdutoDao();
        $this->id_produto = $_GET['p'];
    }
    
    public function recuperarProduto(){
        return $this->produtoDao->recuperarProduto($this->id_produto);
    }
    
}

?>
