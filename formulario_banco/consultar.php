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
                $registros = [
                    ['João', '123456789', '987654321'],
                    ['Maria', '987654321', '123456789'],
                    ['Pedro', '555555555', '999999999']
                ];

                foreach ($registros as $registro) {
                    echo '<tr>';
                    echo '<td>' . $registro[0] . '</td>';
                    echo '<td>' . $registro[1] . '</td>';
                    echo '<td>' . $registro[2] . '</td>';
                    echo '<td>';
                    echo '<button class="btn btn-primary">Editar</button>';
                    echo '<button class="btn btn-danger">Excluir</button>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>