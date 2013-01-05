<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php
/*

 Retorno PagSeguro 2.0 - PHP e MySQL
 por Diogo Dourado - www.dourado.net
 �ltima Atualiza��o: 09/06/2011
 
 Se voc� ainda n�o � cadastrado no PagSeguro, utilize o link abaixo para se cadastrar:
 https://pagseguro.uol.com.br/?ind=528005

*/

$retorno_site = 'CompraConcluida.html';  // Site para onde o usu�rio vai ser redirecionado ao termino do pagamento
$retorno_token = 'B9A28081F34D4088BAEE30FDCE8255FB'; // Token gerado pelo PagSeguro

$retorno_host = '186.202.152.53'; // Local da base de dados MySql
$retorno_database = 'comunicacaomac13'; // Nome da base de dados MySql
$retorno_usuario = 'comunicacaomac13'; // Usuario com acesso a base de dados MySql
$retorno_senha = 'Krus2350';  // Senha de acesso a base de dados MySql

//$host = "186.202.152.53";
//$usuario = "comunicacaomac13";
//$senha = "Krus2350";
//$banco = "comunicacaomac13";


?>