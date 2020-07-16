<h2>Accueil</h2>

<p class="description">Ce site un est blog développeur. Il a été réalisé dans le cadre de l'ISEG Summer Code Camp, stage de 4 semaines encadré par Epitech, où les étudiants de l'ISEG ont pu apprendre les bases de la programmation informatique. </p>

</br><img class="imageee" src="iscc.png" alt="accueil" height="250" width="450" /> <br/>




<?php 
include ("data.php");
$pdo = connect_to_database();
$request = $pdo->query('SELECT * FROM `articles`');

$count=0;
while($count<5){

    $result = $request->fetch();
    if(isset($result['id'])){
        echo '<p class="liste_articles_titreS">',"<a href=\"front.php?page=5&id=", $result['id'], " \">", $result['Titre'],'</p>', "<br>";
       
        echo '<p class="liste_articles">','<img style="width: 225px; height: 125px" src="data:image/jpg;base64,',base64_encode($result['image']),'" alt="image vérification">','</p>', "<br>";

        echo '<p class="liste_articles_extrait">',"extrait : ", $result['extrait'],'</p>', "<br>";
    } 
    $count++;
}

?>