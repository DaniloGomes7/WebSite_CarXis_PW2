<?php
require_once 'Conexao.php'; 

$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

if (!empty($email) && !empty($senha) && !empty($nome)) {

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha)
    VALUES (:nome, :email, :senha)";
   
    $requisicao = $conexao ->prepare($sql);

    $requisicao -> bindParam(":nome", $nome);
    $requisicao -> bindParam(":email", $email);
    $requisicao -> bindParam(":senha", $senhaHash);

    try{
        $requisicao -> execute();
        echo"Usuario cadastrado com êxito!!";
    }catch(PDOException $e) {
        echo "Erro ao cadastrar". $e -> getMessage();
}
}else{
    echo '<p style="color: red;">Preencha todos os campos.</p>';
}
?>