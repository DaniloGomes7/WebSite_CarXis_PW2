<?php
session_start();
require_once('Conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];
$numero_cracha = $_POST['numero_cracha'];

if (!empty($email) && !empty($senha) && !empty($numero_cracha)) {


    $sql = 'SELECT * FROM administradores WHERE email = :email AND numero_cracha = :numero_cracha';
    $verifica = $conexao->prepare($sql);
    $verifica->bindParam(':email', $email);
    $verifica->bindParam(':numero_cracha', $numero_cracha);
    $verifica->execute();

    $admin = $verifica->fetch(PDO::FETCH_ASSOC);


    if ($admin && password_verify($senha, $admin['senha'])) {


        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_nome'] = $admin['nome'];


        header('location: ../html/HomeAdm.html');
        exit;
    } else {
        echo '<p style="color:red;">Email, senha ou número do crachá incorretos.</p>';
    }
} else {
    echo '<p style="color:red;">Preencha todos os campos.</p>';
}
