<?php
    // Captura o caminho do diretório raiz do servidor e inclui o arquivo 'cliente.php' da pasta 'model'
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Banco-de-dados/model/cliente.php';

    // Define uma classe chamada 'clienteController' para controlar as operações com o cliente
    class clienteController {
        // Declara uma variável privada para armazenar uma instância da classe Cliente
        private $cliente;
        
        // Construtor da classe, executado automaticamente ao instanciar o objeto
        public function __construct() {
            // Instancia um objeto da classe Cliente
            $this->cliente = new Cliente();

            // Verifica se o parâmetro 'acao' foi passado via URL e executa a ação correspondente
            if (isset($_GET['acao'])) {
                // Se a ação for 'inserir', chama o método 'inserir' e depois redireciona para a página de consulta
                if ($_GET['acao'] == 'inserir') {
                    $this->inserir();
                    header('Location: ../consultar.php?acao=consultar'); // Redireciona após inserir
                } 
                // Se a ação for 'atualizar', chama o método 'atualizar' passando o ID e redireciona para a página de consulta
                else if ($_GET['acao'] == 'atualizar') {
                    $this->atualizar($_GET['id']);
                    header('Location: ../consultar.php?acao=consultar'); // Redireciona após atualizar
                }
                // Se a ação for 'excluir', chama o método 'excluir' passando o ID
                else if ($_GET['acao'] == 'excluir'){
                    $this->excluir($_GET['id']);
                }
            }
        }

        // Método responsável por inserir os dados de um cliente
        public function inserir() {
            // Define o nome do cliente com base no dado enviado via POST
            $this->cliente->setNome($_POST['nome']);

            // Chama o método 'inserir' da classe Cliente para adicionar os dados no banco de dados
            $this->cliente->inserir();
        }

        // Método para listar todos os clientes
        public function listar() {
            return $this->cliente->listar(); // Retorna a lista de clientes
        }

        // Método para buscar um cliente específico pelo ID
        public function buscarPorId($id) {
            return $this->cliente->buscarPorId($id); // Retorna os dados do cliente com o ID especificado
        }

        // Método para atualizar os dados de um cliente com base no ID
        public function atualizar($id) {
            // Define o novo nome do cliente com base no dado enviado via POST
            $this->cliente->setNome($_POST['nome']);
            // Atualiza os dados no banco de dados chamando o método 'atualizar' da classe Cliente
            $this->cliente->atualizar($id);
        }

        // Método para excluir um cliente com base no ID
        public function excluir($id) {
            // Chama o método 'excluir' da classe Cliente para remover o cliente com o ID especificado
            $this->cliente->excluir($id);
        }
    }

    // Instancia um novo objeto da classe clienteController, o que automaticamente verifica se uma ação deve ser executada
    new clienteController();
?>