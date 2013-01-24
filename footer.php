<div class="max_footer">
    <div class="footer">
        <div id="area_busca">
            <form action="busca.php" method="get">
                <input type="text" name="texto_busca" id="texto_busca" value=" Digite o que procura..." onfocus="limpar(this);" onblur="escrever(this);" class="txt_busca" />
                <input type="image" src="img/btn_busca.png" width="32" height="31" style="position: absolute; margin-left: -40px; margin-top: 2px;" />
            </form>
        </div>
        <div id="img_pagamento">
            <img src="img/forma_pagamento.png" />
        </div>
        <div id="area_contexto">
            <table>
                <tr><td><a href="quem-somos.php">Quem Somos</a></td></tr>
                <tr><td><a href="politica-privacidade.php">Pol&iacute;tica Privacidade</a></td></tr>
                <tr><td><a href="atendimento.php">Atendimento</a></td></tr>
            </table>
        </div>
        <div id="direitos_registrados">
            <?php echo $headerAction->recuperarTitle() ?> - Todos os direitos registrados &REG;
        </div>
        <div id="produzido_por">
            <table>
                <tr>
                    <td><a href="http://www.krush.com.br/" target="_blank"><img src="img/logo_krush.png" border="0" /></a></td>
                    <td><img src="img/txt_criarsite.png" style="margin-left:2px;" /></td>
                </tr>
            </table>
        </div>
    </div>
</div>    
