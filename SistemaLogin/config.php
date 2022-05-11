<?php
/* credenciais do banco de dados. Supondo que você esteja executando o mysql servidor com  configuração padrão (usuario 'root' sem senha) */
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','login');
/*Tentativa de conexão com o banco de dados*/
try{
    $pdo = new PDO("mysql:host=".DB_SERVER. ";dbname=" .DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e){
    die("ERROR: Nao foi possivel conectar.".$e -> getMessage());
    
}
?>
