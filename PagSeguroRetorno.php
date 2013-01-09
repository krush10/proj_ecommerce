<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="refresh" content="7;URL=http://www.krush.com.br/testes/ecommerce/">
<?php 
include 'PagSeguroRetornoConfig.php'; 
include 'PagSeguroRetornoFuncoes.php';
define('TOKEN', $retorno_token);
echo "<body style='margin-top:0px; margin-left:0px; margin-right:0px; margin-bottom:0px;'>";
	echo "<div class='header_max' style='width:100%; height:5px; background:#CCC;'>";
	echo "</div>";
	echo "<div class='header' style='width:600px; height:150px; background:#FFF; margin:0 auto;'>";
	echo "</div>";
	echo "<div class='corpo' style='width:600px; height:300px; background:#F8F8F8; margin:0 auto;'>";
		echo "<strong><font style='font-family:Arial; font-size:16px; position:absolute; top:180px; margin-left:217px;'>Transa&ccedil;&atilde;o conclu&iacute;da !</font></strong>";
		echo "<br /><br />";
		echo "<p align='center' style='width:600px;'><font style='font-family:Arial; font-size:13px;'>Dentro de instantes voc&ecirc; receber&aacute; um email de confirma&ccedil;&atilde;o com os detalhes da transa&ccedil;&atilde;o, caso deseje acessar seu painel do PagSeguro, <a style='color:#000; text-decoration:none;' href='https://pagseguro.uol.com.br/' target='_blank'><strong>clique aqui.</strong></a></font></p>";
	echo "</div>";
if (count($_POST) > 0) {
	
	$npi = new PagSeguroNpi();
	$result = $npi->notificationPost();
	
	$transacaoID = isset($_POST['TransacaoID']) ? $_POST['TransacaoID'] : '';
	
	if ($result == "VERIFICADO") {
		
		// Recebendo Dados
		$VendedorEmail  = $_POST['VendedorEmail'];
		$TransacaoID = $_POST['TransacaoID'];
		$Referencia = $_POST['Referencia'];
		$Extras = MoedaBR($_POST['Extras']);
		$TipoFrete = $_POST['TipoFrete'];
		$ValorFrete = MoedaBR($_POST['ValorFrete']);
		$DataTransacao = ConverterData($_POST['DataTransacao']);
		$Anotacao = $_POST['Anotacao'];
		$TipoPagamento = $_POST['TipoPagamento'];
		$StatusTransacao = $_POST['StatusTransacao'];

		$CliNome = $_POST['CliNome'];
		$CliEmail = $_POST['CliEmail'];
		$CliEndereco = $_POST['CliEndereco'];
		$CliNumero = $_POST['CliNumero'];
		$CliComplemento = $_POST['CliComplemento'];
		$CliBairro = $_POST['CliBairro'];
		$CliCidade = $_POST['CliCidade'];
		$CliEstado = $_POST['CliEstado'];
		$CliCEP = $_POST['CliCEP'];
		$CliTelefone = $_POST['CliTelefone'];

		$NumItens = $_POST['NumItens'];
                
                mysql_query("INSERT into ciclo_compra (cod_transacao,ciclo_status) VALUES ('$transacaoID','')");
		
		// Gravando Dados
		mysql_query("INSERT into pagsegurotransacoes SET
		VendedorEmail='$VendedorEmail',	
		TransacaoID='$TransacaoID',	
		Referencia='$Referencia',	
		Extras='$Extras',	
		TipoFrete='$TipoFrete',	
		ValorFrete='$ValorFrete',	
		DataTransacao='$DataTransacao',	
		Anotacao='$Anotacao',	
		TipoPagamento='$TipoPagamento',	
		StatusTransacao='$StatusTransacao',	
		CliNome='$CliNome',	
		CliEmail='$CliEmail',	
		CliEndereco='$CliEndereco',	
		CliNumero='$CliNumero',	
		CliComplemento='$CliComplemento',	
		CliBairro='$CliBairro',	
		CliCidade='$CliCidade',	
		CliEstado='$CliEstado',	
		CliCEP='$CliCEP',	
		CliTelefone='$CliTelefone',	
		NumItens='$NumItens',	
		Data=now();");

		// Recebendo e gravando produtos
		$Processo = mysql_query("SELECT VendedorEmail FROM pagseguroprodutos WHERE VendedorEmail='$VendedorEmail' AND TransacaoID='$TransacaoID'");
		if (mysql_num_rows($Processo)==0) {
			for($i=1;$i<=$NumItens;$i++) {
				
				$ProdID = $_POST["ProdID_{$i}"];
				$ProdDescricao = $_POST["ProdDescricao_{$i}"];
				$ProdValor = MoedaBR($_POST["ProdValor_{$i}"]);
				$ProdQuantidade = $_POST["ProdQuantidade_{$i}"];
				$ProdFrete = MoedaBR($_POST["ProdFrete_{$i}"]);
		
				mysql_query("INSERT into pagseguroprodutos SET
				VendedorEmail='$VendedorEmail',	
				TransacaoID='$TransacaoID',	
				Ordem='$i',	
				ProdID='$ProdID',	
				ProdDescricao='$ProdDescricao',	
				ProdValor='$ProdValor',	
				ProdQuantidade='$ProdQuantidade',	
				ProdFrete='$ProdFrete'");			
			}
		}
		
	} 
} else {
}
	echo "<div class='footer' style='width:600px; height:70px; background:#CCC; margin:0 auto;'></div>";
echo "</body>";
?>