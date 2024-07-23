<?php
// IMPORTANTE -> Toda página php que realiza uma operação de banco tem uma importação controller.
    require_once $_SERVER['DOCUMENT_ROOT'] . '/formulario_banco/controller/PessoaController.php';
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
        <?php
            $pessoaController = new PessoaController();
            $pessoa = $pessoaController->buscarPorId($_GET['id']);
        ?>        
        <form method = "POST" action="controller/PessoaController.php?acao=atualizar&id=<?php echo $pessoa['id'];?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?php echo $pessoa['nome'];?>">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço" value="<?php echo $pessoa['endereco'];?>">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro" value="<?php echo $pessoa['bairro'];?>">
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP" value="<?php echo $pessoa['cep'];?>">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade" value="<?php echo $pessoa['cidade'];?>">
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o estado" value="<?php echo $pessoa['estado'];?>">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" value="<?php echo $pessoa['telefone'];?>">
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="Digite o celular" value="<?php echo $pessoa['celular'];?>">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>