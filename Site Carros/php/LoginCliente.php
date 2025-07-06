<?php

session_start();
require_once('Conexao.php'); //Classe que vai conectar no banco

$email = $_POST['email'];
$senha = $_POST['senha'];

if(!empty($email) && !empty($senha)) {
 
    //selecionando o e-mail (único) na tabela
    $sql = 'SELECT * FROM usuarios WHERE email = :email';

    //prepara a consulta
    $requisicao = $conexao->prepare($sql);

    //vincula o parametro a ser consultado no banco
    $requisicao ->bindParam(':email', $email);

    //executa no banco
    $requisicao -> execute();

    $usuario = $requisicao->fetch(PDO::FETCH_ASSOC);

    //verificamos acima se o usuário existe, agora validaremos se a senha está ok
    if($usuario && password_verify($senha, $usuario['senha'])) {
        //se o login for valido 

        $_SESSION ['usuario_id'] = $usuario['id'];
        $_SESSION ['usuario_nome'] = $usuario['nome'];

        //se o login estiver ok, vai para o home
        header('location: ../html/home.html');
        exit;
    } else {
        echo'Usuário ou senha não corretos, verifique os campos';
        }
    } else {
        echo 'Preenchha todos os campos';
    }


?>