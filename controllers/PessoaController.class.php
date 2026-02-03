<?php 
require_once "Models/Conexao.php";
require_once "Models/Pessoa.php";
require_once "Models/PessoaDAO.php";

    class PessoaController{
        public function formulário(){
            require_once "Views/form_pessoa.php";
        }

        public function formulárioDeletar(){
            require_once "Views/form_pessoa_deletar.php";
        }

        public function inserir(){
            $msg = array("");
            if($_POST){
                if(empty($_POST["nome"])){
                    $msg[0] = "Preencha o nome";
                }
            }
            if($msg[0] == ""){
                $pessoa = new Pessoa($_POST["nome"]);
                $pessoaDAO = new pessoaDAO();
                $retorno = $pessoaDAO->inserir($pessoa);
                echo $retorno;
            }
            require_once "Views/form_pessoa.php";  
        }

        public function deletar(){
            $msg = array("");
            if($_POST){
                if(empty($_POST["nome"])){
                    $msg[0] = "Preencha o nome";
                }
            }
            if($msg[0] == ""){
                $pessoa = new Pessoa($_POST["nome"]);
                $pessoaDAO = new pessoaDAO();
                $retorno = $pessoaDAO->remover($pessoa);
                echo $retorno;
            }
            require_once "Views/form_pessoa_deletar.php";  
        }

        public function listar(){
            $pessoaDAO = new PessoaDAO();
            $pessoas = $pessoaDAO->listar();

            // envia os dados para a view
            require_once "Views/exibir_pessoa.php";
        }
    }   
?>