<meta http-equiv="refresh" content="7;URL=http://www.krush.com.br/testes/ecommerce/">
<?php
//URL: http://127.0.0.1/paypal/retorno.php

if ( isset( $_GET[ 'token' ] ) ) {
	$token = $_GET[ 'token' ];

	$nvp = array(
		'TOKEN'								=> $token,
		'METHOD'							=> 'GetExpressCheckoutDetails',
		'VERSION'							=> '84',
		'PWD'								=> '1358867371',
                'USER'								=> 'ds_1358867352_biz_api1.yahoo.com.br',
                'SIGNATURE'							=> 'ApBTcDt5MHX56BjvLq5NwsB2KXoeA68HUp3wOEeWceliABlfw.4njQuO'
	);

	$curl = curl_init();

	//curl_setopt( $curl , CURLOPT_URL , 'https://api-3t.paypal.com/nvp' ); //Link para ambiente de teste: https://api-3t.sandbox.paypal.com/nvp
	curl_setopt( $curl , CURLOPT_URL , 'https://api-3t.sandbox.paypal.com/nvp' );
        curl_setopt( $curl , CURLOPT_SSL_VERIFYPEER , false );
	curl_setopt( $curl , CURLOPT_RETURNTRANSFER , 1 );
	curl_setopt( $curl , CURLOPT_POST , 1 );
	curl_setopt( $curl , CURLOPT_POSTFIELDS , http_build_query( $nvp ) );

	$response = urldecode( curl_exec( $curl ) );
	$responseNvp = array();

	if ( preg_match_all( '/(?<name>[^\=]+)\=(?<value>[^&]+)&?/' , $response , $matches ) ) {
		foreach ( $matches[ 'name' ] as $offset => $name ) {
			$responseNvp[ $name ] = $matches[ 'value' ][ $offset ];
		}
	}

	if ( isset( $responseNvp[ 'TOKEN' ] ) && isset( $responseNvp[ 'ACK' ] ) ) {
		if ( $responseNvp[ 'TOKEN' ] == $token && $responseNvp[ 'ACK' ] == 'Success' ) {
			$nvp[ 'PAYERID' ]							= $responseNvp[ 'PAYERID' ];
			$nvp[ 'PAYMENTREQUEST_0_AMT' ]				= $responseNvp[ 'PAYMENTREQUEST_0_AMT' ];
			$nvp[ 'PAYMENTREQUEST_0_CURRENCYCODE' ]		= $responseNvp[ 'PAYMENTREQUEST_0_CURRENCYCODE' ];
			$nvp[ 'METHOD' ]							= 'DoExpressCheckoutPayment';
			$nvp[ 'PAYMENTREQUEST_0_PAYMENTACTION' ]	= 'Sale';

			curl_setopt( $curl , CURLOPT_POSTFIELDS , http_build_query( $nvp ) );

			$response = urldecode( curl_exec( $curl ) );
			$responseNvp = array();

			if ( preg_match_all( '/(?<name>[^\=]+)\=(?<value>[^&]+)&?/' , $response , $matches ) ) {
				foreach ( $matches[ 'name' ] as $offset => $name ) {
					$responseNvp[ $name ] = $matches[ 'value' ][ $offset ];
				}
			}

			if ( $responseNvp[ 'PAYMENTINFO_0_PAYMENTSTATUS' ] == 'Completed' ) {
				echo 'Parabéns, sua compra foi concluída com sucesso';
                                echo '<pre>';
                                print_r( $responseNvp ); //Essa linha vai exibir várias informações que poderão ser utilizadas para o cadastro e entrega do produto ao cliente
                                echo '</pre>';
			} else {
				echo 'Não foi possível concluir a transação';
			}
		} else {
			echo 'Não foi possível concluir a transação';
		}
	} else {
		echo 'Não foi possível concluir a transação';
	}

	curl_close( $curl );
}