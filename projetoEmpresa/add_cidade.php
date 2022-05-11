<div align="center">
    <form method="post" action="add_cidade.php">
      nome: <input type="text" name="nome">
      <br>
      <input name="enviar" type="submit" value="cadastrar">
    </form>
</div>
<?php 
    require_once('config.php');
    if(isset($_POST['enviar'])){
     $cidade=$_POST['nome'];

    
    try{
        $stmte = $pdo->prepare("INSERT INTO cidade(nome) VALUES (?)");
        $stmte->bindParam(1, $cidade, PDO::PARAM_STR);
        $executa = $stmte->execute();
            if($executa){
                echo "Dados inseridos com sucesso";
                header('location:index_cidade.php');
            }else{
                echo "Erro ao inserir os dados";
            }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>