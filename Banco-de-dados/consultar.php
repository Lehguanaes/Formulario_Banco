<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Banco-de-dados/controller/pessoaController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tela de Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div>&nbsp;</div>
        <h2>Consulta</h2>
        <div>&nbsp;</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php
                // Instancia o controlador de pessoas
                $pessoaController = new PessoaController();
                // Obtém a lista de pessoas
                $pessoas = $pessoaController->listar();

                // Itera sobre cada pessoa e exibe na tabela
                foreach ($pessoas as $pessoa) {
                    ?>
                <tr>
                    <td><?php echo htmlspecialchars($pessoa['nome']); ?></td>
                    <td> 
                        <a href="editar.php?acao=editar&id=<?php echo $pessoa['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                    <td>
                        <a href="consultar.php?acao=excluir&id=<?php echo $pessoa['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>