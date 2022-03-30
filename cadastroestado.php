<!DOCTYPE html>

<?php
    include_once "acao/acaoestado.php";
    $acaoestado = isset($_GET['acaoestado']) ? $_GET['acaoestado'] : "";
    $dados;
    if ($acaoestado == 'editar'){
        $estadoid = isset($_GET['estado.id']) ? $_GET['estado.id'] : "";
    if ($estadoid > 0)
        $dados = buscarDados($estado.id);
}
    $title = "Cadastro de Cidades";
    $estadoname = isset($_POST['estado.name']) ? $_POST['estado.name'] : "";
    $sigla = isset($_POST['sigla']) ? $_POST['sigla'] : "";


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

<a class="nav-link" href="cidade.php">Cidades</a>
<a class="nav-link" href="estado.php">Estados</a>
<a class="nav-link" href="cadastroestado.php">Cadastro de Estado</a>
<a class="nav-link" href="cadastrocidade.php">Cadastro de Cidade</a>

    

<br>
<h3>Insira o Estado</h3>

        <form method="post" action="acaoestado.php">
        <div class="form-group col-lg-3">

        
        <label>Nome </label>
                    <input name="estado.name" id="estado.name" type="text" required="true" class="form-control" value="<?php if ($acaoestado == "editar") echo $dados['estado.name']; ?>"><br>
                
        <label>Sigla  </label>
                    <input name="sigla" id="sigla" type="text" required="true" class="form-control" value="<?php if ($acaoestado == "editar") echo $dados['sigla']; ?>"
                    maxlength="2" minlength="2"><br>
          
        


    <button name="acaoestado" value="salvar" id="acaoestado" type="submit" class="btn btn-outline-secondary">
                    Salvar
                </button>


                </div>
           
    </form>
</body>
</html>