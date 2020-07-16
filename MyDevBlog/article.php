<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>article</title>
</head>
<link rel="stylesheet" type="text/css" href="couleur.css"> 
<body>
<?php

include ("data.php");

if (isset($_GET['id'])){
    $pdo = connect_to_database();
    $id_getted = $_GET['id'];
    $sql_line ="SELECT * FROM `articles` WHERE id = " . $id_getted;
    $request = $pdo->query($sql_line);
    $result = $request->fetch();

    echo '<h1 class="article_css">',$result['Titre'],'</h1>',"</br>";

    echo  '<p class="article_css_date">',$result['date'],'</p>',"<br>"; 

    echo '<img style="width: 450px; height: 250px" src="data:image/jpg;base64,',base64_encode($result['image']),'" alt="image vérification">',"<br>";
   
    echo '<p class="article_css_contenu">',$result['contenu'], '</p>',"<br>";
    
    echo '<h2 class="article_css_auteur">',"auteur : ", $result['auteur'],'</h2>', "<br>";
    
}

?>

</body>
</html>