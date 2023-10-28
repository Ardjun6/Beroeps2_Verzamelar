<?php
// hostname or ip of server
$servername='localhost';
// username and password to log onto db server
$dbusername='acr_school';
$dbpassword='Shai2991';
// name of database
$dbname='acr_Portfolio';

////////////// Do not  edit below/////////
$mysqli = new mysqli($servername,$dbusername,$dbpassword,$dbname);
if($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysql->connect_error);
    exit();
}

?>