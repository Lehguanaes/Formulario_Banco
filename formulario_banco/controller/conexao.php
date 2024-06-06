<?php
    class Conexao {
        // Variaveis para armazenar informações de conexão
        private $host = "localhost"; // Endereço do servidor do banco de dados
        private $usuario = "root"; // Nome de usuário do banco de dados
        private $senha = "";// Senha do banco de dados (não tem)
        private $banco = "primeiro_banco"; // Nome do banco
        private $conexao; // Objeto de conexão com o banco de dados

        // Construtor para estabelecer a conexão com o banco de dados
        public function __construct() {

            // Inicializa uma nova conexão MySQLi
            $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

            // Verifica se houve falha na conexão
            if ($this->conexao->connect_error) {

                // Se houver falha, exibe uma mensagem de erro e encerra
                die("Falha na conexão: " . $this->conexao->connect_error);
            }
        }

        // Método para retornar o objeto de conexão com o banco de dados
        public function getConexao() {
            // Esta função retorna este objeto de conexão
            return $this->conexao;
        }
    }
?>
