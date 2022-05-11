
<?php
require_once('config.php');

try{
    $stmte = $pdo->query('SELECT * FROM cliente');
    $executa = $stmte->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head><title>empresa</title>
    <!-- JavaScript Bundle with Popper -->
    <link href= "style.css" rel="stylesheet">
</head>
<body>  
    <div class="container" id="container">  
    <h1 aling="center">Crud muito Simples.</h1>
    <div align="center"> 
        <a href="add_cliente.php">Novo Cliente</a>
    </div>
    <table class= "tabela1" border="2" align="center">
    <tr>
        <td><b>ID</td>
        <td><b>Nome</td>
        <td><b>CPF</td>
        <td><b>RG</td>
        <td><b>Data de Nascimento</td>
        <td><b>Usuário</td>
        <td><b>Logradouro</td>
        <td><b>Complemento</td>
        <td><b>Bairro</td>
        <td><b>Cidade</td>
        <td colspan="2" align="center">Ação</td>
</tr>
</body>
</html>

<?php
if($executa){
    while($reg = $stmte->fetch(PDO::FETCH_OBJ)){
?>
            <tr>
                <td><?=$reg->id?></td>
                <td><?=$reg->nome_completo?></td>
                <td><?=$reg->cpf?></td>
                <td><?=$reg->rg?></td>
                <td><?=$reg->data_de_nascimento?></td>
                <td><?=$reg->usuario?></td>
                <td><?=$reg->logradouro?></td>
                <td><?=$reg->complemento?></td>
                <td><?=$reg->bairro?></td>
                <td><?=$reg->cidade?></td>
                <td><a href="editar_cliente.php?id=<?=$reg->id?>">Editar</a></td>
                <td><a href="apagar_cliente.php?id=<?=$reg->id?>">Excluir</a></td>            
            </tr>
<?php
        }  
        print '</table>';
    }else{
        echo 'Erro ao inserir dados';
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
?>