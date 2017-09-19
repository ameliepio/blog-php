<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
          <title>blog</title>
          <link rel="stylesheet" href="main.css">
    </head>
    <body>

<h1> Mon blog</h1>


      <li><a href="index.php">retour a la liste des billets</a></>

<?php

// Effectuer ici la requête qui insère le message
try

{
  $bdd = new PDO('mysql:host=localhost;dbname=billet','root', 'root');

}
catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}

// Récupération du billet
  $req=$bdd->prepare('SELECT * FROM billets WHERE id=? ');
  $req->execute(array($_GET['billet']));
  $donnees=$req->fetch();



?>


<div class="news">

    <h3>

<?php  echo '<p>' .($donnees['id']) .'-'. htmlspecialchars($donnees['titre']) .'-'. htmlspecialchars($donnees['contenu']).'-'. htmlspecialchars($donnees['date_creation']) . '</p>';?>
</h3>

</div>

<h2>commentaires</h2>
<?php

$req->closeCursor();


// récupération des commentaires
$req=$bdd->prepare('SELECT * FROM commentaires WHERE id_billet= ?');
$req->execute(array($_GET['billet']));

  // afficher message

while ($donnees = $req->fetch()) {

?>
<?php
    echo '<p>' .htmlspecialchars($donnees['id_billet']) .'-'. htmlspecialchars($donnees['id_billet']) .'-'. htmlspecialchars($donnees['auteur']).'-'. htmlspecialchars($donnees['commentaires']) . '</p>';
 ?>
 <?php

}
$req->closeCursor();

 ?>

</body>
  </html>
