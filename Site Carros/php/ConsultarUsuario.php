<?php

require_once 'Conexao.php';

$email = $_POST['emailFormulario'];

if (!empty($email)) {

    $sql = "SELECT * FROM usuarios WHERE email = :email";

    $requisicao = $conexao->prepare($sql);

    $requisicao->bindParam('email', $email);

    try {
        $requisicao->execute();

        //Especificar como queremos o retorno da consulta no banco de dados
        //FETCH_ASSOC indica que queremos retornar um array indexado
        $usuario = $requisicao->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            echo "Nome:" . $usuario['nome'] . "<br>";
            echo "Email:" . $email['email'] . "<br>";
        } else {
            echo "Usuario nao encontrado e/ou nao existe!!";
        }
    } catch (PDOException $e) {
        echo "erro ao Consultar:" . $e->getMessage();
    }
} else {
    echo "Digite um email valido para consulta";
}
?>