<?php
    // Forma manual
    // require_once '../model/pessoa.php';

    //Forma automatizada
    //Captura o endereço primario no servidor 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/formulario_banco/model/pessoa.php';

    class PessoaController{
        // Variavel para armazenar uma instância da classe Pessoa
        private $pessoa;
        
        // Construtor para inicializar a instância da classe Pessoa e inserir os dados
        public function __construct(){

            // Instancia um objeto da classe Pessoa
            $this->pessoa = new Pessoa();

            // Condicional para saber a ação que será realizada
            if($_GET['acao'] == 'inserir'){
            // Chama o método inserir para inserir os dados no banco de dados
            // Acionado quando o botão submit for ativado
                $this->inserir();
            }else if($_GET['acao'] == 'atualizar'){
                $this->atualizar($_GET['id']);
            }
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

        // Método para listar o banco de dados
        public function listar(){
            return $this->pessoa->listar();
        }

        public function buscarPorId($id){
            return $this->pessoa->buscarPorId($id);
        }

        public function atualizar($id){
            $this->pessoa->setId($id);
            $this->pessoa->setNome($_POST['nome']);
            $this->pessoa->setEndereco($_POST['endereco']);
            $this->pessoa->setBairro($_POST['bairro']);
            $this->pessoa->setCep($_POST['cep']);
            $this->pessoa->setCidade($_POST['cidade']);
            $this->pessoa->setEstado($_POST['estado']);
            $this->pessoa->setTelefone($_POST['telefone']);
            $this->pessoa->setCelular($_POST['celular']);

            $this->pessoa->atualizar($id);
        }
    }
    // Instancia um objeto da classe PessoaController para acionar o processo de inserção de dados
    new PessoaController();
?>