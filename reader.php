<?php 

$conn = mysqli_connect('localhost','root','','demo');

$open = fopen('employee-data.txt','r');

while (!feof($open)) 
{
	$getTextLine = fgets($open);
	$explodeLine = explode(",",$getTextLine);
	
    list($name,$city,$postcode,$job_title) = $explodeLine;
    	
	$qry = "insert into empoyee_details (name, city,postcode,job_title) values('".$name."','".$city."','".$postcode."','".$job_title."')";
	mysqli_query($conn,$qry);
}

fclose($open);

?>