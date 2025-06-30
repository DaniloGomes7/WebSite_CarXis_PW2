<?php

require_once 'Conexao.php';

$email = $_POST['emailFormulario'];
$nome = $_POST['nomeFormulario'];
$novaSenha = $_POST['senhaFormulario'];


if (!empty($nome) && !empty($email)) {

    if(!empty($senha)){

        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuario SET nome = :nome, senha = :senha WHERE email = :email";
    }else{
         $sql = "UPDATE usuarios SET nome = :nome WHERE email = :email";
    }
    $requisicao = $conexao->prepare($sql);
    $requisicao->bindParam('nome', $nome);
    $requisicao->bindParam('email', $email);

    if(!empty($novaSenha)){
    $requisicao->bindParam('senha', $senhaHash);

    }
    try{
        $requisicao->execute();
        echo"Usuario atualizado com sucesso!";
    }catch(PDOException $e){
        echo"Erro ao Atualizar: " . $e->getMessage(); 
    }
}else{
    echo"Preencha o nome e email para atualizar";
}

?>