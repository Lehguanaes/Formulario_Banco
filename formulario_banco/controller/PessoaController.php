<?php

    require_once '../model/pessoa.php';

    class PessoaController{
        // Variavel para armazenar uma instância da classe Pessoa
        private $pessoa;
        
        // Construtor para inicializar a instância da classe Pessoa e inserir os dados
        public function __construct(){

            // Instancia um objeto da classe Pessoa
            $this->pessoa = new Pessoa();

            // Chama o método inserir para inserir os dados no banco de dados
            $this->inserir();
        }

       // Método para inserir os dados de pessoa no banco de dados
        public function inserir(){

            // Define os valores dos atributos da pessoa com base nos dados recebidos por POST
            $this->pessoa->setNome($_POST['nome']);
            $this->pessoa->setEndereco($_POST['endereco']);
            $this->pessoa->setBairro($_POST['bairro']);
            $this->pessoa->setCep($_POST['cep']);
            $this->pessoa->setCidade($_POST['cidade']);
            $this->pessoa->setEstado($_POST['estado']);
            $this->pessoa->setTelefone($_POST['telefone']);
            $this->pessoa->setCelular($_POST['celular']);
        
            // Chama o método inserir da instância da classe Pessoa para inserir os dados no banco de dados
            $this->pessoa->inserir();

        }
    }
    // Instancia um objeto da classe PessoaController para acionar o processo de inserção de dados
    new PessoaController();
?>