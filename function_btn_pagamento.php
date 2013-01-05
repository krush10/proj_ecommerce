<?php
	
	include("conn/configuracao.php");
	
	
		if(isset($_GET['cod'])){
                    $cod = $_GET['cod'];
		} 
	
		if(isset($_SESSION['id_usuario'])){
		   //include('envio_carrinho.php');
		   echo "<form action='carrinho.php' method='post'>";
		   		echo "<input type='hidden' value='$cod' name='codigo' />";
		   		echo "<input type='image' src='img/btn_comprar.png' width='123' height='62' border='0' style='margin-top:-90px; margin-left:390px;' />";
		   echo "</form>";
		}else{
		   echo "<form action='carrinho.php' method='post'>";
		   		echo "<input type='hidden' value='$cod' name='codigo' />";
		   		echo "<input type='image' src='img/btn_comprar.png' width='123' height='62' border='0' style='margin-top:-90px; margin-left:390px;' />";
		   echo "</form>";
		}
?>