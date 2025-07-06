<?php
$host = '127.0.0.1';
$porta = '3307';
$nomeBanco = 'CarXis';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO(
        "mysql:host=$host;port=$porta;dbname=$nomeBanco;charset=UTF8",
        $usuario,
        $senha
    );
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br> Conexão realizada com êxito!<br><hr><br>" ;
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage() . "";
}
