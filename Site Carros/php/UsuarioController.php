<?php
$requisicao = $_POST['requisicao'];

switch ($requisicao) {
    case 'Atualizar':
        include 'AtualizarUsuario.php';
        break;

    case 'Cadastrar':
        include 'CadastroUsuario.php';
        break;

    case 'Consultar':
        include 'ConsultarUsuario.php';
        break;

    case 'Remover':
        include 'RemoveUsuario.php';
        break;

    default:
        echo "Ação invalida, por favor selecionar uma opcao valida";
        break;
}
?>