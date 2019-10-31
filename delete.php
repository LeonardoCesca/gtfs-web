<?php

require 'db.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=trabWeb", "root", "");

    $id = $_REQUEST['id'];

    $sql = "DELETE 
            FROM routes WHERE id=". $id;

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>