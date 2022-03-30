<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $title = "Cidade";
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

<br><br><br>
    <form method="post">

        <form method="post" action="">
                <input type="radio" name="tipo" value="1" class="form-check-input" <?php if ($tipo == "1") echo "checked" ?>> ID<br>
                <input type="radio" name="tipo" value="2" class="form-check-input" <?php if ($tipo == "2") echo "checked" ?>> Nome da Cidade<br>
                <input type="radio" name="tipo" value="3" class="form-check-input" <?php if ($tipo == "3") echo "checked" ?>> Estado<br>
                  
                    <h3>Procurar Cidade</h3>
                    <input type="text" name="procurar" id="procurar" size="50" 
                value="<?php echo $procurar;?>"> <br>
                <button name="acao" id="acao" type="submit" >Procurar</button>


<br><br>
    

    <table>
            <tr><td><b>ID</b></td>
                <td><b>Cidade</b></td>
                <td><b>Estado</b></td>
                <td><b>Excluir</b></td>
                <td><b>Editar</b></td>
            </tr> 

            
    <?php
        $pdo = Conexao::getInstance(); 

    if($tipo == 1){
        $consulta = $pdo->query("SELECT cidade.id as cid, estado.id as eid FROM estado, cidade 
                WHERE estado.id LIKE '$procurar%' 
                AND estado.id = cidade.id
                ORDER BY  cidade.id");
        }

    else if($tipo == 2){
        $consulta = $pdo->query("SELECT cidade.name as namec, estado.id as eid FROM estado, cidade 
                WHERE cidade.name LIKE '$procurar%' 
                AND estado.id = cidade.id
                ORDER BY cidade.name");
        }

    else if($tipo == 3){
        $consulta = $pdo->query("SELECT estado.name as namee, estado.id as eid FROM estado, cidade 
                WHERE estado.name LIKE '$procurar%'
                AND estado.id = cidade.id
                ORDER BY estado.id");}


    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        
        ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['cidade.name'];?></td>
            <td><?php echo $linha['estado.name'];?></td>
            <td><?php echo " <a href=javascript:excluirRegistro('acaocidade.php?acaocidade=excluir&cidade.id={$linha['cidade.id']}')>"; ?>xxxxxxx   </a></td>
        <td><?php echo "<a href='cadastrocidade.php?acao=editar&cidade.id={$linha['cidade.id']}')>";?>editar</a></td>
  
        
        </tr>
    <?php } ?>       
    </table>
    </fieldset>
    </form>
    
            
    
</body>
</html>