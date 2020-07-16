<h2>Articles</h2>

<?php 
include ("data.php");
$pdo = connect_to_database();
$request = $pdo->query('SELECT * FROM `articles`');



while ($result = $request->fetch()){
    if(isset($result['id'])){
        echo '<p class="liste_articles_titre">',"<a href=\"front.php?page=5&id=", $result['id'], " \">", $result['Titre'],'</p>';
       
        echo '<p class="liste_articles">','<img style="width: 225px; height: 125px" src="data:image/jpg;base64,',base64_encode($result['image']),'" alt="image vérification">','</p>';

        echo '<p class="article_css_extrait">',"extrait : ", $result['extrait'],'</p>', "<br>";

        
    } 
}
?>