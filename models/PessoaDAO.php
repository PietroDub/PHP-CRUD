<?php 
    class pessoaDAO extends Conexao{
        public function __construct($db = null){
            return parent::__construct($db);
        }
        public function inserir($pessoa){
            $sql = "INSERT INTO pessoa (nome) VALUES (?)";
            try{
                // teste
                // var_dump($this->db);
		        // die;

                //preparar a frase
                $stm = $this->prepare($sql);
                $stm->bindValue(1, $pessoa->getNome());

                $stm->execute();
                //fecha a conexão
                $this->db = null;
                return "Pessoa inserida com sucesso!";

            } catch(PDOException $e){
                $this->db = null;
                return "Problema ao cadastrar pessoa";
            }
        }
    }
?>