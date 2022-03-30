<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    
    $acaoestado = isset($_GET['acaoestado']) ? $_GET['acaoestado'] : "";
    if ($acaoestado == "excluir"){
        $id_estado = isset($_GET['estado.id']) ? $_GET['estado.id'] : 0;
        require_once ("classes/estado.class.php");
        $estado = new Estado("", "", "");
        $resultado = $estado->excluir($id_estado);
            header("location:tarefa1503/estado.php");
    }

    $acaoestado = isset($_POST['acaoestado']) ? $_POST['acaoestado'] : "";
    if ($acaoestado == "salvar"){
        $id_estado = isset($_POST['estado.id']) ? $_POST['estado.id'] : "";
        if ($id_estado == 0){
            require_once ("classes/estado.class.php");

            $estado = new Estado("", $_POST['estado.name'], $_POST['sigla']);
            
            $resultado = $estado->inserir();
            header("location:tarefa1503/estado.php");
        }
        else
        require_once ("classes/estado.class.php");

        $estado = new Estado("", $_POST['estado.name'], $_POST['sigla']);
        
        $resultado = $estado->editar($id_estado);
        header("location:tarefa1503/estado.php");
    }
    

//Consultar dados
    function buscarDados($id_estado){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM estado WHERE estado.id = $estado.id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['estado.id'] = $linha['estado.id'];
            $dados['estado.name'] = $linha['estado.name'];
            $dados['sigla'] = $linha['sigla'];

        }
        //var_dump($dados);
        return $dados;
    }

    
?>