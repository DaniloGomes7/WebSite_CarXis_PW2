<?php

require_once 'Conexao.php'; //conecta no banco

$email = $_POST["emailFormulario"];

if (!empty($email)) {

    $sql = "DELETE FROM usuarios WHERE email = :email";

    //preparar a remocao de dados no banco
    $requisicao = $conexao->prepare($sql);

    //vamos pegar o email digitado no form e passar por parametro
    //isso fara que a consulta na variavel $sql, use o email que
    //o usuario digitou, o bindParam serve para evitar SQLInjection
    //e uma protecao da aplicacao no banco de dados

    $requisicao->bindParam('email', $email);

    try {
        $requisicao->execute();
        if ($requisicao->rowCount() > 0) {
            echo "Usuario deletado com sucesso";
        } else {
            echo "Usuario nao existe!!";
        }
    } catch (PDOException $e) {
        echo "Erro ao deletar: " . $e->getMessage();
    }
} else {
    echo "Digite um email para remover algum usuario!";
}
