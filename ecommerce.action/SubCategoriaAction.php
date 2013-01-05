<?php

require_once "ecommerce.dao/SubCategoriaDao.php";

class SubCategoriaAction {
    
    public $subCategoriaDao;
    public $id_categoria;
    public $id_subcategoria;
    
    public function __construct() {
        $this->subCategoriaDao = new SubCategoriaDao();
        $this->id_categoria = $_GET['c'];
        $this->id_subcategoria = $_GET['sc'];
    }
    
    public function recuperarSubCategorias(){
        return $this->subCategoriaDao->recuperarSubCategoria($this->id_categoria); 
    }
    
    public function recuperarProdutoSubCategoria(){
        return $this->subCategoriaDao->recuperarProdutoSubCategoria($this->id_categoria,$this->id_subcategoria); 
    }
    
}

?>
