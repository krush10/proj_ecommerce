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
        <link rel="stylesheet" href="css/recuperar_senha_style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/footer_style.css" type="text/css" media="all" />
    </head>
    <body>
        <?php include_once("header.php"); ?>
        <?php include_once("menu.php"); ?>
        <div class="corpo">
            <div id="recuperar_senha">
                <form action="#" method="post">
                <table>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><input type="text" name="email" class="caixa" /></td>
                    </tr>
                </table>
                    <input type="submit" value="Buscar" />
                </form>    
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
