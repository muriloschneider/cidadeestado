<!DOCTYPE html>

<?php
    include_once "acao/acaocidade.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $dados = buscarDados($id);
}
    $title = "Cadastro de Cidades";
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    
//var_dump($dados);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    
</head>
<body>

<a  href="cidade.php">Cidades</a>
<a href="estado.php">Estados</a>
<a href="cadastroestado.php">Cadastro de Estado</a>
<a href="cadastrocidade.php">Cadastro de Cidade</a>

<br>

<h3>Insira a Cidade</h3><br>

    <form method="post" action="acaocidade.php">

    <label>Nome da Cidade </label>
        <input name="name" id="name" type="text" required="true" class="form-control" value="<?php if ($acao == "editar") echo $dados['name']; ?>"><br>
    
    <label> Estado da Cidade </label><br>
        <select name="estado.id" id="estado.id" class="form-select"> 

        <?php
            $pdo = Conexao::getInstance(); 
                
            $consulta = $pdo->query("SELECT id FROM estado");

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   

            if ($acao == "editar") echo $dados['estado.id']; 
                                                                    
            ?>

                
              <option value="<?php echo $linha['estado.id'];?>"> <?php if ($acao == "editar") $dados['estado.id']; ?>  <?php echo $linha['estado.name'];?></option> 
               <?php }
               ?>
    </select>

<br><br>
<button name="acao" value="salvar" id="acao" type="submit" class="btn btn-outline-secondary">
                     Salvar
                </button>
            </form>
    </body>
</html>