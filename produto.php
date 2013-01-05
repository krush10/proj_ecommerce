<?php session_start();
include("ecommerce.action/HeaderAction.php"); 
include("ecommerce.action/MenuAction.php"); 
include("ecommerce.action/ProdutoAction.php"); 
include("conn/configuracao.php");
include("mais-acessado.php");
?>
<?php 
$headerAction = new HeaderAction();
$menuAction = new MenuAction();
$produtoAction = new ProdutoAction();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <?php echo "<title>". $headerAction->recuperarTitle() ."</title>"; ?>
        <link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/menu_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/banner_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/produto_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/posicionar_imagem_centro.js"></script>
    </head>
    <body>
        <?php include_once("header.php"); ?>
        <?php include_once("menu.php"); ?>
        <div class="corpo">
            <div id="link_inicial">
               <?php
                    $lista = $produtoAction->recuperarProduto(); 
                    while($array = mysql_fetch_array($lista)){
                        $id = $array['id'];
                        $nome_produto = $array['nome_produto'];
                        $id_categoria = $array['id_categoria'];
                        $query = mysql_query("SELECT nome_categoria FROM categoria WHERE id = $id_categoria");
                        $array = @mysql_fetch_array($query);
                        $nome_categoria = $array['nome_categoria'];
                    }
                    echo "<a href='index.php'>In&iacute;cio</a> > <a href='categoria.php?c=$id_categoria'>$nome_categoria</a> > ".$nome_produto." - c&oacute;d: 00$id";   
                ?> 
            </div>
            <div id="imagem_produto">
                <?php 
                    
                    $lista = $produtoAction->recuperarProduto(); 
                    while($array = mysql_fetch_array($lista)){
                        $produto_img = $array['produto_img'];
                        $produto_img_format = substr($produto_img,2);
                        $produto_img_format = "http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec".$produto_img_format;
                        echo "<img src='$produto_img_format' class='imagem_grande' onload='return centralizar();' style='max-width:250px; max-height:230px;' border='0' />";
                    }
                    
                ?>
            </div>
            <div id="nome_produto">
                <?php 
                    echo $nome_produto;
                ?>
            </div>
            <div id="faixa_preco">
                <div id="preco">
                <?php
                    $lista = $produtoAction->recuperarProduto(); 
                    while($array = mysql_fetch_array($lista)){
                        $preco = $array['preco'];
                        $preco_format = number_format($preco,2,",",".");
                        $estoque = $array['estoque'];
                        echo "<strong>POR: R$ ". $preco_format ."</strong>";
                        echo "<p id='em_ate'>Em at&eacute; 12x ou mais pelo PagSeguro UOL<p>"; 
                        echo "<p id='estoque'>Ainda restam <strong>$estoque</strong> produto(s) em estoque<p>"; 
                    }
                    $cod = $_GET['p'];
                    include("function_btn_pagamento.php");
                ?>
                </div>
            </div>
            <div id="social">
                <table>
                    <tr>
                        <td><a href=''>Indique para um amigo</a></td>
                        <td><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.krush.com.br&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe></td>
                        <td><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.krush.com.br&amp;send=false&amp;layout=button_count&amp;width=200&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=recommend&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px; margin-left:0px;  " allowTransparency="true"></iframe></td>
                    </tr>
                </table>
            </div>
            <div id="descricao">
                <div id="titulo">
                    Descri&ccedil;&atilde;o do Produto
                </div>
                <div id="conteudo">
                    <?php
                    $lista = $produtoAction->recuperarProduto(); 
                    while($array = mysql_fetch_array($lista)){
                        $descricao = $array['descricao'];
                        echo $descricao;
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
