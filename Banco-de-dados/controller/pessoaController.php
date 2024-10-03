<?php
    //Forma automatizada
    //Captura o endereço primário no servidor 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Banco-de-dados/model/pessoa.php';

    class pessoaController {
        // Variável para armazenar uma instância da classe Pessoa
        private $pessoa;
        
        // Construtor para inicializar a instância da classe Pessoa e inserir os dados
        public function __construct() {
            // Instancia um objeto da classe Pessoa
            $this->pessoa = new Pessoa();

            // Verifica se a ação está definida e realiza a ação correspondente
            if (isset($_GET['acao'])) {
                if ($_GET['acao'] == 'inserir') {
                    $this->inserir();
                    header('Location: ../consultar.php?acao=consultar'); // Redireciona após inserir
                }else if ($_GET['acao'] == 'atualizar') {
                    $this->atualizar($_GET['id']);
                    header('Location: ../consultar.php?acao=consultar'); // Redireciona após atualizar
                }else if ($_GET['acao'] == 'excluir'){
                    $this->excluir($_GET['id']);
                }
            }
        }

        // Método para inserir os dados de pessoa no banco de dados
        public function inserir() {
            // Define os valores dos atributos da pessoa com base nos dados recebidos por POST
            $this->pessoa->setNome($_POST['nome']);

            // Chama o método inserir da instância da classe Pessoa para inserir os dados no banco de dados
            $this->pessoa->inserir();
        }

        // Método para listar o banco de dados
        public function listar() {
            return $this->pessoa->listar();
        }

        public function buscarPorId($id) {
            return $this->pessoa->buscarPorId($id);
        }

        public function atualizar($id) {
            $this->pessoa->setNome($_POST['nome']);
            $this->pessoa->atualizar($id);
        }

        public function excluir($id) {
            $this->pessoa->excluir($id);
        }
    }

    // Instancia um objeto da classe PessoaController para acionar o processo de inserção de dados
    new pessoaController();
?>