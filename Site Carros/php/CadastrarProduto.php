<?php
require_once 'Conexao.php';
session_start();

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$imagem = $_POST['imagem'];
$admin_id = $_SESSION['admin_id'];
$usuario_id = !empty($_POST['usuario_id']) ? $_POST['usuario_id'] : null;

if ($admin_id && $nome && $descricao && $preco && $imagem) {
    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem, admin_id, usuario_id)
            VALUES (:nome, :descricao, :preco, :imagem, :admin_id, :usuario_id)";

    $verificacao = $conexao->prepare($sql);
    $verificacao->bindParam(':nome', $nome);
    $verificacao->bindParam(':descricao', $descricao);
    $verificacao->bindParam(':preco', $preco);
    $verificacao->bindParam(':imagem', $imagem);
    $verificacao->bindParam(':admin_id', $admin_id);
    $verificacao->bindParam(':usuario_id', $usuario_id);

    try {
        $verificacao->execute();
        header("Location: ./ProdutosAdm.php");
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
} else {
    echo "Preencha todos os campos obrigatórios.";
}
