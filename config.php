<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "kse";

//The connction object
$con = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

//Check connection
if ($con->connect_error){
    die("Connection faield:".$con->connect_error);
}
?>