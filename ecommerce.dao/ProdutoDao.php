<?php


class ProdutoDao {
    
    public function __construct() {
    }
    
    public function recuperarProduto($id){
        
        $lista = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.preco as preco, p.id_categoria as id_categoria, p.descricao as descricao, p.estoque as estoque, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE p.exibir = 'sim' AND p.id = $id");
        
        return $lista;
    }
    
}

?>
