<?php


    include_once '../ecommerce.bean/UsuarioBean.php';
    include_once '../ecommerce.dao/UsuarioDao.php';
    
    $listaUsuario = new UsuarioBean();
    $usuariodao = new UsuarioDao();
    
    $data = date("Y-m-d");
    
    $listaUsuario->setNome_Usuario($_POST['nome_usuario']);
    $listaUsuario->setNome_Completo($_POST['nome_completo']);
    $listaUsuario->setEndereco($_POST['endereco']);
    $listaUsuario->setNumero($_POST['numero']);
    $listaUsuario->setComplemento($_POST['complemento']);
    $listaUsuario->setBairro($_POST['bairro']);
    $listaUsuario->setCidade($_POST['cidade']);
    $listaUsuario->setEstado($_POST['estado']);
    $listaUsuario->setPais($_POST['pais']);
    $listaUsuario->setInfo_Referencia($_POST['info_referencia']);
    $listaUsuario->setIdentifica_Endereco($_POST['identifica_endereco']);
    $listaUsuario->setCep($_POST['cep']);
    $listaUsuario->setTelefone($_POST['telefone']);
    $listaUsuario->setCelular($_POST['celular']);
    $listaUsuario->setEmail($_POST['email']);
    $listaUsuario->setSenha($_POST['senha']);
    $listaUsuario->setCpf($_POST['cpf']);
    $listaUsuario->setSexo($_POST['sexo']);
    $listaUsuario->setData_Nascimento($_POST['data_nascimento']);
    $listaUsuario->setData_Cadastro($data);
    
    $usuariodao->gravarUsuario($listaUsuario);


?>
