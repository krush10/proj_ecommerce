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
<link rel="stylesheet" href="css/banner_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/home_style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/cycle.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#slideshow').cycle({
                fx: 'fade',
                prev: '#prev',
                next: '#next',
                cleartype:false
        });
    });
</script>
</head>
<body>
   <?php include_once("header.php"); ?>
   <?php include_once("menu.php"); ?>
    <div class="area_banner_max">
        <div id="area_banner">
            <div id="slideshow">
            <?php 
            
               $lista = $homeAction->recuperaBanner();
               
               while($array = mysql_fetch_array($lista)){
                   $loja_banner = $array['loja_banner'];
                   $loja_banner_format = substr($loja_banner,2);
                   $loja_banner_format = "http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec".$loja_banner_format;
                   
                   echo "<img src='$loja_banner_format' />";
               }
            
            ?>
            </div>
        </div>
    </div>
    <div class="corpo">
        <div id="menu_lateral">
            <?php 
                $lista = $menuAction->recuperarMenuLateral();
                echo "<table>";
                    echo "<tr>";    
                        echo "<td><strong>Categorias</strong></td>";
                    echo "</tr>"; 
                    echo "<tr><td></td></tr>"; 
                    echo "<tr><td></td></tr>"; 
                    echo "<tr><td></td></tr>"; 
                while($array = mysql_fetch_array($lista)){
                    $id = $array['id'];
                    $nome_categoria = $array['nome_categoria'];
                    echo "<tr>";    
                        echo "<td><a href='categoria.php?c=$id'>+ $nome_categoria</a></td>";
                    echo "</tr>";   
                        $buscar_sub = mysql_query("SELECT id, nome_sub_categoria FROM sub_categoria WHERE id_categoria = $id ORDER BY nome_sub_categoria ASC LIMIT 4");
                        while($array_sub = mysql_fetch_array($buscar_sub)){
                            $id = $array_sub['id'];
                            $nome_sub_categoria = $array_sub['nome_sub_categoria'];
                            echo "<tr>";    
                                echo "<td><a style='margin-left:12px; font-size:11px;' href='sub-categoria.php?sc=$id'>$nome_sub_categoria</a></td>";
                            echo "</tr>"; 
                        }
                        
                    echo "<tr><td></td></tr>"; 
                }
                echo "</table>";
            ?>
        </div>
        <div id="produtos_destaque">
            <?php
            
            $query = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.preco as preco, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE p.exibir = 'sim' AND p.destaque = 'sim' AND p.estoque > 0 ORDER BY p.id DESC LIMIT 12");
            
            echo "<p id='texto_destaque'>Produtos em destaque</p>";
            echo "<table>";
            echo "<tr>";
            $contador = 1;
            while($array = mysql_fetch_array($query)){
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
                    if($contador % 4 == 0){
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
        <div id="produtos_mais_acessados">
            <?php
            
            
            echo "<p id='texto_acessados'>Produtos mais acessados</p>";
            echo "<table>";
            echo "<tr>";
            
            $recuperarMais = mysql_query("SELECT id_produto FROM produto_mais_acessado ORDER BY produto_cont DESC LIMIT 4");
            while($mais = mysql_fetch_array($recuperarMais)){
                $id_produto[] = $mais['id_produto'];
            }
            
            foreach($id_produto as $id_prod){
            $query = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.preco as preco, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE p.exibir = 'sim' AND p.destaque = 'sim' AND p.estoque > 0 AND p.id = $id_prod");
            
            
            $contador = 1;
            while($array = mysql_fetch_array($query)){
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
                    if($contador % 4 == 0){
                            echo "<tr></tr>";
                            echo "<tr></tr>";
                            echo "<tr></tr>";
                            echo "<tr></tr>";
                    }
                    $contador = $contador + 1;
            }
            }
            echo "</tr>";
            echo "</table>";
            ?>
        </div>
        <div id="banner_direita">
            
        </div>
        <div id="banner_direita_dois">
            
        </div>
        <div id="banner_direita_tres">
            
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>