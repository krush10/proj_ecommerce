<?php session_start();
include("ecommerce.action/HeaderAction.php"); 
include("ecommerce.action/MenuAction.php"); 
include("conn/configuracao.php");
?>
<?php 
$headerAction = new HeaderAction();
$menuAction = new MenuAction();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <?php echo "<title>". $headerAction->recuperarTitle() ."</title>"; ?>
            <link rel="stylesheet" href="css/header_style.css" type="text/css" media="all" />
            <link rel="stylesheet" href="css/menu_style.css" type="text/css" media="all" />
            <link rel="stylesheet" href="css/busca_style.css" type="text/css" media="all" />
            <link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
            <script src="js/jquery.js" type="text/javascript"></script>
            <script src="js/cycle.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include_once("header.php"); ?>
        <?php include_once("menu.php"); ?>
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
            <div id="onde_estou">
                <?php 
                if(isset($_GET['texto_busca'])){$texto_busca = $_GET['texto_busca'];}
                
                $txt_ = str_replace("%E1","á",$texto_busca);
                    $txt_ = str_replace("%E2","â",$texto_busca);
                    $txt_ = str_replace("%E3","ã",$texto_busca);
                    $txt_ = str_replace("%C1","Á",$texto_busca);
                    $txt_ = str_replace("%C2","Â",$texto_busca);
                    $txt_ = str_replace("%C3","Ã",$texto_busca);
                    $txt_ = str_replace("%C9","É",$texto_busca);
                    $txt_ = str_replace("%E9","é",$texto_busca);
                    $txt_ = str_replace("%EA","ê",$texto_busca);
                    $txt_ = str_replace("%CD","Í",$texto_busca);
                    $txt_ = str_replace("%ED","í",$texto_busca);
                    $txt_ = str_replace("%D3","Ó",$texto_busca);
                    $txt_ = str_replace("%D4","Ô",$texto_busca);
                    $txt_ = str_replace("%D5","Õ",$texto_busca);
                    $txt_ = str_replace("%F3","ó",$texto_busca);
                    $txt_ = str_replace("%F5","õ",$texto_busca);
                    $txt_ = str_replace("%F4","ô",$texto_busca);
                    $txt_ = str_replace("%DA","Ú",$texto_busca);
                    $txt_ = str_replace("%DC","Ü",$texto_busca);
                    $txt_ = str_replace("%FA","ú",$texto_busca);
                    $txt_ = str_replace("%FC","ü",$texto_busca);
                    $txt_ = str_replace("%E7","ç",$texto_busca);
                    $txt_ = str_replace("%C7","Ç",$texto_busca);
                    
                echo "Buscando por:"." "."<strong>".$txt_."</strong>";
                ?>
            </div>
            <div id="ordenar">
                <?php
                if(isset($_GET['texto_busca'])){
                    $texto_busca = $_GET['texto_busca'];
                }
                echo "<form action='busca.php' method='get'>";  
                echo "<input type='hidden' name='texto_busca' value='$texto_busca' />";
                echo "Ordenar por:";
                echo "<select name='ordem' onchange='this.form.submit()'>";
                    echo "<option value=''>Selecione</option>";
                    echo "<option value='ultimos'>Ultimos no site</option>";
                    echo "<option value='maior'>Maior pre&ccedil;o</option>";
                    echo "<option value='menor'>Menor pre&ccedil;o</option>";
                echo "</select>";
                echo "</form>";
                ?>
            </div>
            <div id="area_resultados">
                <?php 
                
                    if(isset($_GET['texto_busca'])){
                        $texto_busca = $_GET['texto_busca'];
                    }

                    $txt_ = str_replace("%E1","á",$texto_busca);
                    $txt_ = str_replace("%E2","â",$texto_busca);
                    $txt_ = str_replace("%E3","ã",$texto_busca);
                    $txt_ = str_replace("%C1","Á",$texto_busca);
                    $txt_ = str_replace("%C2","Â",$texto_busca);
                    $txt_ = str_replace("%C3","Ã",$texto_busca);
                    $txt_ = str_replace("%C9","É",$texto_busca);
                    $txt_ = str_replace("%E9","é",$texto_busca);
                    $txt_ = str_replace("%EA","ê",$texto_busca);
                    $txt_ = str_replace("%CD","Í",$texto_busca);
                    $txt_ = str_replace("%ED","í",$texto_busca);
                    $txt_ = str_replace("%D3","Ó",$texto_busca);
                    $txt_ = str_replace("%D4","Ô",$texto_busca);
                    $txt_ = str_replace("%D5","Õ",$texto_busca);
                    $txt_ = str_replace("%F3","ó",$texto_busca);
                    $txt_ = str_replace("%F5","õ",$texto_busca);
                    $txt_ = str_replace("%F4","ô",$texto_busca);
                    $txt_ = str_replace("%DA","Ú",$texto_busca);
                    $txt_ = str_replace("%DC","Ü",$texto_busca);
                    $txt_ = str_replace("%FA","ú",$texto_busca);
                    $txt_ = str_replace("%FC","ü",$texto_busca);
                    $txt_ = str_replace("%E7","ç",$texto_busca);
                    $txt_ = str_replace("%C7","Ç",$texto_busca);
                    
                    if(isset($_GET['ordem'])){
                        $ordem = $_GET['ordem'];
                    if($ordem == "ultimos"){
                        $final_query = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.preco as preco, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE descricao LIKE CONVERT(_utf8 '%$txt_%' USING utf8) COLLATE utf8_general_ci OR descricao LIKE '%$txt_%' OR nome_produto LIKE CONVERT(_utf8 '%$txt_%' USING utf8) COLLATE utf8_general_ci OR nome_produto LIKE '%$txt_%' ORDER BY id DESC");
                    }else if($ordem == "menor"){
                        $final_query = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.preco as preco, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE descricao LIKE CONVERT(_utf8 '%$txt_%' USING utf8) COLLATE utf8_general_ci OR descricao LIKE '%$txt_%' OR nome_produto LIKE CONVERT(_utf8 '%$txt_%' USING utf8) COLLATE utf8_general_ci OR nome_produto LIKE '%$txt_%' ORDER BY preco ASC");
                    }else if($ordem == "maior"){
                        $final_query = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.preco as preco, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE descricao LIKE CONVERT(_utf8 '%$txt_%' USING utf8) COLLATE utf8_general_ci OR descricao LIKE '%$txt_%' OR nome_produto LIKE CONVERT(_utf8 '%$txt_%' USING utf8) COLLATE utf8_general_ci OR nome_produto LIKE '%$txt_%' ORDER BY preco DESC");
                    }
                    }else{
                        $final_query = mysql_query("SELECT p.id as id, p.nome_produto as nome_produto, p.preco as preco, pi.produto_img as produto_img FROM produto p LEFT JOIN produto_img pi ON pi.id_produto = p.id WHERE descricao LIKE CONVERT(_utf8 '%$txt_%' USING utf8) COLLATE utf8_general_ci OR descricao LIKE '%$txt_%' OR nome_produto LIKE CONVERT(_utf8 '%$txt_%' USING utf8) COLLATE utf8_general_ci OR nome_produto LIKE '%$txt_%'");
                    }
                    echo "<table>";
                    echo "<tr>";
                    $contador = 1;
                    while($array = mysql_fetch_array($final_query)){
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
