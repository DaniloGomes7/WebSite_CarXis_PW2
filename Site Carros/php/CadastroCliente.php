<?php
require_once 'Conexao.php'; //Conecta no banco

$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

if (!empty($email) && !empty($senha) && !empty($nome)) {

    //Criptografando a senha que o usuario digitou
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    //vamos reliazar o DML (INSERT)
    $sql = "INSERT INTO usuarios (nome, email, senha)
    VALUES (:nome, :email, :senha)";
    //(parametros) : | indicam que ali sera colocado um valor 
    //que veio no formulario, ex :nome, :email...

    $requisicao = $conexao ->prepare($sql);
    ///pegar o valores das variaveis (que veiodo HTML)
    //vamos passar como parametros para o script  que vai
    //executar no banco

    $requisicao -> bindParam(":nome", $nome);
    $requisicao -> bindParam(":email", $email);
    $requisicao -> bindParam(":senha", $senhaHash);

    try{
        $requisicao -> execute();
        echo"Usuario cadastrado com êxito!!";
    }catch(PDOException $e) {
        echo "Erro ao cadastrar". $e -> getMessage();
}
}else{
    echo '<p style="color: red;">Preencha todos os campos.</p>';
}
?>