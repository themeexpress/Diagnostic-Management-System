<?php
//set My PDO connection Here
$servername = "localhost";
$db_name = "diagnostic_manage";
$db_user = "root";
$db_password = "";

try {
    $db = new PDO("mysql:host=$servername;dbname=$db_name", $db_user, $db_password);
   
} catch (PDOException $e) {
    echo $e->getMessage();
}



?>