<?php session_start();
include("ecommerce.action/HeaderAction.php"); 
include("ecommerce.action/MenuAction.php"); 
include("ecommerce.action/HomeAction.php"); 
include("conn/configuracao.php");
?>
<?php 
$headerAction = new HeaderAction();
$menuAction = new MenuAction();
$homeAction = new HomeAction();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <?php echo "<title>". $headerAction->recuperarTitle() ."</title>"; ?>
        <link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/menu_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/checkout_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
    </head>
    <body>
        <?php include_once("header.php"); ?>
        <?php include_once("menu.php"); ?>
        <div class="corpo">
            <div id="conteudo">
            <table>
            <tr>
                <td><font style="font-size:23px; color:#333;">Conclus&atilde;o do Pedido</font></td>
            </tr>
            </table>
            <table>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td width="300"><font style="font-size:18px; color:#464646;">Seu Pedido</font></td>
                <td><font style="font-size:18px; color:#464646;"></font></td>
            </tr>
            <?php 
            $i = 0;
            $valor_total = 0;
            $valor_frete = $_SESSION['valor_frete'];
            foreach($_SESSION['lista_produtos'] as $id){

            $query = mysql_query("SELECT id, nome_produto, preco, largura, altura, comprimento FROM produto WHERE id=" . $id . " ");

            if($query)	
            while($array = mysql_fetch_array($query)){
            $id = $array['id'];
            $nome_produto = $array['nome_produto'];
            $preco = $array['preco'];

            $_SESSION['qtd'.$i];

            $_SESSION['num_produtos'] = $_SESSION['qtd'.$i];

            $_SESSION['array_produtos'][$i] = array(
            "id"=>$i,
            "id_produto"=>$id,
            "nome_produto"=>$nome_produto,
            "preco"=>$preco,
            "quantidade"=> $_SESSION['qtd'.$i]
            );

            $valor_total = $valor_total + ($_SESSION['array_produtos'][$i]["preco"] * $_SESSION['array_produtos'][$i]["quantidade"]) + ($valor_frete * $_SESSION['array_produtos'][$i]["quantidade"]);
            $i = $i + 1; 
            
            echo "<tr>";
            echo "<td width='300'><font style='font-size:14px; color:#464646;'>Produto(s):</font></td>";
            echo "<td><font style='font-size:14px; color:#464646;'>". $nome_produto ."</font></td>"; 
            echo "</tr>";
            
            } 
            }
            echo "<tr>";
            echo "<td width='300'><font style='font-size:14px; color:#464646;'>Total em Produtos:</font></td>";
            echo "<td><font style='font-size:14px; color:#464646;'>R$". number_format($valor_total,2,",",".") ."</font></td>"; 
            echo "</tr>";
            ?>
            <tr>
            <td width="300"><font style="font-size:14px; color:#464646;">Frete:</font></td>
            <?php 
            echo "<td><font style='font-size:14px; color:#464646;'>R$". number_format($valor_frete,2,",",".") ."</font></td>"; 
            ?>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
            <td width="300"><strong><font style="font-size:14px; color:#464646;">Subtotal:</font></strong></td>
            <?php 
            echo "<td><font style='font-size:14px; color:#464646;'>R$". number_format($valor_total,2,",",".") ."</font></td>"; 
            ?>
            </tr>
            <tr>
            <td width="300"><strong><font style="font-size:18px; color:#333;">Total:</font></strong></td>
            <?php 
            echo "<td><font style='font-size:14px; color:#464646;'>R$". number_format($valor_total,2,",",".") ."</font></td>"; 
            ?>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            </table>
            </div>
            <table>
                <tr><td>&nbsp;</td></tr>
                <tr>
                <td><?php include("function_btn_pagamento_checkout.php"); ?></td>
                </tr>
            </table>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
