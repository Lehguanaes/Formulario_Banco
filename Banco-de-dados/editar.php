<?php
// IMPORTANTE -> Toda página PHP que realiza uma operação de banco tem uma importação controller.
// Inclui o arquivo do controlador de clientes, que lida com operações como buscar, atualizar, excluir e inserir clientes no banco de dados.
require_once $_SERVER['DOCUMENT_ROOT'] . '/Banco-de-dados/controller/clienteController.php';

// Verifica se o ID do cliente foi passado via GET (pela URL) e se é um valor numérico válido.
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Se o ID não for passado ou não for válido, o script é encerrado com uma mensagem de erro.
    die('ID inválido.');
}

// Cria uma nova instância do controlador de clientes para interagir com o banco de dados.
$clienteController = new ClienteController();

// Busca as informações do cliente com base no ID passado via GET.
$cliente = $clienteController->buscarPorId($_GET['id']);

// Verifica se o cliente foi encontrado no banco de dados. Se não for encontrado, encerra o script com uma mensagem.
if (!$cliente) {
    die('cliente não encontrado.');
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Define o título da aba do navegador -->
    <title>Tela de Cadastro</title>

    <!-- Inclui o CSS do Bootstrap para criar uma interface responsiva e estilizada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container"> <!-- Container centraliza o conteúdo da página -->
        <!-- Espaço em branco adicional para ajustar o layout -->
        <div>&nbsp;</div>

        <!-- Título da página -->
        <h2>Editar</h2>

        <!-- Mais espaço em branco antes do formulário -->
        <div>&nbsp;</div>

        <!-- Formulário para edição do cliente -->
        <!-- O formulário envia dados via POST para o controlador de clientes, passando a ação de 'atualizar' e o ID do cliente via GET -->
        <form method="POST" action="/Banco-de-dados/controller/clienteController.php?acao=atualizar&id=<?php echo htmlspecialchars($cliente['id']); ?>">
            
            <!-- Campo de entrada para o nome do cliente -->
            <div class="form-group">
                <label for="nome">Nome:</label>
                
                <!-- O valor atual do nome do cliente é inserido automaticamente no campo, para que possa ser editado -->
                <!-- htmlspecialchars() protege contra ataques XSS, convertendo caracteres especiais -->
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?php echo htmlspecialchars($cliente['nome']); ?>" required>
            </div>
            
            <!-- Botão para enviar o formulário e confirmar a edição -->
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</body>
</html>