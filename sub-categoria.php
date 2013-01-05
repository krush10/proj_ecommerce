<?php session_start();
include("ecommerce.action/HeaderAction.php"); 
include("ecommerce.action/MenuAction.php"); 
include("ecommerce.action/SubCategoriaAction.php"); 
include("conn/configuracao.php");
?>
<?php 
$headerAction = new HeaderAction();
$menuAction = new MenuAction();
$subCategoriaAction = new SubCategoriaAction();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <?php echo "<title>". $headerAction->recuperarTitle() ."</title>"; ?>
        <link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/menu_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/banner_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/categoria_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
    </head>
    <body>
        <?php include_once("header.php"); ?>
        <?php include_once("menu.php"); ?>
        <div class="corpo">
            <div id="menu_lateral">
                <?php 
                
                    if(isset($_GET['c'])){
                        $c = $_GET['c'];
                    }
                
                    $lista = $subCategoriaAction->recuperarSubCategorias();
                    echo "<table>";
                        echo "<tr>";    
                            echo "<td><strong>Categorias</strong></td>";
                        echo "</tr>"; 
                        echo "<tr><td></td></tr>"; 
                        echo "<tr><td></td></tr>"; 
                        echo "<tr><td></td></tr>"; 
                    while($array = mysql_fetch_array($lista)){
                        $id_sub = $array['id'];
                        $nome_sub_categoria = $array['nome_sub_categoria'];
                        //$nome_categoria_format = preg_replace("[^a-zA-Z0-9_]", "", strtr($nome_categoria, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
                        //$nome_categoria_format = strtolower($nome_categoria_format);
                        echo "<tr>";    
                            echo "<td><a href='sub-categoria.php?c=$c&sc=$id_sub'>+ $nome_sub_categoria</a></td>";
                        echo "</tr>";   
                        echo "<tr><td></td></tr>"; 
                    }
                    echo "</table>";
                ?>
            </div>
            <div id="onde_estou">
                <?php
                    $id_categoria = $_GET['c'];
                    $id_subcategoria = $_GET['sc'];
                    
                    $query = mysql_query("SELECT nome_categoria FROM categoria WHERE id=$id_categoria");
                    $array = @mysql_fetch_array($query);
                    $nome_categoria = $array['nome_categoria'];
                    
                    $query = mysql_query("SELECT nome_sub_categoria FROM sub_categoria WHERE id=$id_subcategoria");
                    $array = @mysql_fetch_array($query);
                    $nome_sub_categoria = $array['nome_sub_categoria'];
                    
                    echo "<a href='index.php'>Home</a> > <a href='categoria.php?c=$id_categoria'>$nome_categoria</a> > $nome_sub_categoria";
                ?>
            </div>
            <div id="produtos_destaque">
                <?php

                $lista = $subCategoriaAction->recuperarProdutoSubCategoria();

                echo "<table>";
                echo "<tr>";
                $contador = 1;
                while($array = mysql_fetch_array($lista)){
                        $id = $array['id'];

                        $nome_produto = substr($array['nome_produto'],0,32);
                        $nome_produto_format = preg_replace("[^a-zA-Z0-9_]", "", strtr($nome_produto, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
                        $nome_produto_format = strtolower($nome_produto_format);

                        $preco = $array['preco'];
                        $preco_format = number_format($preco,2,",",".");

                        $produto_img = $array['produto_img'];
                        $produto_img_format = substr($produto_img,2);
                        $produto_img_format = "http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec".$produto_img_format;	
                        
                        //** PARCELAMENTO PAGSEGURO EM 12X **//		
						
				 $nParcelas = 12;
				
				 $taxa=2.49;
				
				 $taxa = $taxa/100;
				
				 $valorTotal = $preco;
				
				 $cadaParcela = ($valorTotal*$taxa)/(1-(1/pow(1+$taxa, $nParcelas)));
		  
				 $preco_parcelado_format = number_format($cadaParcela, 2, ',', '.'); 
				 
                        //** FIM PARCELAMENTO PAGSEGURO **//
                        
                        echo "<td align='left' width='130'>";
                        echo "<p style='height:110px;'><a href='produto.php?p=$id'><img src='$produto_img_format' style='max-width:130px; max-height:110px;' border='0' /></a></p>";	
                        echo "<p style='height:50px;'><a href='produto.php?p=$id'><strong>$nome_produto</strong>"."[...]"."</a></p>";		
                        echo "<p id='preco' style='margin-top:-5px;'>Por: R$ $preco_format</p>";	
                        echo "<p id='preco' style='margin-top:-5px; font-size:13px; background:#FFF;'>Em <strong>12x</strong> de R$ $preco_parcelado_format pelo pagseguro</p>";
                        //$cod = $id;
                        //include("function_btn_pagamento_interno.php");
                        echo "</td>";
                        echo "<td>&nbsp;</td>";
                        echo "<td>&nbsp;</td>";
                        if($contador % 5 == 0){
                                echo "<tr></tr>";
                                echo "<tr></tr>";
                                echo "<tr></tr>";
                                echo "<tr></tr>";
                        }
                        $contador = $contador + 1;
                }
                echo "</tr>";
                echo "</table>";

                ?>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
