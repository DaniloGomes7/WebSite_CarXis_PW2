<?php
session_start();
require_once 'Conexao.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../html/loginAdmin.html");
    exit;
}

if (!isset($_GET['id'])) {
    echo "ID não encontrado.";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    echo "Produto não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../css/editarProduto.css">
</head>

<body class="container-principal">
    <div class="formulario-editar">
        <h1>Editar Produto</h1>
        <form method="POST" action="./AtualizarProduto.php">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
            <textarea name="descricao" required><?= htmlspecialchars($produto['descricao']) ?></textarea>
            <input type="number" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required>
            <input type="text" name="imagem" value="<?= htmlspecialchars($produto['imagem']) ?>" required>

            <input type="submit" value="Salvar">
            <a href="./ProdutosAdm.php">Voltar</a>
        </form>
    </div>
</body>

</html>