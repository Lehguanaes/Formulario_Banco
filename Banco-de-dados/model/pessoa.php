<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Banco-de-dados/controller/conexao.php';

    // Define a classe Pessoa
    class Pessoa {
        // Variáveis privadas para armazenar informações da pessoa
        private $id;
        private $nome;

        // Objeto de conexão com o banco de dados
        private $conexao;

        // Métodos getters e setters para acessar e modificar as propriedades privadas
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        // Construtor para inicializar a conexão com o banco de dados
        public function __construct() {
            // Cria uma nova instância da classe de conexão
            $this->conexao = new Conexao();
        }

        // Método para inserir os dados da pessoa no banco de dados
        public function inserir() {
            // Declaração SQL para inserção dos dados
            $sql = "INSERT INTO cliente (nome) VALUES (?)";

            // Prepara a declaração SQL
            $stmt = $this->conexao->getConexao()->prepare($sql);

            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            // Associa os parâmetros da declaração SQL com as propriedades da classe
            $stmt->bind_param('s', $this->nome);

            // Executa a declaração SQL
            if (!$stmt->execute()) {
                die('Erro ao executar a declaração: ' . $stmt->error);
            }

            // Fecha a declaração
            $stmt->close();
        }

        // Método para listar todos os registros de pessoas
        public function listar() {
            // Declaração SQL para selecionar todos os registros
            $sql = "SELECT * FROM cliente";
            $stmt = $this->conexao->getConexao()->prepare($sql);

            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            // Cria um vetor para armazenar os registros
            $pessoas = [];

            // Itera sobre os resultados e armazena cada registro no vetor
            while ($pessoa = $result->fetch_assoc()) {
                $pessoas[] = $pessoa;
            }

            // Fecha a declaração
            $stmt->close();

            // Retorna o vetor com os registros
            return $pessoas;
        }

        // Método para buscar um registro por ID
        public function buscarPorId($id) {
            // Declaração SQL para selecionar um registro pelo ID
            $sql = "SELECT * FROM cliente WHERE id = ?";
            $stmt = $this->conexao->getConexao()->prepare($sql);

            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            // Associa o parâmetro ID à declaração SQL
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Fecha a declaração
            $stmt->close();

            // Retorna o registro encontrado
            return $result->fetch_assoc();
        }

        // Método para atualizar os dados de um registro pelo ID
        public function atualizar($id) {
            // Declaração SQL para atualizar os dados
            $sql = "UPDATE cliente SET nome = ? WHERE id = ?";
            $stmt = $this->conexao->getConexao()->prepare($sql);

            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            // Associa os parâmetros à declaração SQL
            $stmt->bind_param('si', $this->nome, $id);

            // Executa a declaração SQL
            if (!$stmt->execute()) {
                die('Erro ao executar a declaração: ' . $stmt->error);
            }

            // Fecha a declaração
            $stmt->close();
        }

        // Método para excluir um registro pelo ID
        public function excluir($id) {
            // Declaração SQL para deletar os dados
            $sql = "DELETE FROM cliente WHERE id = ?";
            $stmt = $this->conexao->getConexao()->prepare($sql);

            if (!$stmt) {
                die('Erro ao preparar a declaração: ' . $this->conexao->getConexao()->error);
            }

            // Associa os parâmetros à declaração SQL
            $stmt->bind_param('i', $id);

            // Executa a declaração SQL
            if (!$stmt->execute()) {
                die('Erro ao executar a declaração: ' . $stmt->error);
            }

            // Fecha a declaração
            $stmt->close();
        }
    }
?>