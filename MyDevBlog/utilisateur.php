<!DOCTYPE html>
<html>
 
<head>
 <title>utilisateur</title>
 <link rel="stylesheet" type="text/css" href="back.css"/>
 <meta charset="utf-8">
 
</head>
 
<body>
 
<?php
 
 function connect_to_database(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $databasename = "MyDevBlog";
    
    try {
        $pdo = new PDO ("mysql:host=$servername;dbname=$databasename", $username);
        
    
        echo "Connected successfully";
        return $pdo;
    } catch (PDOException $e){
        echo "Connection failed: ".$e->getMessage();
    }
    }
    
    connect_to_database();
    
    
    $pdo = connect_to_database();
 
$utilisateur = $pdo->query('SELECT * FROM utilisateur ORDER BY id DESC');


 
?>
<ul> 
 <?php while ($u = $utilisateur->fetch()) { ?>
 
 <li><?= $u['login'] ?> - <a href="utilisateur.php?supprime=<?= $u['id'] ?>">Supprimer</a></li>

 
</ul>

<?php

if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
    $supprime = (int) $_GET['supprime'];

    $req = $pdo->prepare('DELETE FROM utilisateur WHERE id = ?');
    $req->execute(array($supprime));

    $supprime = $pdo->query('SELECT * FROM utilisateur ORDER BY id DESC ');

}



 }
?>

</body>
</html>
