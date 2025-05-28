<?php
$myfile = fopen("myIP.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("myIP.txt"));
fclose($myfile);
?>

