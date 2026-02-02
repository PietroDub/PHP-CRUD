<?php 
    class Pessoa{
        public function __construct(
            protected string $nome
        ){}

        //criar nome
        public function setNome($name){
            $this->nome = $name;
        }

        //puxar o nome
        public function getNome(){
            return $this->nome;
        }
    }
?>