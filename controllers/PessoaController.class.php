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

        public function formulárioeditar(){
            require_once "Views/form_pessoa_update.php";
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

        public function editar(){
            $pessoaDAO = new PessoaDAO();

            $msg = array("");
            if($_POST){
                if(empty($_POST["nomeOriginal"])){
                    $msg[0] = "preencha o nome a ser trocado!";
                }
                if(empty($_POST["nome"])){
                    $msg[0] = "preencha o nome para trocar";
                }
            }
            if($msg[0] == ""){
                $nome = new Pessoa($_POST["nomeOriginal"]);
                $pessoa = new Pessoa($_POST["nome"]);
                $pessoaDAO = new pessoaDAO();
                $retorno = $pessoaDAO->update($pessoa,$nome);
                echo $retorno;
            }

            require_once "Views/form_pessoa_update.php";

        }
    }   
?>