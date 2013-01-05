<script>
	function click(){
		//if(!(event.button==2)){
			var autorizacao = "sim";
			verificaAutorizacao(autorizacao);
		//}
	}
</script>
<?php
	
	include("conn/configuracao.php");
	
	
		//if(isset($_GET['cod'])){
			//$cod = $_GET['cod'];
		//}
	
		if(isset($_SESSION['id_usuario'])){
		   include('envio_carrinho_checkout.php');
		}//else{
		   //echo "<a href='login.php' onclick='alerta()' style='cursor:inherit;'><img src='img/btn_comprar.png' border='0' style='margin-top:-20px;' title='Fa&ccedil;a o login antes da compra' /></a>";
		//}
?>