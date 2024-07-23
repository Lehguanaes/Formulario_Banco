<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/formulario_banco/controller/conexao.php';

    // Define a classe Pessoa
    class Pessoa {
        // Variáveis privadas para armazenar informações da pessoa
        private $id;
        private $nome;
        private $endereco;
        private $bairro;
        private $cep;
        private $cidade;
        private $estado;
        private $telefone;
        private $celular;

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

        public function getEndereco() {
            return $this->endereco;
        }

        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }

        public function getBairro() {
            return $this->bairro;
        }

        public function setBairro($bairro) {
            $this->bairro = $bairro;
        }

        public function getCep() {
            return $this->cep;
        }

        public function setCep($cep) {
            $this->cep = $cep;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function setCidade($cidade) {
            $this->cidade = $cidade;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function getCelular() {
            return $this->celular;
        }

        public function setCelular($celular) {
            $this->celular = $celular;
        }

        // Construtor para inicializar a conexão com o banco de dados
        public function __construct() {
            // Cria uma nova instância da classe de conexão
            $this->conexao = new Conexao();
        }

        // Método para inserir os dados da pessoa no banco de dados
        public function inserir() {
            // Declaração SQL para inserção dos dados
            $sql = "INSERT INTO cliente (`nome`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `telefone`, `celular`) VALUES (?,?,?,?,?,?,?,?)";

            // Prepara a declaração SQL
            $stmt = $this->conexao->getConexao()->prepare($sql);

            // Associa os parâmetros da declaração SQL com as propriedades da classe
            $stmt->bind_param('ssssssss', $this->nome, $this->endereco, $this->bairro, $this->cep, $this->cidade, $this->estado, $this->telefone, $this->celular);

            // Executa a declaração SQL e retorna o resultado
            return $stmt->execute();
        }

        // Método para listar todos os registros de pessoas
        public function listar() {
            // Declaração SQL para selecionar todos os registros
            $sql = "SELECT * FROM cliente";
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            // Cria um vetor para armazenar os registros
            $pessoas = [];

            // Itera sobre os resultados e armazena cada registro no vetor
            while ($pessoa = $result->fetch_assoc()) {
                $pessoas[] = $pessoa;
            }

            // Retorna o vetor com os registros
            return $pessoas;
        }

        // Método para buscar um registro por ID
        public function buscarPorId($id) {
            // Declaração SQL para selecionar um registro pelo ID
            $sql = "SELECT * FROM cliente WHERE id = ?";
            $stmt = $this->conexao->getConexao()->prepare($sql);

            // Associa o parâmetro ID à declaração SQL
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Retorna o registro encontrado
            return $result->fetch_assoc();
        }

        // Método para atualizar os dados de um registro pelo ID
        public function atualizar($id) {
            // Declaração SQL para atualizar os dados
            $sql = "UPDATE cliente SET nome = ?, endereco = ?, bairro = ?, cep = ?, cidade = ?, estado = ?, telefone = ?, celular = ? WHERE id = ?";
            $stmt = $this->conexao->getConexao()->prepare($sql);

            // Associa os parâmetros à declaração SQL
            $stmt->bind_param('ssssssssi', $this->nome, $this->endereco, $this->bairro, $this->cep, $this->cidade, $this->estado, $this->telefone, $this->celular, $id);

            // Executa a declaração SQL e retorna o resultado
            return $stmt->execute();
        }
    }
?>