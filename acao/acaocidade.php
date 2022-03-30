<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    
    $acaocidade = isset($_GET['acaocidade']) ? $_GET['acaocidade'] : "";
    if ($acaocidade == "excluir"){
        $id_cidade = isset($_GET['cidade.id']) ? $_GET['cidade.id'] : 0;
        require_once ("classes/cidade.class.php");
        $cidade = new Cidade("", "", "");
        $resultado = $cidade->excluir($id_cidade);
        header("location:tarefa1503/cidade.php");
    }

  
    $acaocidade = isset($_POST['acaocidade']) ? $_POST['acaocidade'] : "";
    if ($acaocidade == "salvar"){
        $id_cidade = isset($_POST['cidade.id']) ? $_POST['cidade.id'] : "";
        if ($id_cidade == 0){
            require_once ("classes/cidade.class.php");

            $cidade = new Cidade("", $_POST['cidade.name'], $_POST['estado.id']);
            
            $resultado = $cidade->inserir();
            header("location:tarefa1503/cidade.php");
        }
        else
        require_once ("classes/cidade.class.php");

        $cidade = new Cidade("", $_POST['cidade.name'], $_POST['estado.id']);
        
        $resultado = $cidade->editar($id_cidade);
        header("location:tarefa1503/cidade.php");
    }



//Consultar dados
    function buscarDados($id_cidade){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM cidade WHERE cidade.id = $cidade.id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['cidade.id'] = $linha['cidade.id'];
            $dados['cidade.name'] = $linha['cidade.name'];
            $dados['estado.id'] = $linha['estado.id'];

        }
        //var_dump($dados);
        return $dados;
    }

?>