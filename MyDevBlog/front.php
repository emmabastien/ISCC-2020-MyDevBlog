<!DOCTYPE html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>

<head>
<link rel="stylesheet" type="text/css" href="couleur.css"> 
<title>DevBlog Emma BASTIEN - Front php</title>
</head>

<?php 
include ('header.php');
?>

<nav>
     <ul class="site">
         <li><a class="site" href="front.php?page=1">Accueil</a></li>
         <li><a class="site" href="front.php?page=2">Articles</a></li>
         <li><a class="site" href="front.php?page=3">Contacts</a></li>  
     </ul>
</nav> 

<?php 
function site(){
    if (isset($_GET['page']))
    if ($_GET ['page'] == 1){
        echo include ('accueil.php');
    }

    if (isset($_GET['page']))
    if ($_GET ['page'] == 2){
        echo include ('articles.php');
    }
    
    if (isset($_GET['page']))
    if ($_GET ['page'] == 3){
        echo include ('contacts.php');
    }

    if (isset($_GET['page']))
    if ($_GET ['page'] == 4){
        echo include ('connexion.php');
    }

    if (isset($_GET['page']))
    if ($_GET ['page'] == 5){
        echo include ('article.php');
    }
}

site();



include ('footer.php');

?>