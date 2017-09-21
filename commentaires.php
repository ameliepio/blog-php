<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
          <title>blog</title>
          <link rel="stylesheet" href="main.css">
    </head>
    <body>

<h1> Mon blog</h1>


      <li><a href="index.php">retour a la liste des billets</a>

<?php

try

{
  $bdd = new PDO('mysql:host=localhost;dbname=ticket','root', 'root', array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

}
catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}

// Récupération du billet
$req = $bdd->prepare('SELECT id,titre,contenu,date_de_creation FROM billets WHERE id=?');
$req->execute(array($_GET['billets']));
$donnees=$req->fetch();



?>
<div class="news">
<h3>

<?php

	echo $donnees['contenu'];

?>

</h3>

</div>

<h2>commentaires</h2>
<?php

// $req->closeCursor();


// récupération des commentaires
$req=$bdd->prepare('SELECT * FROM commentaire WHERE id_billet= ?');
$req->execute(array($_GET['billets']));

  // afficher message

while ($donnees = $req->fetch()) {


    echo (($donnees['id_billet']).($donnees['id']).($donnees['auteur']).($donnees['commentaireS']));


 ?>
 <?php

}


 ?>

</body>
  </html>
