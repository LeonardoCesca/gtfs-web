<?php
    
    $conexao = "mysql:host=localhost;dbname=trabWeb";
    $user = "root";
    $password= "";
    
    try {
        $pdo = new PDO($conexao, $user, $password);
        echo "Connected successfully";
    } catch (PDOException $error) {
        echo "Connection error: " . $error->getMessage();
    }    

?>