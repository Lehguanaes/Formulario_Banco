<!DOCTYPE html>
<html>
<head>
    <title>Tela de Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Consulta</h2>
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
                // Simulação de registros
                // Array representando um registro com nome, rg (exemplo) e cpf (exemplo)
                $registros = [
                    ['João', '123456789', '987654321'], 
                    ['Maria', '987654321', '123456789'], 
                    ['Pedro', '555555555', '999999999']
                ];
                // Atribuindo o valor de cada elemento à variável $registro.
                foreach ($registros as $registro) {
                    echo '<tr>'; // Imprime uma nova linha na tabela HTML
                    echo '<td>' . $registro[0] . '</td>'; // Imprime o primeiro elemento do registro na célula da tabela
                    echo '<td>' . $registro[1] . '</td>'; // Imprime o segundo elemento do registro na célula da tabela
                    echo '<td>' . $registro[2] . '</td>'; // Imprime o terceiro elemento do registro na célula da tabela
                    echo '<td>'; // Abre uma célula para os botões de ação
                    echo '<button class="btn btn-primary">Editar</button>'; // Cria um botão de edição
                    echo '<button class="btn btn-danger">Excluir</button>'; // Cria um botão de exclusão
                    echo '</td>'; // Fecha a célula dos botões de ação
                    echo '</tr>'; // Fecha a linha da tabela HTML
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
