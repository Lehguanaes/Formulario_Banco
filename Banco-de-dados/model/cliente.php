<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Banco-de-dados/controller/conexao.php';

    // Define a classe Cliente para gerenciar os dados do cliente no sistema
    class Cliente {
        // Variáveis privadas para armazenar as informações do cliente
        private $id;
        private $nome;

        // Variável para armazenar o objeto de conexão com o banco de dados
        private $conexao;

        // Métodos getters e setters para acessar e modificar as propriedades privadas

        // Retorna o valor do ID do cliente
        public function getId() {
            return $this->id;
        }

        // Define o valor do ID do cliente
        public function setId($id) {
            $this->id = $id;
        }

        // Retorna o nome do cliente
        public function getNome() {
            return $this->nome;
        }

        // Define o nome do cliente
        public function setNome($nome) {
            $this->nome = $nome;
        }

        // Construtor da classe, responsável por inicializar a conexão com o banco de dados
        public function __construct() {
            // Cria uma nova instância da classe de conexão com o banco
            $this->conexao = new Conexao();
        }

        // Método para inserir os dados do cliente no banco de dados
        public function inserir() {
            // Declaração SQL para inserir um novo cliente
            $sql = "INSERT INTO cliente (nome) VALUES (?)";

            // Prepara a declaração SQL
            $stmt = $this->conexao->getConexao()->prepare($sql);

            // Verifica se a preparação da declaração foi bem-sucedida
            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            // Associa o nome do cliente como parâmetro na declaração SQL
            $stmt->bind_param('s', $this->nome);

            // Executa a declaração SQL e verifica se houve erro
            if (!$stmt->execute()) {
                die('Erro ao executar a declaração: ' . $stmt->error);
            }

            // Fecha a declaração após a execução
            $stmt->close();
        }

        // Método para listar todos os clientes no banco de dados
        public function listar() {
            // Declaração SQL para selecionar todos os clientes
            $sql = "SELECT * FROM cliente";

            // Prepara a declaração SQL
            $stmt = $this->conexao->getConexao()->prepare($sql);

            // Verifica se a preparação da declaração foi bem-sucedida
            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            // Executa a declaração SQL
            $stmt->execute();
            $result = $stmt->get_result();

            // Cria um vetor para armazenar os registros de clientes
            $clientes = [];

            // Itera sobre os resultados e armazena cada cliente no vetor
            while ($cliente = $result->fetch_assoc()) {
                $clientes[] = $cliente;
            }

            // Fecha a declaração
            $stmt->close();

            // Retorna o vetor com os registros dos clientes
            return $clientes;
        }

        // Método para buscar um cliente específico por ID
        public function buscarPorId($id) {
            // Declaração SQL para buscar um cliente pelo ID
            $sql = "SELECT * FROM cliente WHERE id = ?";

            // Prepara a declaração SQL
            $stmt = $this->conexao->getConexao()->prepare($sql);

            // Verifica se a preparação da declaração foi bem-sucedida
            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            // Associa o ID do cliente como parâmetro na declaração SQL
            $stmt->bind_param('i', $id);

            // Executa a declaração SQL
            $stmt->execute();
            $result = $stmt->get_result();

            // Fecha a declaração
            $stmt->close();

            // Retorna o registro do cliente encontrado
            return $result->fetch_assoc();
        }

        // Método para atualizar os dados de um cliente no banco de dados com base no ID
        public function atualizar($id) {
            // Declaração SQL para atualizar os dados de um cliente
            $sql = "UPDATE cliente SET nome = ? WHERE id = ?";

            // Prepara a declaração SQL
            $stmt = $this->conexao->getConexao()->prepare($sql);

            // Verifica se a preparação da declaração foi bem-sucedida
            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            // Associa os parâmetros (nome e ID) na declaração SQL
            $stmt->bind_param('si', $this->nome, $id);

            // Executa a declaração SQL e verifica se houve erro
            if (!$stmt->execute()) {
                die('Erro ao executar a declaração: ' . $stmt->error);
            }

            // Fecha a declaração após a execução
            $stmt->close();
        }

        // Método para excluir um cliente do banco de dados com base no ID
        public function excluir($id) {
            // Declaração SQL para deletar um cliente pelo ID
            $sql = "DELETE FROM cliente WHERE id = ?";

            // Prepara a declaração SQL
            $stmt = $this->conexao->getConexao()->prepare($sql);

            // Verifica se a preparação da declaração foi bem-sucedida
            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            // Associa o ID como parâmetro na declaração SQL
            $stmt->bind_param('i', $id);

            // Executa a declaração SQL e verifica se houve erro
            if (!$stmt->execute()) {
                die('Erro ao executar a declaração: ' . $stmt->error);
            }

            // Fecha a declaração após a execução
            $stmt->close();
        }
    }
?>