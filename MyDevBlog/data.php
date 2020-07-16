<?php
function connect_to_database(){
$servername = "localhost";
$username = "root";
$password = "root";
$databasename = "MyDevBlog";

try {
    $pdo = new PDO ("mysql:host=$servername;dbname=$databasename", $username);
    

    
    return $pdo;
} catch (PDOException $e){
    echo "Connection failed: ".$e->getMessage();
}
}

connect_to_database();


$pdo =connect_to_database();


?>