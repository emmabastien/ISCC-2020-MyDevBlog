<?php
session_start();
?>

<!DOCTYPE html> 

<html> 
<head> 
<title>securite</title> 
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
        
$pdo =connect_to_database();


 if(empty($_POST['login'])) {
        echo "Le champ login est vide.";
    } else {
       
        if(empty($_POST['password'])) {
            echo "Le champ Mot de passe est vide.";
          
        } else {
            $login = $_POST['login'];
        
                $user = $pdo->query("SELECT * FROM utilisateur WHERE login = '$login'");
                $users = $user->fetch();
                
                if ($users['login'] == $_POST['login']) {
                    if ($users['password'] == $_POST['password']){
                        echo "Vous êtes connecté";
                        $_SESSION['id'] = $_POST['login'];
                        setcookie('id', $_POST['login']);
                        header ('Location: back.php');
                        exit;
                    }
                    else {
                        echo "Mauvais couple identifiant / mot de passe.";
                        echo '<a href="front.php?page=4"> connexion </a>'; 
                    }
                }
                else {
                    echo "Mauvais couple identifiant / mot de passe.";
                    echo '<a href="front.php?page=4"> connexion </a>';
                }
            }
        }

?>