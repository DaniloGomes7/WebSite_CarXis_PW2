<?php
require_once 'Conexao.php'; 

$email = $_POST['email'];
$nome = $_POST['nome'];
$cracha = $_POST['numero_cracha'];
$senha = $_POST['senha'];

if (!empty($email) && !empty($nome) && !empty($cracha) && !empty($senha)) {

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO administradores (nome, email, senha, numero_cracha)
            VALUES (:nome, :email, :senha, :numero_cracha)";

    $requisicao = $conexao->prepare($sql);

    $requisicao->bindParam(":nome", $nome);
    $requisicao->bindParam(":email", $email);
    $requisicao->bindParam(":senha", $senhaHash);
    $requisicao->bindParam(":numero_cracha", $cracha);

    try {
        $requisicao->execute();
        echo "Usuário cadastrado com êxito!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }

} else {
    echo '<p style="color: red;">Preencha todos os campos.</p>';
}
?>
