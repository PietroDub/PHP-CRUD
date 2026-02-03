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
                $stm = $this->db->prepare($sql);
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

        public function remover ($pessoa){
            $sql = "DELETE FROM pessoa WHERE nome = ?";
            try{
                // teste
                // var_dump($this->db);
		        // die;

                //preparar a frase
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $pessoa->getNome());

                $stm->execute();
                //fecha a conexão
                $this->db = null;
                return "Pessoa deletada com sucesso!";

            } catch(PDOException $e){
                $this->db = null;
                return "Problema ao deletar pessoa";
            }
        }

        public function listar(){
                $sql = "SELECT nome FROM pessoa";
                $stm = $this->db->prepare($sql);
                $stm->execute();

                // transforma os dados do banco, em um array associativo
                return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>