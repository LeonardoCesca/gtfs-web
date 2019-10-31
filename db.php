<?php
    
    $conexao = "mysql:host=localhost;dbname=trabWeb";
    $user = "root";
    $password= "";
    
    try {
        $pdo = new PDO($conexao, $user, $password);
    } catch (PDOException $error) {
        echo "Erro de conexão: " . $error->getMessage();
    }    

?>