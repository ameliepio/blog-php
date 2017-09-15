<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
          <link rel="stylesheet" href="main.css">
        <title>blog</title>
    </head>




      <li><a href="commentaires.php?billet=<?php echo $donnees ["ID"]?>">commentaires</a></>

    <body>


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
  $reponse=$bdd->query('SELECT * FROM billets ORDER BY ID LIMIT 5 ');


  // afficher message

    while($donnees=$reponse->fetch()) {

    echo '<p>' .htmlspecialchars($donnees['ID']) .'-'. htmlspecialchars($donnees['TITRE']) .'-'. htmlspecialchars($donnees['CONTENU']).'-'. htmlspecialchars($donnees['DATE DE CREATION']) . '</p>';
 ?>
 <li><a href="commentaires.php?billet=<?php echo $donnees ["ID"]?>">commentaires</a></>

<?php
  }
 ?>

</body>

</html>
