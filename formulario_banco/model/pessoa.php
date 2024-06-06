<?php
    require_once '../controller/conexao.php';

    class Pessoa{
        // Variaveis privadas para armazenar informações da pessoa
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

        // Getters e Setters para acessar e modificar as propriedades privadas
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getEndereco(){
            return $this->endereco;
        }
        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }
        public function getBairro(){
            return $this->bairro;
        }
        public function setBairro($bairro){
            $this->bairro = $bairro;
        }
        public function getCep(){
            return $this->cep;
        }
        public function setCep($cep){
            $this->cep = $cep;
        }
        public function getCidade(){
            return $this->cidade;
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function getTelefone(){
            return $this->telefone;
        }
        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }
        public function getCelular(){
            return $this->celular;
        }
        public function setCelular($celular){
            $this->celular = $celular;
        }
        
        // Construtor para inicializar a conexão com o banco de dados
        public function __construct(){
            // Instância da classe de conexão
            $this->conexao = new Conexao(); 
        }

        // Método para inserir os dados da pessoa no banco de dados
        public function inserir(){
            // Declaração SQL para inserção dos dados
            $sql = "INSERT INTO cliente (`nome`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `telefone`, `celular`) VALUES (?,?,?,?,?,?,?,?)";
        
            // Preparação da declaração SQL
            $stmt = $this->conexao->getConexao()->prepare($sql);
            
            // Associação dos parâmetros da declaração SQL com as propriedades da classe
            $stmt->bind_param('ssssssss', $this->nome, $this->endereco, $this->bairro, $this->cep, $this->cidade, $this->estado, $this->telefone, $this->celular);
        
            // Execução da declaração SQL e retorno do resultado
            return $stmt->execute();
        }
    }
?>
