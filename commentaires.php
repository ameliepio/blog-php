<html>
    <head>
        <meta charset="utf-8" />
          <link rel="stylesheet" href="main.css">
        <title>blog</title>
    </head>

<h1> Mon blog</h1>

 <p>Derniers billets du blog :</p>

      <li><a href="index.php">retour a la liste des billets</a></>



    <body>
    </body>
      </html>

<?php

// Effectuer ici la requête qui insère le message
try

{
  $bdd = new PDO('mysql:host=localhost;dbname=billet','root', 'root', array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

}
catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}

// récupération des messages
  $reponse=$bdd->prepare('SELECT * FROM commentaires  WHERE id_billet= ?');
$reponse->execute(array($_GET['billet']));

  // afficher message

    while($donnees=$reponse->fetch()) {

    echo '<p>' .htmlspecialchars($donnees['id']) .'-'. htmlspecialchars($donnees['id_billet']) .'-'. htmlspecialchars($donnees['auteur']).'-'. htmlspecialchars($donnees['commentaires']) . '</p>';

}
// Récupération du billet

  // requête preparé

$req = $bdd->prepare('SELECT * FROM billets WHERE ID = ?');

$req->execute(array($_GET['billet']));

$donnees = $req->fetch();

echo $donnees['TITRE'];



 ?>
