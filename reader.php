<?php 

$conexao = "mysql:host=localhost;dbname=trabWeb";
$user = "root";
$password= "";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($conexao, $user, $password);
    echo "Connected successfully";
} catch (PDOException $error) {
    echo "Connection error: " . $error->getMessage();
}

$open = fopen('routes.txt','r');

while (!feof($open)) 
{
    $getTextLine = fgets($open);
    
    echo $getTextLine;
	
    list($route_id, $agency_id, $route_short_name, $route_long_name, $route_desc, $route_type, $route_url, $route_color, $route_text_color) = array_pad(explode(",",$getTextLine), 9, null);
    	
	$qry = $pdo->prepare("INSERT INTO routes (route_id, agency_id, route_short_name, route_long_name, route_desc, route_type, route_url, route_color, route_text_color) values('".$route_id."','".$agency_id."','".$route_short_name."','".$route_long_name."','".$route_desc."','".$route_type."','".$route_url."','".$route_color."','".$route_text_color."')");
    
    $qry->bindParam(:route_id, $route_id);
    $qry->bindParam(:agency_id, $agency_id);
    $qry->bindParam(:route_short_name, $route_short_name);
    $qry->bindParam(:route_long_name, $route_long_name);
    $qry->bindParam(:route_desc, $route_desc);
    $qry->bindParam(:route_type, $route_type);
    $qry->bindParam(:route_url, $route_url);
    $qry->bindParam(:route_color, $route_color);
    $qry->bindParam(:route_text_color, $route_text_color);
}

fclose($open);

?>