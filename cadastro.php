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
        <link rel="stylesheet" href="css/cadastro_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js " type="text/javascript"></script>
        <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.js " type="text/javascript"></script>
        <script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/verifica_email_cadastrado.js"></script>
        <script type="text/javascript">
            function getEndereco() {
                    // Se o campo CEP não estiver vazio
                    if($.trim($("#cep").val()) != ""){
                    /*
                    Para conectar no serviço e executar o json, precisamos usar a função
                    getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
                    dataTypes não possibilitam esta interação entre domínios diferentes
                    Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
                    http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
                    */
                    $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
                    // o getScript dá um eval no script, então é só ler!
                    //Se o resultado for igual a 1

                    if (resultadoCEP["tipo_logradouro"] != '') {
                            if (resultadoCEP["resultado"]) {
                            // troca o valor dos elementos
                                    $("#rua").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
                                    $("#bairro").val(unescape(resultadoCEP["bairro"]));
                                    $("#cidade").val(unescape(resultadoCEP["cidade"]));
                                    //$("#pais").val(unescape(resultadoCEP["pais"]));
                                    $("#uf").val(unescape(resultadoCEP["uf"]));
                                    $("#numero").focus();
                                    }
                            }		
                    });
                    }
            }
            </script>
            <style>	
                    label.error {color:#F00; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:12px;}
            </style>
            <script type="text/javascript">        
                    $(document).ready(function(){
                            $('#cad_').validate({
                                    rules:{
                                            //usuario:{ required: true, remote: 'verifica-usuario.php' },
                                            nome_usuario: {required: true},
                                            nome_completo: {required: true},
                                            cpf: {required: true},
                                            data_nascimento: {required: true},
                                            sexo: {required: true},
                                            telefone_residencial: {required: true},
                                            email: {required: true},
                                            senha: {required: true, minlength: 6},
                                            cep: {required: true},
                                            rua: {required: true},
                                            bairro: {required: true},
                                            cidade: {required: true},
                                            estado: {required: true},
                                            pais: {required: true},
                                            confirma_senha:{required: true,equalTo: "#senha"}
                                    },
                                    messages:{
                                            //usuario:{required: '' , remote: ' Usuário já está em uso.'},
                                            nome_usuario: {required: " campo obrigatorio."},
                                            nome_completo: {required: " campo obrigatorio."},
                                            cpf: {required: " campo obrigatorio."},
                                            data_nascimento: {required: " campo obrigatorio."},
                                            sexo: {required: " campo obrigatorio."},
                                            telefone_residencial: {required: " campo obrigatorio."},
                                            email: {required: " campo obrigatorio."},
                                            senha: {required: " campo obrigatorio.", minlength: " campo deve conter ao menos 6 caracteres."},
                                            cep: {required: " campo obrigatorio."},
                                            rua: {required: " campo obrigatorio."},
                                            bairro: {required: " campo obrigatorio."},
                                            cidade: {required: " campo obrigatorio."},
                                            estado: {required: " campo obrigatorio."},
                                            pais: {required: " campo obrigatorio."},
                                            confirma_senha:{required: "",equalTo: " senhas diferentes."}
                                    }
                            });
                    });
            </script>
            <script>
                    $(function($){  
                            $("#cpf").mask("999.999.999-99");  
                            $("#telefone_residencial").mask("(99) 9999-9999");  
                            $("#telefone_celular").mask("(99) 9999-9999");   
                            $("#telefone_comercial").mask("(99) 9999-9999"); 
                            $("#data_nascimento").mask("99/99/9999"); 
                    }); 
            </script>
    </head>
    <body>
        <?php include_once("header.php"); ?>
        <?php include_once("menu.php"); ?>
        <div class="corpo">
                <table cellspacing="10">
                    <tr>
                    	<td><font style="font-size:23px; color:#333;">Cadastro</font></td>
                    </tr>
                </table>
            <form id="cad_" action="ecommerce.action/UsuarioAction.php" method="post">
                <table style="margin-left:-70px;">
                	<tr>
                    	<td>&nbsp;</td>
                    </tr>
                	<tr>
                    	<td align="right">*Como gostaria de ser chamado?</td>
                        <td><input type="text" name="nome_usuario" id="nome_usuario" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Nome Completo</td>
                        <td><input type="text" name="nome_completo" id="nome_completo" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*CPF</td>
                        <td><input type="text" name="cpf" id="cpf" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Data de Nascimento</td>
                        <td><input type="text" name="data_nascimento" id="data_nascimento" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Sexo</td>
                        <td><input type="text" name="sexo" id="sexo" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Telefone Principal  -  (DDD - TELEFONE)</td>
                        <td><input type="text" name="telefone" id="telefone_residencial" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">Telefone Celular  -  (DDD - TELEFONE)</td>
                        <td><input type="text" name="celular" id="telefone_celular" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">Telefone Comercial  -  (DDD - TELEFONE - RAMAL)</td>
                        <td><input type="text" name="telefone_comercial" id="telefone_comercial" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Email</td>
                        <td><input type="text" name="email" id="email" onblur="verificaEmail(this.value)" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Senha</td>
                        <td><input type="password" name="senha" id="senha" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Confirma Senha</td>
                        <td><input type="password" name="confirma_senha" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td>
                    </tr>
                    <tr>
                    	<td align="right"><strong><font style="font-size:18px; color:#555555;">Endere&ccedil;o</font></strong></td>
                    </tr>
                	<tr>
                    	<td align="right">Primeiro digite o CEP</td>
                        <td><input type="text" name="cep" id="cep" onblur="getEndereco()" class="inputs" style="width:300px;height:22px;background:#e2e2e2;border:1px solid #e2e2e2;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;font-size:12px;" /></td>
                    </tr>
                    <tr>
                    	<td align="right"><a href="#">Alterar CEP</a> | N&atilde;o sabe o CEP <a href="http://www.buscacep.correios.com.br/" target="_blank">Consulte aqui</a></td>
                    </tr>
                    <tr>
                    	<td align="right">Identifica&ccedil;&atilde;o do Endere&ccedil;o</td>
                        <td><input type="text" name="identifica_endereco" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">Endere&ccedil;o</td>
                        <td><input type="text" name="endereco" id="rua" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">N&uacute;mero</td>
                        <td><input type="text" name="numero" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">Complemento</td>
                        <td><input type="text" name="complemento" id="complemento" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Bairro</td>
                        <td><input type="text" name="bairro" id="bairro" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Cidade</td>
                        <td><input type="text" name="cidade" id="cidade" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Estado</td>
                        <td><input type="text" name="estado" id="uf" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">*Pa&iacute;s</td>
                        <td><input type="text" name="pais" id="pais" class="caixa_cadastro" /></td>
                    </tr>
                    <tr>
                    	<td align="right">Informa&ccedil;&otilde;es de Refer&ecirc;ncia</td>
                        <td><textarea name="info_referencia" class="area_cadastro"></textarea></td>
                    </tr>
                </table>
                	<!--input type="image" src="img/btn_continuar.png" width="168" height="41" class="btn_continuar" /-->
                        <input type="submit" value="Enviar" />
                 </form>   
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
