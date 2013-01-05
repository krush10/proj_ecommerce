<?php
	ob_start();
	session_start();
	
	//Altera/exclui array na sessão
	$id = $_GET['i'];
	//$chave = array_search($id, $_SESSION['lista_produtos']); //localiza o valor na array
	//if($_SESSION['lista_produtos'] == $id){
		//unset($_SESSION['lista_produtos']);	
	//}
	
	$contador = 0;
	foreach($_SESSION['lista_produtos'] as $id_produto){
			
		if($id_produto == $id){
			unset($_SESSION['lista_produtos'][$contador]);	
			unset($_SESSION['fecharcompra'][$contador]);	
			clearstatcache();
		}	
			
		$contador = $contador + 1;	
	}
	
	
	//echo $chave;
	header("Location:carrinho.php");

	//echo "<script>history.go(-2);<script>";

?>