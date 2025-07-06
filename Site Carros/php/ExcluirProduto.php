<?php
require_once 'Conexao.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../html/loginAdmin.html");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id = :id";
$verificacao = $conexao->prepare($sql);
$verificacao->bindParam(':id', $id);

try {
    $verificacao->execute();
    header("Location: ./ProdutosAdm.php");
} catch (PDOException $e) {
    echo "Erro ao excluir: " . $e->getMessage();
}
?>
