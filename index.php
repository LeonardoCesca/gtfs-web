<?php 

require 'db.php';

$open = fopen('routes.txt','r');

while (!feof($open)) 
{
    $getTextLine = fgets($open);
        
    $explodeLine = explode(",",$getTextLine);

    $list_explode = list($route_id, $agency_id, $route_short_name, $route_long_name, $route_desc, $route_type, $route_url, $route_color, $route_text_color) = array_pad($explodeLine, 9, null);
        
    $qry = $pdo->prepare("INSERT INTO routes (route_id, agency_id, route_short_name, route_long_name, route_desc, route_type, route_url, route_color, route_text_color) values('".$route_id."','".$agency_id."','".$route_short_name."','".$route_long_name."','".$route_desc."','".$route_type."','".$route_url."','".$route_color."','".$route_text_color."')");
    
    $qry->execute($list_explode);
}

fclose($open);

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