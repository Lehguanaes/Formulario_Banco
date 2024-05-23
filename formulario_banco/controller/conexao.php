<?php
    class Conexao {
        // Variaveis para armazenar informações de conexão
        private $host = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $banco = "primeiro_banco";
        private $conexao; // Objeto de conexão com o banco de dados

        // Construtor para estabelecer a conexão com o banco de dados
        public function __construct() {

            // Inicializa uma nova conexão MySQLi
            $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

            // Verifica se houve falha na conexão
            if ($this->conexao->connect_error) {

                // Se houver falha, exibe uma mensagem de erro e encerra o script
                die("Falha na conexão: " . $this->conexao->connect_error);
            }
        }

        // Método para retornar o objeto de conexão com o banco de dados
        public function getConexao() {
            return $this->conexao;
        }
    }
?>