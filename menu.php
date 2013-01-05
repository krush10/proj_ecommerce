<div class="max_menu">
<div class="menu">
    <div id="conteudo_menu">
        <?php 
            $lista = $menuAction->recuperarCategoria();
            echo "<table>";
            echo "<tr>";
                echo "<td><a href='index.php'>Home</a></td>";
                echo "<td><font style='color:#79CAFF;'>|</font></td>";
            while($array = mysql_fetch_array($lista)){
                $id = $array['id'];
                $nome_categoria = $array['nome_categoria'];
                //$nome_categoria_format = preg_replace("[^a-zA-Z0-9_]", "", strtr($nome_categoria, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
		//$nome_categoria_format = strtolower($nome_categoria_format);
            
                echo "<td><a href='categoria.php?c=$id'>$nome_categoria</a></td>";
                echo "<td><font style='color:#79CAFF;'>|</font></td>";
                
            }
                echo "<td><a href='fale-conosco.php'>Fale Conosco</a></td>";
            echo "</tr>";
            echo "</table>";
        ?>
    </div>
</div>
</div>