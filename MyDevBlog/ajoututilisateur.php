<h2>Ajout utilisateur</h2>

<form method = "post">
    <p>
        <input type="text" name="nom_utilisateur" placeholder="nom - prénom"/> </br>
        <input type="text" name="login" placeholder="login"/> </br>
        <input type="text" name="password" placeholder="password"/> </br>
        <input type="submit" value="Valider"/>
    </p>
</form>



<?php
include ("data.php");

if(isset($_POST['nom_utilisateur'], $_POST['login'], $_POST['password'])){
    if(!empty($_POST['nom_utilisateur']) AND !empty($_POST['login']) AND !empty($_POST['password'])){
        $nom_utilisateur = ($_POST['nom_utilisateur']);
        $login = ($_POST['login']);
        $password = ($_POST['password']);

        $insertion = $pdo->prepare("INSERT INTO utilisateur (nom_utilisateur, login, password) VALUES (?,?,?)");

        $insertion->execute(array($nom_utilisateur, $login, $password));

        $message = "vous êtes inscrit !";
    } else {
        $message = "remplissez les champs pour vous inscrire !";
    }
}
if (isset($message)) { echo $message; }



?>

