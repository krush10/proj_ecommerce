<?php

require_once('RsCorreios.php');

// Instancia a classe
$frete = new RsCorreios();
$resultadoFrete = "";
$valor_frete = 0.00;
// Percorre todos as variáveis $_POST para setar os atributos necessários
// Se você achar melhor pode fazer 1 a 1.
// Ex.: $frete->setValue('sCepOrigem', $_POST['sCepOrigem']);
// Aqui estou usando um foreach para economizar código
foreach ($_POST as $key => $value) {
    $frete->setValue($key, $value);
}

// Diâmetro
//$frete->getDiametro();


// Chamado ao método getFrete, que irá se comunicar com os correios
// e nos trazer o resultado
$result = $frete->getFrete();

$num_produtos = count($_SESSION['lista_produtos']);
// Retornamos a mensagem de erro caso haja alguma falha
if ($result['erro'] != 0) {
    //$resultadoFrete = $result['msg_erro'];
}
// Caso não haja erros mostramos o resultado de cada variável retornada pelos correios.
// Use apenas as que forem de seu interesse
else {
    if(($num_produtos == 1) || ($num_produtos < 1)){
            $valor_frete = 0.00;
            $result['prazo_entrega'] = 0;
            $resultadoFrete .= "Valor do Frete: " . $valor_frete . " | ";
            $resultadoFrete .= "Prazo de Entrega: " . $result['prazo_entrega'] . " dias <br />";
    }else{
            $valor_frete = $result['valor'] * 1;
            $resultadoFrete .= "Valor do Frete: R$ " . $valor_frete . " | ";
            $resultadoFrete .= "Prazo de Entrega: " . $result['prazo_entrega'] . " dias <br />";
    }
}

//echo $resultadoFrete;
?>