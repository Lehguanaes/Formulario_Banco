<?php
// IMPORTANTE -> Toda página PHP que realiza uma operação de banco tem uma importação controller.
require_once $_SERVER['DOCUMENT_ROOT'] . '/Banco-de-dados/controller/pessoaController.php';

// Verifica se o ID foi passado via GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID inválido.');
}

$pessoaController = new PessoaController();
$pessoa = $pessoaController->buscarPorId($_GET['id']);

// Verifica se a pessoa foi encontrada
if (!$pessoa) {
    die('Pessoa não encontrada.');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div>&nbsp;</div>
        <h2>Editar</h2>
        <div>&nbsp;</div>

        <form method="POST" action="/Banco-de-dados/controller/pessoaController.php?acao=atualizar&id=<?php echo htmlspecialchars($pessoa['id']); ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?php echo htmlspecialchars($pessoa['nome']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</body>
</html>