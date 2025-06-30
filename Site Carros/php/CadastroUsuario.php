<?php
    require_once 'Conexao.php';

    $email = $_POST['emailFormulario'];
    $nome  = $_POST['nomeFormulario'];
    $senha = $_POST['senhaFormulario']; 


    
    if(!empty($email) && !empty($nome) && !empty($senha)){
        //Pegamos a senha digitado pelo usuário e realizamos uma criptografia nela
        //com base nisso, vamos armazenar o hash(criptografia) no banco de dados.
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        //Instrução DML
        $sql = "INSERT INTO usuarios (email, nome, senha) VALUES (:email, :nome, :senha)";

        //preparar a inserção de dados no banco
        $requisicao = $conexao->prepare($sql);

        $requisicao->bindParam(':email', $email);
        $requisicao->bindParam(':nome', $nome);
        $requisicao->bindParam(':senha', $senhaHash);

        try{
            $requisicao->execute();
            echo 'Usuário cadastrado com sucesso!';
        }catch(PDOException $e){
            echo 'Erro ao cadastrar: ' . $e->getMessage();
        }

    }else{
        echo '<p style="color:red;">Preencha todos os campos. </p>';
    }

?>