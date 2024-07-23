<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/formulario_banco/controller/PessoaController.php';
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
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $pessoaController = new PessoaController();
                $pessoas = $pessoaController->listar();

                foreach ($pessoas as $pessoa) {
                    ?>
                <tr>
                    <th> <?php echo $pessoa['nome']; ?></th>
                    <th> <?php echo $pessoa['telefone']; ?></th>
                    <th> <?php echo $pessoa['celular']; ?></th>
                    <th> <a href="editar.php?id= <?php echo $pessoa['id']; ?>">editar</a></th>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>