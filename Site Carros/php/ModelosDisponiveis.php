<?php
require_once 'Conexao.php';

$sql = "SELECT p.*, a.nome AS admin_nome
        FROM produtos p
        JOIN administradores a ON p.admin_id = a.id";

$verificacao = $conexao->prepare($sql);
$verificacao->execute();
$produtos = $verificacao->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Carros de Luxo - Carxis</title>
    <link rel="stylesheet" href="../css/produtos.css">
</head>

<body>
    <h1>Modelos Disponíveis</h1>

    <div class="container-produtos">
        <?php foreach ($produtos as $carro): ?>
            <div class="box">
                <h3><?= $carro['nome'] ?></h3>
                <p><?= $carro['descricao'] ?></p>
                <p><strong>R$ <?= number_format($carro['preco'], 2, ',', '.') ?></strong></p>
                <p><em>Anunciado por: <?= $carro['admin_nome'] ?></em></p>
                <a class="botao" href="#">DETALHES</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>