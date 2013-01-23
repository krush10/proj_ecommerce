<?php 
session_start(); 
include ('conn/configuracao.php');

$i = 0;
foreach($_SESSION['lista_produtos'] as $id){
$query = mysql_query("SELECT id, nome_produto, preco, largura, altura, comprimento FROM produto WHERE id=" . $id . " ");

if($query)	
while($array = mysql_fetch_array($query)){
        $id = $array['id'];
        $nome_produto = $array['nome_produto'];
        $preco = $array['preco'];

        $_SESSION['qtd'.$i];
        
        $valor_total = $valor_total + ($_SESSION['array_produtos'][$i]["preco"] * $_SESSION['array_produtos'][$i]["quantidade"]) + ($valor_frete * $_SESSION['array_produtos'][$i]["quantidade"]);

        $nvp = array(
	//Produto 1
        'L_PAYMENTREQUEST_0_NAME'.$i => $nome_produto,
        'L_PAYMENTREQUEST_0_DESC'.$i => $nome_produto,
        'L_PAYMENTREQUEST_0_QTY'.$i => $_SESSION['qtd'.$i],
        'L_PAYMENTREQUEST_0_AMT'.$i => $preco,  //valor do produto
        'PAYMENTREQUEST_0_ITEMAMT' => $valor_total,   // total do artigo
        'PAYMENTREQUEST_0_AMT' => $valor_total,   //total do carrinho
        
	'PAYMENTREQUEST_0_CURRENCYCODE'		=> 'BRL',
	'PAYMENTREQUEST_0_PAYMENTACTION'	=> 'Sale',
        'LOCALECODE' => 'pt_BR',
	'RETURNURL'							=> 'http://127.0.0.1/proj_ecommerce/retorno.php',
	'CANCELURL'							=> 'http://127.0.0.1/paypal/cancelamento.php',
	'METHOD'							=> 'SetExpressCheckout',
	'VERSION'							=> '84',
	'PWD'								=> '1358867371',
	'USER'								=> 'ds_1358867352_biz_api1.yahoo.com.br',
	'SIGNATURE'							=> 'ApBTcDt5MHX56BjvLq5NwsB2KXoeA68HUp3wOEeWceliABlfw.4njQuO'
        );

    $i = $i + 1; 
    }
}

$curl = curl_init();

//curl_setopt( $curl , CURLOPT_URL , 'https://api-3t.paypal.com/nvp' ); //Link para ambiente de teste: https://api-3t.sandbox.paypal.com/nvp
curl_setopt( $curl , CURLOPT_URL , 'https://api-3t.sandbox.paypal.com/nvp' );
curl_setopt( $curl , CURLOPT_SSL_VERIFYPEER , false );
curl_setopt( $curl , CURLOPT_RETURNTRANSFER , 1 );
curl_setopt( $curl , CURLOPT_POST , 1 );
curl_setopt( $curl , CURLOPT_POSTFIELDS , http_build_query( $nvp ) );

$response = urldecode( curl_exec( $curl ) );

curl_close( $curl );

$responseNvp = array();

if ( preg_match_all( '/(?<name>[^\=]+)\=(?<value>[^&]+)&?/' , $response , $matches ) ) {
	foreach ( $matches[ 'name' ] as $offset => $name ) {
		$responseNvp[ $name ] = $matches[ 'value' ][ $offset ];
	}
}

if ( isset( $responseNvp[ 'ACK' ] ) && $responseNvp[ 'ACK' ] == 'Success' ) {
	$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	$query = array(
		'cmd'	=> '_express-checkout',
		'token'	=> $responseNvp[ 'TOKEN' ]
	);

	header( 'Location: ' . $paypalURL . '?' . http_build_query( $query ) );
} else {
	echo 'Falha na transação';
}