<?php

    require_once('config.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, nome, uf_fk from cidade WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $nome = $reg->nome;

?>
<div align="center">
    <form method="post" action="">
        Nome<input type="text" name="nome" value="<?=$nome?>"><br>
        <input name="id" type="hidden" value="<?=$id?>">
        <input name="enviar" type="submit" value="Editar">
    </form>
</div>

<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "UPDATE cidade SET nome = :nome WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':nome', $_POST['nome'], PDO::PARAM_INT);   
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='index_cidade.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>
<a href="index_cidade.php">Voltar</a>