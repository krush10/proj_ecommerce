<?php
	session_start();
	ob_start();
	
	//Altera/exclui array na sessão
	$numero_produtos = $_GET['i'];
	
	$id = $_GET['p'];
	
	$_SESSION['qtd'.$id] = $numero_produtos;
	
	$_SESSION['array_produtos'][$id]["quantidade"] = $_SESSION['qtd'][$id];
	
	echo "<script>location.href='carrinho.php'</script>";
	
?>