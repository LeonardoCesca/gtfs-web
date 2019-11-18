<?php
    
    $servername = "mysql:host=localhost";
    $username = "root";
    $password= "";
    
    $pdo = new PDO($servername, $username, $password);
    
    function createDB() {

        global $pdo;

        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS trabWeb";
            $pdo->exec($sql);
            $sql = "use trabWeb";
            $pdo->exec($sql);
            $sql = "CREATE TABLE IF NOT EXISTS routes (
                    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    route_id varchar(255) NOT NULL,
                    agency_id varchar(255) NOT NULL,
                    route_short_name varchar(255) NOT NULL,
                    route_long_name varchar(255) NOT NULL,
                    route_desc varchar(255) NOT NULL,
                    route_type varchar(255) NOT NULL,
                    route_url varchar(255) NOT NULL,
                    route_color varchar(255) NOT NULL,
                    route_text_color varchar(255) NOT NULL)";
            $pdo->exec($sql);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function manipulateTxt() {        
        global $pdo;

        $openTxt = fopen('routes.txt','r');

        while (!feof($openTxt)) {

            $getTextLine = fgets($openTxt);
                
            $explodeLine = explode(",",$getTextLine);

            $list_explode = list($route_id, $agency_id, $route_short_name, $route_long_name, $route_desc, $route_type, $route_url, $route_color, $route_text_color) = array_pad($explodeLine, 9, null);
                
            $qry = $pdo->prepare("INSERT INTO routes (route_id, agency_id, route_short_name, route_long_name, route_desc, route_type, route_url, route_color, route_text_color) values('".$route_id."','".$agency_id."','".$route_short_name."','".$route_long_name."','".$route_desc."','".$route_type."','".$route_url."','".$route_color."','".$route_text_color."')");
            
            $qry->execute($list_explode);
        }

        fclose($openTxt);
    }

    createDB();
    manipulateTxt();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Trabalho Web - 2019/2</title>
</head>
<body>
    <div class="c-container">
        <h1 class="c-container__title">Trabalho Final - Web 2019/2</h1>
        <form action="table.php" method="GET">
            <input class="o-btn o-btn--black" type="submit" value="Ver linhas de Ônibus">
        </form>
    </div>
</body>
</html>