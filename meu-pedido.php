<?php 
include("ecommerce.action/HeaderAction.php"); 
include("ecommerce.action/MenuAction.php"); 
include("ecommerce.action/HomeAction.php"); 
include("conn/configuracao.php");
require("verifica_logado.php");
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
        <link rel="stylesheet" href="css/meupedido_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
    </head>
    <body>
        <?php include_once("header.php"); ?>
        <?php include_once("menu.php"); ?>
        <div class="corpo">
            <div id="usuario_logado">
                <?php 
                    if(isset($_SESSION['id_usuario'])){$id_usuario = $_SESSION['id_usuario'];}
                    
                    $busca_usuario = mysql_query("SELECT nome_usuario FROM usuario WHERE id = $id_usuario");
                    $array = @mysql_fetch_array($busca_usuario);
                    $nome_usuario = $array['nome_usuario'];
                    
                    echo "Voc&ecirc; est&aacute; logado como,"." <strong>".$nome_usuario."</strong>";
                ?>
            </div>
            <?php 			
                if(isset($_SESSION['id_usuario'])){
                    $id_usuario = $_SESSION['id_usuario'];
                }
                
                echo "<div id='ultimo_pedido'>";
                
                    $buscaUltimoPedido = mysql_query("SELECT psp.ProdDescricao as prod_descricao, psp.TransacaoID as transacao_id, psp.ProdValor as prod_valor, psp.ProdQuantidade as prod_quantidade, pst.StatusTransacao as status_transacao, pst.TipoPagamento as tipo_pagamento, pst.DataTransacao as data_transacao FROM pagseguroprodutos psp LEFT JOIN pagsegurotransacoes pst ON psp.TransacaoID = pst.TransacaoID WHERE pst.Referencia = $id_usuario ORDER BY pst.id DESC LIMIT 1");
                    
                    echo "<table>";
                    echo "<tr><td>&nbsp;</td></tr>";
                    echo "<tr>";
                            echo "<td width='300'><font style='color:#222;'><strong>Ultimo Pedido Realizado</strong></font></td>";
                    echo "</tr>";	
                    while($array = mysql_fetch_array($buscaUltimoPedido)){
                            $prod_descricao = $array['prod_descricao'];
                            $prod_valor = $array['prod_valor'];
                            $prod_quant = $array['prod_quantidade'];
                            $prod_valor = $prod_valor * $prod_quant;
                            $status_transacao = $array['status_transacao'];
                            $transacao_id = $array['transacao_id'];
                            $tipo_pagamento = $array['tipo_pagamento'];
                            $data_transacao = $array['data_transacao'];
                            $data_transacao_format = strftime("%d/%m/%Y %H:%M:%S", strtotime($data_transacao));

                            $prod_valor_format = number_format($prod_valor, 2, ',', '.');
                            
                            
                            echo "<tr>";
                                    echo "<td>$prod_descricao</td>";
                            echo "</tr>";
                            echo "<tr>";
                                    echo "<td>C&oacute;digo da Venda: $transacao_id</td>";
                            echo "</tr>";
                            echo "<tr>";
                                    echo "<td>Valor: $prod_valor_format($prod_quant x)</td>";
                            echo "</tr>";
                            echo "<tr>";        
                                    echo "<td>Status: $status_transacao</td>";
                            echo "</tr>";
                            echo "<tr>";        
                                    echo "<td>Forma de Pagamento: $tipo_pagamento</td>";
                            echo "</tr>";
                            echo "<tr>";        
                                    echo "<td>Data da Compra: $data_transacao_format</td>";
                            echo "</tr>";
                    }
                    echo "</table>";
                    
                echo "</div>"; 
            ?>
            <div id="mais_opcoes">
                <p>Outra Op&ccedil;&otilde;es</p>
                <table>
                    <tr>
                        <td><a href="#">Hist&oacute;rico de Pedidos</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Alterar Meu Cadastro</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Lista de Desejos</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
