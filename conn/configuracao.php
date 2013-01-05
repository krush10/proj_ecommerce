<?php 
//$host = "localhost";
//$usuario = "root";
//$senha = "";
//$banco = "ecommerce_db";

/* Área de Testes */

$host = "186.202.152.53";
$usuario = "comunicacaomac13";
$senha = "Krus2350";
$banco = "comunicacaomac13";

$conn = mysql_connect($host,$usuario,$senha);

$db = mysql_select_db($banco,$conn);

	if(!($conn)){
		header("Location:error.php");
	}
?>
