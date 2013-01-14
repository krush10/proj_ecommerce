<?php session_start(); 
// Conexão com o banco de dados

require "conn/configuracao.php";

// Recupera o login

$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;

// Recupera a senha, a criptografando em MD5

$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

// Usuário não forneceu a senha ou o login

if(!$email || !$senha)

{

	//header("Location:login_cadastro.php");
	echo "<script>location.href='login.php'</script>";
    exit;

}



/**

* Executa a consulta no banco de dados.

* Caso o número de linhas retornadas seja 1 o login é válido,

* caso 0, inválido.

*/

$SQL = "SELECT id,email,senha FROM usuario WHERE email='".$email."';";

if(!$SQL){
	die("Erro no banco de dados!");
}else{

$result_id = @mysql_query($SQL);

$total = @mysql_num_rows($result_id);

}

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)

{

    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão

    $dados = @mysql_fetch_array($result_id);



    // Agora verifica a senha

    if(!strcmp($_REQUEST['senha'], $dados["senha"]))
    {
			
			//if($dados['exibir'] == 'nao'){
				//echo "<script>history.go(-1);<script>";
			//}else{
			
			echo "<script>location.href='index.php'</script>";
			
			$_SESSION["id_usuario"]   = $dados["id"];
                        $_SESSION["email_usuario"] = $dados["email"];

        	exit;
			//}
		
    }
	
    // Senha inválida
    else
	
    {
        echo "<script>location.href='login.php'</script>";
        exit;
    }

}

// Login inválido

else

{

    echo "<script>location.href='login.php'</script>";

    exit;

}

?>

