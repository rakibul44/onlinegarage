<?php
$db = require_once('config/config.php');
# MySQL with PDO_MYSQL  
$db = new PDO("mysql:host=$serverName;dbname=$dbName", $dbUserName, $dbpassword);

$query = file_get_contents("db.sql");

$stmt = $db->prepare($query);

if ($stmt->execute()){
     echo "Success";
}else{ 
     echo "Fail";
}