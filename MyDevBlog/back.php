<!DOCTYPE html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>

<head>
<link rel="stylesheet" type="text/css" href="couleur.css"> 
<title>DevBlog Emma BASTIEN - Back php</title>
</head>

<?php 
include ('header.php');
?>

<nav>
     <ul>
         <li><a href="back.php?page=1">Ajout article</a></li>
         <li><a href="back.php?page=2">Ajout utilisateur</a></li>
         <li><a href="back.php?page=3">Utilisateurs</a></li>
         <li><a href="front.php?page=1">Accueil</a></li>
     </ul>
</nav> 

<?php 
function site(){
    if (isset($_GET['page']))
    if ($_GET ['page'] == 1){
        echo include ('ajoutarticle.php');
    }

    if (isset($_GET['page']))
    if ($_GET ['page'] == 2){
        echo include ('ajoututilisateur.php');
    }
    
    if (isset($_GET['page']))
    if ($_GET ['page'] == 3){
        echo include ('utilisateur.php');
    }

    if (isset($_GET['page']))
    if ($_GET ['page'] == 4){
        echo include ('accueil.php');
    }

}

site();

?>
