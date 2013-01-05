<?php session_start();
include("ecommerce.action/HeaderAction.php"); 
include("ecommerce.action/MenuAction.php"); 
include("conn/configuracao.php");
include("frete.php");
?>
<?php 
$headerAction = new HeaderAction();
$menuAction = new MenuAction();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <?php echo "<title>". $headerAction->recuperarTitle() ."</title>"; ?>
        <link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/menu_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/banner_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/carrinho_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
        <script>
        
            function alterarQuant(produto){
		var nomeID = "caixa_qant_"+produto;
		var quant = document.getElementById(nomeID).value;	
		var prod = produto;
		location.href="altera-qtd.php?i="+quant+"&p="+prod;
            }
        
        </script>
    </head>
    <body>
        <?php include_once("header.php"); ?>
        <?php include_once("menu.php"); ?>
        <div class="corpo">
            <div id="verifica_frete">
                <form action="carrinho.php" method="post">
                    <input type="hidden" value="30" name="nVlComprimento" id="nVlComprimento" />
                    <input type="hidden" value="25" name="nVlAltura" id="nVlAltura" />
                    <input type="hidden" value="20" name="nVlLargura" id="nVlLargura" />
                <table>
                	<tr><td>&nbsp;</td></tr>
                    <tr>
                    	<td><font style="margin-left:10px;">Consulte o prazo de entrega e o frete para seu CEP: <input type="text" name="sCepDestino" id="sCepDestino" onkeypress="return txtBoxFormat(this, '99999999', event);" style="background:#e2e2e2; border:#e2e2e2; height:22px; width:120px;" /></td>
                        <td><input type="submit" value="busca" /></td>
                        <td><a href="http://www.buscacep.correios.com.br/" target="_blank" style="font-size:11px; color:#555; margin-left:10px;">Procurar CEP</a></td>
                    </tr>
                </table>
                	<?php  
                        echo "<font style='position:absolute; top:295px; margin-left:374px; font-size:11px;'>". $resultadoFrete ."</font>"; 
                        ?>
                </form>
            </div>
            <div id="conteudo">
                <?php
                
                    echo "<table id='topo_carrinho'>";
                    echo "<tr>";
                        echo "<td width='411' style='border-right:1px solid #FFF;'>Produto</td>";
                        echo "<td width='80' align='center' style='border-right:1px solid #FFF;'>Quantidade</td>";
                        echo "<td width='124' align='center' style='border-right:1px solid #FFF;'>Valor Unit&aacute;rio</td>";
                        echo "<td align='center'>Valor Total</td>";	
                    echo "</tr>";
                    echo "</table>";
                    
                    //Recupera codigo do produto
                    if(isset($_POST['codigo'])){
                        $codigo = $_POST['codigo'];	 
                    }else{
                        $codigo = "";
                    }
                    
                    if(!(isset($_SESSION["lista_produtos"]))){
                        $_SESSION["lista_produtos"] = array();
                    }else if(sizeof($_SESSION["lista_produtos"]) == 0){
                        $_SESSION["lista_produtos"] = array();
                    }

                    if (in_array($codigo, $_SESSION["lista_produtos"])) { 

                    }else{
                        $_SESSION["lista_produtos"][] = $codigo; 
                    }
					 
                    echo "<table id='conteudo_carrinho'>";
                    $i = 0;
                    $total_geral = 0;
                    $_SESSION['qtd'] = 0;
                    $_SESSION['array_produtos'][$i] = array();
                    foreach($_SESSION['lista_produtos'] as $id){

                        echo "<input type='hidden' value='$i' id='contador' />";
						
                        $query = mysql_query("SELECT id, nome_produto, preco, largura, altura, comprimento FROM produto WHERE id =" . $id . " ");
                        
                        if($query)
                        while($array = mysql_fetch_array($query)){
                            $id = $array['id'];
                            $nome_produto = $array['nome_produto'];
                            $preco = $array['preco'];
                                
                                if(!(isset($_SESSION['qtd'.$i]))){
                                    $_SESSION['qtd'.$i] = 0;
                                } 

                                $_SESSION['num_produtos'] = $_SESSION['qtd'.$i];

                                $_SESSION['array_produtos'][$i] = array(
                                "id"=>$i,
                                "id_produto"=>$id,
                                "nome_produto"=>$nome_produto,
                                "preco"=>$preco,
			        "quantidade"=> $_SESSION['qtd'.$i]
                                );
							
                            if($_SESSION['array_produtos'][$i]['quantidade'] == 0){
                                    $_SESSION['array_produtos'][$i]['quantidade'] = 1;	
                                    $_SESSION['qtd'.$i] = 1;
                            }
							
			    $total_geral = $total_geral + ($_SESSION['array_produtos'][$i]["preco"] * $_SESSION['array_produtos'][$i]["quantidade"]) + ($valor_frete * $_SESSION['array_produtos'][$i]["quantidade"]);
							
                            echo "<tr>";
                                echo "<td width='409' style='border-right:1px solid #FFF;'>". $_SESSION['array_produtos'][$i]["nome_produto"] . "</td>";
                                echo "<td width='80' align='center' style='border-right:1px solid #FFF;'>";
                                echo "<input type='text' name='quantidade' id='caixa_qant_".$i."' value='". $_SESSION['array_produtos'][$i]['quantidade'] ."' style='width:20px; background-color:#e2e2e2; border:1px solid #e2e2e2;' />";
                                echo "<p style='margin-top:0px; margin-left:-23px;'><a style='font-size:10px; color:#222;' href='excluindo-produto.php?i=". $_SESSION['array_produtos'][$i]["id_produto"] ."'>Retirar</a></p>";
                                echo "<p style='margin-top:-6px; margin-left:0px;'><a style='font-size:10px; color:#222;' href='#' onclick='alterarQuant(". $_SESSION['array_produtos'][$i]["id"] .")'>Alterar Qtde</a></p>";
                                echo "</td>";
                                echo "<td width='123' align='center' style='border-right:1px solid #FFF;'> R$ ". number_format($_SESSION['array_produtos'][$i]["preco"], 2, ',', '.') . "</td>";
                                echo "<td></td>";	
                            echo "</tr>";
                            
                            $i = $i + 1; 
                        }
                     }	
					 
                     echo "</table>";
					 
		     $_SESSION['valor_frete'] = $valor_frete;      
					 
                     echo "<font style='margin-left:781px; position:absolute; top:424px; font-family: Arial; font-size:13px;'>R$ ". number_format($total_geral,2,",",".") ."</font>";
                     echo "<p><font style='margin-left:784px; font-family: Arial; font-size:15px;'><strong>SUBTOTAL: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  R$". number_format($total_geral,2,",",".") ."</strong></font></p>";
                     echo "<p><font style='margin-left:832px; font-family: Arial; font-size:16px;'><strong>TOTAL: R$". number_format($total_geral,2,",",".") ."</strong></font></p>";
		     echo "<a style='font-size:12px; font-family: Arial; color:#333; margin-left:2px;' href='limpar-carrinho.php'>Esvaziar carrinho de compras</a>";
                     
                     echo sizeof($_SESSION['lista_produtos']);
                     
                     if(sizeof($_SESSION['lista_produtos']) == 1){
                        echo "<a href='javascript:void(0)' title='Carrinho vazio'><img src='img/btn_finalizar_compra.png' border='0' class='btn_finalizar' /></a>"; 
                     }else if(!(isset($_SESSION['id_usuario']))){
                        echo "<a href='login.php'><img src='img/btn_finalizar_compra.png' border='0' class='btn_finalizar' /></a>";
                     }else if( (sizeof($_SESSION['lista_produtos']) > 1) && (isset($_SESSION['id_usuario'])) && ($valor_frete != 0) ){
                        echo "<a href='checkout.php'><img src='img/btn_finalizar_compra.png' border='0' class='btn_finalizar' /></a>";
                     }else if( (sizeof($_SESSION['lista_produtos']) > 1) && (isset($_SESSION['id_usuario'])) && ($valor_frete == 0) ){
                        echo "<a href='javascript:void(0)' title='Consulte seu frete'><img src='img/btn_finalizar_compra.png' border='0' class='btn_finalizar' /></a>"; 
                     }  
                ?> 
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
