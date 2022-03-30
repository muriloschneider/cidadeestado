<?php
    class Estado{
        private $estadoid;
        private $estadoname;
        private $sigla;
        
        public function __construct($id, $est, $sig){
            
            $this->estadoid = $id;
            $this->estadoname = $est;
            $this->sigla = $sig;
        }

        public function __toString(){
            $str = "ID do Estado: ".$this->estadoid.
            "<br>Nome do Estado: ".$this->estadoname.
            "<br>Sigla: ".$this->sigla;
            
            return $str;
        }
        
        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO estado (name, sigla) VALUES(:name, :sigla)');
            $stmt->bindParam(':name', $this->estadoname, PDO::PARAM_STR);
            $stmt->bindParam(':sigla', $this->sigla, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }
        
        function editar($estadoid){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE estado SET name = :name, sigla = :sigla WHERE id = :id');
            $stmt->bindParam(':id', $estadoid, PDO::PARAM_INT);
            $stmt->bindParam(':name', $this->estadoname, PDO::PARAM_STR);
            $stmt->bindParam(':sigla', $this->sigla, PDO::PARAM_STR);
        
    
            $stmt->execute();
        }

        function excluir($estadoid){   
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM estado WHERE id = :id');
            $stmt->bindParam(':id', $estadoid);
            
            return $stmt->execute();
        }
      
    }



?>