<?php
    class Cidade{
        private $cidadeid;
        private $cidadename;
        private $estadoid;
        
        public function __construct($id, $cid, $ide){ 
            $this->cidadeid = $id;
            $this->cidadename = $cid;
            $this->estadoid = $ide;
        }

        public function __toString(){
            $str = "ID da Cidade: ".$this->cidadeid.
            "<br>Nome da Cidade: ".$this->cidadename.
            "<br>Estado: ".$this->estadoid;
            return $str;
        }

        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO cidade (cidade.name, estado.id) VALUES(:cidade.name, :estado.id)');
            $stmt->bindParam(':cidade.name', $this->cidadename, PDO::PARAM_STR);
            $stmt->bindParam(':estado.id', $this->estadoid, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }

        public function editar($cidadeid){
            
            $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE cidade SET cidade.name = :cidade.name, estado.id = :estado.id WHERE cidade.id = :cidade.id');
        $stmt->bindParam(':cidade.id', $cidadeid, PDO::PARAM_INT);
        $stmt->bindParam(':cidade.name', $this->cidadename, PDO::PARAM_STR);
        $stmt->bindParam(':estado.id', $this->estadoid, PDO::PARAM_STR);
    

    
            return $stmt->execute();
            
        }


        function excluir($cidadeid){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM cidade WHERE cidade.id = :cidade.id');
            $stmt->bindParam(':cidade.id', $cidadeid);
            
            return $stmt->execute();
        }
       
}

?>