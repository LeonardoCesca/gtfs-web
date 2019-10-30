<?php 

require 'db.php';

$open = fopen('routes.txt','r');

while (!feof($open)) 
{
    $getTextLine = fgets($open);
    	
    $list_explode = list($route_id, $agency_id, $route_short_name, $route_long_name, $route_desc, $route_type, $route_url, $route_color, $route_text_color) = array_pad(explode(",",$getTextLine), 9, null);
        
    echo $list_explode;

    $qry = $pdo->prepare("INSERT INTO routes (route_id, agency_id, route_short_name, route_long_name, route_desc, route_type, route_url, route_color, route_text_color) values('".$route_id."','".$agency_id."','".$route_short_name."','".$route_long_name."','".$route_desc."','".$route_type."','".$route_url."','".$route_color."','".$route_text_color."')");
   
}

fclose($open);

?>