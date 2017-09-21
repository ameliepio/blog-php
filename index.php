<!DOCTYPE html>
<html>
    <head>
        <!-- <meta charset="utf-8" /> -->
          <!-- <link rel="stylesheet" href="main.css"> -->
        <title>blog</title>
         <link href="style.css" rel="stylesheet" />
    </head>


    <body>
      <h1>Mon super blog !</h1>
       <p>Derniers billets du blog :</p>


<?php

// Effectuer ici la requête qui insère le message
try

{
  $bdd = new PDO('mysql:host=localhost;dbname=ticket','root', 'root', array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

}
catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}
// récupération

// récupération des messages
  $reponse=$bdd->query('SELECT * FROM billets');


  // afficher messagel

    while($donnees=$reponse->fetch()) {


?>

<div class="news">
  <h3>

<?php  echo '<p>' .htmlspecialchars($donnees['id']) .'-'. htmlspecialchars($donnees['titre'])
.'-'. htmlspecialchars($donnees['contenu']).'-'. htmlspecialchars($donnees['date_de_creation']) .'</p>';?>
  <em> <?php echo '<li><a href="commentaires.php?billets=<?php echo $donnees["id"]?>commentaires</a></>';?></em>



</h3>
</div>

<?php
}
?>

</body>

</html>
