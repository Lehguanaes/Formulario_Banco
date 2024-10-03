<?php
   require_once $_SERVER['DOCUMENT_ROOT'] . '/Banco-de-dados/controller/pessoaController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Excluir</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div>&nbsp;</div>
    <div class="container">
        <h2>Excluir</h2>
        <!-- Recebimento de valores e conexão com o PHP -->
        <form method="POST" action="/Banco-de-dados/controller/pessoaController.php?acao=excluir&id=<?php echo htmlspecialchars($pessoa['id']); ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome:" disabled>
            </div>
            <button type="submit" class="btn btn-primary">Excluir</button>
        </form>
    </div>
</body>
</html>
