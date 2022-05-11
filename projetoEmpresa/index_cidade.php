
<?php
require_once('config.php');

try{
    $stmte = $pdo->query('SELECT * FROM cidade');
    $executa = $stmte->execute();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head><title>empresa</title></head>
<body>    
    <h1 aling="center">Crud muito Simples.</h1>
    <div align="center"> 
        <a href="add_cidade.php">Nova cidade</a>
    </div>
    <table border="2" align="center">
    <tr>
        <td><b>ID</td>
        <td><b>Nome</td>
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
                <td><?=$reg->nome?></td>
                <td><a href="editar_cidade.php?id=<?=$reg->id?>">Editar</a></td>
                <td><a href="apagar_cidade.php?id=<?=$reg->id?>">Excluir</a></td>            
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