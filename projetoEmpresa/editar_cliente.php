<?php

    require_once('config.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, nome_completo, cpf, rg, data_de_nascimento, usuario, logradouro, complemento, bairro, cidade from cliente WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
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
<div align="center">
    <form method="post" action="">
    Nome completo: <input type="text" name="nome_completo"><br>
      CPF: <input type="text" name="cpf"><br>
      RG: <input type="text" name="rg"><br>
      Data de nascimento: <input type="date" name="data_de_nascimento"><br>
      Usuário: <input type="text" name="usuario"><br>
      Logradouro: <input type="text" name="logradouro"><br>
      Complemento: <input type="text" name="complemento"><br>
      Bairro: <input type="text" name="bairro">
      Cidade: <input type="text" name="cidade">
      <br>
        <input name="id" type="hidden" value="<?=$id?>">
        <input name="enviar" type="submit" value="Editar">
    </form>
</div>

<?php
require_once('config.php');
if(isset($_POST['enviar'])){
    $nome_completo=$_POST['nome_completo'];
     $cpf=$_POST['cpf'];
     $rg=$_POST['rg'];
     $data_de_nascimento=$_POST['data_de_nascimento'];
     $usuario=$_POST['usuario'];
     $logradouro=$_POST['logradouro'];
     $complemento=$_POST['complemento'];
     $bairro=$_POST['bairro'];
     $cidade=$_POST['cidade'];
     
     
    $sql = "UPDATE cliente SET nome_completo = :nome_completo, cpf = :cpf, rg = :rg, data_de_nascimento = :data_de_nascimento, usuario = :usuario, logradouro = :logradouro, complemento = :complemento, bairro = :bairro, cidade = :cidade WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':nome_completo', $_POST['nome_completo'], PDO::PARAM_INT); 
    $sth->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_INT);   
    $sth->bindParam(':rg', $_POST['rg'], PDO::PARAM_INT);   
    $sth->bindParam(':data_de_nascimento', $_POST['data_de_nascimento'], PDO::PARAM_INT);   
    $sth->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_INT);     
    $sth->bindParam(':logradouro', $_POST['logradouro'], PDO::PARAM_INT);  
    $sth->bindParam(':complemento', $_POST['complemento'], PDO::PARAM_INT);   
    $sth->bindParam(':bairro', $_POST['bairro'], PDO::PARAM_INT);   
    $sth->bindParam(':cidade', $_POST['cidade'], PDO::PARAM_INT);   
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='index_cliente.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>
<a href="index_cliente.php">Voltar</a>