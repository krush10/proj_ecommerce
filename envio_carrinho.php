<?php

	include ('pgs.php');
	
	include ('conn/configuracao.php');
	
	
	if(isset($_GET['cod'])){
		$cod = $_GET['cod'];
	}
	
	if(isset($_SESSION['id_usuario'])){
		$id_comprador = $_SESSION['id_usuario'];
	}
	
	$Referencia = $id_comprador;
	
	
	$pgs = new pgs(array(
	  'email_cobranca' => 'cela_froes@hotmail.com',
	  'ref_transacao'=>$Referencia
	));

	$retorna_produto = mysql_query("SELECT * FROM cardapio_produto WHERE id = $cod");
	
	while($array = mysql_fetch_array($retorna_produto)){
		$nome_cardapio_produto = $array['nome_cardapio_produto'];
		$preco = $array['preco'];
		$cod = $array['id'];
	}
	
	
	$data = date("Y-m-d"); 
	
	$quantidade = 1;
               
	//$inserirCompra = mysql_query("INSERT INTO status_compra (data, id_cardapio_produto, id_usuario, status_transacao, valor_total) VALUES ('$data',$cod,$id_comprador,'Pendente',$preco)");
			   
	$pgs->adicionar(array(
	  array(
		"descricao"=>$nome_cardapio_produto,
		"valor"=>$preco,
		"quantidade"=>$quantidade,
		"id"=>$cod,
		//"id_vendedor"=>$id_usu,
		"id_comprador"=>$id_comprador
	  ),
	));
	
	$pgs->mostra();
	
?>