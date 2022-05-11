<div align="center">
    <form method="post" action="add_cliente.php">
      Nome completo: <input type="text" name="nome_completo">
      CPF: <input type="text" name="cpf">
      RG: <input type="text" name="rg">
      Data de nascimento: <input type="date" name="data_de_nascimento">
      Usuário: <input type="text" name="usuario">
      Logradouro: <input type="text" name="logradouro">
      Complemento: <input type="text" name="complemento">
      Bairro: <input type="text" name="bairro">
      Cidade: <input type="text" name="cidade">
      <br>
      <input name="enviar" type="submit" value="cadastrar">
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


    try{
        $stmte = $pdo->prepare("INSERT INTO cliente(nome_completo, cpf, rg, data_de_nascimento, usuario, logradouro, complemento, bairro, cidade) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmte->bindParam(1, $nome_completo, PDO::PARAM_STR);
        $stmte->bindParam(2, $cpf, PDO::PARAM_STR);
        $stmte->bindParam(3, $rg, PDO::PARAM_STR);
        $stmte->bindParam(4, $data_de_nascimento, PDO::PARAM_STR);
        $stmte->bindParam(5, $usuario, PDO::PARAM_STR);
        $stmte->bindParam(6, $logradouro, PDO::PARAM_STR);
        $stmte->bindParam(7, $complemento, PDO::PARAM_STR);
        $stmte->bindParam(8, $bairro, PDO::PARAM_STR);
        $stmte->bindParam(9, $cidade, PDO::PARAM_STR);
        $executa = $stmte->execute();
            if($executa){
                echo "Dados inseridos com sucesso";
                header('location:index_cliente.php');
            }else{
                echo "Erro ao inserir os dados";
            }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>