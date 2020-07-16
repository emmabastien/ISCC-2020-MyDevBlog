</body>
<h2>Ajout article</h2>

<form enctype="multipart/form-data" method = "post">
    <p>
        <input type="text" name="Titre" placeholder="Titre"/> </br>
        <input type="file" accept="image/png, image/jpg, image/jpeg" name="image" placeholder="image"/> </br>
        <input type="text" name="auteur" placeholder="auteur"/> </br>
        <textarea type="text" name="contenu" placeholder="contenu"></textarea> </br>
        <textarea type="text" name="extrait" placeholder="extrait 300 caractères"></textarea></br>
        <input type="submit" value="Valider"/>
    </p>
</form>
</br>

<?php

function transfert($titre, $auteur, $contenu, $extrait){
        $ret        = false;
        $img_blob   = '';
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['image']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {

        
            if ($_FILES['image']['size'] > $taille_max) {
                echo "image trop grande !";
                return false;
            }

    }
        include ("data.php");
        $pdo= connect_to_database();
             $img_blob = file_get_contents ($_FILES['image']['tmp_name']);
             $req = "INSERT INTO articles (" . 
              "Titre, image, auteur, contenu, extrait" .
              ") VALUES (" .
              "'" . $titre . "', " .
              "'" . addslashes($img_blob) . "', " .
              "'" . $auteur . "', " .
              "'" . $contenu . "', " .
              "'" . $extrait . "') " ;
             
        $prepare=$pdo->prepare($req);
        $prepare->execute();
           
            return true;
}



?>

</body>


<?php

if (isset($_POST['Titre'], $_POST['auteur'], $_POST['contenu'], $_POST['extrait'])){
    if(!empty($_POST['Titre']) AND !empty($_POST['auteur']) AND !empty($_POST['contenu']) AND !empty($_POST['extrait'])){
      $titre = ($_POST['Titre']);
      $auteur = ($_POST['auteur']);
      $contenu = ($_POST['contenu']);
      $extrait = ($_POST['extrait']);

transfert($titre, $auteur, $contenu, $extrait);

        $message = 'article posté !';

    } else { 
           echo 'veuillez remplir tous les champs';
        }

    }

if (isset($message)) { echo $message; }
?>

