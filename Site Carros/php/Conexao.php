<?php
    $host      = 'localhost';
    $nomeBanco = 'CarXis';
    $usuario   = 'root';
    $senha     = '';
   
    try{
        $conexao = new PDO(
            "mysql:host=$host;
            dbname=$nomeBanco;charset=UTF8",
            $usuario,
            $senha
        );
        
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexão realizada com êxito! <br><hr><br>";

    }catch(PDOException $e){
        echo "ERRO: " . $e->getMessage();
    }
?>