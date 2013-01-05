<script type="text/javascript">  
	function limpar(campo){  
		if (campo.value == campo.defaultValue){  
			campo.value = "";
			campo.style.color = "#000000";  
		} 
	}  
	  
	function escrever(campo){  
		if (campo.value == ""){  
			campo.value = " Digite o que procura...";
			campo.style.color = "#000000";  
		}  
	}
</script>	
<div class="max_header">
    <div class="header">
        <div id="img_logo">
            <?php 
            
            $loja_logo = $headerAction->recuperarLogo();
            $loja_logo_format = substr($loja_logo,2);
            $loja_logo_format = "http://".$_SERVER['SERVER_NAME']."/testes/ecommerce/gerenciamento-ec".$loja_logo_format;
            
            echo "<a href='index.php'><img src='". $loja_logo_format ."' width='200' height='100' border='0' /></a>"; 
            
            ?>
        </div>
        <div id="area_busca">
            <form action="busca.php" method="get">
                <input type="text" name="texto_busca" id="texto_busca" value=" Digite o que procura..." onfocus="limpar(this);" onblur="escrever(this);" class="txt_busca" />
                <input type="image" src="img/btn_busca.png" width="32" height="31" class="btn_busca" />
            </form>
        </div>
        <div id="contato_loja">
            <?php 
            $lista = $headerAction->recuperarDadosLoja(); 
            echo "<table>";
            echo "<tr>";
            while($array = mysql_fetch_array($lista)){
                $loja_email = $array['loja_email'];
                $loja_telefone = $array['loja_telefone'];
            
                echo "<td>$loja_email</td>";
                echo "<td> | </td>";
                echo "<td>$loja_telefone</td>";
                
            }
            echo "</tr>";
            echo "</table>";        
            ?>
        </div>
        <table id="table_menu_header">
            <tr>
                <td><a href="meu-pedido.php">Meus Pedidos</a> | <a href="cadastro.php">Cadastro</a></td>
            </tr>
        <?php
        if(isset($_SESSION['id_usuario'])){
                if(!(empty($_SESSION['id_usuario']))){ 
                $id_usuario = $_SESSION['id_usuario'];
                $buscarUsuario = mysql_query("SELECT nome_usuario FROM usuario WHERE id = $id_usuario");
                $array = @mysql_fetch_array($buscarUsuario);
                $nome_usuario = $array['nome_usuario'];
                echo "<tr><td><font>Ol&aacute;,"." ".$nome_usuario." "."<a href='logout.php' style='font-size:12px;'>(sair)</a></font></td><tr>";

        }
        }else{
        echo "<tr>";
        echo "<td>Fa&ccedil;a <a href='login.php' style='font-size:11px;'>login</a> ou <a href='cadastro.php' style='font-size:11px;'>cadastre-se</a></td></td>";
        echo "</tr>";
        }
        ?>
        </table>    
        <div id="botao_carrinho">
            <a href="carrinho.php">CARRINHO</a>
        </div>
    </div>
</div>