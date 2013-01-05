<?php
	
	include("conn/configuracao.php");
				
	if($_GET['p']){
            $id_produto = $_GET['p'];
	}
	
	$buscaMaisAcessado = mysql_query("SELECT COUNT(produto_cont) as contador FROM produto_mais_acessado WHERE id_produto = $id_produto");
	
	while($array = mysql_fetch_array($buscaMaisAcessado)){
            $contador = $array['contador'];
	}
	
	if($contador ==	0){
		$query_inicia = mysql_query("INSERT INTO produto_mais_acessado(produto_cont,id_produto) VALUES (1,$id_produto);");
	}else{
		$query_incremento = mysql_query("UPDATE produto_mais_acessado SET produto_cont = (produto_cont+1) WHERE id_produto = $id_produto;");
	}
?>