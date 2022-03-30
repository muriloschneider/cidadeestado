<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $title = " Estado";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>

    
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>

    
</head>
<body>

<a  href="cidade.php">Cidades</a>
<a  href="estado.php">Estados</a>
<a  href="cadastroestado.php">Cadastro de Estado</a>
<a  href="cadastrocidade.php">Cadastro de Cidade</a>

<br><br>
    
 <form method="post">

    <h3>Procurar Estado</h3>

        <input type="text" name="procurar" id="procurar" size="50" 
        value="<?php echo $procurar;?>"> <br>
        <button name="acaoI" id="acaoI" type="submit" >Procurar</button>
        <br><br>

        <form method="post" action="">
                <input type="radio" name="tipo" value="1" class="form-check-input" <?php if ($tipo == "1") echo "checked" ?>> ID do Estado<br>
                <input type="radio" name="tipo" value="2" class="form-check-input" <?php if ($tipo == "2") echo "checked" ?>> Nome do Estado<br>
                <input type="radio" name="tipo" value="3" class="form-check-input" <?php if ($tipo == "3") echo "checked" ?>> Sigla<br>

    </div>

    <br><br>
    </form>

    <table>
            <tr><td><b>ID</b></td>
                <td><b>Estado</b></td>
                <td><b>Sigla</b></td>
                <td><b>Excluir</b></td>
                <td><b>Editar</b></td>
            </tr> 

            
    <?php
        $pdo = Conexao::getInstance(); 

        if($tipo == 1){
            $consulta = $pdo->query("SELECT * FROM estado
                                WHERE id LIKE '$procurar%' 
                                ORDER BY id");}

        else if($tipo == 2){
            $consulta = $pdo->query("SELECT * FROM estado
                                WHERE name LIKE '$procurar%' 
                                ORDER BY name");}

        else if($tipo == 3){
            $consulta = $pdo->query("SELECT * FROM estado 
                                WHERE sigla LIKE '$procurar%'
                                ORDER BY sigla");}


    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        
        ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['name'];?></td>
            <td><?php echo $linha['sigla'];?></td>
            <td><?php echo " <a href=javascript:excluirRegistro('acaoI.php?acaoI=excluir&id={$linha['id']}')>"; ?>xxxxxx</a></td>
        <td><?php echo "<a href='tarefa1503/cadastroestado.php?acaoI=editar&id={$linha['id']}')>";?>editar</a></td>
  
        
        
        </tr>
    <?php } ?>       
    </table>
    </fieldset>
    </form>
            </div>
    
</body>
</html>