<?php
require_once 'Conexao.php';
session_start();

// Verificação de sessão admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../html/loginAdmin.html");
    exit;
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$imagem = $_POST['imagem'];
$usuario_id = !empty($_POST['usuario_id']) ? $_POST['usuario_id'] : null;

$sql = "UPDATE produtos 
        SET nome = :nome, descricao = :descricao, preco = :preco, imagem = :imagem, usuario_id = :usuario_id 
        WHERE id = :id";

$verificacao = $conexao->prepare($sql);
$verificacao->bindParam(':nome', $nome);
$verificacao->bindParam(':descricao', $descricao);
$verificacao->bindParam(':preco', $preco);
$verificacao->bindParam(':imagem', $imagem);
$verificacao->bindParam(':usuario_id', $usuario_id);
$verificacao->bindParam(':id', $id);

try {
    $verificacao->execute();
    header("Location: ./ProdutosAdm.php");
} catch (PDOException $e) {
    echo "Erro ao atualizar: " . $e->getMessage();
}
?>
