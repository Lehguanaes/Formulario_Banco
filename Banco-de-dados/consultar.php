<?php
    // Inclui o arquivo do controlador de clientes, responsável por gerenciar as operações de CRUD
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Banco-de-dados/controller/clienteController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Define o título da página e inclui o CSS do Bootstrap para estilização -->
    <title>Tela de Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <!-- Cria uma margem superior -->
        <div>&nbsp;</div>

        <!-- Exibe o título da página -->
        <h2>Consulta</h2>

        <!-- Cria outra margem -->
        <div>&nbsp;</div>

        <!-- Cria uma tabela estilizada com Bootstrap para exibir os dados dos clientes -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- Cabeçalhos da tabela: Nome e Ações (Editar/Excluir) -->
                    <th>Nome</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Instancia o controlador de clientes para acessar os métodos
                $clienteController = new ClienteController();

                // Chama o método listar() para obter todos os clientes do banco de dados
                $clientes = $clienteController->listar();

                // Itera sobre cada cliente e exibe uma linha na tabela para cada um
                foreach ($clientes as $cliente) {
                    ?>
                <tr>
                    <!-- Exibe o nome do cliente, utilizando htmlspecialchars para prevenir ataques XSS -->
                    <td><?php echo htmlspecialchars($cliente['nome']); ?></td>
                    <td>
                        <!-- Botão para editar o cliente, redireciona para a página de edição com o ID do cliente -->
                        <a href="editar.php?acao=editar&id=<?php echo $cliente['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                    <td>
                        <!-- Botão para excluir o cliente, redireciona para a página de exclusão com o ID do cliente -->
                        <a href="consultar.php?acao=excluir&id=<?php echo $cliente['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
                <?php } // Fecha o loop foreach ?>
            </tbody>
        </table>
    </div>
</body>
</html>