<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php
/*

 Retorno PagSeguro 2.0 - PHP e MySQL
 por Diogo Dourado - www.dourado.net
 Última Atualização: 09/06/2011
 
 Se você ainda não é cadastrado no PagSeguro, utilize o link abaixo para se cadastrar:
 https://pagseguro.uol.com.br/?ind=528005

*/

class PagSeguroNpi {
	
	private $timeout = 20; // Timeout em segundos
	
	public function notificationPost() {
		$postdata = 'Comando=validar&Token='.TOKEN;
		foreach ($_POST as $key => $value) {
			$valued    = $this->clearStr($value);
			$postdata .= "&$key=$valued";
		}
		return $this->verify($postdata);
	}
	
	private function clearStr($str) {
		if (!get_magic_quotes_gpc()) {
			$str = addslashes($str);
		}
		return $str;
	}
	
	private function verify($data) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://pagseguro.uol.com.br/pagseguro-ws/checkout/NPI.jhtml");
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$result = trim(curl_exec($curl));
		curl_close($curl);
		return $result;
	}

}

function MoedaBR($valor) {
	$valor = str_replace('.','',$valor);
	$valor = str_replace(',','.',$valor);
	return $valor;
}

function ConverterData($data) {
	$data = explode(' ', $data);
	$hora = $data[1]; $data = $data[0];
	$data = explode('/', $data);
	$data = $data[2].'-'.$data[1].'-'.$data[0].' ';		
	return $data.$hora;
}


$lnk = mysql_connect($retorno_host, $retorno_usuario, $retorno_senha) or die ('Nao foi possível conectar ao MySql: ' . mysql_error());
mysql_select_db($retorno_database, $lnk) or die ('Nao foi possível ao banco de dados selecionado no MySql: ' . mysql_error());	

?>