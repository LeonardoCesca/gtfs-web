<?php
// get contents of a file into a string
$filename = "./routes.txt";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
echo($contents);
fclose($handle);
?>