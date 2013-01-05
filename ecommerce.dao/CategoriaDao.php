<?php


class CategoriaDao {
    
    public function __construct() {
    }
    
    public function recuperarSubCategoria($id){
        
        $lista = mysql_query("SELECT id, nome_sub_categoria FROM sub_categoria WHERE id_categoria = $id");
        
        return $lista;
    }
    
    public function recuperarProdutoCategoria($id){
        
        $lista = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.preco as preco, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE p.exibir = 'sim' AND id_categoria = $id AND p.estoque > 0 ORDER BY p.id DESC LIMIT 20");
        
        return $lista;
    }
    
    
    //public function recuperarProdutoSubCategoria($id_c, $id_s){
        
        //$lista = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.preco as preco, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE p.exibir = 'sim' AND id_categoria = $id_c AND id_subcategoria = $id_s AND p.estoque > 0 ORDER BY p.id DESC LIMIT 20");
        
        //return $lista;
    //}
    
}

?>
