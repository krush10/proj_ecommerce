<?php

require_once "ecommerce.dao/CategoriaDao.php";

class CategoriaAction {
    
    public $categoriaDao;
    public $id_categoria;
    public $id_subcategoria;
    
    public function __construct() {
        $this->categoriaDao = new CategoriaDao();
        $this->id_categoria = $_GET['c'];
        //$this->id_subcategoria = $_GET['sc'];
    }
    
    public function recuperarSubCategorias(){
        return $this->categoriaDao->recuperarSubCategoria($this->id_categoria); 
    }
    
    public function recuperarProdutoCategoria(){
        return $this->categoriaDao->recuperarProdutoCategoria($this->id_categoria); 
    }
    
    //public function recuperarProdutoSubCategoria(){
        //return $this->categoriaDao->recuperarProdutoSubCategoria($this->id_categoria,$this->id_subcategoria); 
    //}
    
}

?>
