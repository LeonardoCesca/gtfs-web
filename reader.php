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