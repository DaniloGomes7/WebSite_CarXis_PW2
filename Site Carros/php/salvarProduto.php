<?php
session_start();
require_once 'Conexao.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../html/loginAdmin.html");
    exit;
}

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$imagem = $_POST['imagem'];
$admin_id = $_SESSION['admin_id'];
$usuario_id = $_POST['usuario_id'] ?? null;

if (empty($nome) || empty($descricao) || empty($preco) || empty($imagem)) {
    echo "Preencha todos os campos obrigatórios.";
    exit;
}

try {

    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem, admin_id, usuario_id)
            VALUES (:nome, :descricao, :preco, :imagem, :admin_id, :usuario_id)";

    $verificacao = $conexao->prepare($sql);
    $verificacao->bindParam(':nome', $nome);
    $verificacao->bindParam(':descricao', $descricao);
    $verificacao->bindParam(':preco', $preco);
    $verificacao->bindParam(':imagem', $imagem);
    $verificacao->bindParam(':admin_id', $admin_id);
    $verificacao->bindParam(':usuario_id', $usuario_id);

    $verificacao->execute();

    header("Location: ./ProdutosAdm.php");
    exit;
} catch (PDOException $e) {
    echo "Erro ao salvar o produto: " . $e->getMessage();
}
