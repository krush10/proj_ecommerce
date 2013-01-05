<?php
	ob_start();
	session_start();


	unset($_SESSION['lista_produtos']);
	unset($_SESSION['array_produtos']["quantidade"]);
	
	$i = array(0,1,2,3,4,5,6,7,8,9);
	foreach($i as $x){
		unset($_SESSION['qtd'.$x]);
	}
	
	$_SESSION['lista_produtos'] = array();
	
	header("Location:carrinho.php");
?>