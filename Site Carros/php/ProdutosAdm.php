<?php
session_start();
require_once 'Conexao.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../html/loginAdmin.html');
    exit;
}
$sql = "SELECT p.*, a.nome AS admin_nome, u.nome AS usuario_nome
        FROM produtos p
        JOIN administradores a ON p.admin_id = a.id
        LEFT JOIN usuarios u ON p.usuario_id = u.id";

$verificacao = $conexao->prepare($sql);
$verificacao->execute();
$produtos = $verificacao->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="../css/produtos.css">
</head>

<body class="corpo">
    <div class="container">
        <div class="menu">
            <ul id="menu-horizontal">
                <li><a href="../html/SobreNos.html">QUEM SOMOS </a></li>
                <li><a href="../html/Contato.html"> CONTATO </a></li>
                <li><a href="../html/HomeAdm.html" id="home"> INICIO </a></li>
                <li><a href="./ProdutosAdm.php"> PRODUTOS ✏️</a></li>
                <li><a href="../html/Endereco.html"> ENDEREÇO </a></li>
            </ul>
        </div>

        <main class="container2">
            <h1 id="h1-box">Gerenciar Produtos</h1>
            <a href="../html/NovoProduto.html" class="botao">Adicionar Novo Produto</a>
            <br><br>

            <?php foreach ($produtos as $carro): ?>
                <div class="box">
                    <h3><?= htmlspecialchars($carro['nome']) ?></h3>
                    <p><?= htmlspecialchars($carro['descricao']) ?></p>
                    <p>R$ <?= number_format($carro['preco'], 2, ',', '.') ?></p>
                    <p><strong>Admin:</strong> <?= htmlspecialchars($carro['admin_nome']) ?></p>
                    <p><strong>Cliente:</strong> <?= htmlspecialchars($carro['usuario_nome'] ?? 'Nenhum') ?></p>

                    <a href="EditarProduto.php?id=<?= $carro['id'] ?>" class="botao">✏️ Editar</a>
                    <a href="ExcluirProduto.php?id=<?= $carro['id'] ?>" class="botao" onclick="return confirm('Excluir produto?')">❌ Remover</a>
                </div>
            <?php endforeach; ?>
        </main>
    </div>
    <footer>
        <p><span class="configimg">CARXIS</span>&copy;2025 </p>
    </footer>
</body>

</html>