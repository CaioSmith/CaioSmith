<?php
    require_once('config.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, nome_completo, cpf, rg, data_de_nascimento, usuario, logradouro, complemento, bairro, cidade from cliente WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR);
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $nome_completo = $reg->nome_completo;
    $cpf = $reg->cpf;
    $rg = $reg->rg;
    $data_de_nascimento = $reg->data_de_nascimento;
    $usuario = $reg->usuario;
    $logradouro = $reg->logradouro;
    $complemento = $reg->complemento;
    $bairro = $reg->bairro;
    $cidade = $reg->cidade;
    
?>
<h3>Tem certeza de que deseja excluir o registro <?=$id?>?</h3>
<div align="center">
    Nome Completo: <?=$nome_completo?><br>
    CPF: <?=$cpf?><br>
    RG: <?=$rg?><br>
    Data de Nascimento: <?=$data_de_nascimento?><br>
    Usuário: <?=$usuario?><br>
    Logradouro: <?=$logradouro?><br>
    Complemento: <?=$complemento?><br>
    Bairro: <?=$bairro?><br>
    Cidade: <?=$cidade?><br>


    <form method="post" action="">
    <input name="id" type="hidden" value="<?=$id?>">
    <input name="enviar" type="submit" value="Excluir!">
    </form>
</div>

<?php
    if(isset($_POST['enviar'])){
    $id = $_POST['id'];
        $sql = "DELETE FROM  cliente WHERE id = :id";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);   
        if($sth->execute()){
            print "<script>alert('Registro excluído com sucesso!');location='index_cliente.php';</script>";
        }else{
            print "Erro ao exclur o registro!<br><br>";
        }
    }
?>